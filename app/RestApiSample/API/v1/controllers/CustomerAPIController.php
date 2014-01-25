<?php

use RestApiSample\Repositories\Customer\CustomerRepositoryInterface;
use RestApiSample\Services\Validator\Customer\APIValidator;

class CustomerAPIController extends BaseController {

    protected $repository;
    protected $validator;

    public function __construct(CustomerRepositoryInterface $repository, APIValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;


        // API Auth Filter
        Route::filter('apiauth', function($route, $request)
        {
            // Verify API key matches config
            if(Request::header('x-api-key') != Config::get('app.key')) {
                return Response::json(
                    array(
                        'error' => true,
                        'message' => 'Unauthorized Request'
                    ),
                    401
                );
            }
        });

        // API Customer ID Exists Filter
        Route::filter('id_exists', function($route)
        {

            $id = $route->getParameter('customers');

            if(!isset($id) || $this->repository->findById($id) == false) {

                return Response::json(
                    array(
                        'error' => true,
                        'errors' => array('Customer ID not found')
                    ),
                    200
                );
            }
        });



        // Set Filters
        $this->beforeFilter('apiauth');
        $this->beforeFilter('id_exists', array('only' => array('show','update','destroy')));

    }

    /**
     * Display a listing of all the customer resources.
     *
     * @return Response
     */
    public function index()
    {

        $customers = $this->repository->findAll(Input::get('sort_column') ?: 'created_at',
                                          Input::get('sort_dir')    ?: 'DESC', 
                                          Input::get('limit')       ?: '10');
        return Response::json(
            array(
                'error' => false,
                'customer' => $customers->toArray()
            ),
            200
        );

    }

    /**
     * Display the specified customer resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $customer =  $this->repository->findById($id);

        return Response::json(
            array(
                'error' => false,
                'customer' => $customer->toArray()
            ),
            200
        );
    }

    /**
     * Store a newly created customer resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = array_except(Input::all(), '_method');

        if($this->validator->passes())
        {
            $customer = $this->repository->createRow($input);

            return Response::json(
                array(
                    'error' => false,
                    'customer' => $customer->toArray()
                ),
                200
            );

        }
        else {

            $errors = $this->validator->getErrors();

            return Response::json(
                array(
                    'error' => true,
                    'errors' => $errors->all()
                ),
                200
            );
        }
    }

    /**
     * Update the specified customer resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');

        if($this->validator->passes())
        {
            $customer = $this->repository->findById($id);
            $customer->updateRow($input);

            return Response::json(
                array(
                    'error' => false,
                    'customer' => $customer->toArray()
                ),
                200
            );            
        }
        else {

            $errors = $this->validator->getErrors();

            return Response::json(
                array(
                    'error' => true,
                    'errors' => $errors->all()
                ),
                200
            );
        }

    }

    /**
     *  Delete customer resource.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        // Remove customer resource
        $this->repository->deleteRow($id);

        return Response::json(
            array(
                'error' => false,
                'msg' => 'Delete Successful'
            ),
            200
        );

    }


    /**
    *  Search customers.
    * @return Response
    */
    public function search()
    {
        $input = array_except(Input::all(), '_method');

        $customers = $this->repository->APIsearch($input);

        if(is_object($customers)) {
            return Response::json(
                array(
                    'error' => false,
                    'customer' => $customers->toArray()
                ),
                200
            );

        }
        else {
            return Response::json(
                array(
                    'error' => true,
                    'errors' => $customers
                ),
                200
            );
        }


    }

}
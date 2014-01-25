<?php

use RestApiSample\Repositories\Customer\CustomerRepositoryInterface;
use RestApiSample\Services\Validator\Customer\APIValidator;

class CustomerController extends BaseController {


    protected $repository;
    protected $validator;

    public function __construct(CustomerRepositoryInterface $repository, APIValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function index()
    {

        $input = array_except(Input::all(), '_method');

        if($this->validator->passes())
        {
            $user = $this->repository->createRow($input);

            return Response::json(
                array(
                    'error' => false,
                    'user' => $user->toArray()
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

}
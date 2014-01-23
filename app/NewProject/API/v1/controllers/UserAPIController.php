<?php

use NewProject\Repositories\User\UserRepositoryInterface;
use NewProject\Services\Validator\User\EditValidator;

class UserAPIController extends BaseController {

    /**
     * User Repository
     *
     * @var User
     */
    protected $repository;
    protected $validator;

    public function __construct(UserRepositoryInterface $repository, EditValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        return $this->repository->findAll(Input::get('sort_column') ?: 'created_at',
                                          Input::get('sort_dir')    ?: 'DESC', 
                                          Input::get('limit')       ?: '10', 
                                          Input::get('include')     ?: []);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id, $orFail = true)
    {
        return $this->repository->findById($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = array_except(Input::all(), '_method');
        if($this->validator->passes())
        {
        //     $this->repository->createRow($input);
            $user = User::create($input);
            $user->save();

            return Response::json(array(
                'error' => false,
                'users' => $user),
                200
            );            
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');

        if($this->validator->passes())
        {
            $user = $this->repository->findById($id);
            $user->updateRow($input);

            return Response::json(array(
                'error' => false,
                'users' => $user),
                200
            );            
        }

    }

    /**
     *  Delete user.
     *
     */
    public function destroy($id)
    {
        $this->repository->deleteRow($id);
    }

}
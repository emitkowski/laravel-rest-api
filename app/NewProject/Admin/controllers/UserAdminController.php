<?php

use NewProject\Repositories\User\UserRepositoryInterface as UserRepositoryInterface;
use NewProject\Services\Validator\User\EditValidator;

class UserAdminController extends BaseController {

    /**
     * User Repository
     *
     * @var User
     */
    protected $user_repo;
    protected $user_edit_validator;

    public function __construct(UserRepositoryInterface $user_repo, EditValidator $user_edit_validator)
    {
        $this->user_repo = $user_repo;
        $this->user_edit_validator = $user_edit_validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('Admin::users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('Admin::users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, User::$rules);

        if($validation->passes())
        {
            $this->user_repo->createRow($input);

            return Redirect::route('Admin::users.index');
        }

        return Redirect::route('Admin::users.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //$user = $this->user_repo->findById($id, true);

        return View::make('Admin::users.show', compact('user'))->withInput;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->user_repo->findById($id);

        if(is_null($user))
        {
            return Redirect::route('Admin::users.index');
        }

        return View::make('Admin::users.edit', compact('user'));
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

        if($this->user_edit_validator->passes())
        {
            $user = $this->user_repo->findById($id);
            $user->updateRow($input);

            return Redirect::route('users.index');
        }

        return Redirect::route('users.edit', $id)
            ->withInput()
            ->withErrors($this->user_edit_validator->getErrors())
            ->with('message', 'There were validation errors.');
    }

    /**
     *  Delete user.
     *
     */
    public function delete()
    {
        $input = array_except(Input::all(), '_method');

        $this->user_repo->deleteRow($input['id']);
    }

}

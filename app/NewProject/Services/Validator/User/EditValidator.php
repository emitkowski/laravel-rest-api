<?php namespace NewProject\Services\Validator\User;

use NewProject\Services\Validator\ValidatorAbstract;

class EditValidator extends ValidatorAbstract {

    /**
     * Validation rules
     */
    protected $rules = array(
        'first_name' => 'required|alpha',
        'last_name' => 'required|alpha',
        'email' => 'required|email',
    );

    /**
     * Custom Validation Messages
     */
    protected $messages = array(
        'email.exists' => 'This :attribute is already in use with another account.',
    );

}
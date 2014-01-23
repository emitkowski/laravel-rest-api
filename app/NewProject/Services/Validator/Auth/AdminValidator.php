<?php namespace NewProject\Services\Validator\Auth;

use NewProject\Services\Validator\ValidatorAbstract;

class AdminValidator extends ValidatorAbstract {

    /**
    * Validation rules
    */
    protected $rules = array(
        'email' => 'required|email|exists:admin',
        'password' => 'required'
    );

    /**
     * Custom Validation Messages
     */
    protected $messages = array(
        'email.exists' => 'Invalid Account Information',
    );

}
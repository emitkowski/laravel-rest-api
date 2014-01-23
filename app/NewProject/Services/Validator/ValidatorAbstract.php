<?php namespace NewProject\Services\Validator;

use Illuminate\Support\MessageBag as MessageBag;

/*
 * This class defines abstract Validator methods
 */

abstract class ValidatorAbstract implements ValidatorInterface {

    protected $validator;

    protected $input;

    protected $errors;

    /**
     * @param array $input
     *
     */
    public function __construct($input = NULL, MessageBag $bag)
    {
        $this->input = $input ?: \Input::all();

        $this->validator = \Validator::make($this->input, $this->rules, $this->messages);
        $this->errors = $bag;
    }

    /**
     * Run validation on input.
     *
     * @return boolean
     */
    public function passes()
    {
        if($this->validator->passes())
        {
            return true;
        }

        $this->errors = $this->validator->messages();

        return false;
    }

    /**
     * Get all errors stored.
     *
     * @return MessageBag
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Add new error.
     *
     * @return MessageBag
     */
    public function addError($key, $message)
    {
       return $this->errors->add($key, $message);
    }

}
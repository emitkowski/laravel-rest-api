<?php namespace RestApiSample\Repositories\Customer;

interface CustomerRepositoryInterface  {


    /*
    * Find Customers By Search Fields.
    *
    * @input $input
    * @return object/string
    */
    public function APISearch($input);


}
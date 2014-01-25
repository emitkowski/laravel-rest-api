<?php namespace RestApiSample\Repositories\Customer;

interface CustomerRepositoryInterface  {


    /*
     * Find Customers By Search Fields.
     *
     * @input $input
     * @return array
     */
    public function APISearch($input);


}
<?php namespace RestApiSample\Repositories\Customer;

use RestApiSample\Repositories\EloquentRepositoryAbstract;

/*
 * This class is the MySQL Implementation of the Customer Repository
 */

class EloquentCustomerRepository extends EloquentRepositoryAbstract implements CustomerRepositoryInterface {

    protected $table = 'customer';

    /*
    * Find Customers By Search Fields.
    *
    * @input $input
    * @return object/string
    */
    public function APISearch($input)
    {
        // Set searchable parameters
        $exact_search_fields = array('id', 'email');
        $partial_search_fields = array('last_name');

        $query = $this;

        if(empty($input))
            return 'At least 1 search parameter required';

        // Check all inputs
        foreach($input as $key => $value) {

            // Check if parameter is exact, partial or return if invalid
            if(in_array($key, $exact_search_fields)) {
                 $query = $query->where($key, $value);
            }
            else if(in_array($key, $partial_search_fields)) {
                $query = $query->where($key, 'LIKE', '%'.$value.'%');
            }
            else {
                return 'Invalid Search Parameter Found';
            }
        }

        // Get Results
        return $query->get();
    }

}
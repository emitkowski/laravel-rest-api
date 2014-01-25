<?php namespace RestApiSample\Repositories;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

    /**
     * Register the binding
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        /**** Customer Repository ***/
        $app->bind('EloquentCustomerRepository', function()
        {
            return new \RestApiSample\Repositories\Customer\EloquentCustomerRepository;
        });


        // Choose Binding for IOC Customer Repository
        $app->bind('RestApiSample\Repositories\Customer\CustomerRepositoryInterface', 'EloquentCustomerRepository');

    }

}
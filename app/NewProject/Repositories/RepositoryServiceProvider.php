<?php namespace NewProject\Repositories;

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

        /**** Admin Repository ***/
        $app->bind('AdminRepositoryEloquent', function()
        {
            return new \NewProject\Repositories\Admin\AdminRepositoryEloquent;
        });
        // Choose Binding
        $app->bind('NewProject\Repositories\Admin\AdminRepositoryInterface', 'AdminRepositoryEloquent');



        /**** User Repository ***/
        $app->bind('UserRepositoryEloquent', function()
        {
            return new \NewProject\Repositories\User\UserRepositoryEloquent;
        });
        // Choose Binding
        $app->bind('NewProject\Repositories\User\UserRepositoryInterface', 'UserRepositoryEloquent');

    }

}
<?php namespace NewProject\Admin\Services;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        require_once(__DIR__.'/../../../routes.php');
        \View::addNamespace('Admin', __DIR__.'/../views/');
    }
}
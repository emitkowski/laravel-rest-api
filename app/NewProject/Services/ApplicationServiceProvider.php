<?php namespace NewProject\Services;

use Illuminate\Support\ServiceProvider;

class ApplicationServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        // This will be our shared filters like guest and admin
        require_once(__DIR__.'/../../filters.php');
        \View::addNamespace('Application', __DIR__.'/../views/');
    }
}
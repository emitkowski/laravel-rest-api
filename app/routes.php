<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/test', function()
{
    dd(App::environment());
});


// Index Route
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

Route::get('/mailer', array('as' => 'mailer', 'uses' => 'MailerController@index'));

Route::get('/apitest', array('uses' => 'APITestController@index'));


// API Routes
Route::group(array('prefix' => 'api/v1'), function() {

    Route::get('/customers/search', array('uses' => 'CustomerAPIController@search'));

    Route::resource('customers', 'CustomerAPIController');

});



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

// Index Route
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

Route::get('/mailer', array('as' => 'home', 'uses' => 'MailerController@index'));

Route::get('/billing', array('as' => 'home', 'uses' => 'BillingController@index'));

Route::get('test', function()
{
    dd(App::environment());
});

// Admin Routes
Route::group(array('prefix' => 'admin'), function()
{
    Route::any('login', array('as' => 'adminlogin', 'uses' => 'AuthAdminController@adminLogin'))->before('guest');

    Route::group(array('before' => 'auth'), function()
    {
        Route::any('/', array('as' => 'adminhome', 'uses' => 'UserAdminController@index'));

        // Logout Route
        Route::any('logout', array('as' => 'adminlogout', 'uses' => 'AuthAdminController@adminLogout'));

        // Restful Routes
        Route::resource('users', 'UserAdminController');

        // User Routes
        Route::get('users/data-feed', array('uses' => 'UserAdminController@dataFeed'));
        Route::post('users/delete', array('uses' => 'UserAdminController@delete'));
        Route::post('users/change-status', array('uses' => 'UserAdminController@changeStatus'));
        Route::post('users/resend-activation', array('uses' => 'UserAdminController@resendActivation'));
        Route::post('users/password-reset', array('uses' => 'UserAdminController@passwordReset'));
    });
});

// API Routes
Route::group(array('prefix' => 'api/v1'), function() {
    Route::resource('users', 'UserAPIController');
});



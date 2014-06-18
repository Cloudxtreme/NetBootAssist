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

// Authentication
Route::get('/', 'LoginController@doLoginForm');
Route::post('/', 'LoginController@doLoginAction');
Route::get('/logout', 'LoginController@doLogout');

// Webinterface
Route::group(array('before' => 'auth'), function()
{
    Route::get('/dashboard', 'DashboardController@showDashboard');
    Route::get('/dashboard/assign', 'DashboardController@assignSystemOverview');
});


// Used from iPXE
Route::get('boot/{account}/{mac}', 'BootController@getScript');

// Used from Tinycore
Route::get('boot/{account}/{mac}/{script}', 'BootController@getScript');
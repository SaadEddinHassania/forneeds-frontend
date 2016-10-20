<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::get('/checkpoint', 'Auth\ProfileCompletionController@index');
    Route::get('/checkpoint/{type}', 'Auth\ProfileCompletionController@choosePath');

    Route::group(['namespace' => 'FrontEnd'], function () {
        //citizen routes

        Route::get('/service-requests', 'ProfileController@serviceRequests');

        Route::get('/dashboard', 'ProfileController@dashboard');

        Route::get('/profile', 'ProfileController@index');

        Route::get('/surveys', 'ProfileController@surveys');

        Route::get('/settings', 'ProfileController@settings');
    });

    Route::group(['prefix'=>'admin','namespace' => 'Admin','as'=>'admin.','middleware','checkUserType:admin'], function () {

        Route::get('users/{id}/image', 'UserController@getUserImage')->name('users.image');
        Route::resource('users', 'UserController');

        Route::resource('serviceProviders', 'ServiceProviderController');

    });
});

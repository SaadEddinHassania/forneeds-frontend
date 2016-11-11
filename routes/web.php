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
    Route::post('/checkpoint/sp/', 'Auth\ProfileCompletionController@completeSpProfile')->name('newSp');
    Route::post('/checkpoint/citizen/', 'Auth\ProfileCompletionController@completeCitizenProfile')->name('newCitizen');

    Route::get('gateways/surveys/create', "Surveys\\SurveysController@create");
    Route::post('gateways/surveys/store/survey', "Surveys\\SurveysController@storeSurvey")->name('storeSurvey');
    Route::post('gateways/surveys/store/questions', "Surveys\\SurveysController@storeQuestions")->name('storeQuestions');
    Route::post('gateways/surveys/store/configs', "Surveys\\SurveysController@storeConfig")->name('storeConfig');
    Route::post('gateways/projects/store/', "Projects\\ProjectsController@store")->name('storeProject');

    Route::post('gateways/service_requests/store', "ServiceRequests\\ServiceRequestsController@store")->name('storeServiceRequest');

    Route::group(['namespace' => 'FrontEnd'], function () {
        //citizen routes
        Route::get('listings/projects/{service_provider_id}', "AjaxApiController@projects");
        Route::get('gateways/listings/{model}', "AjaxApiController@Listings")->name('getListing');

        Route::get('/service-requests', 'ProfileController@serviceRequests');

        Route::get('/dashboard', 'ProfileController@dashboard');

        Route::get('/profile', 'ProfileController@index')->name('profile');

        Route::post('/update_profile', 'ProfileController@postUpdate')->name('update_profile');
        Route::get('/profile_image', 'ProfileController@getImage');
        Route::post('/profile_image', 'ProfileController@postImage')->name('postUserImage');

        Route::get('/surveys', 'ProfileController@surveys');

        Route::get('/settings', 'ProfileController@settings');

    });

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware', 'checkUserType:admin'], function () {

        Route::get('users/{id}/image', 'UserController@getUserImage')->name('users.image');
        Route::resource('users', 'UserController');

        Route::resource('serviceProviders', 'ServiceProviderController');
        Route::resource('projects', 'ProjectController');


    });
});

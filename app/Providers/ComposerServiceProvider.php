<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Auth;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
//        View::composer(
//            'dashboard', 'App\Http\ViewComposers\DashboardComposer'
//        );

        // Using Closure based composers...
        View::composer(['dashboard.layout.dashboard','endusers.organizations.report','endusers.layout.dashboard_no_sidebar','endusers.layout.dashboard','endusers.citizens.menu'], function ($view) {
            $view->with('auth_user', Auth::user());
            $view->with('impersonator',session('impersonator'));
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
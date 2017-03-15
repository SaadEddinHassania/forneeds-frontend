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
        View::composer('dashboard.layout.dashboard', function ($view) {
            $view->with('auth_user', Auth::user());
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
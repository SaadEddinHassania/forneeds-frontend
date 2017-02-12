<?php
/**
 * Created by PhpStorm.
 * User: akram
 * Date: 11/5/2016
 * Time: 11:19 PM
 */

namespace Social\Facebook;


use App\Repositories\AccountRepositoryEloquent;
use App\Repositories\InteractionRepositoryEloquent;
use Illuminate\Support\ServiceProvider;
use Social\Facebook\Contracts\SocialDriver;


class FacebookServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Driver::class, function ($app) {
            return new Driver($app, $app->make(Mapper::class), $app->make(Provider::class));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Driver::class];
    }
}
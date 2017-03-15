<?php

namespace App\Providers;

use App\Models\Project;
use App\Models\Survey;
use App\Models\Users\Citizen;
use App\Notifications\CitizenCreated;
use App\Notifications\ProjectCreated;
use App\Notifications\ServiceProviderCreated;
use App\Notifications\SurveyCreated;
use App\User;

use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;

class DBEventsProvider extends ServiceProvider
{

    private function sendNotificationToAdmin($notificationInstance)
    {
        Notification::send(User::where('is_admin', true)->get(), $notificationInstance);;
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Citizen::created(function ($citizen) {
            $this->sendNotificationToAdmin(new CitizenCreated($citizen));
        });

        Project::created(function ($project) {
            $this->sendNotificationToAdmin(new ProjectCreated($project));
        });

        \App\Models\Users\ServiceProvider::created(function ($sp) {
            $this->sendNotificationToAdmin(new ServiceProviderCreated($sp));
        });

        Survey::created(function ($survey) {
            $this->sendNotificationToAdmin(new SurveyCreated($survey));
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}

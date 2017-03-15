<?php

namespace App\Http\Controllers\Dashboard\Organizations;

use App\DataTables\ProjectsDataTablePending;
use App\DataTables\Scopes\ServiceProviderDataTablePendingScope;
use App\DataTables\ServiceProviderDataTable;
use App\DataTables\ServiceProviderDataTablePending;
use App\DataTables\SurveysDataTablePending;
use App\Models\Project;
use App\Models\Survey;
use App\Models\Users\ServiceProvider;
use App\User;
use App\Notifications\ProjectAccepted;
use App\Notifications\SurveyAccepted;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class VerificationController extends Controller
{
    public function index($model, ServiceProviderDataTablePending $serviceProviderDataTable, ProjectsDataTablePending $projectsDataTablePending, SurveysDataTablePending $surveysDataTablePending)
    {
        switch ($model) {
            case 'org':
                return $this->ServiceProvider($serviceProviderDataTable);
                break;
            case 'project':
                return $this->Project($projectsDataTablePending);
                break;
            case 'survey':
                return $this->Survey($surveysDataTablePending);
                break;
            default:
                return redirect()->back();
                break;
        }
    }

    public function ServiceProvider(ServiceProviderDataTablePending $serviceProviderDataTable)
    {
        return $serviceProviderDataTable->render('dashboard.organizations.organizations', ['model' => 'org']);
    }

    public function Survey(SurveysDataTablePending $surveysDataTablePending)
    {
        return $surveysDataTablePending->render('dashboard.organizations.organizations', ['model' => 'survey']);
    }

    public function accept(Request $request, $model, $id, $project = null)
    {
        $mod = str_replace('-', '\\', $model);
        $sp = $mod::findOrFail($id);
        $is_accepted = $request->input('is_accepted');
        $sp->is_accepted = $is_accepted;
        $sp->save();
        if ($is_accepted == 1) {
            $target_users = User::where('is_admin', true)->get();
            switch (snake_case(class_basename($mod))) {
                case 'project':
                    Notification::send($target_users, new ProjectAccepted($sp));
                    break;
                case 'service_provider':
                    Notification::send($target_users, new ProjectAccepted($sp));
                    break;
                case 'survey':
                    Notification::send($target_users, new SurveyAccepted($sp));
                    break;
                default:
                    break;
            }
        }
        return redirect()->back();

    }

    public function Project(ProjectsDataTablePending $projectsDataTablePending)
    {
        return $projectsDataTablePending->render('dashboard.organizations.organizations', ['model' => 'project']);

    }
}

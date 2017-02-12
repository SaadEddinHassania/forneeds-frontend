<?php

namespace App\Http\Controllers\Dashboard\Organizations;

use App\DataTables\ProjectsDataTablePending;
use App\DataTables\Scopes\ServiceProviderDataTablePendingScope;
use App\DataTables\ServiceProviderDataTable;
use App\DataTables\ServiceProviderDataTablePending;
use App\DataTables\SurveysDataTablePending;
use App\Models\Project;
use App\Models\Users\ServiceProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return $serviceProviderDataTable->render('dashboard.organizations.organizations');
    }

    public function Survey(SurveysDataTablePending $surveysDataTablePending)
    {
        return $surveysDataTablePending->render('dashboard.organizations.organizations');
    }

    public function accept(Request $request, $model, $id, $project=null)
    {
        $sp = str_replace('-', '\\', $model)::findOrFail($id);
        $sp->is_accepted = $request->input('is_accepted');
        $sp->save();

        return redirect()->back();

    }

    public function Project(ProjectsDataTablePending $projectsDataTablePending)
    {
        return $projectsDataTablePending->render('dashboard.organizations.organizations');

    }
}

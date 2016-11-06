<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Location\Area;
use App\Models\MarginalizedSituation;
use App\Models\Project;
use App\Models\Sector;
use App\Models\Users\ServiceProvider;
use App\Models\Users\ServiceProviderType;
use App\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Session;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['checkUserType:serviceProvider,citizen'])->only('index', 'settings', 'surveys');
        $this->middleware('checkUserType:serviceProvider')->only('dashboard');
        $this->middleware('checkUserType:citizen')->only('serviceRequests');
    }

    public function index()
    {
        $user = Auth::user();
        if ($user->isServiceProvider()) {
            return $this->serviceProviderProfile();
        } else if ($user->isCitizen()) {
            return $this->citizenProfile();
        }
    }

    private function serviceProviderProfile()
    {
        $user = Auth::user();
        return view('profiles.sp.index1', [
            "user" => $user,
            "sp" => $user->serviceProvider()->first(),
            'projects' => Project::where('service_provider_id', $user->serviceProvider()->first()->id, ['id', 'name'])->pluck('name', 'id')->toarray(),
            "user_attrs" => $user->getFillable(),
            'marginalizedSituations' => MarginalizedSituation::all()->pluck('name', 'id')->toarray(),

            'sectors' => $user->serviceProvider()->first()->sectors()->pluck('name', 'id')->toarray(),
        ]);
    }

    private function citizenProfile()
    {
        $user = Auth::user();
        $sRequests = $user->citizen->servicesRequests;

        return view('profiles.citizen.index1', [
            "user" => $user,
            "sRequests" => $sRequests,
            'areas' => Area::all()->pluck('name', 'id')->toarray(),
            'sectors' => Sector::all()->pluck('name', 'id')->toarray(),

        ]);
    }

    public function dashboard()
    {
        return 'Dashboard';
    }

    public function serviceRequests()
    {
        return 'service requests';
    }

    public function settings()
    {
        $user = Auth::user();
        if ($user->isServiceProvider()) {
            return $this->serviceProviderSettings();
        } else if ($user->isCitizen()) {
            return $this->citizenSettings($user);
        }
    }

    public function surveys()
    {
        $user = Auth::user();
        if ($user->isServiceProvider()) {
            return $this->serviceProviderSurveys();
        } else if ($user->isCitizen()) {
            return $this->citizenSurveys();
        }
    }

    private function serviceProviderSettings()
    {
        $user = Auth::user();
        return view('profiles.sp.settings1',[
            "user" => $user->with('ServiceProvider')->first(),
            'serviceProviders' => ServiceProvider::all()->pluck('name', 'id')->toarray(),
//            "user_attrs" => $this->userRepository->getFieldsSearchable(),
            "types" => ServiceProviderType::all()->pluck('name', 'id')->toarray(),
            'sectors' => Sector::all()->pluck('name', 'id')->toarray(),
        ]);

    }

    private function citizenSettings(User $user)
    {
        $sRequests = $user->citizen->servicesRequests;
//            dd($sRequests);

        return view('profiles.citizen.settings1', [
            "user" => $user,
            "sRequests" => $sRequests,
            'areas' => Area::all()->pluck('name', 'id')->toarray(),
            'sectors' => Sector::all()->pluck('name', 'id')->toarray(),

        ]);
    }

    private function serviceProviderSurveys()
    {
        return 'service provider Surveys';
    }

    private function citizenSurveys()
    {
        return 'citizen Surveys';
    }

    public function postImage(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'file' => 'image',
        ];

        $this->validate($request, $rules);

//        return Response::json(array('success' => true), 200);

        //   dd(array_add($request->all(), 'user_id', $user->id));

//        $serviceProvider->save();

        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                $destinationPath = storage_path('assets\images\users\\');
                $fileName = str_random(20) . '.' . $request->file('file')->getClientOriginalExtension();
                $request->file('file')->move($destinationPath, $fileName); // uploading file to given path
                $user->avatar = $fileName;
                $user->save();
            }
        }

        Session::flash('flash_message', 'Profile updated successfully');

        return ['flash_message' => 'Profile updated successfully'];

//        return Image::make(storage_path('assets\images\\' . $user->avatar));
    }

    public function getImage()
    {
        $user = Auth::user();
        if ($user->avatar != null ){
            $img = Image::make(storage_path('assets\images\users\\' . $user->avatar))->resize(150, 150);
        }
        else
            $img = Image::make("http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image")->resize(150, 150);


        return $img->response('jpg');
//        return Image::make(storage_path('assets\images\\' . $user->avatar));
    }

    private function postSPUpdate(Request $request,User $user){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'serviceProvider.mission_statement' => 'required',
            'serviceProvider.service_provider_type_id' => 'required|exists:service_provider_types,id',
            'serviceProvider.sector_id' => 'required|exists:sectors,id'
        ]);

        $sv = $user->serviceProvider;
        $sv->update($request->input('serviceProvider'));
        $sv->save();

        $user->update($request->all());
        $user->save();
    }

    private function postCitizenUpdate(Request $request ,User $user){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
        ]);

        $citizen = $user->citizen;
        $citizen->update($request->input('citizen'));
        $citizen->save();

        $user->update($request->all());
        $user->save();

        return true;
    }
    public function postUpdate(Request $request)
    {
        $user = Auth::user();
        $success = false;
        if ($user->isServiceProvider()) {
            $success = $this->postSPUpdate($request,$user);
        } else if ($user->isCitizen()) {
            $success = $this->postCitizenUpdate($request,$user);
        }

        if ($success) {
            Session::flash('flash_message', 'Profile updated successfully');

            return ['flash_message' => 'Profile updated successfully'];
        }else {
            Session::flash('flash_message', 'Profile updated error');

            return ['flash_message' => 'Profile updated error'];
        }

    }

}

<?php

namespace App\Http\Controllers\Auth;

use App\Models\Users\Citizen;
use App\Models\Users\ServiceProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Auth;

class ProfileCompletionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.choose');
    }

    public function choosePath($type)
    {
        $func ='choose'.ucfirst($type);
        return $this->$func();
    }
    private function chooseCitizen(){

        return view('profiles.citizen.complete');
    }

    private function chooseSp(){

        return view('profiles.sp.complete');

    }
    public function completeCitizenProfile(Request $request)
    {
        $citizen = new Citizen([

        ]);
        $citizen->user()->associate(Auth::user());
        redirect('/profile');
    }

    public function completeSpProfile(Request $request)
    {
        $sp = new ServiceProvider([

        ]);
        $sp->user()->associate(Auth::user());
        redirect('/profile');
    }
}

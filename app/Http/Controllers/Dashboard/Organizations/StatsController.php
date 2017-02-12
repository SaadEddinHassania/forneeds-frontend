<?php

namespace App\Http\Controllers\Dashboard\Organizations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatsController extends Controller
{
    public function index(){
        return view('dashboard.organizations.statistics');
    }
}

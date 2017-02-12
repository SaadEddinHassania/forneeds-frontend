<?php

namespace App\Http\Controllers\Dashboard\Workers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatsController extends Controller
{
    public function index(){
        return view('dashboard.workers.statistics');
    }
}

<?php

namespace App\Http\Controllers\Dashboard\Workers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MandeController extends Controller
{
    public function index()
    {
        return view('dashboard.workers.mande');
    }

    public function survery_workers()
    {
        return view('dashboard.workers.surveryworkers');
    }

    public function make_payment()
    {
        return view('dashboard.workers.forms.payment');
    }

    public function store_payment()
    {

    }


}

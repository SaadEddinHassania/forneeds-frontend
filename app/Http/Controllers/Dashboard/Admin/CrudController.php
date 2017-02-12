<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CrudController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.crud');
    }

    public function create()
    {
        return view('dashboard.admin.forms.create');
    }

    public function edit()
    {
        return view('dashboard.admin.forms.edit');
    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {
    }

}

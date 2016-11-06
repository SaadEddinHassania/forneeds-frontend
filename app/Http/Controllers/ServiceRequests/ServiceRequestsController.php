<?php

namespace App\Http\Controllers\ServiceRequests;

use App\Models\Location\District;
use App\Models\ServiceRequest;
use Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Flash;


class ServiceRequestsController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();
        $st = District::findOrFail($input['district_id']);
        $input['location_meta_id'] = $st->location_meta_id;
        $input['citizen_id'] = Auth::user()->citizen()->first()->id;
        $serviceRequest = ServiceRequest::create($input);

        Flash::success('ServiceRequests saved successfully.');

        return response()->json(collect(["id" => $serviceRequest->id]));
    }
}


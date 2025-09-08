<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Location;
use App\Models\LocationGroup;

class LocationController extends Controller
{
    public function index(){
        $groups = LocationGroup::all();
        $locations = Location::with('phones','emails', 'address')->get();

        return response()->json([
            'locationGroups' => $groups,
            'locations' => $locations,
        ]);

    }
}

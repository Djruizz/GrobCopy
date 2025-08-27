<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Family;

class FamilyController extends Controller
{
    public function index()
    {
        return response()->json(Family::all());
    }
}

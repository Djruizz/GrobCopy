<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Family;

class FamilyController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('q');
        $families = Family::query()
            ->when($query, function ($q) use ($query){
                $q->where('name','like', "%{$query}%");
            })
            ->get();
        return response()->json($families);
    }
}

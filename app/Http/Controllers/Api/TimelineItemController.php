<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimelineItem;

class TimelineItemController extends Controller
{
    public function index(){
        return response()->json(TimelineItem::all());
    }
}

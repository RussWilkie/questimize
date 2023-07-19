<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activities;

class ActivitiesController extends Controller
{
    public function index(Request $request){
        return Activities::all();
    }

    public function show($sub_skill_id){
        return Activities::with('subSkills')->where('sub_skill_id', '=', $sub_skill_id)->get();
    }
}

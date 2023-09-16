<?php

namespace App\Http\Controllers;

use App\Models\SubSkill;
use Illuminate\Http\Request;
use App\Models\Activities;

class ActivitiesController extends Controller
{
    public function index(Request $request){
        return Activities::all();
    }

    public function show($sub_skill_id){
        return Activities::with('subSkills')->where('sub_skill_id', '=', $sub_skill_id)->orderBy('default_xp_value')->get();
    }

    public function store(Request $request){
        $this->validate(
            $request,
            [
                'name' => 'required',
                'default_xp_value' => 'required',
            ],
            [
                'name.required' => 'Name field required!',
                'default_xp_value' => 'XP value is required!'
            ]            
        );
        $data = $request->all();
        $sub_skill = SubSkill::where('id', '=', $data['sub_skill'])->first();
        $activity = Activities::create($data);
        
        $activity->subSkills()->associate($sub_skill);
        $activity->save();
    }

}
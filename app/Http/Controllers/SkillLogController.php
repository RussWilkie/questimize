<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SkillLog;

class SkillLogController extends Controller
{

    public function index()
    {
        return SkillLog::with('activities')->get();
    }

  
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required'
            ],
            [
                'name.required' => 'Skill input field is required!'
            ]
        );

        $data = $request->all();
        $skillLog= SkillLog::create($request->all());
        $skillLog->save();
    }

    public function show(Skill $skill)
    {
        //
    }

    
    public function edit(Skill $skill)
    {
        //
    }


    public function update(Request $request, Skill $skill)
    {
        //
    }

  
    public function destroy(Skill $skill)
    {
        //
    }
}

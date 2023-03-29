<?php

namespace App\Http\Controllers;

use App\Models\SubSkill;
use Illuminate\Http\Request;
use App\Models\Skill;

class SubSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SubSkill::with('skill')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'skill' => 'required'
            ],
            [
                'name.required' => 'Subskill input field is required!',
                'skill.required' => 'Skill selection is required!'
            ]
        );

        $data = $request->all();
        $skill = Skill::where('name', '=', $data['skill'])->first();
        $subSkill= SubSkill::create($request->all());
        $subSkill->skill()->associate($skill);
        $subSkill->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubSkill  $subSkill
     * @return \Illuminate\Http\Response
     */
    public function show(SubSkill $subSkill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubSkill  $subSkill
     * @return \Illuminate\Http\Response
     */
    public function edit(SubSkill $subSkill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubSkill  $subSkill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubSkill $subSkill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubSkill  $subSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubSkill $subSkill)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Quest;
use Illuminate\Http\Request;
use App\Models\QuestStatus;

class QuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Quest::with('questStatus', 'questCategory')->latest()->get();
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
        $this->validate($request,
        [
            'title' => 'required'
        ],
        [
            'title.required' => 'Quest input field is required!'
        ]
        );
        Quest::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function show(Quest $quest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function edit(Quest $quest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $quest = Quest::findOrFail($id);
        $quest->update($request->all());
        $statusName = $request->quest_status['name'];
        if(!is_null($statusName)){
            $statusRow = QuestStatus::where('name', '=', $statusName)->first();
            $quest->quest_status_id = $statusRow->id;
        }
        $quest->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quest = Quest::findOrFail($id);
        $quest->delete();
        return Quest::latest()->get();
    }
}

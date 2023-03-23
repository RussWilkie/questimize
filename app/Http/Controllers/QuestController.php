<?php

namespace App\Http\Controllers;

use App\Models\Quest;
use Illuminate\Http\Request;
use App\Models\QuestStatus;
use App\Models\QuestCategory;

class QuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Quest::with('questStatus', 'questCategory')->orderBy('quest_category_id', 'asc')->get();
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
                'title' => 'required'
            ],
            [
                'title.required' => 'Quest input field is required!'
            ]
        );

        $data = $request->all();
        $category = QuestCategory::where('name', '=', $data['category'])->first();
        $quest = Quest::create($request->all());
        $quest->questCategory()->associate($category);
        $quest->save();
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
        if (!is_null($statusName)) {
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
    public function search(Request $request)
    {
        $data = $request->all();
        $keyword = $data['keyword'];
        $category = $data['category'];
        $status = $data['status'];

        return Quest::with(['questCategory', 'questStatus'])
            ->whereHas(
                'questCategory',
                function ($query) use ($category) {
                    if ($category !== "All Categories") {
                        $query->where('name', $category);
                    }
                }
            )
            ->whereHas(
                'questStatus',
                function ($query) use ($status) {
                    if ($status !== "All Statuses") {
                        $query->where('name', $status);
                    }
                }
            )
            ->where(function ($query) use ($keyword) {
                if (!is_null($keyword)) {
                    $query->where('title', 'like', '%' . $keyword . '%');
                }
            })
            ->orderBy('quest_category_id', 'asc')->get();
    }
}

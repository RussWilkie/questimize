<?php

namespace App\Imports;

use App\Models\Quest;
use App\Models\QuestCategory;
use App\Models\QuestStatus;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $category = $row['category'];
        $status = $row['status'];

        $statusRow = QuestStatus::where('name', '=', $status)->first();
        $statusID = $statusRow->id;

        $categoryRow = QuestCategory::where('name' , '=', $category)->first();
        $categoryID = $categoryRow->id;
        
        return new Quest([
            'title' => $row['name'],
            'quest_status_id' => $statusID,
            'quest_category_id' => $categoryID,
        ]);
    }
}

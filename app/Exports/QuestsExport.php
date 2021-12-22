<?php

namespace App\Exports;

use App\Models\Quest;
use Maatwebsite\Excel\Concerns\FromCollection;

class QuestsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Quest::all();
    }
}

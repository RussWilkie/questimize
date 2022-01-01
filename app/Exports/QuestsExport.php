<?php

namespace App\Exports;

use App\Models\Quest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class QuestsExport implements FromCollection, WithHeadings, WithMapping
{
    public function headings(): array
    {
        return [
            'Name',
            'Category',
            'Status',
        ];
    }

    public function map($quest): array
    {
        // $row will be a single model instance passed in to here
        return [
            $quest->title,
            $quest->questCategory->name,
            $quest->questStatus->name,
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Quest::all();
    }
}

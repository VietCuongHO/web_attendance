<?php

namespace App\Exports;

use App\Models\TimesheetsModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class TimesheetCsv implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TimesheetsModel::all();
    }
}

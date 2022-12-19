<?php

namespace App\Exports;

use App\Models\EmployeesModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;


class StaffExportCsv implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $table = 'employees';

    public function collection()
    {
        $result = DB::table($this->table)
        ->leftJoin('accounts', 'accounts.employee_id', '=', $this->table.'.id')
        ->leftJoin('offices', 'offices.id', '=', $this->table.'.office_id')
        ->select(
            'last_name',
            'first_name',
            'email',
            'birth_day',
            DB::raw('CASE gender WHEN 0 THEN "Female" WHEN 1 THEN "Male" ELSE "Error" END AS gender'),
            $this->table.'.address',
            $this->table.'.numerphone',
            'department',
            'position',
            'start_time',
            'end_time',
            'working_day',
            'salary',
            'office_name',
            'join_day',
            'left_day',
            DB::raw('CASE status WHEN 0 THEN "Quit" WHEN 1 THEN "Active" ELSE "Pause" END AS status')
        );

        return $result->get();
    }

    public function headings(): array
    {
        return [
            'Last Name',
            'First Name',
            'Email',
            'Birth Day',
            'Gender',
            'Address',
            'Phone Number',
            'Department',
            'Position',
            'Start Time',
            'End Time',
            'Working Day',
            'Salary',
            'Office',
            'Join Day',
            'Left Day',
            'Status'
        ];
    }
}

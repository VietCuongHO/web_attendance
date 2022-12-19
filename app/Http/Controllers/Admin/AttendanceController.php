<?php

namespace App\Http\Controllers\Admin;

use App\Exports\TimesheetCsv;
use App\Http\Controllers\Controller;
use App\Models\NoticesModel;
use App\Models\TimesheetsModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class AttendanceController extends Controller
{
    public function index()
    {
        $timesheet = new TimesheetsModel();
        $notification = new NoticesModel();

        $list = $timesheet->getTimesheets([
            'status' => 1,
            'sort' => 1,
        ]);

        $notification = $notification->getNotifications([]);
        return view('admin.attendance', compact('notification', 'list'));
    }

    public function exportCsv()
    {
        return Excel::download(new TimesheetCsv, 'timesheet'.date("Ymd-His").'.csv');
    }

    public function exportPdf()
    {
        $notification = [];

        return view('admin.attendance', compact('notification'));
    }
}

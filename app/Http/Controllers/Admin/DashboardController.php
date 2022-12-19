<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmployeesModel;
use App\Models\NoticesModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $employees = new EmployeesModel();
        $notification = new NoticesModel();

        $list = $employees->getEmployees([
            'status' => 1,
            'sort' => 1,
        ]);

        $notification = $notification->getNotifications([]);

        $info = [
            'employees' => $employees->getCountEmployees([
                'status' => 1,
            ]),
            'male' => $employees->getCountEmployees([
                'gender' => 1,
                'status' => 1,
            ]),
            'female' => $employees->getCountEmployees([
                'gender' => 0,
                'status' => 1,
            ]),
            'active' => $employees->getCountEmployees(['status' => 1]),
        ];

        return view('admin.dashboard', compact('list', 'notification', 'info'));
    }
}

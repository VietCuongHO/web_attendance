<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\NoticesModel;
use Illuminate\Http\Request;
use App\Models\EmployeesModel;
use App\Exports\StaffExportCsv;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\AccountsModel;
use App\Models\FacesModel;
use Maatwebsite\Excel\Facades\Excel;

class StaffController extends Controller
{
    public function index()
    {
        $employees = new EmployeesModel();
        $notification = new NoticesModel();

        $list = $employees->getEmployees([
            'status' => 1,
            'sort' => 1,
        ]);

        $list = EmployeesModel::paginate(5);

        $notification = $notification->getNotifications([]);

        return view('admin.staff.list', compact('notification', 'list'))->with('i', (request()->input('page', 1) - 1)*5);
    }

    public function create() {
        $notification = new NoticesModel();
        $notification = $notification->getNotifications([]);

        return view('admin.staff.add', compact('notification'));
    }

    public function store(Request $request) {
        // dd($request);
        // $this->validate($request, [
        //     'name' => 'required|unique:accounts',
        //     'fl_admin' => 'required',
        //     'email' => 'required|unique:accounts|email',
        //     'password' => 'required|min:5|max:32',
        //     'confirm' => 'same:password',
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'birth_day' => 'required',
        //     'gender' => 'required',
        //     'address' => 'required',
        //     'numberphone' => 'required|unique:employees',
        //     'department' => 'required',
        //     'position' => 'required',
        //     'salary' => 'required',
        //     'office_id' => 'required',
        //     'join_day' => 'required',
        //     'left_day' => 'required',
        //     'image_url'=>'required',
        // ]);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            $name_file = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            if(strcasecmp($extension, 'png') === 0 || strcasecmp($extension, 'jpg') === 0 || strcasecmp($extension, 'jpeg') === 0) {
                $image = Str::random(length: 5)."_".$name_file;  //tránh lưu trùng tên file
                while(file_exists("assets/img/avatar/".$image)) {
                    $image = Str::random(length: 5)."_".$name_file;
                }
                $file->move('assets/img/avatar/',$image);
            }
        }

        $staff =  EmployeesModel::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birth_day' => $request->birth_day,
            'gender' => $request->gender,
            'fl_admin' => $request->fl_admin,
            'address' => $request->address,
            'numberphone' => $request->numberphone,
            'department' => $request->department,
            'position' => $request->position,
            'avatar' => $image,
            'working_day' => 1,
            'salary' => $request->salary,
            'office_id' => $request->office_id,
            'join_day' => $request->join_day,
            'left_day' => $request->left_day,
        ]);

        AccountsModel::create([
            'name' => $request->name,
            'fl_admin' => $request->fl_admin,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'employee_id' => $staff->id,
        ]);

        if($request->hasFile('image_url')) {
            $facesFile = $request->file('image_url');
            // dd($facesFile);
            foreach($facesFile as $faceFile) {
                $name_face_file = $faceFile->getClientOriginalName();
                $extension_face_file = $faceFile->getClientOriginalExtension();
                if(strcasecmp($extension_face_file, 'png') === 0 || strcasecmp($extension_face_file, 'jpg') === 0 || strcasecmp($extension_face_file, 'jpeg') === 0) {
                    $image_face = Str::random(length: 5)."_".$name_face_file;  //tránh lưu trùng tên file
                    while(file_exists("assets/img/face/".$image_face)) {
                        $image_face = Str::random(length: 5)."_".$name_face_file;
                    }
                    $faceFile->move('assets/img/face/',$image_face);
                    // dd($image_face);
                    FacesModel::create([
                        'employee_id' => $staff->id,
                        'image_url' => $image_face,
                    ]);
                }
            }
        }

        return redirect()->route('admin.staff.list')->with('success', 'Create successfully');
    }

    public function edit($id) {
        $notification = new NoticesModel();
        $notification = $notification->getNotifications([]);

        $staff = EmployeesModel::find($id);

        $employee_id = $staff->id;
        $account =  AccountsModel::where('employee_id', $employee_id)->first();

        // dd($staff,$account);

        return view('admin.staff.edit', compact('staff', 'notification', 'account'));
    }

    public function update(Request $request, $id) {
        // dd($request);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            $name_file = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            if(strcasecmp($extension, 'png') === 0 || strcasecmp($extension, 'jpg') === 0 || strcasecmp($extension, 'jpeg') === 0) {
                $image = Str::random(length: 5)."_".$name_file;  //tránh lưu trùng tên file
                while(file_exists("assets/img/avatar/".$image)) {
                    $name = Str::random(length: 5)."_".$name_file;
                }
                $file->move('assets/img/avatar/',$image);
            }
        }

        $staff = EmployeesModel::find($id);
        $employee_id = $staff->id;
        $account =  AccountsModel::where('employee_id', $employee_id);
        // dd($account);

        $staff->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birth_day' => $request->birth_day,
            'gender' => $request->gender,
            'address' => $request->address,
            'numberphone' => $request->numberphone,
            'department' => $request->department,
            'position' => $request->position,
            'avatar' => isset($image) ? $image : $staff->avatar,
            'working_day' => 1,
            'salary' => $request->salary,
            'office_id' => $request->office_id,
            'join_day' => $request->join_day,
            'left_day' => $request->left_day,
        ]);

        $data = [
            'name' => $request->name,
            'fl_admin' => $request->fl_admin,
            'email' => $request->email,
        ];

        if ($request->password) {
            $this->validate($request, [
                'password' => 'required|min:5|max:32',
                'confirm' => 'same:password'
            ]);
            $data['password'] = bcrypt($request->password);
        };
        $account->update($data);

        return redirect()->route('admin.staff.list')->with('success', 'Update successfully');
    }

    public function delete($id) {
        $notification = new NoticesModel();
        $notification = $notification->getNotifications([]);

        $staff = EmployeesModel::find($id);

        $staff->delete();

        return redirect()->route('admin.staff.list', compact('staff', 'notification',))->with('success', 'Delete sucessfully');
    }

    public function exportCsv()
    {
        return Excel::download(new StaffExportCsv, 'stafflist'.date("Ymd-His").'.csv');
    }

    public function exportPdf()
    {
        $employees = new EmployeesModel();

        $list = $employees->getEmployees([
            'status' => 1,
            'sort' => 1,
        ]);

        $pdf = PDF::loadView('admin.templates.staffpdf',  compact('list'))->setPaper('a4', 'landscape');
    	return $pdf->download('stafflist'.date("Ymd-His").'.pdf');
    }
}

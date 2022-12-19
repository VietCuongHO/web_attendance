<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function() {
    return view('admin.login.home-login');
});

// Route::group(['prefix' => 'login', 'middleware' => 'loginmiddleware', 'as'=> 'login.'], function ()
// {
//     Route::get('/', [LoginController::class, 'index'])->name('home');

//     Route::get('/user', [LoginController::class, 'user'])->name('user');
//     Route::post('/user', [LoginController::class, 'userLogin'])->name('p_user');

//     Route::get('/admin', [LoginController::class, 'admin'])->name('admin');
//     Route::post('/admin', [LoginController::class, 'adminLogin'])->name('p_admin');

//     Route::get('/attendance', [LoginController::class, 'attendance'])->name('attendance');
//     Route::post('/attendance', [LoginController::class, 'attendanceLogin'])->name('p_attendance');
// });

Route::prefix('admin')->name('admin.')->group(function ()
{
    Route::group(['as' => 'auth.'], function()
    {
        Route::get('login', [AuthController::class, 'login'])->name('login');
        Route::post('login', [AuthController::class, 'checkLogin'])->name('check-login');
    });
});

Route::prefix('admin')->name('admin.')->group(function ()
{
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::group(['prefix' => 'staff', 'as'=> 'staff.'], function ()
    {
        Route::get('/', [StaffController::class, 'index'])->name('list');

        // Route::get('/add', [StaffController::class, 'add'])->name('add');
        // Route::post('/add', [StaffController::class, 'actionAdd'])->name('p_add');

        // Route::get('/add', [StaffController::class, 'add'])->name('add');
        // Route::post('/add', [StaffController::class, 'actionAdd'])->name('p_add');

        // Route::get('/edit/{id}', [StaffController::class, 'add'])->name('edit');
        // Route::post('/edit', [StaffController::class, 'actionAdd'])->name('p_edit');

        Route::get('create', [StaffController::class, 'create'])->name('create');
        Route::post('store', [StaffController::class, 'store'])->name('store');

        Route::get('edit/{id}', [StaffController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [StaffController::class, 'update'])->name('update');

        Route::get('delete/{id}', [StaffController::class, 'delete'])->name('delete');

        Route::get('/exportcsv', [StaffController::class, 'exportCsv'])->name('exportcsv');
        Route::get('/exportpdf', [StaffController::class, 'exportPdf'])->name('exportpdf');

    });

    Route::group(['prefix' => 'attendance', 'as'=> 'attendance.'], function ()
    {
        Route::get('/', [AttendanceController::class, 'index'])->name('list');

        Route::get('/exportcsv', [AttendanceController::class, 'exportCsv'])->name('exportcsv');
        Route::get('/exportpdf', [AttendanceController::class, 'exportPdf'])->name('exportpdf');
    });

    Route::group(['prefix' => 'report', 'as'=> 'report.'], function ()
    {
        Route::get('/', [ReportController::class, 'index'])->name('list');

        Route::get('/exportcsv', [ReportController::class, 'exportCsv'])->name('exportcsv');
        Route::get('/exportpdf', [ReportController::class, 'exportPdf'])->name('exportpdf');
    });
});


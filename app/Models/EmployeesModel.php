<?php

namespace App\Models;

use App\Models\FacesModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\EmployeesFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeesModel extends Model
{
    use HasFactory;

    // public $timestamps = false;

    protected $table = 'employees';

    protected $fillable = [
        'id',
        'last_name',
        'first_name',
        'birth_day',
        'gender',
        'address',
        'numberphone',
        'department',
        'position',
        'start_time',
        'end_time',
        'working_day',
        'salary',
        'office_id',
        'note',
        'created_at',
        'created_user',
        'updated_at',
        'updated_user',
        'avatar',
        'join_day',
        'left_day',
        'status'
    ];


    public function selectEmployees($condition = null)
    {
        if ($condition == null) return;

        $employees = DB::table($this->table)->select('*');

        if (isset($condition['gender'])) {
            $employees = $employees->where('gender', $condition['gender']);
        }
        if (isset($condition['status'])) {
            $employees = $employees->where('status', $condition['status']);
        }
        $employees = $employees->orderByDesc('id');

        return $employees;
    }

    public function getEmployees($condition = null)
    {
        $result = $this->selectEmployees($condition);
        return $result == null ? [] : $result->get();
    }

    public function getCountEmployees($condition = null)
    {
        $result = $this->selectEmployees($condition);
        return $result == null ? 0 : $result->count();
    }

    public function email()
    {
        return $this->hasOne('App\Models\AccountsModel', 'employee_id', 'id');
    }

    protected static function newFactory()
    {
        return EmployeesFactory::new();
    }

    public function imageUrl() {
        return '/assets/img/avatar'.$this->avatar;
    }

    public function face_employee_images() {
        return $this->hasMany(FacesModel::class);
    }
}

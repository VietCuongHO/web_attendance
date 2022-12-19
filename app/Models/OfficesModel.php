<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OfficesModel extends Model
{
    use HasFactory;

    protected $table = 'offices';

    protected $fillable = [
        'id',
        'office_name',
        'city',
        'address',
        'numerphone',
        'note',
        'created_at',
        'created_user',
        'updated_at',
        'updated_user',
        'avatar'
    ];

    public function selectOffices($condition = null)
    {
        $employees = DB::table($this->table)->select('*');

        return $employees;
    }

    public function getOffices($condition = null)
    {
        $result = $this->selectOffices($condition);
        return $result == null ? [] : $result->get();
    }

    public function getCountOffices($condition = null)
    {
        $result = $this->selectOffices($condition);
        return $result == null ? 0 : $result->count();
    }
}

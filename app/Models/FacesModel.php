<?php

namespace App\Models;

use App\Models\EmployeesModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FacesModel extends Model
{
    use HasFactory;

    protected $table = 'face_employee_images';
    protected $fillable = [
        'employee_id',
        'image_url',
        'image_index',
        'status',
        'created_at',
        'created_user',
        'updated_at',
        'updated_user',
    ];

    // public function employees() {
    //     return $this->belongsTo(EmployeesModel::class);
    // }
}

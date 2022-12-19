<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimesheetsModel extends Model
{
    use HasFactory;

    public function getTimesheets($condition = null)
    {
        if ($condition == null) return [];

        return [];
    }
}

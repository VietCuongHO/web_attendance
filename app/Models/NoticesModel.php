<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NoticesModel extends Model
{
    use HasFactory;

    protected $table = 'notices';

    public function selectNotifications($condition = null)
    {
        if ($condition == null) return;

        $result = DB::table($this->table)->select('*');

        return $result;
    }

    public function getNotifications($condition = null)
    {
        if ($condition == null) return [];

        $result = $this->selectNotifications($condition);

        return $result == null ? [] : $result->get();
    }

    public function getCountNotifications($condition = null)
    {
        if ($condition == null) return 0;

        $result = $this->selectNotifications($condition);

        return $result == null ? 0 : $result->count();
    }
}

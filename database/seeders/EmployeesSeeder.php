<?php

namespace Database\Seeders;

use App\Models\EmployeesModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public $COUNT = 50;

    public function run()
    {
        EmployeesModel::factory()->count($this->COUNT)->create();
    }
}

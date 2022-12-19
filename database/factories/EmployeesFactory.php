<?php

namespace Database\Factories;

use App\Models\EmployeesModel;
use App\Models\OfficesModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\employees>
 */
class EmployeesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = EmployeesModel::class;


    public function definition()
    {
        $gender = rand(0, 1);
        $startTime = rand(7, 9);
        $endTime = $startTime + 9;
        $halfHour = rand(0, 1) == 1 ? 30 : 0;
        $department = $this->randomDepartment();

        $office = new OfficesModel;
        $office = $office->getOffices();
        // if ($office == null) {
        //     OfficesModel::factory()->count(1)->create();
        //     $office = new OfficesModel;
        //     $office = $office->getOffices();
        // }
        if ($office == null) $office[0]['id'] = -1;

        return [
            'last_name' => $this->faker->lastName,
            'first_name' => $gender == 1 ? $this->faker->firstNameMale : $this->faker->firstNameFemale,
            'birth_day' => $this->faker->date,
            'gender' => $gender,
            'address' => $this->faker->address,
            'numerphone' => $this->faker->phoneNumber,
            'department' => $department,
            'position' => $this->randomPosition($department),
            'start_time' => "$startTime:$halfHour:00",
            'end_time' => "$endTime:$halfHour:00",
            'working_day' => '2|3|4|5|6|7',
            'salary' => rand(5, 50) * 1000000,
            'office_id' => 0,
            'create_at' => now(7),
            'update_at' => now(7),
            'avatar' => randomAvatarUrl(rand(0, 33)),
            'join_day' => $this->faker->date,
            'status' => rand(0, $gender == 1 ? 1 : 2)
        ];
    }

    public function randomDepartment()
    {
        $arr = [
            'Research & Development',
            'Marketing',
            'Human Resources',
            'Financial',
            'Customer Service',
            'Administration',
            'Accounting',
            'Sales'
        ];
        $i = rand(0, count($arr) - 1);
        return $arr[$i];
    }

    public function randomPosition($department = null)
    {
        $arr = [
            'Research & Development' => [
                'UI/UX Desinger',
                'Web Developer/Backend',
                'Web Developer/Frontend',
                'Mobile Developer',
                'Devops',
                'Leader'
            ],
            'Marketing' => [
                'Leader',
                'Staff'
            ],
            'Human Resources' => [
                'Leader',
                'Staff'
            ],
            'Financial' => [
                'Leader',
                'Staff'
            ],
            'Customer Service' => [
                'Leader',
                'Staff'
            ],
            'Administration' => [
                'Leader',
                'Staff'
            ],
            'Accounting' => [
                'Leader',
                'Staff'
            ],
            'Sales' => [
                'Leader',
                'Staff'
            ]
        ];
        return $department != null ? $arr[$department][rand(0, count($arr[$department]) - 1)] : '';
    }
}

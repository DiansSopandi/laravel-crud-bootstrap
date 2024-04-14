<?php

namespace Database\Factories;


use App\Models\Employee;
use App\Models\Employee_detail;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as FakeDatas;

// $factory->define(Employee_detail::class, function (FakeDatas $fakeDatas) {
//     return [
//         'employee_id' => Employee::inRandomOrder()->first()->id,
//         'experience' => $fakeDatas->experience,
//         'job_title' => $fakeDatas->job_title,
//         'job_desc' => $fakeDatas->job_desc,
//         'created_at' => now(),
//         'updated_at' => now(),
//     ];
// });


class Employee_detailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Employee_detail::class;
    public function definition()
    {
        return [
            'employee_id' => Employee::inRandomOrder()->first()->id,
            'experience' => $this->faker->numberBetween(0, 20),
            'job_title' => $this->faker->jobTitle,
            'job_desc' => $this->faker->text,
            'isDelete' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
  
}
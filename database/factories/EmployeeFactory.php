<?php
namespace Database\Factories;


use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as FakeDatas;


// $factory->define(Employee::class, function (FakeDatas $fakeDatas) {
//     $statuses = ['single', 'married', 'divorced'];
//     return [
//         'name' => $fakeDatas->name,
//         'dob' => $fakeDatas->dateTimeBetween('-45 years', '-24 years')->format('Y-m-d'),
//         'status' => $fakeDatas->randomElement($statuses),
//         'join_date' => $fakeDatas->dateTimeBetween('-4 years', 'now')->format('Y-m-d'),
//         'created_at' => now(),
//         'updated_at' => now(),
//     ];
// });


class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Employee::class;

    public function definition()
    {
        $statuses = ['single', 'married', 'divorced'];
        return [
            'name' => $this->faker->name(),
            'dob' => $this->faker->dateTimeBetween('-45 years', '-24 years')->format('Y-m-d'),
            'status' => $this->faker->randomElement($statuses),
            'join_date' => $this->faker->dateTimeBetween('-4 years', 'now')->format('Y-m-d'),
            'isDelete' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
  
}


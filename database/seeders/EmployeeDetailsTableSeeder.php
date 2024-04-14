<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as FakeDataMaker;

class EmployeeDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fakeDatas = FakeDataMaker::create();
        $statuses = ['single', 'married', 'divorced'];

        foreach (range(1, 25) as $index) {
            DB::table('employees')->insert([
                'name' => $fakeDatas->name,
                'dob' => $fakeDatas->dateTimeBetween('-45 years', '-24 years')->format('Y-m-d'),
                'status' => $fakeDatas->randomElement($statuses),
                'join_date' => $fakeDatas->dateTimeBetween('-4 years', 'now')->format('Y-m-d'),
                'isDelete' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

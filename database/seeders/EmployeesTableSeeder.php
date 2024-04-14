<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as FakeDataMaker;

class EmployeesTableSeeder extends Seeder
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
                'experience' => $fakeDatas->experience,
                'job_title' => $fakeDatas->job_title,
                'job_desc' => $fakeDatas->job_desc,
                'isDelete' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

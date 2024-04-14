<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Employee_detail;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Employee::factory(25)->create();
        // \App\Models\Employee_detail::factory(100)->create();
        Employee::factory(25)->create();
        Employee_detail::factory(100)->create();
        // factory(App\Models\Role::class, 5)->create(); // Create 5 roles
        // factory(App\Models\User::class, 10)->create(); // Create 10 users with random role_id
    }
}

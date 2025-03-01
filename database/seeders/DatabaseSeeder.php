<?php

namespace Database\Seeders;
use Database\Seeders\UserSeeder;
use Database\Seeders\CourseSeeder;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(CourseSeeder::class);
    }
}

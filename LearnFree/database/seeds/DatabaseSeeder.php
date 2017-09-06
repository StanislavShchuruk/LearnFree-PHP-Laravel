<?php

use Illuminate\Database\Seeder;
use database\seeds;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->command->info('Table users successfully refilled');
        
        $this->call(CoursesTableSeeder::class);
        $this->command->info('Table courses successfully refilled');
        
        $this->call(LessonsTableSeeder::class);
        $this->command->info('Table lessons successfully refilled');
    }
}

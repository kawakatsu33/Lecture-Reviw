<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // SubjectsTableSeeder::class,
            WeeksTableSeeder::class,
            // SubjectWeekTableSeeder::class,
            //LecturesTableSeeder::class,
            //LectureWeekTableSeeder::class
            ]);
    }
}

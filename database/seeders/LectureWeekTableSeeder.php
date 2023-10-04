<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LectureWeekTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('lecture_week')->insert([
            ['lecture_id' => 1, 'week_id' => 1],
            ['lecture_id' => 2, 'week_id' => 1],
            ['lecture_id' => 3, 'week_id' => 2],
            ['lecture_id' => 4, 'week_id' => 1],
            ['lecture_id' => 5, 'week_id' => 5],
            //['lecture_id' => , 'week_id' => ],
        ]);
            
            
        
    }
}

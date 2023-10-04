<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectWeekTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('subject_week')->insert([
            //月曜日
            ['subject_id' => 1, 'week_id' => 1], // コンピュータシステムの基礎は月曜に教える
            ['subject_id' => 2, 'week_id' => 1],
            ['subject_id' => 3, 'week_id' => 1],
            
            //火曜日
            ['subject_id' => 4, 'week_id' => 2], 
            ['subject_id' => 5, 'week_id' => 2],
            
            //水曜日
            ['subject_id' => 6, 'week_id' => 3], 
            ['subject_id' => 7, 'week_id' => 3],
            ['subject_id' => 8, 'week_id' => 3],
            
            //木曜日
            ['subject_id' => 9, 'week_id' => 4], 
            ['subject_id' => 10, 'week_id' => 4],
            
            //金曜日
            ['subject_id' => 11, 'week_id' => 5], 
            ['subject_id' => 12, 'week_id' => 5],
            ['subject_id' => 13, 'week_id' => 5],
            
        ]);
    }
}

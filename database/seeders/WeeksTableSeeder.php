<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeeksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('weeks')->insert([
            ['name' => '月曜'],
            ['name' => '火曜'],
            ['name' => '水曜'],
            ['name' => '木曜'],
            ['name' => '金曜'],
        ]);
    }
}

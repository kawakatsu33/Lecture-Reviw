<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects')->insert([
            //月曜日
            ['name' => "コンピュータシステムの基礎",'period' => 1],
            ['name' => '英語４b（Reading系)','period' => 2],
            ['name' => 'プログラミング方法論','period' => 3],
            //火曜日
            ['name' => "マーケティング・リサーチ",'period' => 2],
            ['name' => 'スペイン語2b','period' => 3],
            //水曜日
            ['name' => "ベンチャービジネス論",'period' =>2],
            ['name' => 'データベース','period' =>3],
            ['name' => '高槻市と関西大学','period' =>4],
            //木曜日
            ['name' => "数理意思決定論",'period' =>2],
            ['name' => 'アルゴリズム解析・設計','period' => 4],
            //金曜日
            ['name' => "オブジェクト指向プログラミング（Java）",'period' => 1],
            ['name' => '英語3b(L＆S）','period' => 3],
            ['name' => 'モバイル・コンピューティング','period' => 5],
       ]);
    }
}

 
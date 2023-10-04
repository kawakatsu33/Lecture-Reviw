<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LecturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lectures')->insert([
            ['name'=>"第一回コンシス","body"=>"心肺停止の話がほとんど。
            定期試験７割、確認テスト・レポ3割。
            この授業ではハードウェア中心に扱う
            ",'times'=>'1','subject_id'=>'1'],
            
            ['name'=>'プログラミング方法論','body'=>'成績は課題60%,平常40%。
            土曜日12時までの掲示板忘れずに','times'=>'1','subject_id'=>'3'],
            
            ['name'=>'1.マーケティング','body'=>'定期50%,平常50%,授業前日or当日の事前アンケートでポイント稼げる。
            授業後に確認テストがある','times'=>'1','subject_id'=>'4'],
            
            ['name'=>'2.プログラミング方法論','body'=>'いろんな言語について。プログラミングの記述方法を黒板消しのやり方をとをして考えた',
            'times'=>'2','subject_id'=>'3'],
            
            ['name'=>'3.java','body'=>'if文の書き方','times'=>'3','subject_id'=>'11'],
            
            //['name'=>'','body'=>'','times'=>'','subject_id'=>''],
            
            
            
            
            
            ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Week;
use App\Models\Subject; 
use App\Models\Lecture;
use app\Models\Understanding;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function index()
    {
        $user = Auth::user();
            if (!$user) {
                // ユーザーが認証されていない場合の処理
                return redirect()->route('login');
            }
        
        $low_level = Auth::user()->lectures()->whereHas('understanding', function ($query) {
            $query->whereIn('level', [1, 2]);
        })->orderBy('created_at', 'desc')->get();
        $weeks = Week::with('subjects')->get();
        $dayNames = ["Monday" => "月曜", "Tuesday" => "火曜", "Wednesday" => "水曜", "Thursday" => "木曜", "Friday" => "金曜"];
        $todayEnglish = date('l'); 
        $todayJapanese = $dayNames[$todayEnglish]?? null;
        $new_lectures = Auth::user()->lectures()->latest()->take(20)->get();
        $excludedSubjects = Subject::where('timetable_excluded',1)->get();
        return view('lectures.index', [
            'weeks' => $weeks,
            'today' => $todayJapanese,
            'low_level'=> $low_level,
            'new_lectures' => $new_lectures,
            'excludedSubjects' => $excludedSubjects

        ]);
        
        
    }
    
    public function subject_detail($subject_id)
    {   
        $subject = Auth::user()->subjects()->with('lectures', 'lectures.understanding')->findOrFail($subject_id);
        return view('lectures.subject_detail',compact('subject'));
    }
    
    public function subject_register(){
        $weeks = Week::all();
        return view('lectures.subject_register',compact('weeks'));
    }
    
    public function subject_store(Request $request){
        $user_id = Auth::id();
        $name = $request->input('subject.name');
        $period = $request->input('subject.period');
        $week_id = $request->input('week_id');
        $timetable_excluded = $request->input('subject.timetable_excluded', 0);//チェックされていないデフォルトでは0
        
        $subject = Subject::create([
            'user_id' => $user_id,
            'name' => $name,
            'period' => $period,
            'timetable_excluded' => $timetable_excluded
        ]);
        
        if($week_id){
            $week = Week::find($week_id);
            if($week){
                $week->subjects()->attach($subject->id);
            }
        }
        
        return redirect()->route('index');
    }
    
    public function subject_delete($subject_id){
            // 現在のユーザーの科目の中から指定されたIDの科目を取得
        $subject = Auth::user()->subjects()->find($subject_id);
    
        // 科目が見つかった場合のみ削除
        if ($subject) {
            $subject->delete();
            return redirect()->route('index')->with('success', '科目が正常に削除されました。');
        } else {
            // 科目が見つからない場合、エラーメッセージを表示
            return redirect()->route('index')->with('error', '指定された科目は存在しないか、削除する権限がありません。');
        }
    }
    

}
    
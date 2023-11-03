<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Week;
use App\Models\Subject; 
use App\Models\Lecture;
use app\Models\Understanding;

class SubjectController extends Controller
{
    public function index()
    {
        $low_level = Lecture::whereHas('understanding', function ($query) {
            $query->whereIn('level', [1, 2]);
        })->get();
        $weeks = Week::with('subjects')->get();
        $dayNames = ["Monday" => "月曜", "Tuesday" => "火曜", "Wednesday" => "水曜", "Thursday" => "木曜", "Friday" => "金曜"];
        $todayEnglish = date('l'); 
        $todayJapanese = $dayNames[$todayEnglish]?? null;
        return view('lectures.index', ['weeks' => $weeks, 'today' => $todayJapanese, 'low_level'=> $low_level]);
    }
    
    public function subject_detail($subject_id)
    {   
        $subject = Subject::with('lectures', 'lectures.understanding')->findOrFail($subject_id);
        return view('lectures.subject_detail',compact('subject'));
    }
    
    public function subject_register(){
        $weeks = Week::all();
        return view('lectures.subject_register',compact('weeks'));
    }
    
    public function subject_store(Request $request){
        $input = $request['subject'];
        $week_id = $request['week_id'];
    
        $subject = Subject::create($input);
    
        $week = Week::find($week_id);
        $week->subjects()->attach($subject->id);
        
        return redirect()->route('index');
    }
    
    public function subject_delete(Subject $subject){
            $subject->delete();
            return redirect()->route('index');
    }
    

}
    
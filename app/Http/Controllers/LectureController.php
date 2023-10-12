<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject; 
use App\Models\Lecture;

class LectureController extends Controller
{
    public function lecture_store(Request $request, Lecture $lecture)
    {
        $input = $request['lecture'];
        
  
        
        $subjectId = $request->input('subject_id');
        
        $input['subject_id'] = $subjectId;

        $lecture->fill($input)->save();

       
        return redirect()->route('subject_detail',['subject'=>$subjectId]);
    }
    
    public function lecture_register($subject_id)
    {
        return view('lectures.lecture_register',['subject'=>$subject_id]);
    }
}

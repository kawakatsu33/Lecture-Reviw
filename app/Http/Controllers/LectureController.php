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
        
        
        if ($request->hasFile('pdf')){
            $path = $request->file('pdf')->store('pdfs', 'public');
            $input['pdf_path'] = $path;

        }
        
        $subjectId = $request->input('subject_id');
        
        $input['subject_id'] = $subjectId;

        $lecture->fill($input)->save();

       
        return redirect()->route('subject_detail',['subject'=>$subjectId]);
    }
    
    public function lecture_register($subject_id)
    {
        return view('lectures.lecture_register',['subject'=>$subject_id]);
    }
    
    public function edit(Lecture $lecture)
    {
        return view('lectures.lecture_edit')->with(['lecture' => $lecture]);
    }
    
    public function update(Request $request, Lecture $lecture)
    {
        $input_lecture = $request['lecture'];
        $lecture->fill($input_lecture)->save();
        
        $subjectId = $lecture->subject_id;
    
       return redirect()->route('subject_detail',['subject'=>$subjectId]);
    }
    
    public function delete(Lecture $lecture)
    {
        $lecture->delete();
        $subjectId = $lecture->subject_id;
        return redirect()->route('subject_detail',['subject'=>$subjectId]);
    }
}

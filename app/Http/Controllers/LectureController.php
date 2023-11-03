<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject; 
use App\Models\Lecture;
use App\Models\Understanding;

class LectureController extends Controller
{
    public function lecture_store(Request $request, Lecture $lecture)
    {
        $request->validate([
            'level' => 'required|integer|min:1|max:5',
        ]);

        $input = $request['lecture'];
        
        
        if ($request->hasFile('pdf')){
            $path = $request->file('pdf')->store('pdfs', 'public');
            $input['pdf_path'] = $path;

        }
        
        $subjectId = $request->input('subject_id');
        
        $input['subject_id'] = $subjectId;

        $lecture->fill($input)->save();
        
        $understanding = new Understanding;
        $understanding->lecture_id = $lecture->id;
        $understanding->user_id = auth()->id(); // 認証済みユーザーのIDを設定
        $understanding->level = $request->input('level'); // フロントエンドから送信された理解度を受け取る
            

        $understanding->save();

       
        return redirect()->route('subject_detail',['subject'=>$subjectId]);
    }
    
    public function show($lectureId)
    {
        $lecture = Lecture::with('subject')->findOrFail($lectureId);
        
        $subject = $lecture->subject;
        return view('lectures.show',compact('lecture','subject'));
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
    
    public function Lv_update(Request $request, Lecture $lecture)
    {
        $data = $request->validate([
            'level' => 'required|integer|min:1|max:5',]);
        $understanding = $lecture->understanding;
        if($understanding){
            $understanding->update($data);
        } else{
            $lecture->understanding()->create($data);
            
        }
        return back()->with('success','理解度が更新されました');
    }
}

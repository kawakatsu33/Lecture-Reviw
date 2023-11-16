<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject; 
use App\Models\Lecture;
use App\Models\Understanding;
use Illuminate\Support\Facades\Auth;

class LectureController extends Controller
{
    public function lecture_store(Request $request, Lecture $lecture)
    {
        // dd($request->all());
        $request->validate([
            'level' => 'required|integer|min:1|max:5',
        ]);

        $input = $request->input('lecture');
        
        // 認証済みユーザーのIDを取得して設定
        $input['user_id'] = Auth::id();
        
        if ($request->hasFile('pdf')) {
            $paths = [];
            foreach ($request->file('pdf') as $file) {
                $path = $file->store('pdfs', 'public');
                $paths[] = $path; // 各ファイルのパスを配列に追加します
            }
            $input['pdf_paths'] = json_encode($paths);
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
        
        
        if ($request->has('level')) {
            $understanding = $lecture->understanding ?? new Understanding();
            $understanding->level = $request['level'];
            $understanding->lecture_id = $lecture->id;
            $understanding->user_id = auth()->id(); // ユーザーIDの設定（必要に応じて）
            $understanding->save();
        }
        // PDFの処理
        if ($request->hasFile('pdf')) {
        // 既存のPDFファイルを削除
        if ($lecture->pdf_path && Storage::disk('public')->exists($lecture->pdf_path)) {
            Storage::disk('public')->delete($lecture->pdf_path);
        }

        // 新しいPDFファイルを保存
        $path = $request->file('pdf')->store('pdfs', 'public');
        $lecture->pdf_path = $path;
        $lecture->save();
    }

        
        $subjectId = $lecture->subject_id;
    
       return redirect()->route('subject_detail',['subject'=>$subjectId]);
    }
    
    public function delete(Lecture $lecture)
    {
        if ($lecture->user_id != Auth::id()) {
            // ユーザーが講義の所有者でない場合、エラーを返す
            return redirect()->back()->with('error', '削除する権限がありません。');
        }
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
    
    public function alert_lectures()
        {
            $alertLectures = Lecture::where('user_id', Auth::id())
                            ->whereHas('understanding', function ($query) {
                                $query->whereIn('level', [1, 2]);
                            })
                            ->orderBy('created_at', 'desc')
                            ->get();
            return view('lectures.alert_lectures', ['alertLectures' => $alertLectures]);
        }


    public function showMyPage()
    {
        $userId = Auth::id();
        
        $lecturesCount = Lecture::where('user_id', $userId)->count();
        
        $lecturesCountByLevel = [];
    
        for ($level = 1; $level <= 5; $level++) {
            $lecturesCountByLevel[$level] = Understanding::where('user_id', $userId)
                                                    ->where('level', $level)
                                                    ->with('lecture')
                                                    ->get()
                                                    ->count();
        }                                           
        return view('dashboard', compact('lecturesCountByLevel','lecturesCount'));
        
    
        
        
    }

}

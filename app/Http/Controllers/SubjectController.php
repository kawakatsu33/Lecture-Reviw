<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\
use App\Models\Week;
use App\Models\Subject; 

class SubjectController extends Controller
{
    public function index()
    {
        $weeks = Week::with('subjects')->get();
        return view('lectures.index', ['weeks' => $weeks]);
    }
    
    public function subject_detail($subject_id)
    {   
        $subject = Subject::with('lectures')->findOrFail($subject_id);
        return view('lectures.subject_detail',compact('subject'));
    }
    
    public function lecture_register()
    {
        return view('lectures.lecture_register');
    }
}

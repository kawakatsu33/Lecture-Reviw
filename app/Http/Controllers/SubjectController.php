<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Week;

class SubjectController extends Controller
{
    public function index()
    {
        $weeks = Week::with('subjects')->get();
        return view('lectures.index', ['weeks' => $weeks]);
    }
}

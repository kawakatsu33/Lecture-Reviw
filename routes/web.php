<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;



Route::get('/', [SubjectController::class,'index'])->name('lectures.index');
Route::get('/lectures/lecture_register', [SubjectController::class, 'lecture_register'])->name('lecture_register');
Route::get('/lectures/{subject}', [SubjectController::class, 'subject_detail']);

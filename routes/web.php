<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\LectureController;

//講義関連
Route::get('/lectures/lecture_register/{subject_id}', [LectureController::class, 'lecture_register'])->name('lecture_register');
Route::post('/lectures/store', [LectureController::class, 'lecture_store'])->name('lecture_store');
Route::get('/lectures/{lecture}/lecture_edit', [LectureController::class,'edit'])->name('lecture_edit');
Route::put('/lectures/{lecture}', [LectureController::class, 'update'])->name('update');
Route::delete('/lectures/{lecture}', [LectureController::class,'delete']);

// 科目関連
Route::get('/', [SubjectController::class,'index'])->name('lectures.index');
Route::get('/subject_register', [SubjectController::class, 'subject_register'])->name('subject_register');
Route::post('/subject_store', [SubjectController::class, 'subject_store'])->name('subject_store');
Route::get('/lectures/{subject}', [SubjectController::class, 'subject_detail'])->name('subject_detail');
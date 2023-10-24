<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\LectureController;


Route::get('/', [SubjectController::class,'index'])->name('lectures.index');

Route::get('/lectures/lecture_register/{subject_id}', [LectureController::class, 'lecture_register'])->name('lecture_register');
Route::post('/lectures/store', [LectureController::class, 'lecture_store'])->name('lecture_store');
Route::get('/lectures/{lecture}/lecture_edit', [LectureController::class,'edit'])->name('lecture_edit');
Route::get('/lectures/{subject}', [SubjectController::class, 'subject_detail'])->name('subject_detail');
Route::delete('/lectures/{lecture}', [LectureController::class,'delete']);
Route::put('/lectures/{lecture}', [LectureController::class, 'update'])->name('update');
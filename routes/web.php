<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\LectureController;
use Illuminate\Support\Facades\Route;



// Breezeによって追加されたルート

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// もともとのルート
//講義関連
Route::get('/lectures/lecture_register/{subject_id}', [LectureController::class, 'lecture_register'])->name('lecture_register');
Route::post('/lectures/store', [LectureController::class, 'lecture_store'])->name('lecture_store');
Route::get('/lectures/{lecture}/lecture_edit', [LectureController::class,'edit'])->name('lecture_edit');
Route::put('/lectures/{lecture}', [LectureController::class, 'update'])->name('update');
Route::delete('/lecture_delete/{lecture}', [LectureController::class,'delete']);



// 科目関連
Route::get('/', [SubjectController::class,'index'])->name('index');
Route::get('/subject_register', [SubjectController::class, 'subject_register'])->name('subject_register');
Route::post('/subject_store', [SubjectController::class, 'subject_store'])->name('subject_store');
Route::get('/subjects/{subject}', [SubjectController::class, 'subject_detail'])->name('subject_detail');
Route::delete('/subject_delete/{subject}', [SubjectController::class,'subject_delete']);

Route::get('/lectures/{lecture}',[LectureController::class,'show'])->name('lecture_show');
Route::post('/lectures/{lecture}/understanding', [LectureController::class,'Lv_update'])->name('Lv_update');
// Breezeの認証ルート
require __DIR__.'/auth.php';

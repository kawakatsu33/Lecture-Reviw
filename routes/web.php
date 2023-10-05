<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;



Route::get('/', [SubjectController::class,'index'])->name('lectures.index');

Route::get('/lectures/{subject}', [SubjectController::class, 'subject_detail']);

//Route::get('/subject',[SubjectController::class, 'index']);
<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [StudentController::class, 'showStudents']);
// Route::view('/', 'addUser');
// Route::post('/adduser', [UserController::class, 'addUser'])->name('addUser');
Route::get('/union', [StudentController::class, 'unionData']);
Route::get('/when', [StudentController::class, 'whenData']);
Route::get('/chunk', [StudentController::class, 'chunkData']);

<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('questions', QuestionController::class);
Route::resource('users', UserController::class);
Route::get('grade/{question}', [UserController::class, 'grade'])->name('user.grade');
Route::post('grade/{question}', [UserController::class, 'reject'])->name('user.reject');
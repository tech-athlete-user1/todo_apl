<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TaskRegisterController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// タスク登録画面  表示処理
Route::get('/task/register', [TaskRegisterController::class, 'index'])->name('show_task_register');

// タスク登録画面  登録処理
Route::post('/task/register', [TaskRegisterController::class, 'register'])->name('task_register');
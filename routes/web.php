<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TaskRegisterController;
use App\Http\Controllers\TaskListController;
use App\Http\Controllers\TaskEditController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // タスク登録画面  表示処理
    Route::get('/task/register', [TaskRegisterController::class, 'index'])->name('show_task_register');

    // タスク登録画面  登録処理
    Route::post('/task/register', [TaskRegisterController::class, 'register'])->name('task_register');

    // タスク一覧画面  表示処理
    Route::get('/task/list', [TaskListController::class, 'index'])->name('show_task_list');

    // タスク一覧画面  タスク完了処理
    Route::post('/task/finish/{task_id}', [TaskListController::class, 'finish'])->name('task_finish');

    // タスク一覧画面  タスク削除処理
    Route::post('/task/delete/{task_id}', [TaskListController::class, 'delete'])->name('task_delete');

    // タスク編集画面  表示処理
    Route::get('/task/edit/{task_id}', [TaskEditController::class, 'index'])->name('show_task_edit');

    // タスク編集画面  更新処理
    Route::post('/task/edit/{task_id}', [TaskEditController::class, 'edit'])->name('task_edit');
});
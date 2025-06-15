<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskRegisterController extends Controller
{
    //タスク登録画面 表示処理
    public function index(Request $request){
        return view('task.register');
    }

    //タスク登録画面 登録処理
    public function register(Request $request){
        // バリデーション
        $request->validate([
            'title'     => 'required|max:100',
            'detail'    => 'nullable|max:250',
            'deadline'  => 'required|date|after_or_equal:today',
        ]);
        

        // 登録処理
        Task::create([
            'user_id'   => Auth::id(),
            'title'     => $request->title,
            'detail'    => $request->detail,
            'deadline'  => $request->deadline,
        ]);

        return redirect()->route('show_task_list');
    }
}

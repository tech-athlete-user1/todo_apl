<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskListController extends Controller
{
    //タスク一覧画面 表示処理
    public function index(Request $request){
        $tasks = Task::where("user_id","=",Auth::id())
                    ->orderBy('deadline','asc')
                    ->get();
        return view('task.list',compact('tasks'));
    }
}

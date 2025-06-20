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

    //タスク一覧画面 完了処理
    public function finish(Request $request, $task_id){
        // 対象データの検索
        $task = Task::findOrFail($task_id);

        // データの更新
        $task->update([
            'finish_flg'   => 1,
            'finish_date'  => now(),
        ]);

        return redirect()->route('show_task_list');
    }

    //タスク一覧画面 削除処理
    public function delete(Request $request, $task_id){
        // 対象データの検索
        $task = Task::findOrFail($task_id);

        // データの更新
        $task->delete();

        return redirect()->route('show_task_list');
    }
}

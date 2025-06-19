<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskEditController extends Controller
{
    //タスク編集画面 表示処理
    public function index(Request $request, $task_id){
        $task = Task::findOrFail($task_id);
        return view('task.edit', compact('task'));
    }

    //タスク編集画面 更新処理
    public function edit(Request $request, $task_id){
        // バリデーション
        $request->validate([
            'title'     => 'required|max:100',
            'detail'    => 'nullable|max:250',
            'deadline'  => 'required|date|after_or_equal:today',
            'finish_flg'   => 'required|in:0,1',
            'finish_date'  => 'nullable|date|required_if:finish_flg,1',
        ]);
        
        // 対象データの抽出
        $task = Task::findOrFail($task_id);

        // 更新処理
        $task->update([
            'title'        => $request->title,
            'detail'       => $request->detail,
            'deadline'     => $request->deadline,
            'finish_flg'   => $request->finish_flg,
            'finish_date'  => $request->finish_date,
        ]);

        return redirect()->route('show_task_list');
    }
}

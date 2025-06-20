@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="text-center fw-bold mb-4">タスク一覧画面</h1>
        <div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>タスク名</th>
                        <th>詳細</th>
                        <th>締切日</th>
                        <th>状態</th>
                        <th>完了日</th>
                        <th>完了処理</th>
                        <th>編集処理</th>
                        <th>削除処理</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($tasks) === 0)
                        <tr>
                            <td colspan="9"><span>登録されているタスクがありません。</span></td>
                        </tr>
                    @else
                        @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->detail }}</td>
                            <td>{{ optional($task->deadline)->format('Y-m-d') }}</td>
                            <td>@if($task->finish_flg == 1 )  完了  @else 未完了 @endif</td>
                            <td>{{ optional($task->finish_date)->format('Y-m-d') }}</td>
                            <td>
                                <form action="{{ route('task_finish' , ['task_id' => $task->id]) }}" method="post" >
                                    @csrf
                                    <button class="btn btn-success">完了</button>
                                </form>
                            </td>
                            <td><a href="{{ route('show_task_edit' , ['task_id' => $task->id]) }}" class="btn btn-primary">編集</a></td>
                            <td>
                                <form action="{{ route('task_delete' , ['task_id' => $task->id]) }}" method="post" >
                                    @csrf
                                    <button class="btn btn-danger">削除</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
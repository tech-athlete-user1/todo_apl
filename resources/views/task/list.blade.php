@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="text-center fw-bold mb-4">タスク一覧画面</h1>
        <div class="d-flex justify-content-end mb-3">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="hide_finished">
                <label class="form-check-label" for="hide_finished">完了タスクの非表示</label>
            </div>
        </div>
        <div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ config('const.label.task_name') }}</th>
                        <th>{{ config('const.label.detail') }}</th>
                        <th>{{ config('const.label.deadline') }}</th>
                        <th>状態</th>
                        <th>{{ config('const.label.finish_date') }}</th>
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
                            <td class="cell-display">{{ $task->title }}</td>
                            <td class="cell-display">{{ $task->detail }}</td>
                            <td>{{ optional($task->deadline)->format('Y-m-d') }}</td>
                            <td>{{ config('const.finish_status.' . $task->finish_flg ) }}</td>
                            <td>{{ optional($task->finish_date)->format('Y-m-d') }}</td>
                            <td>
                                <form action="{{ route('task_finish' , ['task_id' => $task->id]) }}" method="post" >
                                    @csrf
                                    <button class="btn btn-success custom-btn">完了</button>
                                </form>
                            </td>
                            <td><a href="{{ route('show_task_edit' , ['task_id' => $task->id]) }}" class="btn btn-primary custom-btn">編集</a></td>
                            <td>
                                <form action="{{ route('task_delete' , ['task_id' => $task->id]) }}" method="post" >
                                    @csrf
                                    <button class="btn btn-danger custom-btn">削除</button>
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

@section('scripts')
    <script src="{{ asset('js/task_list.js') }}"></script>
@endsection
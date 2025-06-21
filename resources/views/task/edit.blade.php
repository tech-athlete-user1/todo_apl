@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 text-center fw-bold">タスク編集画面</h1>

            <div class="card shadow-sm bg-white">
                <!-- エラーメッセージの表示領域 -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- 入力フォーム -->
                <div class="card-body">
                    <form action="{{ route('task_edit', ['task_id' => $task->id ]) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">タスク名</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ $task->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="detail" class="form-label">詳細</label>
                            <input type="text" id="detail" name="detail" class="form-control" value="{{ $task->detail }}">
                        </div>
                        <div class="mb-3">
                            <label for="deadline" class="form-label">締切日</label>
                            <input type="date" id="deadline" name="deadline" class="form-control" value="{{ optional($task->deadline)->format('Y-m-d') }}">
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-check-inline">
                                <input type="radio" id="finish_flg1" name="finish_flg" class="form-check-input"
                                value="0" {{ $task->finish_flg == 0 ? 'checked' : '' }}>
                                <label for="finish_flg1" class="form-check-label">未完了</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="finish_flg2" name="finish_flg" class="form-check-input"
                                value="1" {{ $task->finish_flg == 1 ? 'checked' : '' }}>
                                <label for="finish_flg2" class="form-check-label">完了</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="finish_date" class="form-label">完了日</label>
                            <input type="date" id="finish_date" name="finish_date" class="form-control"
                            value="{{ optional($task->finish_date)->format('Y-m-d') }}">
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary px-4 custom-btn">編集する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

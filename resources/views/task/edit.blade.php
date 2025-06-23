@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 text-center fw-bold">タスク編集画面</h1>

            <div class="card shadow-sm bg-white">
                <!-- エラーメッセージの表示領域 -->
                @include('common.errors')

                <!-- 入力フォーム -->
                <div class="card-body">
                    <form action="{{ route('task_edit', ['task_id' => $task->id ]) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">{{ config('const.label.task_name') }}</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $task->title) }}">
                        </div>
                        <div class="mb-3">
                            <label for="detail" class="form-label">{{ config('const.label.detail') }}</label>
                            <input type="text" id="detail" name="detail" class="form-control" value="{{ old('detail', $task->detail) }}">
                        </div>
                        <div class="mb-3">
                            <label for="deadline" class="form-label">{{ config('const.label.deadline') }}</label>
                            <input type="date" id="deadline" name="deadline" class="form-control" value="{{ old('deadline', optional($task->deadline)->format('Y-m-d')) }}">
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-check-inline">
                                <input type="radio" id="finish_flg1" name="finish_flg" class="form-check-input"
                                value="0" {{ old ('finish_flg', $task->finish_flg) == 0 ? 'checked' : '' }}>
                                <label for="finish_flg1" class="form-check-label">未完了</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="finish_flg2" name="finish_flg" class="form-check-input"
                                value="1" {{ old ('finish_flg', $task->finish_flg) == 1 ? 'checked' : '' }}>
                                <label for="finish_flg2" class="form-check-label">完了</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="finish_date" class="form-label">{{ config('const.label.finish_date') }}</label>
                            <input type="date" id="finish_date" name="finish_date" class="form-control"
                            value="{{ old('finish_date', optional($task->finish_date)->format('Y-m-d')) }}">
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

@section('scripts')
    <script src="{{ asset('js/task_edit.js') }}"></script>
@endsection
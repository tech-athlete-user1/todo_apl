@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 text-center fw-bold">タスク登録画面</h1>

            <div class="card shadow-sm bg-white">
                <!-- エラーメッセージの表示領域 -->
                @include('common.errors')

                <!-- 入力フォーム -->
                <div class="card-body">
                    <form action="{{ route('task_register') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">{{ config('const.label.task_name') }}</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
                        </div>
                        <div class="mb-3">
                            <label for="detail" class="form-label">{{ config('const.label.detail') }}</label>
                            <input type="text" id="detail" name="detail" class="form-control" value="{{ old('detail') }}">
                        </div>
                        <div class="mb-3">
                            <label for="deadline" class="form-label">{{ config('const.label.deadline') }}</label>
                            <input type="date" id="deadline" name="deadline" class="form-control" value="{{ old('deadline') }}">
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary px-4 custom-btn">登録する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

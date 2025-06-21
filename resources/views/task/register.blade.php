@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 text-center fw-bold">タスク登録画面</h1>

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
                    <form action="{{ route('task_register') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">タスク名</label>
                            <input type="text" id="title" name="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="detail" class="form-label">詳細</label>
                            <input type="text" id="detail" name="detail" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="deadline" class="form-label">締切日</label>
                            <input type="date" id="deadline" name="deadline" class="form-control">
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

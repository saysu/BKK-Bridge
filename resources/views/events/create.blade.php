@extends('layouts.app')

@section('content')

{{-- Calendar --}}
<div class="container">



<div class="row">

 @include('layouts.sidebar')
 
{{-- nav --}}
<div class="col-md-9">
<ul class="nav nav-tabs">
    <li class="nav-item">
    <a class="nav-link" href="{{ route('events.index') }}">イベントに参加する</a>
    </li>
    <li class="nav-item">
    <a class="nav-link active" href="{{ route('events.create') }}">イベントを作る</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index', Auth::id()) }}">マイページ</a>
    </li>
  </ul>


{{-- 各イベント投稿記事 --}}


<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="card">
        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">イベントタイトル</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ここにイベント名を入力してください。"
                        name="title">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">イベント画像</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                </div>


                <div class="form-group">
                    <label for="exampleFormControlSelect1">カテゴリー</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                        <option selected="">選択する</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="comment">イベント詳細内容:</label>
                    <textarea class="form-control" rows="5" id="comment" name="content"></textarea>
                </div>
                {{-- 場所 --}}
                <div class="form-group">
                    <label for="comment">開催場所:</label>
                    <input class="form-control" id="place" name="place">
                </div>
                {{-- 開催日 --}}
                <div class="form-group">
                    <label for="due_date-field">日付:</label>
                    <div style="overflow:hidden;">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <input name="date" type="date" id="input-date">
                                </div>
                                <div class="col-12">
                                    <div id="datetimepicker12"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <input type="submit" class="btn btn-primary" value="イベントを作成する">
                            {{-- <button type="submit" class="btn btn-primary">イベントを作成する</button> --}}
                        </div>
                    </div>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection

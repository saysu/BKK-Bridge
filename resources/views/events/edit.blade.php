@extends('layouts.app')

@section('content')
<p class="editinput text-center font-weight-bold">投稿編集</p>

<form action="{{ route('event_update') }}" method='post' enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type='hidden' name='id' value='{{ $event->id }}'>
    {{-- ユーザーID：{{ $event->user_id }}<br> --}}
    イベント名：<input t ype='text' name='title' value='{{ $event->title }}'><br>

    カテゴリー：
        {{-- <select class="form-control" id="exampleFormControlSelect1" name="category_id">
            <option selected="">選択する</option>
            @foreach($categories as $category)
            <option value="{{ $event->category_id }}">{{ $event->category_id }}</option>
            @endforeach
        </select>
    <br> --}}
    <br>
    内容：<input type='text' name='name' value='{{ $event->content }}'><br>
    開催日：<input type='date' name='date' value='{{ $event->date }}'><br>
    開催場所：<input type='text' name='place' value='{{ $event->place }}'><br>

    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">

    投稿されている画像 ： <img src="{{ $event->image }}" class="img-thumbnail" alt=""><br>


    {{-- <input type='submit' value='編集する'> --}}

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <input type='submit' value='編集する' class="btn btn-primary mt-3">
            </div>
        </div>
    </div>
</form>
@endsection

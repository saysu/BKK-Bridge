@extends('layouts.app')

@section('content')
<p class="editinput text-center font-weight-bold">投稿編集</p>

<form action="{{ route('event_update') }}" method='post' enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type='hidden' name='id' value='{{ $event->id }}'>
    {{-- ユーザーID：{{ $event->user_id }}<br> --}}
    
    イベント名：<input t ype='text' name='title' value='{{ $event->title }}'><br>

    カテゴリー：
    <br>

    内容：<input type='text' name='content' value='{{ $event->content }}'><br>
    開催日：<input type='date' name='date' value='{{ $event->date }}'><br>
    開催場所：<input type='text' name='place' value='{{ $event->place }}'><br>

    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">

    投稿されている画像 ： <img src="{{ $event->image }}" class="img-thumbnail" alt=""><br>


    {{-- <input type='submit' value='編集する'> --}}

    <input type='submit' value='編集する' class="btn btn-primary mt-3">


</form>
@endsection

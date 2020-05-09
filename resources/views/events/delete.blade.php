@extends('layouts.app')

@section('content')
こちらのイベントを削除でよろしかったでしょうか。<br>

<form action="{{ route('event_remove') }}" method='post'>
    {{ csrf_field() }}
    <input type='hidden' name='id' value='{{ $event->id }}'><br>

    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{ $event->image }}" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <p class="card-text"><img src="/image/clock.png" alt=""> {{ $event->date }}</p>
                    <p class="card-title">カテゴリー:{{ $event->category->category_name }}</p>
                    <p class="card-title">イベント内容: {{ $event->title }}</p>
                    <p class="card-text">イベント詳細: {{ $event->content }}</p>


                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-delete text-white">削除する</button>

</form>
@endsection

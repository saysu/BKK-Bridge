@extends('layouts.app')

@section('content')


{{-- Calendar --}}
<div class="container">

<div class="row">
    <div class="col-md-3">
        <form class="form-inline mb-5 mt-5">
            <label for="due_date-field" class="mb-1" >■開催日よりイベントを検索</label>
            <div style="overflow:hidden;">
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 mb-1">


                            {{--日付検索 --}}
                            <div class="input-group mb-1">
                            <input name="date" type="text" id="input-date" class="form-control" placeholder=""
                                aria-label="Recipient's username" aria-describedby="button-addon2">

                            <button type="submit" name="submit" value="検索" class="btn-bkk1 btn btn-outline-info"
                                id="button-addon2">検索</button>
                            </div>
                        </div>
                        <div class="col-12">
                            <div id="datetimepicker12"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div>
            <hr>
            <label for="due_date-field">■キーワード検索</label>
            <form class="form-inline">
                <div class="form-group">

                    <input name="keyword" type="text" id="input-date" class="form-control" placeholder="タイトル、内容、場所" aria-label="Recipient's username" aria-describedby="button-addon2">

                    <button type="submit" name="submit" value="検索" class="btn-bkk2 btn btn-outline-info"
                        id="button-addon2">検索</button>

                </div>
            </form>
        </div>
    </div>

        {{-- nav col-9 --}}
        <div class="col-md-9">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('events.index')}}">イベントに参加する</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('events.create') }}">イベントを作る</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index', Auth::id()) }}">マイページ</a>
            </li>
        </ul>


        {{-- 各イベント投稿記事 --}}



        <div class="card-body">
            @foreach($events as $event)
            <div class="card mb-3">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                {{-- イベントの記事 --}}
                <div class="row no-gutters">
                    <div class="col-md-5">

                        <img src="{{$event->image}}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">

                            <p class="card-text"><img src="/image/clock.png" alt=""> {{ $event->date }}</p>
                            <hr>
                            <p class="card-title">
                                カテゴリー:
                                <a
                                    href="{{ route('events.index', ['category_id', $event->category->id]) }}">{{ $event->category->category_name }}</a>
                            </p>
                            <h5 class="card-titlebkk"><span>{{ $event->title}}</span></h5>

                            <p><img src="/image/people.png" alt=""> {{$event->participates->count()}}名参加予定です！</p>

                            {{-- <p class="card-text">イベントの場所:{{ $event->place }}</p> --}}

                            {{-- <h5 class="card-title">投稿者:
                            <a href="{{ route('users.show', $event->user_id) }}">{{ $event->user->name }}</a>
                            </h5>
                            <p class="card-text">イベントの内容:{{ $event->content }}</p> --}}
                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-bkk">イベントの詳細を見る</a>
                        </div>
                    </div>

                </div>

            </div>
            @endforeach
            {{ $events->links() }}
        </div>
    </div>
</div>
</div>
</div>

</div>

@endsection

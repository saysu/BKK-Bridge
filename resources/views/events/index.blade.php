@extends('layouts.app')

@section('content')


{{-- Calendar --}}
<div class="container">

<div class="row">
    @include('layouts.sidebar')
    
        {{-- nav col-9 --}}
        <div class="col-md-9">
            <div class="row d-block d-md-none d-lg-none">
        <ul class="nav nav-tabs">
            <li class="nav-phone nav-item">
                <a class="nav-link active" href="{{ route('events.index')}}">参加する</a>
            </li>
            <li class="nav-phone1 nav-item">
                <a class="nav-link" href="{{ route('events.create') }}">作る</a>
            </li>
            <li class="nav-phone2 nav-item">
                <a class="nav-link" href="{{ route('users.index', Auth::id()) }}">マイページ</a>
            </li>
        </ul>
       </div>

       <div class="row d-none d-md-block d-lg-block">
        <ul class="nav nav-tabs">
            <li class="nav-phone2 nav-item">
                <a class="nav-link active" href="{{ route('events.index')}}">イベントに参加する</a>
            </li>
            <li class="nav-phone nav-item">
                <a class="nav-link" href="{{ route('events.create') }}">イベントを作る</a>
            </li>
            <li class="nav-phone nav-item">
                <a class="nav-link" href="{{ route('users.index', Auth::id()) }}">マイページ</a>
            </li>
        </ul>
     </div>


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

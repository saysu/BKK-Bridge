@extends('layouts.app')
@section('content')

<div class="container">

 <div class="row">
    @include('layouts.sidebar')
                    {{-- nav --}}
                    <div class="col-md-9">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('events.index')}}">イベントに参加する</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('events.create') }}">イベントを作る</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('users.index', Auth::id()) }}">マイページ</a>
                        </li>
                    </ul>

                    {{-- --------------- --}}

                    <p class="mypageline mt-3 font-weight-bold text-center"><span>自分で企画したイベント</span></p>

                    @foreach($user->events as $event)

                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ $event->image }}" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $event->title }}</h5>
                                    <p class="card-text">{{ $event->content }}</p>
                                    <p class="card-text"><small class="text-muted">イベント作成日: {{ $event->created_at }}</small></p>
                                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-bkk">イベントの詳細を見る</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- 参加する -->
                    <p class="mypageline mt-3 font-weight-bold text-center"><span>参加する予定のイベント</span></p>


                    @foreach($user->participates as $participate)

                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ $participate->event->image }}" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $participate->event->title }}</h5>
                                    <p class="card-text">{{ $participate->event->content }}</p>
                                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-bkk">イベントの詳細を見る</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- イイね -->

                    <p class="mypageline mt-3 font-weight-bold text-center"><span>お気に入りイベント一覧</span></p>
                    @foreach($user->keeps as $keep)

                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ $keep->event->image }}" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $keep->event->title }}</h5>
                                    <p class="card-text">{{ $keep->event->content }}</p>
                                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-bkk">イベントの詳細を見る</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    @endsection

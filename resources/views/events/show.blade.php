@extends('layouts.app')

@section('content')

{{-- トップの部分 --}}

<div class="toptitle card-header text-center font-weight-bold">{{ $event->title}}</div>

{{-- 以下詳細 --}}

<div class="card mb-3">
    <div class="row no-gutters">
        <div class="col-md-5">
            <img src="{{ $event->image }}" class="card-img" alt="...">
        </div>
        <div class="col-md-7">
            <div class="card-body">
                @if (session('status'))
                <div class="alert1 alert alert-success mb-3" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                @if (session('flash_message'))
                <div class="flash1 flash_message bg-success mb-3">
                    {{ session('flash_message') }}
                </div>
                @endif
                <div class="container">
                    <div class="row">

                        {{-- 左詳細 --}}
                        <div class="col-md-6">
                            <p class="dateinfo card-text"><img src="/image/clock.png" class="dateinfoicon" alt=""> {{ $event->date }}</p>
                            <hr>
                            <p class="placeinfo card-text"><img src="/image/location.png" class="placeinfopic" alt="">{{ $event->place }}</p>
                            <p class="card-title1">カテゴリー: {{ $event->category->category_name }}</p>
                            <p class="detailcontent card-text"><span>イベント詳細:</span><br> {{ $event->content }}</p>
                            <p class="card-title">主催者:{{ $event->user->name }}</p>
                        </div>

                        {{-- 右詳細 --}}
                        <div class="col-md-6 text-right">
                            @if(!isset($participate))
                            <form action="{{ route('participate.store', $event->id) }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $event->id }}" name="event_id">
                                <button type="submit" class="btn btn-bkk">参加する</button>
                            </form>
                            @else
                            <form action="{{ route('participate.destroy', [$event->id, $participate->id]) }}"
                                method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" value="{{ $event->id }}" name="event_id">
                                <button type="submit" class="btn btn-cancel text-white">参加をキャンセルする</button>
                            </form>
                            @endif

                            {{-- お気に入り --}}
                            <div class="keepbtn mt-3">
                            @if(!isset($keep))
                            <form action="{{ route('keep.store', $event->id) }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $event->id }}" name="event_id">
                                <button type="submit" class="btn btn-bkk"><img src="/image/good.png" class="keepbtn1" alt="">
                                    お気に入り</button>
                            </form>
                            @else
                            <form action="{{ route('keep.destroy', [$event->id, $keep->id]) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" value="{{ $event->id }}" name="event_id">
                                <button type="submit" class="btn btn-cancel text-white">お気に入りを取り消す</button>
                            </form>
                            @endif
                            </div>

                            <p class="mt-3"><img src="/image/people.png" alt=""> 現在{{$event->participates->count()}}名参加予定です！</p>

                            <p>参加者一覧</p>
                            @foreach($event->participates as $participate)
                            <a href="{{ route('users.show', $participate->user->id) }}" class="profilepic">
                                <img src="{{ $participate->user->image }}" class="profilepic" alt="">
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- コメント --}}

            <div class="p-3">
                <a href="{{ route('comments.create', ['event_id' => $event->id ]) }}"
                    class="btn btn-bkk mb-3">コメントする</a><br>

                <p class="card-title">コメント一覧</p>
                @foreach($event->comments as $comment)
                <div class="card">
                    <div class="card-body">
              
                            <p class="card-text"><small class="text-muted">{{ $comment->created_at }}</small></p>
                            投稿者:
                            <a href="{{ route('users.show', $participate->user->id) }}">
                                {{ $comment->user->name }}
                            </a>
                            
                      

                        <p class="card-text">{{ $comment->comment }}</p>
                        
                    </div>
                </div>
                @endforeach

                {{-- 編集削除 --}}

                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-right mt-3">
                            @if($event->user_id === Auth::id())
                            <a href="{{ route('event_edit') }}?id={{ $event->id }}"><img src="/image/edit.png" alt="編集する"></a>
                            <a href="{{ route('event_delete') }}?id={{ $event->id }}"><img src="/image/trash.png" alt="削除する"></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

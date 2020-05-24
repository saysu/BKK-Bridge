@extends('layouts.app')
@section('content')

<div class="container">
    <form action="{{ route('users.edit', $user) }}" method='post' enctype="multipart/form-data">
        {{ csrf_field() }}
        {{method_field('PATCH')}}
        <div class="row">

            <div class="col-md-12 text-center">
                <div class="row">
                    <div class="col-4 text-right mt-5">
                        <img src="{{ $user->image }}" class="icon" alt="">
                    </div>
                    <div class="col-md-8 text-left font-weight-bold">
                        <h3 class="registerinfo text-center"><span>プロフィール</span></h3>
                        <h5>名前: {{ $user->name }}</h5>
                        <hr>
                        <h5>年齢: {{ $user->age }}才</h5>
                        <hr>
                        <h5>性別: {{ $user->gender }}</h5>
                        <hr>
                        <h5>自己紹介: {{ $user->introduction }}</h5>
                        <hr>
                        <p><img src="/image/guy.png" class="iconusers" alt=""> {{$user->events->count()}}個、イベントを企画</p>

                        <p><img src="/image/party.png" class="iconusers" alt="">
                            {{$user->participates->count()}}個、現在参加予定</p>
                    </div>
                </div>


                @if($user->id === Auth::id())
                <a href="{{ route('users.edit', $user) }}" type="submit" class="btn btn-bkk mt-3"
                    id="{{ $user->user_id }}">登録情報を編集する</a>
                @endif
    </form>
</div>
</div>
</div>

@endsection

@extends('layouts.app')
@section('content')

<div class="container">
    <form action="{{ route('users.update', $user) }}" method='post' enctype="multipart/form-data">
        {{ csrf_field() }}
        {{method_field('PATCH')}}
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="row">
                    <div class="col-6 text-right mt-5">
                        <img src="{{ $user->image }}" class="icon" alt="">
                        <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <p>画像投稿は必須です</p>
                                <label for="file_upload">
                                    ファイルを選択して下さい
                                    <input type="file" id="file_upload" name="image">
                                    </label>
                            </div>

                        </div>
                    </div>
                    </div>
                    <div class="col-md-6 text-left font-weight-bold">
                        <h3 class="registerinfo text-center mb-3"><span>プロフィール</span></h3>
                        <input type="text" value="{{ $user->name }}" name="name">
                        <hr>
                        <input type="number" value="{{ $user->age }}" name="age">才
                        <hr>
                        <select class="form-control" id="exampleFormControlSelect1" name="gender">
                            <option>選択してください</option>
                            <option {{ $user->gender === '男性'  ? 'selected' : '' }}>男性</option>
                            <option {{ $user->gender === '女性'  ? 'selected' : '' }}>女性</option>
                            <option {{ $user->gender === 'その他'  ? 'selected' : '' }}>その他</option>
                        </select>
                        <hr>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                name="introduction">{{ $user->introduction }}</textarea>
                        <hr>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <input type="submit" value="プロフィールを変更する" class="btn btn-bkk">
                            </div>
                        </div>
                    </div>
                {{-- <a href="{{ route('users.update', $user) }}" type="submit" class="btn btn-bkk">プロフィールを変更する</a> --}}

    </form>
</div>
</div>
</div>

@endsection

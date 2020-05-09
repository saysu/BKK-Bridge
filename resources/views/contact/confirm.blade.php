@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('contact.send') }}">
    @csrf

    <h3 class="mypageline"><span>以下内容で宜しかったでしょうか。</span></h3>

    <label>メールアドレス:</label>
    {{ $inputs['email'] }}
    <input
        name="email"
        value="{{ $inputs['email'] }}"
        type="hidden"><br>

    <label>名前:</label>
    {{ $inputs['firstname'] }}
    <input
        name="firstname"
        value="{{ $inputs['firstname'] }}"
        type="hidden"><br>

    <label>苗字:</label>
    {{ $inputs['lastname'] }}
    <input
        name="lastname"
        value="{{ $inputs['lastname'] }}"
        type="hidden"><br>


    <label>お問い合わせ内容:</label>
    {!! nl2br(e($inputs['body'])) !!}
    <input
        name="body"
        value="{{ $inputs['body'] }}"
        type="hidden"><br>

    <input type="submit" class="btncontact btn btn-outline-info" value="送信する">
    
    {{-- <button type="button" class="btn btn-primary">Primary</button --}}

</form>
<button class="btncontact btncontact btn btn-outline-info mt-3" onClick="history.back()">戻る</button>

@endsection
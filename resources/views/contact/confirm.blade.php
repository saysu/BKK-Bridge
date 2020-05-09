@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('contact.send') }}">
    @csrf

    <label>メールアドレス</label>
    {{ $inputs['email'] }}
    <input
        name="email"
        value="{{ $inputs['email'] }}"
        type="hidden">

    <label>名前</label>
    {{ $inputs['firstname'] }}
    <input
        name="firstname"
        value="{{ $inputs['firstname'] }}"
        type="hidden">

    <label>苗字</label>
    {{ $inputs['lastname'] }}
    <input
        name="lastname"
        value="{{ $inputs['lastname'] }}"
        type="hidden">


    <label>お問い合わせ内容</label>
    {!! nl2br(e($inputs['body'])) !!}
    <input
        name="body"
        value="{{ $inputs['body'] }}"
        type="hidden">

 
        
    
    <input type="submit" value="送信する">
        
    
</form>
<button id="square_btn" onClick="history.back()">戻る</button>

@endsection
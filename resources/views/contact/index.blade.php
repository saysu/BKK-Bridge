@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('contact.confirm') }}">
    @csrf

    <section class="contact py-5 bg-light">
        <h2 class="mb-3 text-center">Contact</h2>
        <div class="container">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" value="{{ old('email') }}" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="example@example.com" name="email">
                    @if ($errors->has('email'))
                    <p class="error-message">{{ $errors->first('email') }}</p>
                    @endif
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" placeholder="First name" id="firstName" name="firstname">
                    </div>
                    <div class="col">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" placeholder="Last name" id="lastName" name="lastname">
                    </div>
                </div>

                <label for="exampleInputEmail1">お問い合わせ内容</label>
                <input type="body" class="form-control mb-5" value="{{ old('body') }}" id="exampleInputEmail1"
                    aria-describedby="emailHelp" name="body">
                @if ($errors->has('body'))
                <p class="error-message">{{ $errors->first('body') }}</p>
                @endif

                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <input type="submit" class="btncontact btn btn-outline-info btn-lg" value="submit">
                            {{-- <button type="submit" class="btncontact btn btn-outline-info btn-lg">Submit</button> --}}
                        </div>
                    </div>
                </div>
            </form>
        </div>

        @endsection

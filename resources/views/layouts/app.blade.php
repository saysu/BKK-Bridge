<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BKK Bridge</title>
    <link rel="icon" href="/image/bridgeicon.png">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/style.js') }}" defer></script>

  
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex" href="{{ route('events.index')}}">
                    <div><img src="/image/bridgeicon.png" style="height: 25px; border-right: 1px solid #333;"
                            class="pr-3"></div>
                    <div class="pl-3 text-white">BKK Bridge</div>
                </a>

                

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      
                    </ul>

                 
          
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    
                        <a href="{{ route('question.index') }}" class="text-white mt-2 mr-3"><img src="/image/guide.png" class="toppic"></a>
                        <a href="{{ route('contact.index') }}" class="ext-white mt-2 mr-3"><img src="/image/contact.png" class="toppic" alt=""></a>

                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{ Auth::user()->image}}" class="profilepic" alt=""><span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                {{-- <a href="{{ route('events.create') }}" class="dropdown-item">投稿する</a> --}}
                                <a href="{{ route('users.show', Auth::user()->id) }}" class="dropdown-item">プロフィール</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        {{-- --- --}}


        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">


                        @yield('content')

                    </div>
                </div>
            </div>
        </main>
    </div>

    <div id="page_top"><a href="#">▲</a></div>
 
</body>



<footer>
    <div class="container clear text-right">
        <div class="row pt-3">
            <div class="col-md-12 text-center">
               {{-- コンタクトなど --}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-right text-white">
                <p class="copyright">©BKK Bridge</p>
            </div>
        </div>

    </div>




</footer>





</html>

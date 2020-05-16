<!doctype html>
<html lang="ja">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>BKK Bridge</title>
    <link rel="icon" href="/image/bridgeicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    {{-- CSS --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/style.js') }}" defer></script>

    {{-- font --}}
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Noto+Sans+JP:400,700" rel="stylesheet">


</head>

<body>
    <!-- Nv bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand d-flex" href="{{ route('events.index')}}">
                <div><img src="/image/bridgeicon.png" style="height: 25px; border-right: 1px solid #333;" class="pr-3">
                </div>
                <div class="pl-3">BKK Bridge</div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">


                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                    <a href="{{ route('question.index') }}" class="text-white mt-2 mr-3"><img src="/image/guide.png"
                            class="toppic"></a>
                    <a href="{{ route('contact.index') }}" class="ext-white mt-2 mr-3"><img src="/image/contact.png"
                            class="toppic" alt=""></a>
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

                        {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{ route('events.create') }}" class="dropdown-item">投稿する</a>
                            <a href="{{ route('users.edit', Auth::user()->id) }}" class="dropdown-item">My page編集</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div> --}}
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    {{-- Top --}}
    <div class="top1 text-white">
        <img src="image/top1.jpg" class="w-100" alt="">
        <h1 class="text-center display-3 font-weight-bold mb-3">『 BKK Bridge 』
        </h1>
        <p class="text-center lead">タイで新たな友達、趣味を作りたいけど方法が分からない<br>
            そんなあなたにぴったりのコミュニティサイトです!
        </p>
        @guest
        <a class="btn1 btn btn-outline-light btn-lg" href="{{ route('login') }}">ログインする</a>
        <a class="btn2 btn btn-outline-light btn-lg" href="{{ route('register') }}">新規登録する</a>
        @endguest
    </div>


    <!-- About -->

    <div class="scroll-fade">
        <div class="abouttop">
            <img src="/image/Topback.png" class="w-100 mt-5" alt="">
            <h1 class="text-center">BKK Bridgeとは?</h1>
            <h2>イベントに参加する</h2>
            <h3>イベントを作る</h3>
            <h4 class="text-center">ボタン一つで<br>参加が可能<br>
                気になるイベントに<br>参加してみよう！</h4>
            <h5 class="text-center">簡単に<br>イベント作成も可能<br>
                自らがオーガナイザーになれます！</h5>
            <p class="text-center">タイ在住の<br>日本人限定<br>イベントサイトです!</p>
        </div>
    </div>

    <!-- Service -->

    <section class="about py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <h2 class="topside mt-3 font-weight-bold text-center"><span>こんなイベントに参加可能！<span></h2>
                    <ul class="mt-5">
                      <li>ビジネス交流会 / ネットワーキングイベント</li>
                      <li>共通の趣味同士で飲み会、お茶会</li>
                      <li>女子会、男子会</li>
                      <li>一緒に運動！ランニング、サッカー、バトミントンなど</li>
                      <li>ボランティア、慈善活動</li>
                      <li>スポーツ観戦</li>
                      <li>タイ語勉強会</li>
                      <li>英語勉強会</li>
                      <li>もくもく会</li>
                      <li>料理教室などなど</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <img src="/image/party.jpg" class="w-100" alt="">

                </div>
            </div>
        </div>
    </section>


    {{-- //////2 --}}
    <section class="about py-5">
        <div class="container">
            <div class="row">

             

                <div class="col-md-6 mb-5  order-md-last">
                    <h2 class="topside mt-3 font-weight-bold text-center"><span>イベントを企画してみよう！</span></h2>
                    <p class="mt-5">オーガナイザーとしていつでもイベント企画が可能！</p>
                    <p>飲み会、ビジネス交流会、趣味、スポーツ..など<br>
                      タイに在住の皆さまと交流の場を自ら企画が出来ます。<br>
                      まずは新規登録し、マイページを作成してください。<br>
                    その後、「イベントを作る」のリンクより自由に作成してください!</p>
                </div>

                <div class="col-md-6">
                    <img src="/image/organizer.jpg" class="w-100" alt="">
                </div>

            </div>
        </div>
    </section>

    <!-- button -->

    <section class="plans pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                  
      <a href="{{ route('events.index') }}" class="btnfooter btn btn-primary btn-lg">Let's start!!</a>

                </div>
            </div>
        </div>
    </section>


    <!-- footer -->
    <footer class="py-3 bg-dark">
        <div class="container">

            <p class="text-white text-right m-0">©BKK Bridge</p>

        </div>

    </footer>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>

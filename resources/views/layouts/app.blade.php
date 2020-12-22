<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BookIt</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Heebo:700,800,900|Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flickity.min.css') }}" rel="stylesheet">
    
    <style>
        html{ font-size:18px; }
        body{
            font-family: 'Source Sans Pro', sans-serif ;
        }
        h1,h2,h3,h4,h5,h6, label,
        .h1,.h2,.h3,.h4,.h5,.h6{
            font-family: 'Heebo', sans-serif;
        }
        .navbar{
            background:url('{{ asset("images/shared/home-splash.jpg") }}');
            background-size:cover;
            background-position:center;
        }
        .navbar-brand{
            -webkit-filter: drop-shadow(2px 1px 2px rgba(0,0,0, 0.4));
        }
        .slider {
            transition: 0.25s;
            overflow-x: hidden;
        }

        .text-purple {
            color: blueviolet;
        }
        
        .text-purple:hover {
            color: blueviolet;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-4">
            <div class="container">
                <a class="navbar-brand" href="/talents">
                    <img src="{{ asset('images/shared/logo-w.svg') }}" style="height:1.6em;vertical-align:middle;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <form action="/search" method="post">
                        @csrf
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search here..." name="query" id="query">
                            <input type="submit" value="Search" class="btn btn-primary">
                        </div>
                    </form>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto bg-light px-3 py-2" style="border-radius:4px;">
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
                            <div style="
                            background:url('{{ asset('images/users/'.Auth::user()->imageurl) }}');
                            background-size:cover;
                            background-position:center;
                            border-radius:100%;
                            height:32px;
                            width:32px;
                            transform:translateY(4px)"
                            class="d-inline-block"> </div>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <h6 class="d-inline">{{ Auth::user()->firstname }}</h6> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="/user/profile">
                                     {{ __('My Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="/offer/clientviewoffers">
                                        View Offers Sent
                                    </a>
                                    <a class="dropdown-item" href="/offer/gettalentrequests">
                                        View Offers Received
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <!--script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script-->
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script src="{{ asset('js/cleave.min.js') }}"></script>
    <script src="{{ asset('js/flickity.pkgd.min.js') }}"></script>
    <script>
        $('.main-carousel').flickity({
            // options
            cellAlign: 'center',
            contain: true,
            draggable: '>1',
            freeScroll: true,
            groupCells: '10%',
            fullscreen: true,
            pageDots: false,
            adaptiveHeight: false,
        });
        $(function () {
            new Cleave('.credit-card', {
                creditCard: true,
                onCreditCardTypeChanged: function(type) {
                    document.querySelector('.type').innerHTML = '<i class="fab fa-cc-' + type + ' fa-fw fa-2x active" aria-hidden="true"></i>';
                }
            });
        });
        
        $(document).ready(function () {
            var editor = CKEDITOR.replace( 'article-ckeditor' );

            editor.on( 'required', function( e ) {
                alert( 'You must add a description before submitting.' );
                e.cancel();
            });
        });
    </script>
</body>
</html>

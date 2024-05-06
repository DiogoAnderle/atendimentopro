<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atendimento Pro</title>
    <link href="{{ asset('css/inicial.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('flag-icon-css/css/flag-icon.min.css') }}">

    <link rel="stylesheet" href="{{ asset('mdi/css/materialdesignicons.min.css') }}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/favicon-16x16.png') }}">

    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <header id="header">
        <div class="container">
            <div class="flex">

                <a href="" class="logo"><img src="{{ asset('image/apple-touch-icon.png') }}" width="60"
                        alt="logo Atendimento Pro"></a>


                {{-- 
                    <nav class="menu-desktop">
                        <ul>
                            <li><a href="#">HOME</a></li>
                            <li><a href="#">SOBRE</a></li>
                            <li><a href="#">PROJETOS</a></li>
                            <li><a href="#">CONTATO</a></li>
                        </ul>
                    </nav>
                     --}}
                <nav class="menu-login">
                    <ul id="menuLogin">
                        <li class="dropdown">
                            <a class="nav-link" id="navDropdown" href="#" data-bs-toggle="dropdown">
                                <i class="mdi mdi-menu"></i>

                            </a>

                            <div class="dropdown-menu" aria-labelledby="navDropdown">
                                @if (Route::has('login'))
                                    @auth
                                        <a href="{{ route('home') }}" class="dropdown-item preview-item">
                                            <i class="mdi mdi-home-variant text-warning"></i>
                                            HOME
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}" class="dropdown-item preview-item">
                                            LOGIN
                                        </a>
                                    @endauth
                                @endif
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <button id="btnMenuToggle" onclick="animarMenu()" class="mdi mdi-menu">
                </button>
                <div class="menu-mobile" id="menuMobile">
                    <nav>
                        {{-- <a href="#">INÍCIO</a>
                            <a href="#">SOBRE</a>
                            <a href="#">PROJETOS</a>
                            <a href="#">CONTATO</a> --}}
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('home') }}" class="dropdown-item preview-item">
                                    <i class="mdi mdi-home-variant text-warning"></i>
                                    HOME
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="dropdown-item preview-item">
                                    LOGIN
                                </a>
                            @endauth
                        @endif

                    </nav>
                </div>
            </div> {{-- flex --}}
        </div>{{-- Container --}}
    </header>



    <section class="banner">

        <div class="flex">
            <p>Descubra um novo modo de <span class="white">atendimento.</span></p>
        </div>
        <br>

        <div class="meuIP">
            <p>Meu IP: <strong><span id="meuIP"></span></strong> </p>
        </div>

    </section>


    <script src="{{ asset('js/inicial.js') }}"></script>

</body>

</html>

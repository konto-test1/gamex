<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CMS Panel</title>
    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/panel.css') }}" rel="stylesheet">



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
    <link rel="stylesheet" href="https://mbraak.github.io/jqTree/jqtree.css">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://mbraak.github.io/jqTree/tree.jquery.js"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel tile">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <div class="container">
            <div class="row">
                <div class="col-2">
                    <div class="menu tile">
                        <h4>Dashboard</h4> 
                        <ul>
                            <li><a href="{{route('admin')}}" class="{{ (request()->is('admin')) ? 'active' : '' }}">Pulpit</a></li>
                            {{-- pulpit pokazywał by aktualności ilość stron odwiedzin itd. --}}

                            <li><a href="{{route('blog')}}" class="{{ (request()->is('admin/blog*')) ? 'active' : '' }}">Produkty</a></li>
                            {{-- produkty ala wpisy na WP trzeba tutaj pomyśleć jak zrobić kategorie --}}

                            <li><a href="{{route('categories')}}" class="{{ (request()->is('admin/categories*')) ? 'active' : '' }}">Kategorie</a></li>
                            {{-- na początek taki osobny potem się to przeniesie --}}

                            <li><a href="{{route('media')}}" class="{{ (request()->is('admin/media*')) ? 'active' : '' }}">Media</a></li>
                            {{-- wszystkie grafiki na stronie --}}

                            <li><a href="{{route('pages')}}" class="{{ (request()->is('admin/pages*')) ? 'active' : '' }}">Strony</a></li>
                            {{-- tutaj rejestrował bym strony np. home, galeria itd. niestety np. home ma wiele tekstów trzeba pomyśleć jak je tam dodać --}}

                            <li><a href="{{route('account')}}" class="{{ (request()->is('admin/account*')) ? 'active' : '' }}">Profil</a></li>
                            {{-- profil użytkownika można rozbudować o Uprawnienia --}}

                            <li><a href="{{route('settings')}}" class="{{ (request()->is('admin/settings*')) ? 'active' : '' }}">Ustawienia</a></li>
                            {{-- wszystkie ustawienia strony, pokazywało by wersje apache itd. --}}

                            <li><a href="{{route('support')}}" class="{{ (request()->is('admin/support*')) ? 'active' : '' }}">Zadaj pytanie</a></li>
                            {{-- tutaj od razu wysyłało by mail do mnie i były by dane do kontaktu jak tel skype itd. --}}

                            {{-- <li><a href="{{route('menu_builder')}}" class="{{ (request()->is('admin/menu_builder*')) ? 'active' : '' }}">Generator menu</a></li> --}}
                            
                            {{-- <li><a href="{{route('sliders')}}" class="{{ (request()->is('admin/sliders*')) ? 'active' : '' }}">Slidery</a></li> --}}

                            {{-- W PLANACH NA PRZYSZŁOŚĆ --}}
                            {{-- <li><a href="" class="text-danger">Komentarze!</a></li>
                            <small>komentarze wpisów/moderowanie</small>
                            <li><a href="" class="text-danger">Motyw!</a></li>
                            <small>(różne wersje strony dark/light)</small> --}}
                            {{-- <li><a href="" class="text-danger">Użytkownicy!</a></li>
                            <small>(Uprawnienia do moderowania itd. trzeba by dopisac do roznych podstron)</small> --}}
                            {{-- <li><a href="" class="text-danger">Slidery oraz galerie!</a></li> --}}
                            {{-- <li><a href="{{route('menu.index')}}" class="{{ (request()->is('admin/creator_menu*')) ? 'active' : '' }}">Generator menu</a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-10">
                @yield('content')
                </div>
            </div>
            <div class="row">
                {{-- <div class="col-12">
                    <h6>Do zrobienia:</h6>
                    <ul><small>
                        <li>szablony rozdzielić dla kategori i stron</li>
                        <li>poprawić kontrolery, wywalić komentarze itd.</li>
                        <li>dodać kasowanie slidów podłaczyć shortcode</li>
                        <li>dodać podstrony do generatora menu podłaczyć shortcode</li>
                        <li>wyświetlanie menu i sliderów jako shortcode</li>
                        <li>zaszyfrować dane mail i tel</li>
                        <li>przepiąć CDN'y</li>
                        <li>podłaczyć .htaccess w panelu ustawień / przekierowania itd.</li>
                    </small></ul>

                    <h6>Do przeniesienia strony wymagać:</h6>
                    <ul><small>
                        <li>dane do przeniesienia domeny na nasze konto</li>
                        <li>hosting dam od siebie na pierwszy rok w cenie strony po roku płatne</li>
                        <li>konto youtube</li>
                        <li>konto fb / insta i wszystkie inne</li>
                        <li>konto google search console - żeby przekierować wszystkie linki</li>
                    </small></ul>
                    <h6>Zrobione:</h6>
                    <ul><small>
                        <li>zabezpieczenie recapcha v3 dla formularza</li>
                        <li>blokada antyspamowa</li>
                        <li>routy na panelu zabezpieczone</li>
                        <li>podłaczenie szablonów do stron i kategorii</li>
                    </small></ul>
                </div> --}}
            </div>

        </div>
    </div>



</body>
</html>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title','Home Page')</title>
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/customStyle.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="{{ asset('/img/logo.jpeg') }}" class="delete-icon">
                    SportShop
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
                        <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    {{ Config::get('languages')[App::getLocale()] }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @foreach (Config::get('languages') as $lang => $language)
                                        @if ($lang != App::getLocale())
                                            <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">
                                                {{$language}}
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                        </li>
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
                            @if(!(Auth::user()->getRole() == 'admin'))
                                <button type="button" class="btn btn-outline-info btn-block" data-toggle="modal" data-target="#exampleModal">
                                    Credits : {{Auth::user()->getCredit()}}
                                </button>
                                <!-- Modal -->

                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            @if (Auth::user()->getCredit() >= 20)
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Congratulations!! You have so much credits.
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Congratulations {{Auth::user()->getName()}}, You have {{Auth::user()->getCredit()}} credits to redeem in SportShop.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            @else
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">You have {{Auth::user()->getCredit()}} credits.</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{Auth::user()->getName()}}, You have {{Auth::user()->getCredit()}} credits to redeem in SportShop.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <li class="nav-item" >
                                    <a class="nav-link" href="{{ route('user.sale.list') }}">
                                        Record
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if (!Auth::guest())



                        @if (Auth::user()->getRole() == 'admin')

                        <ul class="navbar-nav mr-auto">
                            <a class="navbar-brand" href="{{ route('admin.product.menu') }}">{{ __('Product.menu.title') }}</a>
                        </ul>
                        <ul class="navbar-nav mr-auto">
                            <a class="navbar-brand" href="{{ route('admin.category.menu') }}">{{ __('category.title.control') }}</a>
                        </ul>
                        <ul class="navbar-nav mr-auto">
                            <a class="navbar-brand" href="{{ route('admin.routine.menu') }}">{{ __('routine.title.adminControl') }}</a>
                        </ul>
                        <ul class="navbar-nav mr-auto">
                            <a class="navbar-brand" href="{{ route('admin.sale.menu') }}">{{ __('Sale.titleController') }}</a>
                        </ul>
                        @endif

                        @if (Auth::user()->getRole() == 'client')
                            <ul class="navbar-nav mr-auto">
                                <a class="navbar-brand" href="{{ route('client.list') }}">{{ __('Product.title_list') }}</a>
                            </ul>
                            <ul class="navbar-nav mr-auto">
                                <a class="navbar-brand" href="{{ route('user.routine.menu') }}">{{ __('routine.suggestion') }}</a>
                            </ul>
                            <ul class="navbar-nav mr-auto">
                                <a class="navbar-brand" href="{{ route('user.ally.menu') }}">{{ __('ally.products') }}</a>
                            </ul>
                        @endif
                    @else
                        <ul class="navbar-nav mr-auto">
                            <a class="navbar-brand" href="{{ route('client.list') }}">{{ __('Product.title_list') }}</a>
                        </ul>
                        <ul class="navbar-nav mr-auto">
                            <a class="navbar-brand" href="{{ route('user.routine.menu') }}">{{ __('routine.suggestion') }}</a>
                        </ul>
                        <ul class="navbar-nav mr-auto">
                            <a class="navbar-brand" href="{{ route('user.ally.menu') }}">{{ __('ally.products') }}</a>
                        </ul>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Future authentication Links -->
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Button trigger modal -->
        <main class="py-4">
            @yield('content')
        </main>

    </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Para el menu -->
<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
</script>

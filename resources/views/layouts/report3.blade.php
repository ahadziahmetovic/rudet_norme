<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <!-- CSS only -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script type="text/javascript" src="{{ URL::asset('js/datepicker.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet"
        type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('/images/logo.png') }}" class="logo" />
            </a>
            <div class="container">


                {{--         <div class="input-group">
                    <button class="btn btn-outline-secondary dropdown-toggle rounded" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">Izvještaji</button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="stanjealata">Stanje svih alata</a></li>
                        <li><a class="dropdown-item" href="stanje">Stanje kritičnih alata</a></li>
                        <li><a class="dropdown-item" href="izvjestaj">Izlaz po datumima</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class=""><a class="dropdown-item" href="listaAlata">Pretraživanje alata po
                                šifri</a></li>
                    </ul>
                    <a class="nav-link active bg-light mx-2" href="izlaz">RAZDUŽIVANJE ALATA</a>
                    <a class="nav-link bg-light mx-2" href="ulaz">UNOS ALATA</a>
                    <a class="nav-link bg-light text-dark" href="narudzbenica" tabindex="-1">NARUDŽBE</a>

                </div> --}}

                <ul class="navbar-nav ms-auto ml-5">

                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if (Auth::user()->name)
                                    <a class="dropdown-item" href="{{ route('records') }}">
                                        {{ __('Unos normi') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('records_list') }}">
                                        {{ __('pregled normi') }}
                                    </a>
                                  <hr>
                                    <a class="dropdown-item" href="{{ route('newDepartment') }}">
                                        {{ __('Unos odjela') }}
                                    </a>
                                    {{--     <a class="dropdown-item" href="{{ route('ulaz') }}">
                                        {{ __('Unos alata') }}
                                    </a> --}}
                                    <a class="dropdown-item" href="{{ route('newEmployee') }}">
                                        {{ __('Unos radnika') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('newOperation') }}">
                                        {{ __('Unos operacije') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('newProduct') }}">
                                        {{ __('Unos proizvoda') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('newSerie') }}">
                                        {{ __('Unos serije') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('workorder') }}">
                                        {{ __('Unos radnog naloga') }}
                                    </a>
                                    <hr>
                                    <a class="dropdown-item" href="{{ route('reports') }}">
                                        {{ __('Izvještaj detaljno') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('reports_total') }}">
                                        {{ __('Izvještaj sumarno') }}
                                    </a>
                                    <hr>

                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @else
                                    <a class="dropdown-item" href="{{ route('records') }}">
                                        {{ __('Početna') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('newEmployee') }}">
                                        {{ __('Trebovanje') }}
                                    </a>

                                    </a>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @endif
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
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2023 Copyright:
            <a class="text-reset fw-bold" href="https://pobjeda.com/">Pobjeda-Rudet dd</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</body>


</html>

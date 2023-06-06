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

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/tabs.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
         <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
   {{--       <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> --}}
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('/images/logo.png') }}" class="logo" />
            </a>
            <div class="container ">
                @auth
                @if (Auth::user()->name == 'Admir' || Auth::user()->name == 'Ahmet')
         {{--        <div class="input-group">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
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
                    <a class="nav-link" href="narudzbenica" tabindex="-1">NARUDŽBE</a>

                </div> --}}
            
                @endif
                @endauth

       
            </div>
    </div>
    </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <div class="container-fluid">
            
            <div class="copyright">
                &copy; {{ now()->year }} {{ __('made with') }} {{ __('by') }}
                <a href="https:www.pobjeda.com" target="_blank">{{ __('Pobjeda-Rudet dd') }}</a>
              
        </div>
    </footer>
    <!-- Footer -->
</body>


</html>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/materialPreloader.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/alpha.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map{
            height:100%;

        }
    </style>
</head>
<body>
    <div id="app">
        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src={{asset('js/jquery-2.2.0.min.js')}}></script>
    <script src={{asset('js/main.js')}}></script>
    <script src="{{ asset('js/customaps.js'), true }}"></script>
    <script src="{{ asset('js/informacoes.js'), true }}"></script>
    <script src="{{ asset('js/helpers.js'), true }}"></script>
    <script src="{{asset('js/materialize.min.js')}}"></script>
    <script src="{{asset('js/materialPreloader.min.js')}}"></script>
    <script src="{{asset('js/jquery.blockui.js')}}"></script>
    <script src="{{asset('js/alpha.min.js')}}"></script>
    <script src="{{asset('js/pesquisa.js')}}"></script>
    <script src="{{asset('js/filtroLinha.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABHGw_Ce7qP0w8onjpfxNBDE4OTGZrzD4&callback=initMap&language=BR&region=BR"
            async defer></script>
</body>
</html>

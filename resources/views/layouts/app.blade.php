<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="reservation de salle interne orange">
    <meta name="author" content="ODA GROUPE DES RETARDATEURS">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/ORANGE_LOGO_rgb.jpg')}}">
    <title>RESERVATION - @yield('title')</title>

    <link rel="preload" href="{{asset('fonts/HelvNeue55_W1G.woff2')}}" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{asset('fonts/HelvNeue75_W1G.woff2')}}" as="font" type="font/woff2" crossorigin="anonymous">
    <link href="{{asset('css/orangeHelvetica.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/orangeIcons.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/boosted.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('packages/noty/noty.css')}}">
    <link rel="stylesheet" href="{{asset('/css/noty_theme.css')}}">
    @livewireStyles
    <!-- Custom CSS -->
    @yield('extra-css')
</head>

<body>
    @include('layouts.header')
    <section class="section-content">
        <div class="container-fluid pt-5" >
    

            @yield('content')

        </div>
    </section>
    <br>
    @include('layouts.footer')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script> --}}
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/boosted.bundle.min.js')}}"></script>
    {{-- <script src="{{asset('js/form.js')}}"></script> --}}
    <script src="{{ asset('packages/noty/noty.js') }}"></script>
    @livewireScripts
    @if(Session::has('alerte'))

<script type="text/javascript">
        Noty.overrideDefaults({
            layout: 'topRight',
            theme: 'backstrap',
            timeout: 2500,
            closeWith: ['click', 'button'],
        });

        new Noty({
            type: "{{ Session::get('type') }}",
            text: "{!! str_replace('"', "'", Session::get('alerte')) !!}"
        }).show();

    </script>

    @endif
    @yield('extra-js')
</body>

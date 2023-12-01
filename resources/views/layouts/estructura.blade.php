<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- MAIN CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('css/home.css') }}"> --}}

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

     <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


    {{-- <link type="text/css" rel="stylesheet" href="{{ asset('css/rgbaColorPicker.css') }}"/>
    <script type="text/javascript" src='{{ asset('js/rgbaColorPicker.js') }}'></script> --}}

	{{-- <link rel="stylesheet" type="text/css" href=" {{ asset('css/MCP.min.css')}}"/>
	<script type="text/javascript" src="{{ asset('js/MCP.min.js')}}"></script>
 --}}


        <!-- Aqui incorporamos un yield para agregar los headers que utilizan las secciones por separados -->
    @yield('include-header')
    @livewireStyles
</head>

<body data-bs-theme="dark">

    <!-- Header -->
    @include('layouts.header')

    <!-- yield es una seccion que recibe contenido desde donde se llame con "section('contenido')" -->
    @yield('contenido')

    <!-- Foooter -->
    @include('layouts.footer')

    <!-- Aqui incorporamos un yield para agregar los scripts que utilizan las secciones por separados -->
    @yield('includes-foot')

<!--    <script src="{{ asset('js/estructura/index.js') }}"></script> -->
    @livewireScripts
</body>

</html>

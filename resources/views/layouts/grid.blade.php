<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- MAIN CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/header.css') }}"> -->


    <link rel="dns-prefetch" href="//fonts.bunny.net">
    {{-- <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    <!-- Aqui incorporamos un yield para agregar los headers que utilizan las secciones por separados -->
    {{-- @yield('include-header') --}}
    @livewireStyles
</head>

<body data-bs-theme="dark" style="height: 100%; box-sizing: border-box;}"> <!-- para hacer pruebas lo dejamos en dark-->
{{-- <body style="height: 100%; box-sizing: border-box;}"> <!-- para hacer pruebas lo dejamos en dark--> --}}

    <!-- yield es una seccion que recibe contenido desde donde se llame con "section('contenido')" -->
    @yield('contenido')

    @livewireScripts
</body>

</html>

<!-- Traemos la estructura que se encuentra en Layout -->
@extends('layouts.estructura')

<!-- CSS -->
@section('include-header')
    <!-- si necesitaramos css -->
    <!-- <link rel="stylesheet" href={{ asset('css/home.css') }}> -->

@endsection

<!-- Se inserta el titulo en la pestaña -->
@section('title', 'CRUD Articulos')

<!-- Contenido que se agrega a la seccion "contenido" en layout -->
@section('contenido')

   @livewire('lwarticulos-create')

@endsection


@section('includes-foot')
<!-- si necesitaramos js -->
<!--    <script src='{{ asset('js/articulos/index.js') }}'></script>-->

@endsection

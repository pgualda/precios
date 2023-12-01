<!-- Traemos la estructura que se encuentra en Layout -->
@extends('layouts.estructura')

<!-- CSS -->
@section('include-header')
    <!-- si necesitaramos css -->
    <!-- <link rel="stylesheet" href={{ asset('css/home.css') }}> -->

@endsection

<!-- Se inserta el titulo en la pestaña -->
@section('title', 'Importa precios')

<!-- Contenido que se agrega a la seccion "contenido" en layout -->
@section('contenido')

    @livewire('lwarticulos-upload')

@endsection


@section('includes-foot')
    <script>
        $(() => {
            $('button').on('click', e => {
                let spinner = $(e.currentTarget).find('span')
                spinner.removeClass('d-none')
                setTimeout(_ => spinner.addClass('d-none'), 3000)
            })
        })
    </script>
    <!-- si necesitaramos js -->
    <!--    <script src='{{ asset('js/articulos/index.js') }}'></script>
@endsection

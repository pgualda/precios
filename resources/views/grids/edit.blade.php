<!-- Traemos la estructura que se encuentra en Layout -->
@extends('layouts.estructura')

<!-- CSS -->
@section('include-header')
    <!-- si necesitaramos css -->
    <!-- <link rel="stylesheet" href={{ asset('css/home.css') }}> -->

@endsection

<!-- Se inserta el titulo en la pestaña -->
@section('title', 'CRUD Grids')

<!-- Contenido que se agrega a la seccion "contenido" en layout -->
@section('contenido')

    @livewire('lwgrids-edit', ['id' => $grid_id])

@endsection


@section('includes-foot')
    <!-- si necesitaramos js -->
    <!--    <script src='{{ asset('js/articulos/index.js') }}'></script>-->
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showCloseButton: true,
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: false,
            showClass: {
                backdrop: 'swal2-noanimation', // disable backdrop animation
                popup: '', // disable popup animation
                icon: '' // disable icon animation
            },
            hideClass: {
                popup: '', // disable popup fade-out animation
            },
        });

    </script>
@endsection

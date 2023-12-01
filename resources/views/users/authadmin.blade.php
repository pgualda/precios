<!-- Traemos la estructura que se encuentra en Layout -->
@extends('layouts.estructura')

{{-- CSS --}}
@section('include-header')
    {{-- <link rel="stylesheet" href="css/asigrol.css"> x ahora no hay css --}}

    <!-- esta opcion es para el admin -->
@section('title', 'Autorizacion de usuarios')

<!-- Contenido que se agrega a la seccion "contenido" en layout -->
@section('contenido')
<div class="container2 justify-content-center row m-0">
    <div class="row justify-content-center">
        <!-- TITULO -->
        <h1 class="text-white text-center mb-5">Autorizacion de usuarios</h1>
        <!-- TABLA -->
        <div class="col-lg-11 col-md-11 bg-light rounded-3">
            <div class="p-2">
                <button class="btn btn-outline btn-primary" id="download-csv">
                    <i class="bi bi-arrow-bar-down"></i>
                    CSV</button>
                <button class="btn btn-outline btn-primary" id="download-xlsx">
                    <i class="bi bi-arrow-bar-down"></i>
                    XLSX</button>
                <button class="btn btn-outline btn-primary" id="download-pdf">
                    <i class="bi bi-arrow-bar-down"></i>
                    PDF</button>
                <div id="authadmin" class="text-dark"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('includes-foot')
    <script src="{{ asset('js/user/authadmin.js') }}"></script>
@endsection

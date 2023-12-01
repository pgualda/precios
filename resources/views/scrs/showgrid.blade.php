<!-- Traemos la estructura que se encuentra en Layout -->
@extends('layouts.grid')

<!-- Se inserta el titulo en la pestaña -->
@section('title', 'Display Prueba')

<!-- Contenido que se agrega a la seccion "contenido" en layout -->
@section('contenido')

   @livewire('LWDisplayRender',compact('grid_id','scr_id'))

@endsection


<!-- si necesitaramos js -->
<!--    <script src='{{ asset('js/scr/index.js') }}'></script>

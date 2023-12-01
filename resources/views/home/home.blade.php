<!-- Traemos la estructura que se encuentra en Layout -->
@extends('layouts.estructura')

<!-- CSS -->
@section('include-header')
    <link rel="stylesheet" href={{ asset('css/home.css') }}>
@endsection

<!-- Se inserta el titulo en la pestaña -->
@section('title', 'Home')

<!-- Contenido que se agrega a la seccion "contenido" en layout -->
@section('contenido')
    @if (Route::has('login'))
        @auth
            @hasanyrole('Encargado|Precios|SuperAdmin|Admin|Encargado a validar|Precios a validar')
                {{-- x ahora no hace nada --}}
            @else
                <div class="d-flex justify-content-center mb-5">
                    <div class="card  border border-warning rounded">
                        <div class="card-body">
                            <h3>Datos complementarios de registro</h3>
                            @if (Auth::user()->procesooka !== null && Auth::user()->procesooka !== 0)
                                <p class="font-weight-bold">sus datos fueron rechazados, por favor reingreselos</p>
                            @endif
                            <form action="{{ route('users.authdatos', Auth::user()->id) }}" class="row p-3 m-0" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-sm-4  mt-2 form-floating">
                                    <select class="form-select" id="rolProvId" name="rolProvId">
                                        <option value="5" selected>Encargado</option>
                                        <option value="6">Precios</option>
                                    </select>
                                    <label class="label " for="rolProvId">
                                        <i class="bi bi-person-rolodex"></i>
                                        Rol
                                    </label>
                                </div>
                                <div class="col-2 mt-2 align-middle d-flex">
                                    <input class="btn btn-primary" type="submit" value="Enviar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endhasanyrole
        @endauth
    @endif

    <div class="d-flex justify-content-center mb-2">
        <p class="h2 m-3">Pantallas disponibles</p>
    </div>
    <div class="d-flex justify-content-center mb-2">
        <div class="card">

            @if ($scrs->count())

                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Sector</th>
                            <th>Grid por defecto</th>
                            <th>Imagen</th>
                            <th>Grid alternativa</th>
                        </thead>
                        @foreach ($scrs as $scr)
                            <tr wire:key="{{ $scr->id }}">
                                <td class="align-middle">{{ $scr->id }}</td>
                                <td class="align-middle">
                                    <a class="" href="{{ route('scrs.showscr', $scr->id) }}" target="_blank"
                                        style="text-decoration: none;">
                                        {{ $scr->nombre }}
                                    </a>
                                </td>
                                <td class="align-middle">{{ $scr->sector->nombre }}</td>
                                <td class="align-middle">
                                    {{ $scr->grid_id }}{{ ' - ' }}{{ $scr->grid->nombre }}
                                </td>
                                <td class="align-middle">
                                    @if ($scr->grid->id)
                                        <a class="" href="" style="text-decoration: none;">
                                            <img src="{{ asset($scr->grid->img_file) }}" class="" height="80px"
                                                style="object-fit:cover;"></a>
                                    @else
                                        <a class="" href="" style="text-decoration: none;">
                                            <img src="{{ asset('grids/nodefault.jpg') }}" class="" height="80px"
                                                style="object-fit:cover;"></a>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <span>
                                        <small>
                                            @if ($scr->activa_alt)
                                                <a class="" href="" style="text-decoration: none;">
                                                    {{ $scr->grid_alt_id .' - DD:' . Carbon\Carbon::parse($scr->fdd)->format('d M Y') . ' HH:' .Carbon\Carbon::parse($scr->fhh)->format('d M Y') }}</a>
                                            @else
                                                Desactivada
                                            @endif
                                        </small>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @else
                <div class="px-6 py-4">Sin datos</div>
            @endif
        </div>
    </div>

@endsection


@section('includes-foot')
    <!--    <script src='{{ asset('js/home/home.js') }}'></script>
                                        <script src="js/user/datosauth.js" type="module"></script> -->
@endsection

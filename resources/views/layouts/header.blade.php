<!-- Barra de navegacion -->
<!-- <nav class="navbar navbar-dark mb-5" style="background: #406060;" id="header"> -->
<nav class="navbar navbar-dark mb-5 bg-secondary" style="--bs-bg-opacity: .3;" id="header">
    <!-- style="--bs-bg-opacity: .5;" -->
    <div class="container-fluid">
        <div class="d-block">
            <div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" id="boton_menu"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                    <li><a class="nav-link" href="{{ route('home.index') }}">Home</a></li>
                    <li>
                        @if (Route::has('login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                @auth
                                    <a class="nav-link" href="{{ route('logout') }}"
                                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Salir</a>
                                @else
                                    <a class="nav-link" href="{{ route('login') }}"
                                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Ingresar</a>
                                    @if (Route::has('register'))
                                        <a class="nav-link" href="{{ route('register') }}"
                                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrarse</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </li>
                    @auth
                        @can('PermisoAdmin')
                            <li>
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">Usuarios</a>
                                <ul class="dropdown-menu z-1 position-absolute">
                                    <li><a class="dropdown-item prueba7" href="{{ route('users.index') }}">
                                            <i class="bi-file-earmark-person"></i> Usuarios / Roles</a></li>
                                </ul>
                            </li>
                        @endcan
                        @can('PermisoPrecios')
                            <li>
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false"> Articulos</a>
                                <ul class="dropdown-menu z-2 position-absolute">
                                    <li><a class="dropdown-item prueba8" href="{{ route('articulos.index') }}">
                                            <i class="bi-receipt-cutoff"></i> CRUD articulos</a></li>
                                    <li><a class="dropdown-item prueba9" href="{{ route('articulos.upload') }}">
                                            <i class="bi-filetype-txt"></i> Importar precios</a></li>
                                </ul>
                            </li>
                        @endcan
                        @can('PermisoEncargado')
                            <li>
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false"> Grids y Pantallas</a>
                                <ul class="dropdown-menu z-2 position-absolute">
                                    <li><a class="dropdown-item prueba8" href="{{ route('grids.index') }}">
                                            <i class="bi-receipt-cutoff"></i> CRUD Grids</a></li>
                                    <li><a class="dropdown-item prueba9" href="{{ route('scrs.index') }}">
                                            <i class="bi bi-projector"></i> Pantallas carteleria</a></li>
                                    {{-- <li><a class="dropdown-item prueba9" href="{{ route('') }}">
                                            <i class="bi-filetype-txt"></i> Monitor Pantallas</a></li> --}}
                                </ul>
                            </li>
                        @endcan
                    @endauth
                </ul>
            </div>
        </div>
        <div class="card">
            @if (Route::has('login'))
                @auth
                    <div class="card">
                        <div class="p-1">
                            <span>Usuario: {{ Auth::user()->name }} </span>
                        </div>
                    </div>
                    @hasanyrole('Encargado|Admin|SuperAdmin|Precios')
                        {{-- x ahora no hace nada --}}
                    @else
                        <div class="card">
                            <div class="card-body">
                                <span class="font-weight-bold">Proceso de autorizacion pendiente</span>
                            </div>
                        </div>
                    @endhasanyrole
                @endauth
            @endif
            <div class="">
                <span style="display: inline-block;" id="titulo_pagina">
                    <h3>Precios Frescos</h3>
                </span>
                <img src="{{ asset('img/logo.png') }}" id="logo_pagina" alt="logo de la pagina">
            </div>
        </div>
    </div>
</nav>

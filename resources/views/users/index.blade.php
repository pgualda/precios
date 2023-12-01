<!-- Traemos la estructura que se encuentra en Layout -->
@extends('layouts.estructura')

{{-- CSS --}}
@section('include-header')
    {{-- <link rel="stylesheet" href="css/asigrol.css"> x ahora no hay css --}}

    <!-- esta opcion es para el super admin -->
@section('title', 'Asignar roles')

<!-- Contenido que se agrega a la seccion "contenido" en layout -->
@section('contenido')
    <!-- TITULO -->
    <div class="container card">
        <div class="text-center text-white mt-5 mb-5">
            <h1>Usuarios / Roles</h1>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead class="text-primary">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Roles</th>
                    <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @forelse ($user->roles as $role)
                                {{--  si no es admin --}}
                                @if ($user->id > 2)
                                    <td>
                                        {{-- <span class="badge badge-info">{{ $role->name }}</span> --}}
                                        <span class="">{{ $role->name }}</span>
                                    </td>
                                    <td class="td-actions text-right">
                                        @if ($role->name == 'Encargado a validar' || $role->name == 'Precios a validar')
                                            <div class="btn-group">
                                                <a href="{{ route('users.confirmdatos', [$user->id, $role->id]) }}"
                                                    class="btn btn-success btn-sm">
                                                    <span class="material-icons">Confirmar</span></a>
                                                <a href="{{ route('users.confirmdatos', [$user->id, 0]) }}"
                                                    class="btn btn-danger btn-sm">
                                                    <span class="material-icons">Rechazar</span></a>
                                            </div>
                                        @else
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                                <span class="material-icons">editar</span></a>
                                        @endif
                                    </td>
                                @else
                                    {{-- sino ponemos las dos columnas en blanco   --}}
                                    <td></td>
                                    <td></td>
                                @endif
                            @empty
                                <span class="badge badge-danger">No roles</span>
                            @endforelse
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('includes-foot')
    <script src="{{ asset('js/user/user.js') }}"></script>
@endsection

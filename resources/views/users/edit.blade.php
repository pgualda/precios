<!-- Traemos la estructura que se encuentra en Layout -->
@extends('layouts.estructura')

{{-- CSS --}}
@section('include-header')
    {{-- <link rel="stylesheet" href="css/asigrol.css"> --}}

    <!-- Se inserta el titulo en la pestaña -->
@section('title', 'Asignar roles')

<!-- Contenido que se agrega a la seccion "contenido" en layout -->
@section('contenido')

    <div class="container">
        <div class="card body">
            <h4>Roles usuario {{ $user->name }}</h4>
            <form action="{{ route('users.update', [$user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('PUT') --}}
                <select name="roles[]" id="roles" class="form-control select2"> {{-- multiple="multiple" required> --}}
                    @foreach ($roles as $id => $roles)
                        <option value="{{ $id }}"
                            {{ in_array($id, old('roles', [])) ||(isset($user) &&$user->roles()->pluck('name', 'id')->contains($id))? 'selected': '' }}>
                            {{ $roles }}</option>
                    @endforeach
                </select>
                @if ($errors->has('roles'))
                    <em class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </em>
                @endif
                <div style="margin: 10px;" >
                    <input class="btn btn-primary" type="submit"
                      value="Grabar" style="display: inline-block;">
                </div>
            </form>
    </div>
    </div>


@endsection

@section('includes-foot')
    <script src="{{ asset('js/user/user.js') }}"></script>
@endsection

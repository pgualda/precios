<div>
    <div class="container card " id="articuloindex">
        <div class="text-center text-white mt-5 mb-2">
            <h1>Articulos</h1>
        </div>
        <div class="d-flex justify-content-between">
            <div class="p-2">
                <input type="text" name="buscador" wire:model.live="search" placeholder="buscar articulos...">
            </div>
            <div class="p-2">
                <a class="btn btn-primary" href="{{ route('articulos.create') }}">Agregar</a>
            </div>
        </div>
        @if ($articulos->count())
            <div class="table-responsive">
                <table class="table">
                    <thead class="text-primary">
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Nombre Grid</th>
                        <th>Precio</th>
                        <th>Sector</th>
                        <th>Acciones</th>
                    </thead>
                    @foreach ($articulos as $articulo)
                        {{-- {{$articulo}} --}}
                        <tr wire:key="{{ $articulo->id }}">
                            <td>{{ $articulo->codart }}</td>
                            <td>{{ $articulo->nombre }}</td>
                            <td>{{ $articulo->nombregrid }}</td>
                            <td>{{ $articulo->precio }}</td>
                            <td>{{ $articulo->sector->nombre }}</td>
                            {{-- <td><button class="btn btn-danger btn-sm"
                                    wire:click="confirmaDelete({{ $articulo->id }})">
                                Borra</button>
                            </td> --}}
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-danger btn-sm"
                                        wire:click="confirmaDelete({{ $articulo->id }})">
                                        Borra</button>
                                    <a href="{{ route('articulos.edit', $articulo->id) }}"
                                        class="btn btn-warning btn-sm">
                                        Edita</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $articulos->links() }}
            </div>
        @else
            <div class="px-6 py-4">Sin datos</div>
        @endif
    </div>
</div>

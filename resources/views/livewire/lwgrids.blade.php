<div>
    <div class="container card " id="gridindex">
        <div class="text-center text-white mt-5 mb-2">
            <h1>Grids</h1>
        </div>
        <div class="d-flex justify-content-between">
            <div class="p-2">
                <input type="text" name="buscador" wire:model.live="search" placeholder="buscar en grids...">
            </div>
            <div class="p-2">
                <button class="btn btn-primary btn-sm" wire:click="agregarGrid()">
                    Crear Grid</button>
                {{-- <a class="btn btn-primary" href="{{ route('articulos.create') }}">Agregar</a> --}}
            </div>
        </div>
        @if ($grids->count())
            <div class="table-responsive">
                <table class="table">
                    <thead class="text-primary">
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Sector</th>
                        <th>Visualizar</th>
                        <th>Acciones</th>
                    </thead>
                    @foreach ($grids as $grid)
                        {{-- {{$articulo}} --}}
                        <tr wire:key="{{ $grid->id }}">
                            <td class="align-middle">{{ $grid->id }}</td>
                            <td class="align-middle">{{ $grid->nombregrid }}</td>
                            {{-- <td class="align-middle">{{ $grid->nombregrid }}</td> --}}
                            <td class="align-middle">{{ $grid->nombresector }}</td>
                            <td class="align-middle">
                                <a class="" href="{{ route('scrs.showgrid', $grid->id) }}" target="_blank"
                                    style="text-decoration: none;">
                                    <img src="{{ asset($grid->img_file) }}" class="" height="80px"
                                        style="object-fit:cover;"></a>
                            </td>
                            <td class="align-middle">
                                <div class="btn-group">
                                    <button class="btn btn-danger btn-sm {{ $grid->id < 2 ? 'disabled' : '' }}"
                                        wire:click="confirmaDelete({{ $grid->id }})">
                                        Borra</button>
                                    <a href="{{ route('grids.edit', $grid->id) }}" class="btn btn-warning btn-sm">
                                        Edita</a>
                                    <button class="btn btn-secondary btn-sm {{ $grid->id < 2 ? 'disabled' : '' }}"
                                        wire:click="duplicar({{ $grid->id }})">
                                        Duplicar</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $grids->links() }}
            </div>
        @else
            <div class="px-6 py-4">Sin datos</div>
        @endif
    </div>
</div>

<div>

    <div class="container card " id="edit">
        <div class="text-center text-white mt-5 mb-2">
            <h1>Editar articulos</h1>
        </div>
        {{-- <form class="row p-3 m-0" id="altaarticulo" action="{{ route('articulos.store') }}" method="POST" novalidate>
            @csrf --}}
        {{-- <form class="row p-3 m-0" id="altaarticulo" novalidate> --}}
        <form wire:submit.prevent="submit">
            <div class="mb-3"> <!-- codigo articulo -->
                <div class="row">
                    <div class="col-3 text-end">
                        <label class="form-label mt-1" for="codart">Cod.Articulo</label>
                    </div>
                    <div class="col-3">
                        <input class="form-control" placeholder="Codigo Articulo" name="codart" type="text"
                            id="codart" maxlength="6" wire:model="codart" value="{{ old('codart') }}"
                            disabled>
                    </div>
                    <div class="col-6">
                        @error('codart')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3"> <!-- nombre -->
                <div class="row">
                    <div class="col-3 text-end">
                        <label class="form-label mt-1" for="nombre">Nombre</label>
                    </div>
                    <div class="col-5">
                        <input class="form-control" placeholder="nopmbre" name="nombre" type="text" id="nombre"
                            maxlength="50" wire:model="nombre">
                    </div>
                    <div class="col-4">
                        @error('nombre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3"> <!-- nombre grid -->
                <div class="row">
                    <div class="col-3 text-end">
                        <label class="form-label mt-1" for="nombregrid">Nombre Grid</label>
                    </div>
                    <div class="col-5">
                        <input class="form-control" placeholder="Nombre grid" name="nombregrid" type="text"
                            id="nombregrid" maxlength="50" wire:model="nombregrid">
                    </div>
                    <div class="col-4">
                        @error('nombregrid')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3"> <!-- precio -->
                <div class="row">
                    <div class="col-3 text-end">
                        <label class="form-label mt-1" for="precio">Precio</label>
                    </div>
                    <div class="col-3">
                        <input class="form-control" placeholder="Precio" name="precio" type="number" step="any" id="precio"
                            maxlength="10" wire:model="precio">
                    </div>
                    <div class="col-6">
                        @error('precio')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3"> <!-- sector -->
                <div class="row">
                    <div class="col-3 text-end">
                        <label class="form-label mt-1" for="sector">Sector</label>
                    </div>
                    <div class="col-3">
                        {{-- <input class="form-control" placeholder="Sector" name="sector" type="number" id="sector"
                            maxlength="10" wire:model="sector_id"> --}}
                        <select class="form-select rounded-lg" name="sector" wire:model="sector_id">
                            <option value="">Seleccionar...</option>
                            @foreach ($sectorArt as $sector)
                                <option value="{{ $sector->id }}">{{ $sector->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        @error('sector_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- botones -->
            <div class="mb-3">
                <div class="row">
                    <div class="col-6 text-end">
                        <button class="btn btn-secondary text-end" wire:click="cancelarArticulos">Cancelar</button>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary" type="submit">Guardar Datos</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

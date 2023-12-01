<div wire:poll.5000ms>
    <div class="container card " id="scrindex">
        <div class="text-center text-white mt-5 mb-2">
            <h1>Pantallas de Carteleria</h1>
        </div>
        <div class="d-flex justify-content-between">
            <div class="p-2">
                {{-- <input type="text" name="buscador" wire:model.live="search" placeholder="buscar en grids..."> --}}
            </div>
            <div class="p-2">
                <button class="btn btn-primary btn-sm {{ $this->disabledButton ? 'disabled' : '' }}"
                    wire:click="agregarScr()">
                    Crear Pantalla</button>
                {{-- <a class="btn btn-primary" href="{{ route('articulos.create') }}">Agregar</a> --}}
            </div>
        </div>
        @if ($scrs->count())
            <div class="table-responsive">
                <table class="table">
                    <thead class="text-primary">
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Sector</th>
                        <th>Grid por defecto</th>
                        <th>Visualizar</th>
                        <th>Grid alternativa</th>
                        <th>Ultima actualizacion</th>
                        <th>Acciones</th>
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
                                    <a class="" href="{{ route('scrs.showgrid', $scr->grid->id) }}"
                                        target="_blank" style="text-decoration: none;">
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
                                            <a class="" href="{{ route('scrs.showgrid', $scr->grid_alt_id) }}"
                                                target="_blank" style="text-decoration: none;">
                                                {{-- <img src="{{ asset($scr->grid_alt_id->img_file) }}" class="" height="80px"
                                                style="object-fit:cover;"></a> --}}
                                                {{-- $createdAt = Carbon::parse($item['created_at']);
                                                $suborder['payment_date'] = $createdAt->format('M d Y'); --}}
                                                {{ $scr->grid_alt_id .' - DD:' . Carbon\Carbon::parse($scr->fdd)->format('d M Y') . ' HH:' .Carbon\Carbon::parse($scr->fhh)->format('d M Y') }}</a>
                                        @else
                                            Desactivada
                                        @endif
                                    </small>
                                </span>
                            </td>
                            <td class="align-middle {{ $this->hourToNow($scr->ultimo_render)['color'] }}">
                                {{ $this->hourToNow($scr->ultimo_render)['horas'] }}
                            </td>

                            <td class="align-middle">
                                <div class="btn-group">
                                    <button
                                        class="btn btn-danger btn-sm  {{ $this->disabledButton ? 'disabled' : '' }}"
                                        wire:click="confirmaDelete({{ $scr->id }})">
                                        Borra</button>
                                    <button
                                        class="btn btn-warning btn-sm {{ $this->disabledButton ? 'disabled' : '' }}"
                                        wire:click="showEditaScr({{ $scr->id }})">
                                        Edita</button>
                            </td>
                        </tr>
                    @endforeach
                </table>
                @if ($editScr > 0)
                    <div class="card py-2 mt-2" id="editScr">
                        <form wire:submit.prevent="submitScr">
                            <div class="mb-1"> <!-- nombre -->
                                <div class="row d-flex align-items-center">
                                    <div class="col-3 text-end">
                                        <label class="form-label mt-1" for="nombre">Pantalla
                                            {{ $scr->id }}</label>
                                    </div>
                                    <div class="col-5">
                                        <input class="form-control" placeholder="nombre" name="nombre" type="text"
                                            id="nombre" maxlength="50" wire:model="scr.nombre">
                                    </div>
                                    <div class="col-4">
                                        @error('nombre')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-1"> <!-- sector -->
                                <div class="row">
                                    <div class="col-3 text-end">
                                        <label class="form-label mt-1" for="sector">Sector</label>
                                    </div>
                                    <div class="col-3">
                                        <select class="form-select rounded-lg" name="sector" id="sector"
                                            wire:model.change="scr.sector_id" wire:change="changeSector">
                                            <option value="">Seleccionar...</option>
                                            @foreach (\App\Models\Sector::all() as $sector)
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
                            <!-- solo propone las grids del sector -->
                            <div class="mb-1"> <!-- grids del sector -->
                                <div class="row">
                                    <div class="col-3 text-end">
                                        <label class="form-label mt-1" for="sector">Grid por defecto</label>
                                    </div>
                                    <div class="col-3">
                                        <select class="form-select rounded-lg" name="sector" id="sector"
                                            wire:model="scr.grid_id">
                                            <option value="">Seleccionar...</option>
                                            @foreach (\App\Models\Grid::where('sector_id', $this->scr->sector_id)->get() as $grid)
                                                {{-- <!-- @foreach ($gridSectors as $grid) --> --}}
                                                <option value="{{ $grid->id }}">{{ $grid->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        @error('scr.grid_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-1"> <!-- activa_alt -->
                                <div class="row d-flex align-items-center">
                                    <div class="col-3 text-end">
                                        <label class="form-label mt-1" for="activa_alt">Activa Grid Alternativa</label>
                                    </div>
                                    <div class="col-5 form-check form-switch">
                                        <input class="form-check-input" name="activa_alt" type="checkbox"
                                            id="activa_alt" wire:model="scr.activa_alt"
                                            {{ $scr->activa_alt ? 'checked' : '' }}>
                                    </div>
                                    <div class="col-4">
                                        @error('activa_alt')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- solo propone las grids del sector -->
                            <div class="mb-1"> <!-- sector -->
                                <div class="row">
                                    <div class="col-3 text-end">
                                        <label class="form-label mt-1" for="sector">Grid alternativa</label>
                                    </div>
                                    <div class="col-3">
                                        <select class="form-select rounded-lg" name="sector" id="sector"
                                            wire:model="scr.grid_alt_id">
                                            <option value="">Seleccionar...</option>
                                            @foreach (\App\Models\Grid::where('sector_id', $this->scr->sector_id)->get() as $grid)
                                                <option value="{{ $grid->id }}">{{ $grid->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        @error('scr.grid_alt_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-1"> <!-- fdd -->
                                <div class="row d-flex align-items-center">
                                    <div class="col-3 text-end">
                                        <label class="form-label mt-1" for="fdd">Fecha desde</label>
                                    </div>
                                    <div class="col-2">
                                        <input class="form-control" name="fdd" type="date" id="fdd"
                                            wire:model="scr.fdd">
                                    </div>
                                    <div class="col-4">
                                        @error('fdd')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-1"> <!-- fhh -->
                                <div class="row d-flex align-items-center">
                                    <div class="col-3 text-end">
                                        <label class="form-label mt-1" for="fhh">Fecha hasta</label>
                                    </div>
                                    <div class="col-2">
                                        <input class="form-control" name="fhh" type="date" id="fhh"
                                            wire:model="scr.fhh">
                                    </div>
                                    <div class="col-4">
                                        @error('fhh')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- botones -->
                            <div class="mb-1">
                                <div class="row">
                                    <div class="col-6 text-end">
                                        <button type="button" class="btn btn-secondary text-end"
                                            wire:click="cancelarScr">Cancelar</button>
                                    </div>
                                    <div class="col-3">
                                        <button class="btn btn-primary" type="submit">Guardar Datos</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        @else
            <div class="px-6 py-4">Sin datos</div>
        @endif
    </div>
</div>

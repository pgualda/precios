<div>
    <div class="container card " id="edit">
        <div class="container-fluid">
            <!--titulo grid-->
            <div class="row mt-2 mb-0 py-3  rounded d-flex flew-box" style="background-color:rgb(44, 101, 128);">
                <div class="col-1 justify-items-center">
                    <div style="text-align: center;">
                        <img class="rounded img-fluid" src="{{ asset('img/rowcol1.jpg') }}">
                        <small>Grid</small>
                    </div>
                </div>
                <div class="col-9">
                    <div class="row d-flex align-items-center"> <!-- datos que se muestran -->
                        <div class="col-4">
                            <span class="h4">{{ $grid->id }} - {{ $grid->nombre }}</span>
                        </div>
                        <div class="col-3">
                            <a class="" href="{{ route('scrs.showgrid', $grid->id) }}" target="_blank"
                                style="text-decoration: none;">
                                <img src="{{ asset($grid->img_file) }}" class="" height="80px"
                                    style="object-fit:cover;"></a>
                        </div>
                        <div class="col-3 px-1 py-2 btn-group">
                            <button class="btn btn-warning btn-sm {{ $this->disabledButton ? 'disabled' : '' }}"
                                wire:click="showEditaGrid({{ $grid->id }})">
                                Edita</button>
                            <button class="btn btn-primary btn-sm {{ $this->disabledButton ? 'disabled' : '' }}"
                                wire:click="addRow()">
                                Agrega Fila</button>
                            <a href="{{ route('grids.index') }}"
                                class="btn btn-info btn-sm {{ $this->disabledButton ? 'disabled' : '' }}">
                                Salir</a>
                        </div>
                    </div>
                    @if ($editGrid > 0)
                        <div class="card py-2 mt-2" id="editGrid">
                            <form wire:submit.prevent="submitGrid">
                                <div class="mb-1"> <!-- nombre -->
                                    <div class="row d-flex align-items-center">
                                        <div class="col-3 text-end">
                                            <label class="form-label mt-1" for="nombreGrid">Grid
                                                {{ $grid->id }}</label>
                                        </div>
                                        <div class="col-5">
                                            <input class="form-control" placeholder="nombre" name="nombreGrid"
                                                type="text" id="nombreGrid" maxlength="50" wire:model="nombre">
                                        </div>
                                        <div class="col-4">
                                            @error('nombre')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1"> <!-- Color de fondo -->
                                    <div class="row">
                                        <div class="col-3 text-end">
                                            <label class="form-label" for="background">Color Fondo</label>
                                        </div>
                                        <div class="col-3">
                                            <input class="form-control form-control-color" name="background"
                                                type="color" id="background" wire:model="background">
                                        </div>
                                        <div class="col-4">
                                            @error('background')
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
                                                wire:model="sector_id">
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
                                <div class="mb-2"> <!-- CAptura pantalla -->
                                    <div class="row d-flex align-items-center">
                                        <div class="col-3 text-end">
                                            <label class="form-label mt-1" for="captura">Imagen</label>
                                        </div>
                                        <div class="col-3">
                                            <input type="file" class="form-control" id="captura"
                                                wire:model="captura">
                                            <div wire:loading wire:target="captura">Subiendo...</div>
                                        </div>
                                        <div class="col-4">
                                            @if ($captura)
                                                <img src="{{ $captura->temporaryUrl() }}" height="80px">
                                            @else
                                                <img src="{{ asset($grid->img_file) }}" height="80px">
                                            @endif
                                        </div>
                                        <div class="col-2">
                                            @error('captura')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2"> <!-- imagen de fondo -->
                                    <div class="row d-flex align-items-center">
                                        <div class="col-3 text-end">
                                            <label class="form-label mt-1" for="capturaFondo">Img Fondo</label>
                                        </div>
                                        <div class="col-3">
                                            <input type="file" class="form-control" id="capturaFondo"
                                                wire:model="captura_fondo">
                                            <div wire:loading wire:target="captura_fondo">Subiendo...</div>
                                        </div>
                                        <div class="col-4">
                                            @if ($captura_fondo)
                                                <img src="{{ $captura_fondo->temporaryUrl() }}" height="80px">
                                            @else
                                                <img src="{{ asset($grid->img_fondo) }}" height="80px">
                                            @endif
                                        </div>
                                        <div class="col-2">
                                            @error('captura_fondo')
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
                                                wire:click="cancelarGrid">Cancelar</button>
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
            </div>
        </div>
        <!-- aca muestra las cols, las rows y los elements -->
        @if ($grid->rows->count())
            <div class="container-fluid">
                @foreach ($grid->rows as $row)
                    <div class="row mt-1 pt-3  rounded d-flex flew-box align-items-center"
                        style="background-color:rgb(54, 54, 54);">
                        <div class="col-1  align-self-start justify-items-center">
                            <div style="text-align: center;">
                                <img class="rounded img-fluid" src="{{ asset('img/row1.jpg') }}">
                                <small>Fila</small>
                            </div>
                        </div>
                        <div class="col-9">
                            <table class="table"> <!-- tabla de row-->
                                <thead class="">
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>% Altura</th>
                                    <th>Color de fondo</th>
                                    <th>Color de borde</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                    <tr wire:key="{{ $row->id }}">
                                        <td class="align-middle">{{ $row->id }}</td>
                                        <td class="align-middle">{{ $row->nombre }}</td>
                                        <td class="align-middle blockquote"><span class="rounded p-1"
                                                style="background-color:rgb(116, 116, 116);">{{ $row->st_height }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <span class="rounded p-1"
                                                style="background:{{ $row->st_background }}">{{ $row->st_background }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <span class="rounded p-1"
                                                style="background:{{ $row->st_border_color }}">{{ $row->st_border_color }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <div class="btn-group">
                                                <button
                                                    class="btn btn-danger btn-sm {{ $this->disabledButton || ($grid->id < 2 && $row->id < 2) ? 'disabled' : '' }}"
                                                    wire:click="confirmaDeleteRow({{ $row->id }})">
                                                    Borra</button>
                                                <button
                                                    class="btn btn-warning btn-sm {{ $this->disabledButton ? 'disabled' : '' }}"
                                                    wire:click="showEditaRow({{ $row->id }})">
                                                    Edita</button>
                                                <button
                                                    class="btn btn-primary btn-sm {{ $this->disabledButton ? 'disabled' : '' }}"
                                                    wire:click="addCol({{ $row->id }})">
                                                    Agrega Columna</button>

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @if ($editRow == $row->id)
                                <!-- form edit row -->
                                <div class="card py-2 mb-2" id="editRow">
                                    <form id="formRow" wire:submit.prevent="submitRow">
                                        <div class="row mb-1"> <!-- nombre / color-->
                                            <div class="col-2 text-end"> <!--nombre -->
                                                <label class="form-label mt-1" for="nombreRow">Fila
                                                    {{ $row->id }}</label>
                                            </div>
                                            <div class="col-3">
                                                <input class="form-control" placeholder="nombre" name="nombreRow"
                                                    type="text" id="nombreRow" maxlength="50"
                                                    wire:model="row.nombre">
                                            </div>
                                            <div class="col-1">
                                                @error('nombreRow')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-2 text-end"> <!-- Color de fondo -->
                                                <label class="form-label mt-1" for="backgroundRow">Color Fondo</label>
                                            </div>
                                            <div class="col-3">
                                                <input class="form-control form-control-color"
                                                    wire:model="row.st_background" name="backgroundRow"
                                                    type="color" id="backgroundRow">
                                            </div>
                                            <div class="col-1">
                                                @error('backgroundRow')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-1"> <!-- by_padding / altura-->
                                            <div class="col-2 text-end"> <!-- by_padding-->
                                                <label class="form-label mt-1" for="paddingRow">Padding 0/5</label>
                                            </div>
                                            <div class="col-2">
                                                <input class="form-control" placeholder="padding" name="paddingRow"
                                                    type="text" id="paddingRow" maxlength="2"
                                                    wire:model="row.bt_padding">
                                            </div>
                                            <div class="col-2">
                                                @error('paddingRow')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-2 text-end"> <!--  altura-->
                                                <label class="form-label mt-1" for="heightRow">Altura (%)</label>
                                            </div>
                                            <div class="col-2">
                                                <input class="form-control" name="heightRow" type="number"
                                                    id="heightRow" min="1" max="{{ $maxRow }}"
                                                    wire:model="row.st_height">
                                            </div>
                                            <div class="col-2">
                                                @error('heightRow')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-1"> <!-- borde estilo  / color-->
                                            <div class="col-2 text-end"> <!--estilo -->
                                                <span><small>Estilo borde</small></span>
                                            </div>
                                            <div class="col-2">
                                                <select wire:model="row.st_border_style" class="form-select">
                                                    <option value="none">Sin borde</option>
                                                    <option value="dotted">Punteado</option>
                                                    <option value="dashed">Guiones</option>
                                                    <option value="solid">Simple</option>
                                                    <option value="double">Doble</option>
                                                    <option value="groove">3d</option>
                                                </select>
                                            </div>

                                            <div class="col-1">
                                                @error('borderStyleRow')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-2 text-end"> <!-- Color de borde -->
                                                <label class="form-label mt-1" for="bordeColorRow">Color Borde</label>
                                            </div>
                                            <div class="col-3">
                                                <input class="form-control form-control-color" name="bordeColorRow"
                                                    type="color" id="bordeColorRow"
                                                    wire:model="row.st_border_color">
                                            </div>
                                            <div class="col-1">
                                                @error('borderColorRow')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-1"> <!-- radio - ancho -->
                                            <div class="col-2 text-end"> <!-- radio borde -->
                                                <label class="form-label mt-1" for="radioBordeRow">Radio Borde</label>
                                            </div>
                                            <div class="col-3">
                                                <input class="form-control" placeholder="radio borde"
                                                    name="radioBordeRow" type="text" id="radioBordeRow"
                                                    maxlength="40" wire:model="row.st_border_radius">
                                            </div>
                                            <div class="col-1">
                                                @error('radioBordeRow')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-2 text-end"> <!-- ancho borde -->
                                                <label class="form-label mt-1" for="anchoBordeRow">Ancho Borde
                                                    0/10</label>
                                            </div>
                                            <div class="col-2">
                                                <input class="form-control" placeholder="Ancho Borde"
                                                    name="anchoBordeRow" type="text" id="anchoBordeRow"
                                                    maxlength="2" wire:model="row.st_border_width">
                                            </div>
                                            <div class="col-2">
                                                @error('anchoBordeRow')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-2"> <!-- botones -->
                                            <div class="row">
                                                <div class="col-6 text-end">
                                                    <button type="button" class="btn btn-secondary text-end"
                                                        wire:click="cancelarRow">Cancelar</button>
                                                </div>
                                                <div class="col-3">
                                                    <button class="btn btn-primary" type="submit">Guardar
                                                        Datos</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                    @if ($row->cols->count())
                        @foreach ($row->cols as $col)
                            <div class="row mt-1 pt-3 rounded d-flex flew-box align-items-center"
                                style="background-color:rgb(79, 80, 80);">
                                <div class="col-1  align-self-start justify-items-center">
                                    <div style="text-align: center;">
                                        <img class="rounded img-fluid" src="{{ asset('img/col1.jpg') }}">
                                        <small>Columna</small>
                                    </div>
                                </div>
                                <div class="col-1">
                                    {{-- <p>Columnas</p>  --}}
                                </div>
                                <div class="col-9">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Ancho (1/12)</th>
                                            <th>Color de fondo</th>
                                            <th>Color de borde</th>
                                            <th>Acciones</th>
                                        </thead>
                                        <tbody>
                                            <tr wire:key="{{ $col->id }}">
                                                <td class="align-middle">{{ $col->id }}</td>
                                                <td class="align-middle">{{ $col->nombre }}</td>
                                                <td class="align-middle blockquote"><span class="rounded p-1"
                                                        style="background-color:rgb(116, 116, 116);">{{ $col->bt_col }}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <span class="rounded p-1"
                                                        style="background:{{ $col->st_background }}">{{ ' ' . $col->st_background . ' ' }}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <span class="rounded p-1"
                                                        style="background:{{ $col->st_border_color }}">{{ ' ' . $col->st_border_color . ' ' }}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="btn-group">
                                                        <button
                                                            class="btn btn-danger btn-sm {{ $this->disabledButton || ($grid->id < 2 && $col->id < 2) ? 'disabled' : '' }}"
                                                            wire:click="confirmaDeleteCol({{ $col->id }})">
                                                            Borra</button>
                                                        <button
                                                            class="btn btn-warning btn-sm {{ $this->disabledButton ? 'disabled' : '' }}"
                                                            wire:click="showEditaCol({{ $col->id }})">
                                                            Edita</button>
                                                        <button
                                                            class="btn btn-primary btn-sm {{ $this->disabledButton ? 'disabled' : '' }}"
                                                            wire:click="addElement({{ $col->id }})">
                                                            Agrega Elemento</button>
                                                        <button
                                                            class="btn btn-secondary btn-sm {{ $this->disabledButton ? 'disabled' : '' }}"
                                                            wire:click="addElementFrom({{ $col->id }})">
                                                            Agrega desde</button>
                                                    </div>
                                                    @if ($resultCopias && $col->id == $copiaCol_id)
                                                        <div>
                                                            <div class="dropdown-menu d-block"
                                                                style="background:rgb(27, 26, 26);">
                                                                @foreach ($resultCopias as $copia)
                                                                    <div class="px-3 p1-1 border-bottom"
                                                                        style="border-block-color: black;border-width:2px;">
                                                                        <div class="d-flex flex-column ml-3">
                                                                            <p wire:click="selectCopia({{ $copia->id }},{{ $col->id }},{{ $row->id }})"
                                                                                class="link-secondary">
                                                                                {{ $copia->text_text }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                                <div class="px-3 p1-1 border-bottom"
                                                                    style="border-block-color: black;border-width:2px;">
                                                                    <div class="d-flex flex-column ml-3">
                                                                        <p wire:click="selectCopia(0,0,0)"
                                                                            class="link-secondary">
                                                                            Ocultar
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    @if ($editCol == $col->id)
                                        <!-- form edit col -->
                                        <div class="card py-2 mb-2" id="editCol">
                                            <form wire:submit.prevent="submitCol">
                                                <div class="row mb-1"> <!-- nombre / color-->
                                                    <div class="col-2 text-end"> <!--nombre -->
                                                        <label class="form-label mt-1"
                                                            for="nombreCol">Columna{{ $row->id }}</label>
                                                    </div>
                                                    <div class="col-3">
                                                        <input class="form-control" placeholder="nombre"
                                                            name="nombreCol" type="text" id="nombreCol"
                                                            maxlength="50" wire:model="col.nombre">
                                                    </div>
                                                    <div class="col-1">
                                                        @error('nombreCol')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-2 text-end"> <!-- Color de fondo -->
                                                        <label class="form-label mt-1" for="backgroundCol">Color
                                                            Fondo</label>
                                                    </div>
                                                    <div class="col-3">
                                                        <input class="form-control form-control-color"
                                                            name="backgroundCol" type="color" id="backgroundCol"
                                                            wire:model="col.st_background">
                                                    </div>
                                                    <div class="col-1">
                                                        @error('backgroundCol')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-1"> <!-- by_padding / col 1/12-->
                                                    <div class="col-2 text-end"> <!-- by_padding-->
                                                        <label class="form-label mt-1" for="paddingCol">Padding
                                                            0/5</label>
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-control" placeholder="padding"
                                                            name="paddingCol" type="text" id="paddingCol"
                                                            maxlength="2" wire:model="col.bt_padding">
                                                    </div>
                                                    <div class="col-2">
                                                        @error('paddingCol')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-2 text-end"> <!--  col 1/12-->
                                                        <label class="form-label mt-1" for="anchoCol">Ancho
                                                            1/12</label>
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-control" placeholder="1/12"
                                                            name="anchoCol" type="number" id="anchoCol"
                                                            min="1" max="{{ $maxCol }}"
                                                            wire:model="col.bt_col">
                                                    </div>
                                                    <div class="col-2">
                                                        @error('anchoCol')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-1"> <!-- borde estilo  / color-->
                                                    <div class="col-2 text-end"> <!--estilo -->
                                                        <span><small>Estilo borde</small></span>
                                                    </div>
                                                    <div class="col-2">
                                                        <select wire:model="col.st_border_style" class="form-select">
                                                            <option value="none">Sin borde</option>
                                                            <option value="dotted">Punteado</option>
                                                            <option value="dashed">Guiones</option>
                                                            <option value="solid">Simple</option>
                                                            <option value="double">Doble</option>
                                                            <option value="groove">3d</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-1">
                                                        @error('borderStyleCol')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-2 text-end"> <!-- Color de borde -->
                                                        <label class="form-label mt-1" for="bordeColorCol">Color
                                                            Borde</label>
                                                    </div>
                                                    <div class="col-3">
                                                        <input class="form-control form-control-color"
                                                            name="bordeColorCol" type="color" id="bordeColorCol"
                                                            wire:model="col.st_border_color">
                                                    </div>
                                                    <div class="col-1">
                                                        @error('borderColorCol')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-1"> <!-- radio - ancho -->
                                                    <div class="col-2 text-end"> <!-- radio borde -->
                                                        <label class="form-label mt-1" for="radioBordeCol">Radio
                                                            Borde</label>
                                                    </div>
                                                    <div class="col-3">
                                                        <input class="form-control" placeholder="radio borde"
                                                            name="radioBordeCol" type="text" id="radioBordeCol"
                                                            maxlength="40" wire:model="col.st_border_radius">
                                                    </div>
                                                    <div class="col-1">
                                                        @error('radioBordeCol')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-2 text-end"> <!-- ancho borde -->
                                                        <label class="form-label mt-1" for="anchoBordeCol">Ancho
                                                            Borde
                                                            0/10</label>
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-control" placeholder="Ancho Borde"
                                                            name="anchoBordeCol" type="text" id="anchoBordeCol"
                                                            maxlength="2" wire:model="col.st_border_width">
                                                    </div>
                                                    <div class="col-2">
                                                        @error('anchoBordeCol')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mt-2"> <!-- botones -->
                                                    <div class="row">
                                                        <div class="col-6 text-end">
                                                            <button type="button" class="btn btn-secondary text-end"
                                                                wire:click="cancelarCol">Cancelar</button>
                                                        </div>
                                                        <div class="col-3">
                                                            <button class="btn btn-primary" type="submit">Guardar
                                                                Datos</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @if ($col->elements->count())
                                <div class="row mt-1 pt-3  rounded d-flex flew-box align-items-center"
                                    style="background-color:rgb(116, 116, 116);">
                                    <div class="col-1 align-self-start justify-items-center"> <!--elementos -->
                                        <div style="text-align: center;">
                                            <img class="rounded img-fluid" src="{{ asset('img/element.jpg') }}">
                                            <small>Elementos</small>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        {{-- <p>Elementos</p> --}}
                                    </div>
                                    <div class="col-9">
                                        <table class="table">
                                            <thead class="thead-light">
                                                <th>Id</th>
                                                <th>item</th>
                                                <th>Altura %</th>
                                                <th>Color de fondo</th>
                                                <th>Color de borde</th>
                                                <th>Acciones</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($col->elements as $element)
                                                    <tr wire:key="{{ $element->id }}">
                                                        <td class="align-middle">{{ $element->id }}</td>
                                                        <td class="align-middle">{{ $element->text_text }}</td>
                                                        <td class="align-middle blockquote"><span class="rounded p-1"
                                                                style="background-color:rgb(116, 116, 116);">{{ $element->st_height }}</span>
                                                        </td>
                                                        <td class="align-middle">
                                                            <span class="rounded p-1"
                                                                style="background:{{ $element->st_background }}">{{ ' ' . $element->st_background . ' ' }}
                                                            </span>
                                                        </td>
                                                        <td class="align-middle">
                                                            <span class="rounded p-1"
                                                                style="background:{{ $element->st_border_color }}">{{ ' ' . $element->st_border_color . ' ' }}
                                                            </span>
                                                        </td>
                                                        <td class="align-middle">
                                                            <div class="btn-group">
                                                                <button
                                                                    class="btn btn-danger btn-sm {{ $this->disabledButton ? 'disabled' : '' }}"
                                                                    wire:click="confirmaDeleteElement({{ $element->id }})">
                                                                    Borra</button>
                                                                <button
                                                                    class="btn btn-warning btn-sm {{ $this->disabledButton ? 'disabled' : '' }}"
                                                                    wire:click="showEditaElement({{ $element->id }})">
                                                                    Edita</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @if ($col->elements->find($editElement))
                                            <!-- form edit element $channels->find(1)-->
                                            <div class="card py-2 mb-2" id="editElement">
                                                <form wire:submit.prevent="submitElement">
                                                    <div class="row mb-2"> <!--buscador articulo-->
                                                        <div class="col-8 text-end">
                                                            <!--codart falta el buscador obvio-->
                                                            <label class="form-label mt-1" for="searchCdoart"><i
                                                                    class="bi bi-search"></i></label>
                                                        </div>
                                                        <div class="col-3">
                                                            <input class="form-control form-control-sm "
                                                                placeholder="buscar articulos" name="searchCdoart"
                                                                type="text" id="searchCdoart" maxlength="20"
                                                                wire:model.live.debounce.500ms="searchCodart">
                                                            @if ($resultArts)
                                                                <div class="dropdown-menu d-block"
                                                                    style="background:rgb(27, 26, 26);">
                                                                    @foreach ($resultArts as $art)
                                                                        <div class="px-3 p1-1 border-bottom"
                                                                            style="border-block-color: black;border-width:2px;">
                                                                            <div class="d-flex flex-column ml-3">
                                                                                <p wire:click="selectArt({{ $art->codart }},'{{ $art->nombregrid }}')"
                                                                                    class="link-secondary">
                                                                                    {{ $art->codart }}-{{ $art->nombregrid }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1"> <!-- codart / text_text-->
                                                        <div class="col-2 text-end">
                                                            <!--codart falta el buscador obvio-->
                                                            <label class="form-label mt-1"
                                                                for="cdoart">Articulo</label>
                                                        </div>
                                                        <div class="col-3">
                                                            <input class="form-control" placeholder="cod.art."
                                                                name="codart" type="text" id="codart"
                                                                maxlength="5" wire:model.live.debounce.500ms="element.codart">
                                                        </div>
                                                        <div class="col-1">
                                                            @error('codart')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-2 text-end"> <!-- text_text -->
                                                            <label class="form-label mt-1"
                                                                for="text_text">Leyenda</label>
                                                        </div>
                                                        <div class="col-3">
                                                            <input class="form-control" name="text_text"
                                                                type="text" id="text_text"
                                                                wire:model="element.text_text">
                                                        </div>
                                                        <div class="col-1">
                                                            @error('text_text')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <!--'element.text_bt_padding' 'element.text_bt_size' => -->
                                                        <div class="col-2 text-end"> <!-- element.text_bt_padding-->
                                                            <label class="form-label mt-1" for="textPE">Padding
                                                                0/5</label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input class="form-control" placeholder="padding"
                                                                name="textPE" type="text" id="textPE"
                                                                maxlength="2" wire:model="element.text_bt_padding">
                                                        </div>
                                                        <div class="col-2">
                                                            @error('textPE')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-2 text-end"> <!--  element.text_bt_size-->
                                                            <label class="form-label mt-1"
                                                                for="textSizeE">H1/H6</label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input class="form-control" placeholder="H1/H6"
                                                                name="textSizeE" type="text" id="textSizeE"
                                                                maxlength="3" wire:model="element.text_bt_size">
                                                        </div>
                                                        <div class="col-2">
                                                            @error('textSizeE')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <!--'element.text_color' 'element.st_height' -->
                                                        <div class="col-2 text-end"> <!-- element.text_color-->
                                                            <label class="form-label mt-1" for="textCE">Color
                                                                Texto</label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input class="form-control form-control-color"
                                                                name="textCE" type="color" id="textCE"
                                                                wire:model="element.text_color">
                                                        </div>
                                                        <div class="col-2">
                                                            @error('textCE')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-2 text-end"> <!--  element.text_st_height-->
                                                            <label class="form-label mt-1" for="textHeightE">%
                                                                Alto(s/col)</label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input class="form-control" name="textHeightE"
                                                                type="number" min="1"
                                                                max="{{ $maxElement }}" id="textHeightE"
                                                                wire:model="element.st_height">
                                                        </div>
                                                        <div class="col-2">
                                                            @error('textHeightE')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <!--'element.st_background','element.st_border_style',-->
                                                        <div class="col-2 text-end"> <!-- 'element.st_background' -->
                                                            <label class="form-label mt-1" for="textCE">Color
                                                                Fondo</label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input class="form-control form-control-color"
                                                                name="textBGE" type="color" id="textBGE"
                                                                wire:model="element.st_background">
                                                        </div>
                                                        <div class="col-2">
                                                            @error('textBGE')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-2 text-end">
                                                            <!--  'element.st_border_style' -->
                                                            <span><small>Estilo borde</small></span>
                                                        </div>
                                                        <div class="col-2">
                                                            <select wire:model="element.st_border_style"
                                                                class="form-select">
                                                                <option value="none">Sin borde</option>
                                                                <option value="dotted">Punteado</option>
                                                                <option value="dashed">Guiones</option>
                                                                <option value="solid">Simple</option>
                                                                <option value="double">Doble</option>
                                                                <option value="groove">3d</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-2">
                                                            @error('textBordeEE')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <!--'element.st_border_width','element.st_border_color',-->
                                                        <div class="col-2 text-end"> <!-- element.st_border_width -->
                                                            <label class="form-label mt-1" for="textBWE">Ancho Borde
                                                                0/10</label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input class="form-control form-control-color"
                                                                name="textBWE" type="number" min="0"
                                                                max="10" id="textBWE"
                                                                wire:model="element.st_border_width">
                                                        </div>
                                                        <div class="col-2">
                                                            @error('textBWE')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-2 text-end">
                                                            <!-- 'element.st_border_color', -->
                                                            <label class="form-label mt-1" for="textBordeCE">Color
                                                                Borde</label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input class="form-control form-control-color"
                                                                name="textBordeCE" id="textBordeCE" type="color"
                                                                wire:model="element.st_border_color">
                                                        </div>
                                                        <div class="col-2">
                                                            @error('textBordeCE')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <!--'element.st_border_radius','element.img_st_height',-->
                                                        <div class="col-2 text-end">
                                                            <!-- 'element.st_border_radius' -->
                                                            <label class="form-label mt-1" for="textBRE">Borde
                                                                Radio</label>
                                                        </div>
                                                        <div class="col-3">
                                                            <input class="form-control" name="textBRE" type="string"
                                                                id="textBRE" wire:model="element.st_border_radius">
                                                        </div>
                                                        <div class="col-1">
                                                            @error('textBRE')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-2 text-end"> <!-- 'element.img_st_height', -->
                                                            <label class="form-label mt-1"
                                                                for="textAIE">%Imagen/Txt</label>
                                                        </div>
                                                        <div class="col-2 d-flex align-items-center">
                                                            <input class="form-control form-control-range"
                                                                type="range" min="0" max="100"
                                                                wire:model="element.img_st_height"
                                                                oninput="textAIEP.value = this.value">
                                                            <output class="px-1"
                                                                id="textAIEP">{{ $element->img_st_height }}</output>
                                                        </div>
                                                        <div class="col-2">
                                                            @error('textBordeCE')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1 d-flex align-items-center">
                                                        <!--'element.img_file','element.img_direction-->
                                                        <div class="col-2 text-end">
                                                            <label class="form-label mt-1"
                                                                for="captura">Imagen</label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input type="file" class="form-control" id="img_fileE"
                                                                wire:model="captura_img">
                                                            <div wire:loading wire:target="captura_img">Subiendo...
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            @if ($captura_img)
                                                                <img src="{{ $captura_img->temporaryUrl() }}"
                                                                    height="80px">
                                                            @else
                                                                <img src="{{ asset($element->img_file) }}"
                                                                    height="80px">
                                                            @endif
                                                        </div>
                                                        <div class="col-1">
                                                            @error('img_fileE')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-1 text-end">
                                                            <!-- 'element.img_direction', -->
                                                            {{-- <label class="form-label mt-1" for="img_vh">V/H</label> --}}
                                                            <span><small>F/C</small></span>
                                                        </div>
                                                        <div class="col-2 d-flex align-items-center">
                                                            <select wire:model="element.img_direction"
                                                                class="form-select">
                                                                <option value="column">Columna</option>
                                                                <option value="row">Fila</option>
                                                            </select>
                                                            {{-- <input class="form-control" type="string"
                                                                wire:model="element.img_direction"> --}}
                                                        </div>
                                                        <div class="col-2">
                                                            @error('img_vh')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <!-- element.img_bt_order'element.img_st_background'-->
                                                        <div class="col-2 text-end"> <!-- element.img_bt_order -->
                                                            <span><small>Txt-Img / Img-Txt</small></span>
                                                            {{-- <label class="form-label mt-1" for="imgOrderE">Img/Txt -
                                                                Txt/Img</label> --}}
                                                        </div>
                                                        <div class="col-2">
                                                            <select wire:model="element.img_bt_order"
                                                                class="form-select">
                                                                <option value="-1">Img-Txt</option>
                                                                <option value="1">Txt-Img</option>
                                                            </select>
                                                            {{-- <input class="form-control" placeholder=""
                                                                name="imgOrderE" type="text" id="imgOrderE"
                                                                wire:model="element.img_bt_order"> --}}
                                                        </div>
                                                        <div class="col-2">
                                                            @error('imgOrderE')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-2 text-end"> <!-- element.img_st_background -->
                                                            <label class="form-label mt-1" for="imgBackE">Color Fondo
                                                                Imagen</label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input class="form-control form-control-color"
                                                                name="imgBackE" type="color" id="imgBackE"
                                                                wire:model="element.img_st_background">
                                                        </div>
                                                        <div class="col-2">
                                                            @error('imgBackE')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1"> <!-- borde estilo  / color-->
                                                        <div class="col-2 text-end"> <!--estilo -->
                                                            {{-- <label class="form-label mt-1" for="bordeEstiloEI">Imagen
                                                                Estilo
                                                                Borde</label> --}}
                                                            <span><small>Estilo borde Imagen</small></span>
                                                        </div>
                                                        <div class="col-3">
                                                            <select wire:model="element.img_st_border_style"
                                                                class="form-select">
                                                                <option value="none">Sin borde</option>
                                                                <option value="dotted">Punteado</option>
                                                                <option value="dashed">Guiones</option>
                                                                <option value="solid">Simple</option>
                                                                <option value="double">Doble</option>
                                                                <option value="groove">3d</option>
                                                            </select>
                                                            {{-- <input class="form-control" placeholder="Estilo"
                                                                name="bordeEstiloEI" type="text"
                                                                id="bordeEstiloEI" maxlength="10"
                                                                wire:model="element.img_st_border_style"> --}}
                                                        </div>
                                                        <div class="col-1">
                                                            @error('bordeEstiloEI')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-2 text-end"> <!-- Color de borde -->
                                                            <label class="form-label mt-1" for="bordeColorEI">Imagen
                                                                Color
                                                                Borde</label>
                                                        </div>
                                                        <div class="col-3">
                                                            <input class="form-control form-control-color"
                                                                name="bordeColorEI" type="color" id="bordeColorEI"
                                                                wire:model="element.img_st_border_color">
                                                        </div>
                                                        <div class="col-1">
                                                            @error('bordeColorEI')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1"> <!-- radio - ancho -->
                                                        <div class="col-2 text-end"> <!-- radio borde -->
                                                            <label class="form-label mt-1" for="bordeRadioEI">Imagen
                                                                Radio
                                                                Borde
                                                                <a class=""
                                                                    href="https://www.w3schools.com/cssref/css3_pr_border-radius.php"
                                                                    target="_blank" style="text-decoration: none;">
                                                                    <i class="bi bi-patch-question"></i></a>
                                                        </div>
                                                        <div class="col-3">
                                                            <input class="form-control" placeholder="radio borde"
                                                                name="bordeRadioEI" type="text" id="bordeRadioEI"
                                                                maxlength="40"
                                                                wire:model="element.img_st_border_radius">
                                                        </div>
                                                        <div class="col-1">
                                                            @error('bordeRadioEI')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-2 text-end"> <!-- ancho borde -->
                                                            <label class="form-label mt-1" for="bordeAnchoEI">Imagen
                                                                Ancho Borde
                                                                0/10</label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input class="form-control" placeholder="Ancho Borde"
                                                                name="bordeRadioEI" type="text" id="bordeRadioEI"
                                                                maxlength="2"
                                                                wire:model="element.img_st_border_width">
                                                        </div>
                                                        <div class="col-2">
                                                            @error('bordeRadioEI')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mt-2"> <!-- botones -->
                                                        <div class="row">
                                                            <div class="col-6 text-end">
                                                                <button type="button"
                                                                    class="btn btn-secondary text-end"
                                                                    wire:click="cancelarElement">Cancelar</button>
                                                            </div>
                                                            <div class="col-3">
                                                                <button class="btn btn-primary" type="submit">Guardar
                                                                    Datos</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div> <!-- container fluid, toda la grid -->
            {{-- @else
             <div class="px-6 py-4">Sin datos</div> --}}
        @endif
    </div>
</div>

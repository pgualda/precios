<div>

    <div class="container card " id="upload">
        <div class="text-center text-white mt-5 mb-2">
            <h1>Importar txt</h1>
        </div>
        <form wire:submit.prevent="submit" enctype="multipart/form-data">

            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>

            {{-- <div class="form-group">
                <label for="txtInputName">Title:</label>
                <input type="text" class="form-control" id="txtInputName" placeholder="Ingrese nombre"
                    wire:model="title">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div> --}}

            <div class="form-group">
                <label for="txtInputName">Archivo:</label>
                <input type="file" class="form-control" id="txtInputName" wire:model="file">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- botones -->
            <div class="mb-3 mt-3">
                <div class="flex justify-content-start">
                    <button class="btn btn-primary text-end" type="submit">
                        <span class="spinner-grow spinner-grow-sm d-none" id="spinner" role="status" aria-hidden="true"></span>
                        Importar
                    </button>
                    <button class="btn btn-secondary text-end" wire:click="cancelarArticulos">Salir</button>
                </div>
            </div>


        </form>
    </div>
</div>

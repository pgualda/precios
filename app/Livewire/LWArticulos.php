<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Articulo;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Illuminate\Pagination\LengthAwarePaginator;

class LWArticulos extends Component
{

    use WithPagination;

    public $search = "";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmaDelete(string $id)
    {
        $this->js("
        Swal.fire({
            title: `Confirma borrado`,
            text: '¿Esta seguro que desea borrar?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            background: '#CDBFBC',
            showClass: {
                backdrop: 'swal2-noanimation', // disable backdrop animation
                popup: '', // disable popup animation
                icon: '' // disable icon animation
            },
            hideClass: {
                popup: '', // disable popup fade-out animation
            }
        })
        .then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('borra',{id:".$id."} );
            }
        });
        ");
        // ahora falta q livewire "escuche"?
    }

    #[On('borra')]
    public function deleteArticulo(string $id)
    {
        $articulo = Articulo::find($id);
        $articulo->delete();
        $this->js("
        Toast.fire({
            title:  'Registro borrado',
            icon:   'success',
        });        ");
    }

    public function render()
    {
        $articulos = Articulo::with('sector')
            ->where('nombre', 'like', '%' . $this->search . '%')
            ->orwhere('nombregrid', 'like', '%' . $this->search . '%')
            ->orwhere('codart', 'like', '%' . $this->search . '%')
            ->orderby('codart')
            ->paginate(10);

        return view('livewire.lwarticulos', compact('articulos'));
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Grid;
use App\Models\Row;
use App\Models\Col;
use App\Models\Element;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Carbon\Carbon;

class LWGrids extends Component
{

    use WithPagination;

    protected $listeners = ['refreshComponent' => '$refresh'];

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
                Livewire.dispatch('borra',{id:" . $id . "} );
            }
        });
        ");
    }

    #[On('borra')]
    public function deleteGrid(string $id)
    {
        $grid = Grid::find($id);
        // aca tendria q checkear q si esta asociado a una pantalla NO PUEDE BORRARSE
        $grid->delete();
        $this->js("
        Toast.fire({
            title:  'Registro borrado',
            icon:   'success',
        });        ");
    }

    public function agregarGrid()
    {
        $grid = Grid::create(['nombre' => 'Nueva grid ' . CARBON::now()->format('d-m-Y H:i:s'), 'sector_id' => 1, 'img_file' => 'grids/default.jpg']);
        $this->js("
        Toast.fire({
            title:  'Grid creada',
            icon:   'success',
        });        ");
    }

    //
    // publicar grid
    //
    public function duplicar($gridId)
    {
        $grid = Grid::find($gridId);
        //        $newGridId=Grid::create(['nombre' => $grid->nombre.' (copia)','sector_id' => 1]);
        //        $newGrid=Grid::find($newGridId);

        $grid->nombre=$grid->nombre.' (copia)';
        $cloneGrid = $grid->replicate();
        $cloneGrid->push(); //Push before to get id of $clone

        foreach ($grid->rows as $row) {
            $row->grid_id = $cloneGrid->id;
            $cloneRow = $row->replicate();
            $cloneRow->push();
            foreach ($row->cols as $col) {
                $col->grid_id = $cloneGrid->id;
                $col->row_id = $cloneRow->id;
                $cloneCol = $col->replicate();
                $cloneCol->push();
                foreach ($col->elements as $element) {
                    $element->grid_id = $cloneGrid->id;
                    $element->row_id = $cloneRow->id;
                    $element->col_id = $cloneCol->id;
                    $cloneElement = $element->replicate();
                    $cloneElement->push();
                }
            }
        }
        $this->js("
        Toast.fire({
            title:  'Grid duplicada',
            icon:   'success',
        });        ");
    }


    public function render()
    {
        $grids = Grid::select('grids.id', 'grids.nombre as nombregrid', 'sectors.nombre as nombresector', 'sector_id', 'img_file')
            ->join('sectors', 'sectors.id', '=', 'grids.sector_id')
            ->where('grids.nombre', 'like', '%' . $this->search . '%')
            ->orwhere('sectors.nombre', 'like', '%' . $this->search . '%')
            ->paginate(10);
        return view('livewire.lwgrids', compact('grids'));
    }
}

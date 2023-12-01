<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Scr;
use App\Models\Grid;
use App\Models\Row;
use App\Models\Col;
use App\Models\Element;
use App\Models\Sector;
use Livewire\Attributes\On;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Carbon\Carbon;

class LWScrs extends Component
{

    protected $listeners = ['refreshComponent' => '$refresh'];

    public $editScr = "",
        $disabledButton = false;

    public Scr $scr;


    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $rules = [
        'scr.nombre' => '',
        'scr.sector_id' => '',
        'scr.activa_alt' => false,
        'scr.grid_id' => '',
        'scr.grid_alt_id' => '',
        'scr.fdd' => false,
        'scr.fhh' => false,
    ];

    public function mount()
    {

    }

    //
    // enabled / disabled button
    //
    public function disabledButton()
    {
        $this->disabledButton = true;
    }
    public function enabledButton()
    {
        $this->disabledButton = false;
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
    public function deleteScr(string $id)
    {
        $scr = Scr::find($id);
        // aca tendria q checkear q si esta asociado a una pantalla NO PUEDE BORRARSE
        $scr->delete();
        $this->js("
        Toast.fire({
            title:  'Registro borrado',
            icon:   'success',
        });        ");
    }

    public function agregarScr()
    {
        $scr = Scr::create(['nombre' => '', 'sector_id' => 5]);
        $this->js("
        Toast.fire({
            title:  'Pantalla creada',
            icon:   'success',
        });        ");
        $this->dispatch('refreshComponent');
        $this->showEditaScr($scr->id);
    }

    public function submitScr()
    {
        $validatedData = $this->validate([
            'scr.nombre' => 'required',
            'scr.sector_id' => 'required|exists:sectors,id'
        ]);
        $this->scr->update();
        $this->hiddenEditaScr(0);
        $this->dispatch('refreshComponent');
        $this->js("
        Toast.fire({
            title:  'Datos de pantalla actualizados',
            icon:   'success',
        });        ");
    }

    public function showEditaScr($id)
    {
        $this->editScr = $id;
        $this->scr = Scr::find($id);
 //       $this->gridSectors = Grid::where('sector_id', $this->scr->sector_id)->get();
        $this->disabledButton();
        $this->dispatch('refreshComponent');
        $this->js("setTimeout(function() { document.getElementById('nombre').focus(); },500)");
    }
    public function hiddenEditaScr($id)
    {
        $this->enabledButton();
        $this->editScr = "";
    }
    public function cancelarScr()
    {
        $this->hiddenEditaScr(0);
        $this->editScr = "";
    }

    public function changeSector()
    {
        $this->dispatch('refreshComponent');
    }

    public function hourToNow($fh) {
        $start  = Carbon::parse($fh);
        $end    = Carbon::now();
        $horas=$start->diffInHours($end) . ':' . $start->diff($end)->format('%I:%S');
        $color=$start->diff($end)->format('%H%I%S')>"000100"?"text-danger":"text-success";
        return ["horas" => $horas,"color" => $color];
    }
//     $start  = new Carbon('2018-10-04 15:00:03');
// $end    = new Carbon('2018-10-05 17:00:09');
// $start->diff($end)->format('%H:%I:%S');
// 02:00:06
// $start->diffInHours($end) . ':' . $start->diff($end)->format('%I:%S');

    public function render()
    {
        $scrs=Scr::all();
        return view('livewire.lwscrs', compact('scrs'));
    }
}

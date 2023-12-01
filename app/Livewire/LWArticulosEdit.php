<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Articulo;
use App\Models\Sector;


class LWArticulosEdit extends Component
{
    public $codart = "",
        $nombre = "",
        $nombregrid = "",
        $precio = 0.00,
        $sector_id = "",
        $articulo_id= "";

    public function mount($id)
    {
        $articulo=Articulo::find($id);
        $this->codart = $articulo->codart;
        $this->nombre = $articulo->nombre;
        $this->nombregrid = $articulo->nombregrid;
        $this->precio = $articulo->precio;
        $this->sector_id = $articulo->sector_id;
        // agrego el id para tenerlo disponible en una variable del entorno
        $this->articulo_id = $articulo->id;
    }


    public function submit()
    {
        $validatedData = $this->validate([
            'codart' => 'required',
            'nombre' => 'required',
            'precio' => 'required',
            'nombregrid' => '',
            'sector_id' => 'required|exists:sectors,id'
        ]);

        $articulo = Articulo::find($this->articulo_id);
        $articulo->codart = $this->codart;
        $articulo->nombre = $this->nombre;
        $articulo->nombregrid = $this->nombregrid;
        $articulo->precio = $this->precio;
        $articulo->sector_id = $this->sector_id;
        $articulo->update();

        return redirect()->to('articulos/index');
    }


    public function cancelarArticulos()
    {
        return redirect()->to('articulos/index');
    }

    public function render()
    {
        $datos = Sector::all();
        return view('livewire.lwarticulos-edit', ['sectorArt' => $datos]);
    }
}

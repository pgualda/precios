<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Articulo;
use App\Models\Sector;


class LWArticulosCreate extends Component
{
    public $codart = "",
        $nombre = "",
        $nombregrid = "",
        $precio = 0.00,
        $sector_id = "";

    public function submit()
    {
        $validatedData = $this->validate([
            'codart' => 'required|unique:articulos,codart,$this->articulo->codart',
            'nombre' => 'required',
            'precio' => '',
            'nombregrid' => '',
            'sector_id' => 'required|exists:sectors,id'
        ]);

        Articulo::create($validatedData);

        return redirect()->to('articulos/index');
    }


    public function cancelarArticulos()
    {
        return redirect()->to('articulos/index');
    }

    // anulado reemplazo x el metodo del submit
    // public function grabarArticulos()
    // {
    //     // antes tendria que validar
    //     // 1-art no exista, 2-campos
    //     $articulo = new Articulo();
    //     $articulo->codart = $this->codart;
    //     $articulo->nombre = $this->nombre;
    //     $articulo->nombregrid = $this->nombregrid;
    //     $articulo->precio = $this->precio;
    //     $articulo->sector_id = $this->sector_id;
    //     $articulo->save();
    //     // algun cartelito de articulo grabado con exito.

    //     return redirect()->to('articulos/index');
    // }

    // $datos = Cliente::where('raz_social', 'like' , '%' . $this->buscar . '%')
    // ->orderBy('raz_social')->get();

//    return view('livewire.clientes', ['dtosclie' => $datos]);

    public function render()
    {
        $datos = Sector::all();
        return view('livewire.lwarticulos-create', ['sectorArt' => $datos]);
    }
}

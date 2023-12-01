<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Articulo;
use App\Models\Sector;
use App\Models\Grid;
use App\Models\Row;
use App\Models\Col;
use App\Models\Element;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
//use Illuminate\Support\Facades\File;



class LWGridsEdit extends Component
{

    use WithFileUploads;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public
        $nombre = "",
        $background = "",
        $img_file = "",
        $sector_id = "",
        $grid_id = "",
        $captura = null,
        $captura_fondo = null,
        $captura_img = null,
        $editRow = "",
        $editCol = "",
        $editElement = "",
        $disabledButton = false,
        $editGrid = "",
        $searchCodart = "",
        $resultCopias = null,
        $copiaCol_id = "",
        $maxRow = 100,
        $maxCol = 12,
        $maxElement = 100,
        $resultArts = null;

    public Grid $grid;
    public Row $row;
    public Col $col;
    public Element $element;

    protected $rules = [
        'row.nombre' => 'min:3',
        'row.st_background' => '',
        'row.bt_padding' => '',
        'row.st_height' => 'integer|digits_between:1,100',
        'row.st_border_style' => 'string',
        'row.st_border_width' => 'max:10',
        'row.st_border_color' => '',
        'row.st_border_radius' => '',
        'col.nombre' => 'min:3',
        'col.st_background' => '',
        'col.bt_padding' => '',
        'col.bt_col' => 'integer|digits_between:1,12',
        'col.st_border_style' => 'string',
        'col.st_border_width' => 'max:10',
        'col.st_border_color' => '',
        'col.st_border_radius' => '',
        'element.text_text' => 'string',
        'element.text_bt_padding' => '',
        'element.text_st_height' => '',
        'element.text_bt_size' => '',
        'element.text_color' => '',
        'element.codart' => 'string',
        'element.img_file' => '',
        'element.img_direction' => '',
        'element.img_file' => '',
        'element.img_direction' => 'min:3',
        'element.img_bt_order' => '',
        'element.img_st_height' => '',
        'element.img_st_background' => '',
        'element.img_st_border_style' => 'string',
        'element.img_st_border_width' => '',
        'element.img_st_border_color' => '',
        'element.img_st_border_radius' => '',
        'element.st_height' => '',
        'element.st_background' => '',
        'element.st_border_style' => '',
        'element.st_border_width' => '',
        'element.st_border_color' => '',
        'element.st_border_radius' => '',
    ];


    public function mount($id)
    {
        $this->grid = Grid::find($id);
        $this->nombre = $this->grid->nombre;
        $this->sector_id = $this->grid->sector_id;
        $this->background = $this->grid->background;
        $this->img_file = $this->grid->img_file;
        $this->grid_id = $this->grid->id;
    }
    //
    // agregar row/col/element
    //
    public function addRow()
    {
        $row = Row::create(['grid_id' => $this->grid_id]);
        $this->dispatch('refreshComponent');
        $this->showEditaRow($row->id);
    }
    public function addCol($rowId)
    {
        $col = Col::create(['grid_id' => $this->grid_id, 'row_id' => $rowId, 'bt_col' => 1]);
        $this->dispatch('refreshComponent');
        $this->showEditaCol($col->id);
    }
    public function addElement($colId)
    {
        $col = Col::find($colId);
        $element = Element::create(['grid_id' => $this->grid_id, 'row_id' => $col->row_id, 'col_id' => $colId]);
        $this->dispatch('refreshComponent');
        $this->showEditaElement($element->id);
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
    //
    // muestra / oculta ediciones
    //
    public function showEditaGrid($id)
    {
        $this->editGrid = $id;
        $this->disabledButton();
        $this->dispatch('refreshComponent');
        $this->js("setTimeout(function() { document.getElementById('nombreGrid').focus(); },500)");
    }
    public function hiddenEditaGrid($id)
    {
        $this->enabledButton();
        $this->editGrid = "";
    }
    public function showEditaRow($id)
    {
        $wrows = Row::where('grid_id', $this->grid_id)->where('id', '!=', $id)->get();
        $this->maxRow = 100 - $wrows->sum('st_height');
        $this->row = Row::find($id);
        $this->editRow = $id;
        $this->disabledButton();
        $this->dispatch('refreshComponent');
        $this->js("setTimeout(function() { document.getElementById('nombreRow').focus(); },1000)");
    }
    public function hiddenEditaRow($id)
    {
        $this->editRow = "";
        $this->enabledButton();
    }
    public function showEditaCol($id)
    {
        $this->col = Col::find($id);
        // arma maximo
        $wcols = Col::where('row_id', $this->col->row_id)->where('id', '!=', $id)->get();
        $this->maxCol = 12 - $wcols->sum('bt_col');
        // seteos
        $this->editCol = $id;
        $this->disabledButton();
        $this->dispatch('refreshComponent');
        $this->js("setTimeout(function() { document.getElementById('nombreCol').focus(); },1000)");
    }
    public function hiddenEditaCol($id)
    {
        $this->enabledButton();
        $this->editCol = "";
    }
    public function showEditaElement($id)
    {
        $this->element = Element::find($id);
        // arma maximo
        $welements = Element::where('col_id', $this->element->col_id)->where('id', '!=', $id)->get();
        $this->maxElement = 100 - $welements->sum('st_height');
        // seteos
        $this->editElement = $id;
        $this->disabledButton();
        $this->dispatch('refreshComponent');
        $this->js("setTimeout(function() { document.getElementById('codart').focus(); },1000)");
    }
    public function hiddenEditaElement($id)
    {
        $this->enabledButton();
        $this->editElement = "";
        $this->searchCodart = "";
        $this->resultArts = null;
    }
    //
    // aca todos los submits element/col/row/grid
    //
    public function submitElement()
    {
        if ($this->element) {
            if ($this->captura_img) {
                $filename = $this->captura_img->storeAs('img', 'element' . $this->element->id . '.jpg', 'comparte');
                $this->element->img_file = 'img/element' . $this->element->id . '.jpg';
            }
            $this->element->codart=intval($this->element->codart);
            $this->element->update();
            $this->captura_img = null;
            // aca hay q poner una tostada
            $this->hiddenEditaElement($this->element->id);
            $this->dispatch('refreshComponent');
            $this->js("
        Toast.fire({
            title:  'Datos de elemento actualizados',
            icon:   'success',
        });        ");
        }
    }
    public function submitCol()
    {
        $this->col->update();
        // aca hay q poner una tostada
        $this->hiddenEditaCol($this->col->id);
        $this->dispatch('refreshComponent');
        $this->js("
        Toast.fire({
            title:  'Datos de columna actualizados',
            icon:   'success',
        });        ");
    }
    public function submitRow()
    {
        // $validatedData = $this->validate([
        //     'nombre' => 'required',
        //     'sector_id' => 'required|exists:sectors,id'
        // ]);
        $this->row->update();
        // aca hay q poner una tostada
        $this->hiddenEditaRow($this->row->id);
        $this->dispatch('refreshComponent');
        $this->js("
        Toast.fire({
            title:  'Datos de fila actualizados',
            icon:   'success',
        });        ");
    }
    public function submitGrid()
    {
        $validatedData = $this->validate([
            'nombre' => 'required',
            'sector_id' => 'required|exists:sectors,id'
        ]);
        $grid = Grid::find($this->grid_id);
        $grid->nombre = $this->nombre;
        $grid->background = $this->background;
        $grid->sector_id = $this->sector_id;
        // captura pantalla
        if ($this->captura) {
            $filename = $this->captura->storeAs('grids', 'grid' . $this->grid_id . '.jpg', 'comparte');
            $grid->img_file = 'grids/grid' . $this->grid_id . '.jpg';
        }
        $this->captura = null;
        // fondo de grid
        if ($this->captura_fondo) {
            $filename = $this->captura_fondo->storeAs('grids', 'fondo' . $this->grid_id . '.jpg', 'comparte');
            $grid->img_fondo = 'grids/fondo' . $this->grid_id . '.jpg';
        }
        $this->captura_fondo = null;
        $grid->update();
        $this->hiddenEditaGrid($this->grid->id);
        $this->dispatch('refreshComponent');
        $this->js("
        Toast.fire({
            title:  'Datos de grids actualizados',
            icon:   'success',
        });        ");
    }
    //
    // aca todos los botones cancelar
    //
    public function cancelarGrid()
    {
        $this->hiddenEditaGrid($this->grid->id);
        // return redirect()->to('grids/index');
    }
    public function cancelarRow()
    {
        $this->hiddenEditaRow($this->row->id);
    }
    public function cancelarCol()
    {
        $this->hiddenEditaCol($this->col->id);
    }
    public function cancelarElement()
    {
        $this->hiddenEditaElement($this->element->id);
    }
    //
    // deleteRow
    //
    public function confirmaDeleteRow(string $id)
    {
        $this->js("
        Swal.fire({
            title: `Confirma borrado`,
            text: '¿Esta seguro que desea borrar la fila? Se borraran todos sus elementos hijos.',
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
                Livewire.dispatch('borraRow',{id:" . $id . "} );
            }
        });
        ");
    }
    #[On('borraRow')]
    public function deleteRow(string $id)
    {
        $row = Row::find($id)->delete();
        $this->js("
        Toast.fire({
            title:  'Fila borrada',
            icon:   'success',
        });        ");
        //        $this->mount($this->grid_id);
        //        $this->dispatch('refreshComponent');
        // salimos para asegurar q funcione pero la onda seria remontar y refrescar ?
        return redirect()->to('grids/edit/' . $this->grid_id);
    }
    //
    // delete col
    //
    public function confirmaDeleteCol(string $id)
    {
        $this->js("
      Swal.fire({
          title: `Confirma borrado`,
          text: '¿Esta seguro que desea borrar la columna? Se borraran todos sus elementos hijos.',
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
              Livewire.dispatch('borraCol',{id:" . $id . "} );
          }
      });
      ");
    }
    #[On('borraCol')]
    public function deleteCol(string $id)
    {
        $row = Col::find($id)->delete();
        $this->js("
      Toast.fire({
          title:  'Columna borrada',
          icon:   'success',
      });        ");
        //        $this->mount($this->grid_id);
        //        $this->dispatch('refreshComponent');
        // salimos para asegurar q funcione pero la onda seria remontar y refrescar ?
        return redirect()->to('grids/edit/' . $this->grid_id);
    }
    //
    // dele element
    //
    public function confirmaDeleteElement(string $id)
    {
        $this->js("
        Swal.fire({
        title: `Confirma borrado`,
        text: '¿Esta seguro que desea borrar el elemento?',
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
            Livewire.dispatch('borraElement',{id:" . $id . "} );
        }
    });
    ");
    }
    #[On('borraElement')]
    public function deleteElement(string $id)
    {
        $row = Element::find($id)->delete();
        $this->js("
        Toast.fire({
        title:  'Elemento borrado',
        icon:   'success',
        });        ");
        //        $this->mount($this->grid_id);
        //        $this->dispatch('refreshComponent');
        // salimos para asegurar q funcione pero la onda seria remontar y refrescar ?
        //    return redirect()->to('grids/index');
        // si volviendo a llamar la edicion anda SOMOS GARDEL
        return redirect()->to('grids/edit/' . $this->grid_id);
    }
    //
    // selecciona articulo del search
    //
    public function selectArt($codart, $nombreArt)
    {
        $this->resultArts = null;
        $this->searchCodart = "";
        $this->element->codart = $codart;
        $this->element->text_text = $nombreArt;
        $this->dispatch('refreshComponent');
        $this->js("setTimeout(function() { document.getElementById('codart').focus(); },300)");
    }
    //
    // crear elemento desde instancia
    // - ver poner un hide
    public function addElementFrom($colId)
    {
        $this->resultCopias = Element::where('grid_id', 1)
            ->where('row_id', 1)
            ->where('col_id', 1)->limit(10)->get();
        $this->dispatch('refreshComponent');
        $this->copiaCol_id = $colId;
    }
    public function selectCopia($elementId, $colId, $rowId)
    {
        $this->resultCopias = null;
        if ($elementId > 0) {
            $element = Element::find($elementId);
            $element->grid_id = $this->grid_id;
            $element->row_id = $rowId;
            $element->col_id = $colId;
            $cloneElement = $element->replicate();
            $cloneElement->push();
            $this->dispatch('refreshComponent');
            $this->showEditaElement($cloneElement->id);
        }
    }
    //
    // render
    //
    public function render()
    {
        if (strlen($this->searchCodart) >= 1 && $this->editElement) {
            $this->resultArts = Articulo::where('nombre', 'like', '%' . $this->searchCodart . '%')->limit(5)->get();
        } else {
            $this->resultArts = null;
        }
        if ($this->editElement && $this->element->codart>0 ) {
           $articulo=Articulo::where('codart',$this->element->codart)->first();
           if ($articulo) {
              $this->element->text_text = $articulo->nombregrid;
           }
        }
        $datos = Sector::all();
        return view('livewire.lwgrids-edit', ['sectorArt' => $datos]);
    }
}

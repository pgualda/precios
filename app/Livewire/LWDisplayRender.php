<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Articulo;
use App\Models\Scr;
use App\Models\Grid;
use App\Models\Row;
use App\Models\Col;
use App\Models\Element;
use Illuminate\Support\Carbon;


class LWDisplayRender extends Component
{

    public $grid_id, $scr_id, $grid;

    public function mount(string $grid_id, $scr_id = 0)
    {
        $this->grid_id = $grid_id;
        $this->scr_id = $scr_id;
    }

    public function render()
    {
        /* logica
        * si $this->scr_id <> 0 POR AHORA arma la grid x defecto
        * pero seria el lugar desde donde buscaria la grid activa para la fecha-hora actual
        */
        if ($this->scr_id > 0) {
            $scr = SCR::find($this->scr_id);
            // setea x defecto
            $this->grid_id = $scr->grid_id;
            // logica si esta activa una grid alternativa en un rango de fechas
            if ($scr->activa_alt) {
                // primera la busca
                $grid_alt = Grid::find($scr->grid_alt_id);
                if ($grid_alt) {
                    // si existe checkea si esta en el rango
                    $startDate = $scr->fdd;
                    $endDate = $scr->fhh;
                    $dateToCheck = Carbon::today();
                    if ($dateToCheck->between($startDate, $endDate)) {
                        $this->grid_id = $scr->grid_alt_id;
                    }
                }
            }
        }
        $this->grid = GRID::find($this->grid_id);
        // con el objeto grid oka armamos las filas

        $wrows = Row::where('grid_id', $this->grid_id)->get();
        $rows = [];
        foreach ($wrows as $wrow) {
            $wcols = Col::where('grid_id', '=', $this->grid_id)->where('row_id', '=', $wrow->id)->get();
            $cols = [];
            foreach ($wcols as $wcol) {
                $welements = Element::where('grid_id', '=', $this->grid_id)->where('row_id', '=', $wrow->id)->where('col_id', '=', $wcol->id)->get();
                $elements = [];
                foreach ($welements as $welement) {

                    $element_img_st = '';
                    $element_img_bt = '';
                    $element_precio = 0;
                    if ($welement->codart > 0) {
                        $articulo = Articulo::where('codart', '=', $welement->codart)->first();
                        $element_precio = $articulo ? $articulo->precio : 0;
                    }
                    if ($welement->img_file) {
                        if ($welement->img_direction == "column") {
                            $rowcol = 'height:' . $welement->img_st_height . '%;';
                        } else {
                            $rowcol = 'width:' . $welement->img_st_height . '%;';
                        }
                        $element_img_st =
                            $rowcol .
                            'background:' . $welement->img_st_background . ';' .
                            'border-style:' . $welement->img_st_border_style . ";" .
                            'border-width:' . $welement->img_st_border_width . "px;" .
                            'border-color:' . $welement->img_st_border_color . ";" .
                            'border-radius:' . $welement->img_st_border_radius . ";" .
                            'order:' . $welement->img_bt_order . ";";
                        $element_img_bt =
                            "p-" . $welement->img_bt_padding ? $welement->img_bt_padding : '0';
                    }
                    $back = $welement->st_background > "#000000" ? $welement->st_background : '';
                    $textColor = $welement->text_color > "#000000" ? $welement->text_color : '';
                    // 'background:' . $welement->st_background  . ';' .
                    $element_st =
                        'color:' . $textColor . ';' .
                        'height:' . $welement->st_height . '%;' .
                        'background:' . $back . ';' .
                        'border-style:' . $welement->st_border_style . ';' .
                        'border-width:' . $welement->st_border_width . 'px;' .
                        'border-color:' . $welement->st_border_color . ';' .
                        'border-radius:' . $welement->st_border_radius . ';';
                    $element = [
                        'element_id' => $welement->id,
                        'row_id' => $wrow->id,
                        'col_id' => $wcol->id,
                        'text_text' => $welement->text_text,
                        'text_bt_size' => $welement->text_bt_size,
                        'text_st_height' => $welement->img_direction == "column" ? 'height:' . 100 - $welement->img_st_height . '%;' : 'width:' . 100 - $welement->img_st_height . '%;',
                        'precio' => $element_precio,
                        'this_bt' => 'p-' . $welement->text_bt_padding,
                        'img_direction' => $welement->img_direction ? 'flex-' . $welement->img_direction : '',
                        'this_bt_size' => $welement->text_bt_size,
                        'this_st' => $element_st,
                        'img_file' => $welement->img_file,
                        'this_img_st' => $element_img_st,
                        'this_img_bt' => $element_img_bt
                    ];
                    array_push($elements, $element);
                }
                $back = $wcol->st_background > "#000000" ? $wcol->st_background : '';
                // $col_st = 'background:' . $wcol->st_background . ';' .
                $col_st = 'background:' . $back . ';' .
                    'border-style:' . $wcol->st_border_style . ';' .
                    'border-width:' . $wcol->st_border_width . 'px;' .
                    'border-color:' . $wcol->st_border_color . ';' .
                    'border-radius:' . $wcol->st_border_radius . ';';
                $col = [
                    'row_id' => $wrow->id,
                    'col_id' => $wcol->id,
                    'this_bt' => 'p-' . $wcol->bt_padding . ' col-' . $wcol->bt_col,
                    'this_st' => $col_st,
                    'elements' => $elements
                ];
                array_push($cols, $col);
            }

            $back = $wrow->st_background > "#000000" ? $wrow->st_background : '';
            $row_st = 'height:' . $wrow->st_height . '%; ' .
                'background:' . $back . ';' .
                'border-style:' . $wrow->st_border_style . ';' .
                'border-width:' . $wrow->st_border_width . 'px;' .
                'border-color:' . $wrow->st_border_color . ';' .
                'border-radius:' . $wrow->st_border_radius . ';';
            $row = [
                'row_id' => $wrow->id,
                'this_bt' => 'row p-' . $wrow->bt_padding,
                'this_st' => $row_st,
                'cols' => $cols

            ];
            array_push($rows, $row);
        }
        // es importante q $rows es un arreglo y $grid es un objeto grid
        // la razon de ser de esto es q el arreglo es mucho mas liviano
        if ($this->scr_id > 0) {
            // registramos timestamp del ultimo render
            $scr = SCR::find($this->scr_id);
            $scr->ultimo_render = Carbon::now();
            $scr->update();
        }
        return view('livewire.lwdisplayrender', compact('rows'));
    }
}

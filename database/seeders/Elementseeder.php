<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Element;

class Elementseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // img_bt_order => -1 la imagen va antes.
        // img_direction => x defecto row
        Element::create([
            'col_id' => 2,
            'row_id' => 3,
            'grid_id' => 2,
            'text_text' => 'Que falta',
            'text_bt_padding' => '1',
            'st_height' => 20,
            'st_background' => '',
            'text_bt_padding' => '2',
            'img_file' => '',
            'text_bt_size' => 'h3'
        ]);
        Element::create([
            'col_id' => 2,
            'row_id' => 3,
            'grid_id' => 2,
            'text_text' => 'Prueba',
            'text_bt_padding' => '1',
            'text_st_height' => 20,
            'text_bt_size' => 'h3',
            'text_color' => '',
            'codart' => 2,
            'img_file' => 'img/grid1/border22.jpg',
            'img_direction' => 'column',
            'img_bt_order' => 1,
            'img_bt_padding' => '',
            'img_st_height' => 80,
            'img_st_background' => '',
            'img_st_border_style' => 'dotted',
            'img_st_border_width' => '5',
            'img_st_border_color' => '#AAAABB',
            'img_st_border_radius' => '50%',
            'st_height' => 60,
            'st_background' => '#203040',
            'st_border_style' => '',
            'st_border_width' => '',
            'st_border_color' => '',
        ]);
        Element::create([
            'col_id' => 3,
            'row_id' => 3,
            'grid_id' => 2,
            'text_text' => 'art 1',
            'text_bt_size' => 'h4',
            'text_bt_padding' => '1',
            'st_height' => 20,
            'st_background' => '',
            'text_bt_padding' => '2',
            'img_file' => 'img/grid1/border22.jpg',
            'codart' => 1,
            'img_st_height' => 20,
            'text_st_height' => 80
        ]);
        Element::create([
            'col_id' => 3,
            'row_id' => 3,
            'grid_id' => 2,
            'text_text' => 'art 2',
            'text_bt_size' => 'h4',
            'text_bt_padding' => '1',
            'st_height' => 20,
            'st_background' => '#306040',
            'text_bt_padding' => '2',
            'img_file' => 'img/grid1/fondo.jpg',
            'img_bt_order' => 5,
            'text_st_height' => 80,
            'img_st_height' => 20,
            'codart' => 2
        ]);
        Element::create([
            'col_id' => 3,
            'row_id' => 3,
            'grid_id' => 2,
            'text_text' => 'art 2',
            'text_bt_padding' => '1',
            'st_height' => 20,
            'st_background' => '#308899',
            'text_bt_padding' => '2',
            'img_file' => '',
            'text_bt_size' => 'h3',
            'st_border_style' => 'solid',
            'st_border_width' => '3',
            'st_border_color' => '#EEEEAA',
            'st_border_radius' => '0% 20% 20% 0% / 0% 40% 40$ 0%',
            'codart' => 1
        ]);
        Element::create([
            'col_id' => 4,
            'row_id' => 3,
            'grid_id' => 2,
            'text_text' => 'Otra prueba',
            'text_bt_padding' => '3',
            'st_height' => 50,
            'st_background' => '#30AABB',
            'text_bt_padding' => '2',
            'img_bt_order' => -1,
            'img_direction' => 'row',
            'img_file' => 'img/grid1/fondo.jpg',
            'img_st_height' => 40,
            'text_bt_size' => 'h2',
            'text_st_height' => 60,
            'img_st_background' => '',
            'img_st_border_style' => 'dashed',
            'img_st_border_width' => '3',
            'img_st_border_color' => '#607030',
            'img_st_border_radius' => '50% 0% 50% 0% / 50% 0% 50% 0%',
            'st_border_style' => 'none',
            'st_border_width' => '0',
            'st_border_color' => '',
            'st_border_radius' => '0% 50% 50% 0%',
            'codart' => 2
        ]);
        Element::create([
            'col_id' => 4,
            'row_id' => 3,
            'grid_id' => 2,
            'text_text' => 'Otra prueba',
            'text_bt_padding' => '1',
            'st_height' => 50,
            'st_background' => '#8020AA',
            'text_bt_padding' => '2',
            'img_bt_order' => 5,
            'img_direction' => 'row',
            'img_file' => 'img/grid1/fondo.jpg',
            'img_st_height' => 60,
            'text_st_height' => 40,
            'text_bt_size' => 'h2',
            'img_st_background' => '',
            'img_st_border_style' => 'solid',
            'img_st_border_width' => '6px',
            'img_st_border_color' => '#8010GG',
            'img_st_border_radius' => '30% 20% 50% 0% / 10% 0% 50% 0%',
            'st_border_style' => 'none',
            'st_border_width' => '0',
            'st_border_color' => '',
            'st_border_radius' => '0% 0% 50% 0%',
            'codart' => 1
        ]);
        // grid 2 row 4 col 5
        Element::create([
            'col_id' => 5,
            'row_id' => 5,
            'grid_id' => 3,
            'text_text' => '',
            'text_color' => '',
            'text_bt_size' => '',
            'text_bt_padding' => '2',
            'img_file' => 'img/grid2/logo.jpg',
            'img_direction' => 'column',
            'img_bt_order' => -1,
            'img_bt_padding' => '2',
            'img_st_height' => 100,
            'img_st_background' => '',
            'img_st_border_style' => 'solid',
            'img_st_border_width' => '1',
            'img_st_border_color' => '#80CC80',
            'img_st_border_radius' => '10%',
            'st_height' => 100
        ]);
        Element::create([
            'col_id' => 6,
            'row_id' => 5,
            'grid_id' => 3,
            'text_text' => 'Frutas y Verduras Seleccionados',
            'text_color' => '',
            'text_bt_size' => 'h1',
            'text_bt_padding' => '0',
            'st_height' => 100,
            'st_background' => '',
            'text_bt_padding' => '0',
        ]);
        //
        //
        // col 6 1 precios grid 2
        //
        //
        Element::create([
            'col_id' => 7,
            'row_id' => 6,
            'grid_id' => 3,
            'text_text' => 'MORRON CALAHORRA EL KG',
            'text_color' => '',
            'text_bt_padding' => '3',
            'st_height' => 20,
            'st_background' => '#103010',
            'text_bt_size' => 'h4',
            'st_border_style' => 'none',
            'st_border_width' => '0',
            'st_border_color' => '',
            'st_border_radius' => '10% 10% 0% 0% / 30% 30% 0% 0%',
            'codart' => 706
        ]);
        Element::create([
            'col_id' => 7,
            'row_id' => 6,
            'grid_id' => 3,
            'text_text' => 'ALCAUCIL EL KG',
            'text_color' => '',
            'text_bt_padding' => '3',
            'st_height' => 19,
            'st_background' => '#104010',
            'text_bt_size' => 'h4',
            'codart' => 707
        ]);
        Element::create([
            'col_id' => 7,
            'row_id' => 6,
            'grid_id' => 3,
            'text_text' => 'ARVEJAS CON VAINAS KG',
            'text_color' => '',
            'text_bt_padding' => '3',
            'st_height' => 20,
            'st_background' => '#103010',
            'text_bt_size' => 'h4',
            'codart' => 709
        ]);
        Element::create([
            'col_id' => 7,
            'row_id' => 6,
            'grid_id' => 3,
            'text_text' => 'ANANA KG',
            'text_color' => '',
            'text_bt_padding' => '3',
            'st_height' => 19,
            'st_background' => '#104010',
            'text_bt_size' => 'h4',
            'codart' => 711
        ]);
        Element::create([
            'col_id' => 7,
            'row_id' => 6,
            'grid_id' => 3,
            'text_text' => 'ACHICORIA EL ATADO',
            'text_color' => '',
            'text_bt_padding' => '3',
            'st_height' => 20,
            'st_background' => '#103010',
            'text_bt_size' => 'h4',
            'st_border_style' => 'none',
            'st_border_width' => '0',
            'st_border_color' => '',
            'st_border_radius' => '0% 0% 10% 10% / 0% 0% 30% 30%',
            'codart' => 713
        ]);
        //
        //
        // col 7 2 precios grid 2
        //
        //
        Element::create([
            'col_id' => 8,
            'row_id' => 6,
            'grid_id' => 3,
            'text_text' => 'AJI PICANTE X UNIDAD',
            'text_color' => '',
            'text_bt_padding' => '3',
            'st_height' => 20,
            'st_background' => '#104010',
            'text_bt_size' => 'h4',
            'st_border_style' => 'none',
            'st_border_width' => '0',
            'st_border_color' => '',
            'st_border_radius' => '10% 10% 0% 0% / 30% 30% 0% 0%',
            'codart' => 714
        ]);
        Element::create([
            'col_id' => 8,
            'row_id' => 6,
            'grid_id' => 3,
            'text_text' => 'BANANA ECUADOR KG',
            'text_color' => '',
            'text_bt_padding' => '3',
            'st_height' => 19,
            'st_background' => '#103010',
            'text_bt_size' => 'h4',
            'codart' => 715
        ]);
        Element::create([
            'col_id' => 8,
            'row_id' => 6,
            'grid_id' => 3,
            'text_text' => 'BATATAS KG',
            'text_color' => '',
            'text_bt_padding' => '3',
            'st_height' => 20,
            'st_background' => '#104010',
            'text_bt_size' => 'h4',
            'codart' => 716
        ]);
        Element::create([
            'col_id' => 8,
            'row_id' => 6,
            'grid_id' => 3,
            'text_text' => 'BERENJENAS MORADAS KG',
            'text_color' => '',
            'text_bt_padding' => '3',
            'st_height' => 19,
            'st_background' => '#103010',
            'text_bt_size' => 'h4',
            'codart' => 717
        ]);
        Element::create([
            'col_id' => 8,
            'row_id' => 6,
            'grid_id' => 3,
            'text_text' => 'PERA WILLIAMS X KG',
            'text_color' => '',
            'text_bt_padding' => '3',
            'st_height' => 20,
            'st_background' => '#104010',
            'text_bt_size' => 'h4',
            'st_border_style' => 'none',
            'st_border_width' => '0',
            'st_border_color' => '',
            'st_border_radius' => '0% 0% 10% 10% / 0% 0% 30% 30%',
            'codart' => 781
        ]);
        // 718;718;CHOCLO OFERTA X 3 UNIDADES;699;1;1;0;N
        Element::create([
            'col_id' => 9,
            'row_id' => 6,
            'grid_id' => 3,
            'text_text' => 'CHOCLO X 3 OFERTA',
            'text_bt_padding' => '4',
            'text_st_height' => 20,
            'text_bt_size' => 'h4',
            'text_color' => '',
            'codart' => 718,
            'img_file' => 'img/grid2/choclo.jpg',
            'img_direction' => 'column',
            'img_bt_order' => -1,
            'img_bt_padding' => '2',
            'img_st_height' => 80,
            'img_st_background' => '',
            'img_st_border_style' => 'dotted',
            'img_st_border_width' => '5',
            'img_st_border_color' => '#80AA80',
            'img_st_border_radius' => '10%',
            'st_height' => 100,
            'st_background' => '',
            'st_border_style' => '',
            'st_border_width' => '',
            'st_border_color' => '',
        ]);
        Element::create([
            'col_id' => 10,
            'row_id' => 7,
            'grid_id' => 3,
            'text_text' => 'Este sabado el horario de atencion será de 9 hs a 18 hs de corrido',
            'text_color' => '',
            'text_bt_size' => 'h4',
            'text_bt_padding' => '0',
            'st_height' => 100,
            'st_background' => '',
            'text_bt_padding' => '0',
        ]);
        // agrega para instancias
        Element::create([
            'col_id' => 1,
            'row_id' => 1,
            'grid_id' => 1,
            'text_text' => 'prueba',
            'codart' => '717',
            'text_color' => '',
            'text_bt_size' => 'h4',
            'text_bt_padding' => '0',
            'st_height' => 20,
            'st_background' => '',
            'text_bt_padding' => '0',
            'st_border_style' => 'solid',
            'st_border_width' => '3',
            'st_border_color' => '#152035',
            'st_border_radius' => '5% / 35%',
        ]);
        Element::create([
            'col_id' => 1,
            'row_id' => 1,
            'grid_id' => 1,
            'text_text' => 'prueba 2',
            'codart' => '718',
            'text_color' => '',
            'text_bt_size' => 'h5',
            'text_bt_padding' => '0',
            'st_height' => 15,
            'st_background' => '',
            'text_bt_padding' => '0',
            'st_border_style' => 'solid',
            'st_border_width' => '3',
            'st_border_color' => '#152035',
            'st_border_radius' => '5% / 35%',
        ]);

    }
}

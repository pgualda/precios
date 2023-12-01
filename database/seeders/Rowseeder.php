<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Row;

class Rowseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //id 1
        Row::create([
            'nombre' => 'Elementos',
            'grid_id' => 1,
            'bt_padding' => '0',
            'st_height' => 100,
            'st_background' => null,
            'st_border_style' => '',
            'st_border_width' => '',
            'st_border_color' => null,
        ]);
        //id 2 etc
        Row::create([
            'nombre' => 'Encabezado',
            'grid_id' => 2,
            'bt_padding' => '1',
            'st_height' => 10,
            'st_background' => null,
            'st_border_style' => '',
            'st_border_width' => '',
            'st_border_color' => null,
        ]);
        //id 3
        Row::create([
            'nombre' => 'Cuerpo',
            'grid_id' => 2,
            'bt_padding' => '1',
            'st_height' => 80,
            'st_background' => null,
            'st_border_style' => 'dotted',
            'st_border_width' => '5',
            'st_border_color' => '#2020CC',
            'st_border_radius' => '10% 10% 10% 10% / 20% 20% 20% 20%'
        ]);
        //id 4
        Row::create([
            'nombre' => 'Foot',
            'grid_id' => 2,
            'bt_padding' => '1',
            'st_height' => 10,
            'st_background' => null,
            'st_border_style' => '',
            'st_border_width' => '',
            'st_border_color' => '',
            'st_border_radius' => '10% 10% 10% 10% / 20% 20% 20% 20%'
        ]);
        // grid 3 id 5
        Row::create([
            'nombre' => 'Encabezado',
            'grid_id' => 3,
            'bt_padding' => '4',
            'st_height' => 20,
            'st_background' => null,
            'st_border_style' => '',
            'st_border_width' => '',
            'st_border_color' => '',
        ]);
        //id 6
        Row::create([
            'nombre' => 'Cuerpo',
            'grid_id' => 3,
            'bt_padding' => '1',
            'st_height' => 70,
            'st_background' => null,
            'st_border_style' => 'dotted',
            'st_border_width' => '5',
            'st_border_color' => '#00DD00',
            'st_border_radius' => '5% 5% 5% 5% / 10% 10% 10% 10%'
        ]);
        // id 7
        Row::create([
            'nombre' => 'Footer',
            'grid_id' => 3,
            'bt_padding' => '1',
            'st_height' => 8,
            'st_background' => null,
            'st_border_style' => '',
            'st_border_width' => '',
            'st_border_color' => '',
        ]);
    }
}

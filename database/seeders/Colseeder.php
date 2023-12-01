<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Col;

class Colseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // grid 1 row 1 col 1
        Col::create([
            'nombre' => 'elementos',
            'row_id' => 1,
            'grid_id' => 1,
            'bt_col' => 3,
            'bt_padding' => '1',
            'st_background' => '',
            'st_border_style' => '',
            'st_border_width' => '',
            'st_border_color' => '',
        ]);
        // grid 2 row 2 col 2
        Col::create([
            'nombre' => 'Prueba',
            'row_id' => 3,
            'grid_id' => 2,
            'bt_col' => 2,
            'bt_padding' => '1',
            'st_background' => '',
            'st_border_style' => '',
            'st_border_width' => '',
            'st_border_color' => '',
        ]);
        // grid 2 row 2 col 2
        Col::create([
            'nombre' => 'Precios',
            'row_id' => 3,
            'grid_id' => 2,
            'bt_col' => 4,
            'bt_padding' => '1',
            'st_background' => '#1515AA',
            'st_border_style' => 'dotted',
            'st_border_width' => '3',
            'st_border_color' => '#808080',
            'st_border_radius' => '10% 10% / ',
        ]);
        // grid 1 row 2 col 2
        Col::create([
            'nombre' => 'Oferta',
            'row_id' => 3,
            'grid_id' => 2,
            'bt_col' => 6,
            'bt_padding' => '1',
            'st_background' => '',
            'st_border_style' => '',
            'st_border_width' => '',
            'st_border_color' => '',
        ]);
        // grid 2
        // grid 2 row 4 col 1
        Col::create([
            'nombre' => 'titulo',
            'row_id' => 5,
            'grid_id' => 3,
            'bt_col' => 1,
            'bt_padding' => '1',
            'st_background' => '',
        ]);
        Col::create([
            'nombre' => 'titulo',
            'row_id' => 5,
            'grid_id' => 3,
            'bt_col' => 10,
            'bt_padding' => '1',
            'st_background' => '',
            'st_border_style' => 'solid',
            'st_border_width' => '5',
            'st_border_color' => '#15EE15',
            'st_border_radius' => '5% 5% 5% 5% / 35% 35% 35% 35%',
        ]);
        // grid 2 row 5 col 1
        Col::create([
            'nombre' => 'titulo',
            'row_id' => 6,
            'grid_id' => 3,
            'bt_col' => 4,
            'bt_padding' => '2',
        ]);
        // grid 2 row 5 col 2
        Col::create([
            'nombre' => 'titulo',
            'row_id' => 6,
            'grid_id' => 3,
            'bt_col' => 4,
            'bt_padding' => '2',
        ]);
        // grid 2 row 5 col 3
        Col::create([
            'nombre' => 'titulo',
            'row_id' => 6,
            'grid_id' => 3,
            'bt_col' => 4,
            'bt_padding' => '2',
        ]);
        // grid 2 footer 1
        Col::create([
            'nombre' => 'footer 1',
            'row_id' => 7,
            'grid_id' => 3,
            'bt_col' => 12,
            'bt_padding' => '2',
        ]);

    }
}

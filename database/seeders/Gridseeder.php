<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grid;

class Gridseeder extends Seeder
{
    public function run(): void
    {
       //id 1
       Grid::create([
        'nombre'=>'Elementos',
        'sector_id'=>5,
        'img_file'=> 'grids/grid1.jpg',
        'background' => null
       ]);
       //id 2
       Grid::create([
        'nombre'=>'carnu prueba 1',
        'sector_id'=>1,
        'img_file'=> 'grids/grid2.jpg',
        'img_fondo'=>'grids/fondo2.jpg',
        'background' => null
       ]);
       //id 3
       Grid::create([
        'nombre'=>'verdu prueba 2',
        'sector_id'=>2,
        'img_file'=> 'grids/grid3.jpg',
        'background' => null
       ]);
    }
}

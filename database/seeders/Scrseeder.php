<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Scr;

class Scrseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       //id 1
       Scr::create([
        'nombre'=>'Prueba',
        'sector_id'=>2,
        'grid_id'=> 2
       ]);
       //id 1
       Scr::create([
        'nombre'=>'Verduleria Prueba 1',
        'sector_id'=>2,
        'grid_id'=> 3
       ]);
    }
}

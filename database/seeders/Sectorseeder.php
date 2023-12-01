<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sector;

class Sectorseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       //id 1
       Sector::create([
        'nombre'=>'Carniceria',
       ]);
       //id 2
       Sector::create([
        'nombre'=>'Verduleria',
       ]);
       //id 3
       Sector::create([
        'nombre'=>'Panaderia',
       ]);
       //id 4
       Sector::create([
        'nombre'=>'Fiambreria',
       ]);
       //id 5
       Sector::create([
        'nombre'=>'Sin definir',
       ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Articulo;

class Articuloseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       //id 1
       Articulo::create([
        'nombre'=>'Pulpa paleta',
        'codart'=>1,
        'nombregrid'=>'PULPA PALETA KG',
        'precio'=>3500.10,
        'sector_id'=>1
       ]);
       //id 2
       Articulo::create([
        'nombre'=>'Lechuga rulito',
        'codart'=>2,
        'nombregrid'=>'LECHUGA RULITO KG',
        'precio'=>299.99,
        'sector_id'=>2
       ]);
       // datos q existen en las balanzas
       //id 2 // 707;707;ALCAUCIL EL KG;1590;1;1;0;P
       Articulo::create([
        'nombre'=>'ALCAUCIL EL KG',
        'codart'=>707,
        'nombregrid'=>'ALCAUCIL EL KG',
        'precio'=>1540.00,
        'sector_id'=>2
       ]);
       //id 2 // 709;709;ARVEJAS CON VAINAS  EL KG;849;1;1;0;P
       Articulo::create([
        'nombre'=>'ARVEJAS CON VAINAS EL KG',
        'codart'=>709,
        'nombregrid'=>'ARVEJAS CON VAINAS EL KG',
        'precio'=>749.99,
        'sector_id'=>2
       ]);
       //id 2 // 711;711;ANANA  EL KG.;690;1;1;7;P
       Articulo::create([
        'nombre'=>'ANANA  EL KG',
        'codart'=>711,
        'nombregrid'=>'ANANA  EL KG',
        'precio'=>799.99,
        'sector_id'=>2
       ]);
       //id 2        706;706;MORRON CALAHORRA EL KG.;1190;1;1;0;P
       Articulo::create([
        'nombre'=>'MORRON CALAHORRA EL KG',
        'codart'=>706,
        'nombregrid'=>'MORRON CALAHORRA EL KG',
        'precio'=>900.00,
        'sector_id'=>2
       ]);
       //id 2 // 713;713;ACHICORIA EL ATADO;290;1;1;0;N
       Articulo::create([
        'nombre'=>'ACHICORIA EL ATADO',
        'codart'=>713,
        'nombregrid'=>'ACHICORIA EL ATADO',
        'precio'=>399.99,
        'sector_id'=>2
       ]);
       //id 2 // 714;714;AJI PICANTE X UNIDAD;24.9;1;1;0;N
       Articulo::create([
        'nombre'=>'AJI PICANTE X UNIDAD',
        'codart'=>714,
        'nombregrid'=>'AJI PICANTE X UNIDAD',
        'precio'=>50.00,
        'sector_id'=>2
       ]);
       //id 2 // 715;715;BANANA ECUADOR  EL KG.;599;1;1;0;P
       Articulo::create([
        'nombre'=>'BANANA ECUADOR  EL KG',
        'codart'=>715,
        'nombregrid'=>'BANANA ECUADOR  EL KG',
        'precio'=>599.99,
        'sector_id'=>2
       ]);
       //id 2 // 716;716;BATATAS EL KG.;690;1;1;0;P
       Articulo::create([
        'nombre'=>'BATATAS EL KG',
        'codart'=>716,
        'nombregrid'=>'BATATAS EL KG',
        'precio'=>690.00,
        'sector_id'=>2
       ]);
       //id 2 // 717;717;BERENJENAS MORADAS  EL KG;569;1;1;0;P
       Articulo::create([
        'nombre'=>'BERENJENAS MORADAS  EL KG',
        'codart'=>717,
        'nombregrid'=>'BERENJENAS MORADAS  EL KG',
        'precio'=>299.99,
        'sector_id'=>2
       ]);
       //id 2 // 781;781;PERA WILLIAMS X KG;349.9;1;1;0;P
       Articulo::create([
        'nombre'=>'PERA WILLIAMS X KG',
        'codart'=>781,
        'nombregrid'=>'PERA WILLIAMS X KG',
        'precio'=>400.00,
        'sector_id'=>2
       ]);
       //id 2 // 718;718;CHOCLO OFERTA X 3 UNIDADES;699;1;1;0;N
       Articulo::create([
        'nombre'=>'CHOCLO OFERTA X 3 UNIDADES',
        'codart'=>718,
        'nombregrid'=>'CHOCLO X 3 OFERTA',
        'precio'=>700.00,
        'sector_id'=>2
       ]);

    }
}

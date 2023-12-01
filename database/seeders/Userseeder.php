<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       //id 1
       User::create([
        'name'=>'Admin',
        'email'=>'admin@admin.com',
        'password'=> bcrypt('adminadmin'),
        'procesooka'=>1
       ])->assignRole('Admin');
       //id 2
       User::create([
        'name'=>'SuperAdmin',
        'email'=>'sadmin@admin.com',
        'password'=> bcrypt('adminadmin'),
        'procesooka'=>1
       ])->assignRole('SuperAdmin');
       //id 3
       User::create([
        'name'=>'Encargado',
        'email'=>'encargado@admin.com',
        'password'=> bcrypt('adminadmin'),
        'procesooka'=>1
       ])->assignRole('Encargado');
       //id 4
       User::create([
        'name'=>'Precios',
        'email'=>'precios@admin.com',
        'password'=> bcrypt('adminadmin'),
        'procesooka'=>1
       ])->assignRole('Precios');

    }
}

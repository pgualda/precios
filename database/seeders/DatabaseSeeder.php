<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(Rolseeder::class);
        $this->call(Userseeder::class);
        $this->call(Sectorseeder::class);
        $this->call(Articuloseeder::class);
        $this->call(Gridseeder::class);
        $this->call(Scrseeder::class);
        $this->call(Rowseeder::class);
        $this->call(Colseeder::class);
        $this->call(Elementseeder::class);
    }
}

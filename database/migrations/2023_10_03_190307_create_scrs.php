<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scrs', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->foreignId('grid_id')->nullable();
            $table->foreignId('sector_id')->nullable();
            $table->boolean('activa_alt')->nullable();
            $table->date('fdd')->nullable();
            $table->date('fhh')->nullable();
            $table->foreignId('grid_alt_id')->nullable();
            $table->datetime('ultimo_render')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scrs');
    }
};

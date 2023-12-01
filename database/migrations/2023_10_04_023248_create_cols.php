<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Grid;
use App\Models\Row;
use App\Models\Col;
use App\Models\Element;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
//        $table->foreignId('usuario_id')->constrained('users');
        Schema::create('cols', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',30)->nullable();
            $table->foreignId('row_id')->constrained('rows')->onDelete('cascade');
            $table->foreignId('grid_id')->constrained('grids')->onDelete('cascade');
            $table->integer('bt_col')->default(1);
            $table->string('bt_padding',20)->nullable();
            $table->string('st_background',20)->nullable()->default("#000000");
            $table->string('st_border_style',20)->nullable();
            $table->string('st_border_width',20)->nullable();
            $table->string('st_border_color',20)->nullable()->default("#000000");
            $table->string('st_border_radius',40)->nullable();
            // $table->string('st_border_top_left_radius',20)->nullable();
            // $table->string('st_border_top_right_radius',20)->nullable();
            // $table->string('st_border_bottom_right_radius',20)->nullable();
            // $table->string('st_border_bottom_left_radius',20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cols');
    }
};

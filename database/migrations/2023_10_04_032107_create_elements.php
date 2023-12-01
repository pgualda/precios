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
     * Run t he migrations.
     */
    public function up(): void
    {
//        $table->foreignId('usuario_id')->constrained('users');
        Schema::create('elements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('col_id')->constrained('cols')->onDelete('cascade');
            $table->foreignId('row_id')->constrained('rows')->onDelete('cascade');
            $table->foreignId('grid_id')->constrained('grids')->onDelete('cascade');;
            $table->string('text_text',100)->nullable();
            $table->string('text_bt_padding',20)->nullable();
            $table->integer('text_st_height')->nullable(); // con respecto a la imagen
            $table->string('text_bt_size',20)->nullable();
            $table->string('text_color',20)->nullable()->default('#000000');
            $table->integer('codart')->nullable();
            $table->string('img_file',50)->nullable();
            $table->string('img_direction',20)->nullable()->default('column');
            $table->integer('img_bt_order')->nullable();
            $table->string('img_bt_padding',20)->nullable();
            $table->integer('img_st_height')->nullable();
            $table->string('img_st_background',20)->nullable();
            $table->string('img_st_border_style',20)->nullable();
            $table->string('img_st_border_width',20)->nullable();
            $table->string('img_st_border_color',20)->nullable()->default('#000000');
            $table->string('img_st_border_radius',40)->nullable();
            $table->integer('st_height')->nullable()->default(1);
            $table->string('st_background',20)->nullable();
            $table->string('st_border_style',20)->nullable();
            $table->string('st_border_width',20)->nullable();
            $table->string('st_border_color',20)->nullable()->default('#000000');
            $table->string('st_border_radius',40)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elements');
    }
};

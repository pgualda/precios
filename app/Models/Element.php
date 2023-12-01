<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;


class Element extends Model
{
    use HasFactory;

    protected $table = 'elements';

    protected $fillable = [
        'col_id',
        'row_id',
        'grid_id',
        'text_text',
        'text_bt_padding',
        'text_st_height',
        'text_bt_size',
        'text_color',
        'codart',
        'img_file',
        'img_direction',
        'img_bt_order',
        'img_bt_padding',
        'img_st_height',
        'img_st_background',
        'img_st_border_style',
        'img_st_border_width',
        'img_st_border_color',
        'img_st_border_radius',
        'st_height',
        'st_background',
        'st_border_style',
        'st_border_width',
        'st_border_color',
        'st_border_radius',
    ];

    // 'img_st_border_top_left_radius',
    // 'img_st_border_top_right_radius',
    // 'img_st_border_bottom_right_radius',
    // 'img_st_border_bottom_left_radius',
    // 'st_border_top_left_radius',
    // 'st_border_top_right_radius',
    // 'st_border_bottom_right_radius',
    // 'st_border_bottom_left_radius'

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    //relacion de muchos a 1 (muchos articulos yienen un sector)
    public function col(): BelongsTo{
        return $this->belongsTo(Col::class);
    }
    // public function row(): BelongsTo{
    //     return $this->belongsTo(Row::class)->withDefault();;
    // }
    // public function grid(): BelongsTo{
    //     return $this->belongsTo(Grid::class)->withDefault();;
    // }

}

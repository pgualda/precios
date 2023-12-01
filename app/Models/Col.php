<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;


class Col extends Model
{
    use HasFactory;

    protected $table = 'cols';

    protected $fillable = [
        'nombre',
        'row_id',
        'grid_id',
        'bt_col',
        'bt_padding',
        'st_background',
        'st_border_style',
        'st_border_width',
        'st_border_color',
        'st_border_radius',
    ];
    // 'st_border_top_left_radius',
    // 'st_border_top_right_radius',
    // 'st_border_bottom_right_radius',
    // 'st_border_bottom_left_radius'

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function row(): BelongsTo {
        return $this->belongsTo(Row::class)->withDefault();;
    }
    public function elements(): HasMany {
        return $this->hasMany(Element::class);
   }


}

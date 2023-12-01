<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;


class Row extends Model
{
    use HasFactory;

    protected $table = 'rows';

    protected $fillable = [
        'nombre',
        'grid_id',
        'bt_padding',
        'st_height',
        'st_background',
        'st_border_style',
        'st_border_width',
        'st_border_color',
        'st_border_radius',
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function grid(): BelongsTo {
        return $this->belongsTo(Grid::class);
    }

    public function cols(): HasMany {
         return $this->hasMany(Col::class);
    }

}

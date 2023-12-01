<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;


class Scr extends Model
{
    use HasFactory;

    protected $table = 'scrs';

    protected $fillable = [
        'nombre',
        'sector_id',
        'grid_id',
        'activa_alt',
        'grid_alt_id',
        'fdd',
        'fhh',
        'ultimo_render'
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function sector(): BelongsTo{
        return $this->belongsTo(Sector::class)->withDefault();;
    }

    public function grid(): BelongsTo{
         return $this->belongsTo(Grid::class)->withDefault();;
    }

}

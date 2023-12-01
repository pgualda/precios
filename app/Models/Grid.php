<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;


class Grid extends Model
{
    use HasFactory;

    protected $table = 'grids';

    protected $fillable = [
        'nombre',
        'sector_id',
        'img_file',
        'background',
        'img_fondo'
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    //relacion de muchos a 1 (muchos grid tienen una scr)
    public function sector():Belongsto {
        return $this->belongsTo(Sector::class)->withDefault();;
    }

    public function scr():Belongsto {
        return $this->belongsTo(Scr::class)->withDefault();;
    }

    public function rows(): HasMany {
          return $this->hasMany(Row::class);
    }

}

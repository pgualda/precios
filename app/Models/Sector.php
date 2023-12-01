<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;

class Sector extends Model
{
    use HasFactory;

    protected $table = 'sectors';

    protected $fillable = [
        'nombre',
    ];


    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    // 1 sector esta en muchos articulos
    public function articulos(): HasMany{
        return $this->hasMany(Sector::class);
    }
}

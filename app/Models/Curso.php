<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Curso extends Model
{
    use HasFactory;

    public function materia(): BelongsTo {
        return $this->belongsTo(Materia::class);
    }

    public function anotaciones(): HasMany {
        return $this->hasMany(Anotacion::class);
    }

    protected $fillable = [
        'materia_id',
        'titulo',
        'autor',
        'descripcion',
        'calificacion'
    ];

    public static function rules() {
        return [
            'materia_id' => ['required'],
            'titulo' => ['required', 'max:50'],
            'autor' => ['required', 'max:50'],
            'descripcion' => ['required'],
            'calificacion' => ['required', 'regex:/^\d+(\.5)?$/'],
        ];
    }
}

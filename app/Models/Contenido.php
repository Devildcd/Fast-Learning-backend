<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contenido extends Model
{
    use HasFactory;

    public function materia(): BelongsTo {
        return $this->belongsTo(Materia::class);
    }

    public $timestamps = false;

    protected $fillable = [
        'materia_id',
        'nombre',
        'titulo',
        'notas',
        'autor',
        'oficial',
        'especial',
        'calificacion'
    ];

    protected $casts = [
        'oficial',
        'especial'
    ];

    public static function rules() {
        return [
            'materia_id' => ['required'],
            'nombre' => ['required', 'max:50'],
            'titulo' => ['required', 'max:50'],
            'notas' => ['required'],
            'autor' => ['required'],
        ];
    }
}

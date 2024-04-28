<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anotacion extends Model
{
    use HasFactory;

    public function curso(): BelongsTo {
        return $this->belongsTo(Curso::class);
    }

    protected $fillable = [
        'curso_id',
        'nombre',
        'titulo',
        'notas',
        'importante',
    ];

    protected $casts = [
        'importante'
    ];

    public static function rules() {
        return [
            'curso_id' => ['required'],
            'nombre' => ['required', 'max:50'],
            'titulo' => ['required', 'max:50'],
            'notas' => ['required'],
        ];
    }
}

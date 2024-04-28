<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Materia extends Model
{
    use HasFactory;

    public function contenidos(): HasMany {
        return $this->hasMany(Contenido::class);
    }

    public function cursos(): HasMany {
        return $this->hasMany(Curso::class);
    }

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public static function rules() {
        return [
            'nombre' => ['required', 'max:50'],
            'descripcion' => ['required']
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eixo extends Model
{
    use HasFactory;

    // Atributos que podem ser atribuídos em massa
    protected $fillable = ['nome', 'descricao'];

    // Relacionamento com os cursos (um eixo pode ter muitos cursos)
    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }
}

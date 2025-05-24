<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    // Atributos que podem ser atribuídos em massa
    protected $fillable = ['nome', 'ano', 'curso_id'];

    // Relacionamento com o curso (uma turma pertence a um curso)
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}

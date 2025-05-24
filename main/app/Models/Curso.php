<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    // Atributos que podem ser atribuídos em massa
    protected $fillable = ['nome', 'descricao'];

    // Relacionamento com as turmas (um curso pode ter muitas turmas)
    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }

    // Relacionamento com os eixos (um curso pertence a um eixo)
    public function eixo()
    {
        return $this->belongsTo(Eixo::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    use HasFactory;
    
    protected $table = 'solicitacoes';

    public const STATUS_PENDENTE  = 'pendente';
    public const STATUS_APROVADO  = 'aprovado';
    public const STATUS_REJEITADO = 'rejeitado';

    protected $fillable = [
        'user_id',
        'titulo',
        'descricao',
        'arquivo',
        'status',
        'horas',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

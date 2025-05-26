<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Atributos que podem ser atribuídos em massa.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'turma_id',    // ← adiciona turma_id
    ];
    
    /**
     * Tipos de dados dos atributos.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relacionamento: um usuário pode ter muitas solicitações.
     */
    public function solicitacoes()
    {
        return $this->hasMany(Solicitacao::class);
    }

    /**
     * Relacionamento: um usuário pertence a uma única turma.
     */
    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }

    /**
     * Verifica se o usuário tem o papel de administrador.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Ao atribuir password, já criptografa com bcrypt.
     */
    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = bcrypt($value);
    }
}

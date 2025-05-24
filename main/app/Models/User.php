<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Atributos que podem ser atribuídos em massa
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    // Tipos de dados dos atributos
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relacionamento com solicitações (um usuário pode ter muitas solicitações)
    public function solicitacoes()
    {
        return $this->hasMany(Solicitacao::class);
    }

    // Relacionamento com a turma (um usuário pode estar em várias turmas, caso aplicável)
    public function turmas()
    {
        return $this->belongsToMany(Turma::class, 'user_turma');
    }

    // Atributo para verificar se o usuário é administrador
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // Lógica de autenticação usando o bcrypt
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}

<?php

namespace App\Models;

// Importa os traits HasFactory e Notifiable do Laravel
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// Define a classe Usuario, que estende a classe Authenticatable fornecida pelo Laravel
class Usuario extends Authenticatable
{
    // Usa os traits HasFactory e Notifiable na classe Usuario
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // Define o nome da tabela associada ao modelo
    protected $table = 'usu_usuario';
    // Define a chave primária da tabela
    protected $primaryKey = 'usu_id';
    // Define quais colunas podem ser massivamente atribuídas
    protected $fillable = [
        'usu_email',
        'usu_senha',
        'usu_tipo',
        'usu_data_cadastro',
        'usu_ultimo_login',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // Define os atributos que devem ser ocultos ao serializar o modelo
    protected $hidden = [
        'usu_senha',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    // Define como certos atributos devem ser convertidos ao serializar o modelo
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'usu_senha' => 'hashed', // Converte a senha para um valor criptografado
        ];
    }
}

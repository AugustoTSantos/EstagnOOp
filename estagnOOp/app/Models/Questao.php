<?php

// declara o namespace onde a classe está localizada
namespace App\Models;

// importam as classes HasFactory e Model do Laravel.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// declara a classe e indica que ela estende a classe Model.
class Questao extends Model
{
    use HasFactory; // Usa o trait HasFactory para fornecer métodos de fábrica para o modelo

    protected $table = 'que_questao'; // Define o nome da tabela associada ao modelo
    protected $primaryKey = 'que_id'; // Define a chave primária da tabela
    protected $fillable = [ // Define quais colunas podem ser massivamente atribuídas
        'que_titulo',
        'que_enunciado',
        'que_peso',
        'que_usu_id'
    ];

    // Define relacionamentos com outros modelos
    public function usuario() {
        return $this->belongsTo(Usuario::class, 'que_usu_id', 'usu_id');
    }
}

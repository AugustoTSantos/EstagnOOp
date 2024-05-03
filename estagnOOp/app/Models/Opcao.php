<?php

// declara o namespace onde a classe está localizada
namespace App\Models;

// importam as classes HasFactory e Model do Laravel.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// declara a classe e indica que ela estende a classe Model.
class Opcao extends Model
{
    use HasFactory; // Usa o trait HasFactory para fornecer métodos de fábrica para o modelo

    protected $table = 'opc_opcao'; // Define o nome da tabela associada ao modelo
    protected $primaryKey = 'opc_id'; // Define a chave primária da tabela
    protected $fillable = [ // Define quais colunas podem ser massivamente atribuídas
        'opc_texto',
        'opc_resposta',
        'opc_que_id',
    ];

    // Define relacionamentos com outros modelos
    public function questoes() {
        return $this->belongsTo(Questao::class, 'opc_que_id', 'que_id');
    }
}

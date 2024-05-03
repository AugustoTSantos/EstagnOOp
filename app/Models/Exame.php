<?php

// declara o namespace onde a classe está localizada
namespace App\Models;

// importam as classes HasFactory e Model do Laravel.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// declara a classe e indica que ela estende a classe Model.
class Exame extends Model
{
    use HasFactory; // Usa o trait HasFactory para fornecer métodos de fábrica para o modelo

    protected $table = 'exa_exame'; // Define o nome da tabela associada ao modelo
    protected $primaryKey = ['exa_id']; // Define a chave primária da tabela
    protected $fillable = [ // Define quais colunas podem ser massivamente atribuídas
        'exa_que_id',
        'exa_pro_id',
    ];

    // Define relacionamentos com outros modelos
    public function questoes() {
        return $this->belongsTo(Questao::class, 'exa_que_id', 'que_id');
    }

    public function provas() {
        return $this->belongsTo(Prova::class, 'exa_pro_id', 'pro_id');
    }
}

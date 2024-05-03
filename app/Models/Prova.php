<?php

// declara o namespace onde a classe está localizada
namespace App\Models;

// importam as classes HasFactory e Model do Laravel.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// declara a classe e indica que ela estende a classe Model.
class Prova extends Model
{
    use HasFactory; // Usa o trait HasFactory para fornecer métodos de fábrica para o modelo

    protected $table = 'pro_prova'; // Define o nome da tabela associada ao modelo
    protected $primaryKey = 'pro_id'; // Define a chave primária da tabela
    protected $fillable = [ // Define quais colunas podem ser massivamente atribuídas
        'pro_nome',
        'pro_nota',
        'pro_usu_id',
    ];

    // Define relacionamentos com outros modelos
    public function usuarios() {
        return $this->belongsTo(User::class, 'pro_usu_id', 'id');
    }
}

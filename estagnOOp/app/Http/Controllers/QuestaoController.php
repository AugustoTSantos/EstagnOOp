<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questao;

class QuestaoController extends Controller
{
    // Método para exibir todas as questões
    public function index()
    {
        // Obtém todas as questões do banco de dados
        $questoes = Questao::all();

        // Retorna uma resposta JSON com todas as questões
        return response()->json($questoes);
    }

    // Método para exibir uma questão específica
    public function show($que_id)
    {
        // Busca uma questão pelo seu ID
        $questao = Questao::findOrFail($que_id);

        // Retorna uma resposta JSON com a questão encontrada
        return response()->json($questao);
    }

    // Método para armazenar uma nova questão
    public function store(Request $request)
    {
        // Cria um novo objeto de questão com os dados fornecidos na requisição
        $questao = new Questao();
        $questao->fill($request->all()); // Preenche a questão com os dados da requisição
        $questao->save(); // Salva a questão no banco de dados

        // Retorna uma resposta JSON com a questão recém-criada e o código de status 201 (Created)
        return response()->json($questao, 201);
    }

    // Método para atualizar uma questão existente
    public function update(Request $request, $que_id)
    {
        // Busca uma questão pelo seu ID
        $questao = Questao::findOrFail($que_id);

        // Atualiza os dados da questão com os dados fornecidos na requisição
        $questao->update($request->all());

        // Retorna uma resposta JSON com a questão atualizada e o código de status 200 (OK)
        return response()->json($questao, 200);
    }

    // Método para excluir uma questão
    public function destroy($que_id)
    {
        // Busca uma questão pelo seu ID
        $questao = Questao::findOrFail($que_id);

        // Exclui a questão do banco de dados
        $questao->delete();

        // Retorna uma resposta vazia com o código de status 204 (No Content)
        return response()->json(null, 204);
    }
}

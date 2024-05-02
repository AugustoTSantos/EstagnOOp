<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prova; // Importa o modelo Prova

class ProvaController extends Controller
{
    // Método para exibir todas as provas
    public function index()
    {
        // Obtém todas as provas do banco de dados
        $provas = Prova::all();

        // Retorna uma resposta JSON com todas as provas
        return response()->json($provas);
    }

    // Método para exibir uma prova específica
    public function show($pro_id)
    {
        // Busca uma prova pelo seu ID
        $prova = Prova::findOrFail($pro_id);

        // Retorna uma resposta JSON com a prova encontrada
        return response()->json($prova);
    }

    // Método para armazenar uma nova prova
    public function store(Request $request)
    {
        // Cria um novo objeto de prova com os dados fornecidos na requisição
        $prova = new Prova();
        $prova->fill($request->all()); // Preenche a prova com os dados da requisição
        $prova->save(); // Salva a prova no banco de dados

        // Retorna uma resposta JSON com a prova recém-criada e o código de status 201 (Created)
        return response()->json($prova, 201);
    }

    // Método para atualizar uma prova existente
    public function update(Request $request, $pro_id)
    {
        // Busca uma prova pelo seu ID
        $prova = Prova::findOrFail($pro_id);

        // Atualiza os dados da prova com os dados fornecidos na requisição
        $prova->update($request->all());

        // Retorna uma resposta JSON com a prova atualizada e o código de status 200 (OK)
        return response()->json($prova, 200);
    }

    // Método para excluir uma prova
    public function destroy($pro_id)
    {
        // Busca uma prova pelo seu ID
        $prova = Prova::findOrFail($pro_id);

        // Exclui a prova do banco de dados
        $prova->delete();

        // Retorna uma resposta vazia com o código de status 204 (No Content)
        return response()->json(null, 204);
    }
}

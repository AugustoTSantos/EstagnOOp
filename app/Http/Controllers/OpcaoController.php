<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opcao;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOpcaoRequest;
use App\Http\Requests\UpdateOpcaoRequest;

class OpcaoController extends Controller
{
    // Método para exibir todas as opções
    public function index()
    {
        // Obtém todas as opções do banco de dados
        $opcoes = Opcao::all();

        // Retorna uma resposta JSON com todas as opções
        return response()->json($opcoes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    // Método para armazenar uma nova opção
    public function store(Request $request)
    {
        // Cria um novo objeto de opção com os dados fornecidos na requisição
        $opcao = new Opcao();
        $opcao->fill($request->all()); // Preenche a opção com os dados da requisição
        $opcao->save(); // Salva a opção no banco de dados

        // Retorna uma resposta JSON com a opção recém-criada e o código de status 201 (Created)
        return response()->json($opcao, 201);
    }

    // Método para exibir uma opção específica
    public function show($opc_id)
    {
        // Busca uma opção pelo seu ID
        $opcao = Opcao::findOrFail($opc_id);

        // Retorna uma resposta JSON com a opção encontrada
        return response()->json($opcao);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Opcao $opcao)
    {
        //
    }

    // Método para atualizar uma opção existente
    public function update(Request $request, $opc_id)
    {
        // Busca uma opção pelo seu ID
        $opcao = Opcao::findOrFail($opc_id);

        // Atualiza os dados da opção com os dados fornecidos na requisição
        $opcao->update($request->all());

        // Retorna uma resposta JSON com a opção atualizada e o código de status 200 (OK)
        return response()->json($opcao, 200);
    }

    // Método para excluir uma opção
    public function destroy($opc_id)
    {
        // Busca uma opção pelo seu ID
        $opcao = Opcao::findOrFail($opc_id);

        // Exclui a opção do banco de dados
        $opcao->delete();

        // Retorna uma resposta vazia com o código de status 204 (No Content)
        return response()->json(null, 204);
    }
}

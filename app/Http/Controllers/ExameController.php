<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exame;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExameRequest;
use App\Http\Requests\UpdateExameRequest;

class ExameController extends Controller
{
    // Método para exibir todos os exames
    public function index()
    {
        // Obtém todos os exames do banco de dados
        $exames = Exame::all();

        // Retorna uma resposta JSON com todos os exames
        return response()->json($exames);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    // Método para armazenar um novo exame
    public function store(Request $request)
    {
        // Cria um novo objeto de exame com os dados fornecidos na requisição
        $exame = new Exame();
        $exame->fill($request->all()); // Preenche o exame com os dados da requisição
        $exame->save(); // Salva o exame no banco de dados

        // Retorna uma resposta JSON com o exame recém-criado e o código de status 201 (Created)
        return response()->json($exame, 201);
    }

    // Método para exibir um exame específico
    public function show($exa_que_id, $exa_pro_id)
    {
        // Busca um exame pelo seu ID
        $exame = Exame::where('exa_que_id', $exa_que_id)->where('exa_pro_id', $exa_pro_id)->firstOrFail();

        // Retorna uma resposta JSON com o exame encontrado
        return response()->json($exame);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exame $exame)
    {
        //
    }

    // Método para atualizar um exame existente
    public function update(Request $request, $exa_que_id, $exa_pro_id)
    {
        // Busca um exame pelo seu ID
        $exame = Exame::where('exa_que_id', $exa_que_id)->where('exa_pro_id', $exa_pro_id)->firstOrFail();

        // Atualiza os dados do exame com os dados fornecidos na requisição
        $exame->update($request->all());

        // Retorna uma resposta JSON com o exame atualizado e o código de status 200 (OK)
        return response()->json($exame, 200);
    }

    // Método para excluir um exame
    public function destroy($exa_que_id, $exa_pro_id)
    {
        // Busca um exame pelo seu ID
        $exame = Exame::where('exa_que_id', $exa_que_id)->where('exa_pro_id', $exa_pro_id)->firstOrFail();

        // Exclui o exame do banco de dados
        $exame->delete();

        // Retorna uma resposta vazia com o código de status 204 (No Content)
        return response()->json(null, 204);
    }
}

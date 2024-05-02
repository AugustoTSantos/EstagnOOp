<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario; // Importa o modelo Usuario

class UsuarioController extends Controller
{
    // Método para exibir todos os usuários
    public function index()
    {
        // Obtém todos os usuários do banco de dados
        $usuarios = Usuario::all();

        // Retorna uma resposta JSON com todos os usuários
        return response()->json($usuarios);
    }

    // Método para exibir um usuário específico
    public function show($id)
    {
        // Busca um usuário pelo seu ID
        $usuario = Usuario::findOrFail($id);

        // Retorna uma resposta JSON com o usuário encontrado
        return response()->json($usuario);
    }

    // Método para armazenar um novo usuário
    public function store(Request $request)
    {
        // Cria um novo objeto de usuário com os dados fornecidos na requisição
        $usuario = new Usuario();
        $usuario->fill($request->all()); // Preenche o usuário com os dados da requisição
        $usuario->save(); // Salva o usuário no banco de dados

        // Retorna uma resposta JSON com o usuário recém-criado e o código de status 201 (Created)
        return response()->json($usuario, 201);
    }

    // Método para atualizar um usuário existente
    public function update(Request $request, $id)
    {
        // Busca um usuário pelo seu ID
        $usuario = Usuario::findOrFail($id);

        // Atualiza os dados do usuário com os dados fornecidos na requisição
        $usuario->update($request->all());

        // Retorna uma resposta JSON com o usuário atualizado e o código de status 200 (OK)
        return response()->json($usuario, 200);
    }

    // Método para excluir um usuário
    public function destroy($id)
    {
        // Busca um usuário pelo seu ID
        $usuario = Usuario::findOrFail($id);

        // Exclui o usuário do banco de dados
        $usuario->delete();

        // Retorna uma resposta vazia com o código de status 204 (No Content)
        return response()->json(null, 204);
    }
}

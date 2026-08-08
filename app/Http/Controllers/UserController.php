<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserCollection;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(private readonly UserService $service) {}

    /**
     * Listar usuários
     *
     * Retorna a lista paginada de usuários.
     *
     * @group Usuários
     */
    public function index(Request $request): UserCollection
    {
        $users = $this->service->index($request->all());

        return new UserCollection($users);
    }

    /**
     * Criar usuário
     *
     * @group Usuários
     */
    public function store(StoreUserRequest $request)
    {
        $this->service->store($request->validated());

        return response()->json([
            'message' => 'Usuário criado com sucesso.'
        ], 201);
    }

    /**
     * Atualizar usuário
     *
     * @group Usuários
     */
    public function update(UpdateUserRequest $request, string $uuid)
    {
        $this->service->update($uuid, $request->validated());

        return response()->json([
            'message' => 'Usuário atualizado com sucesso.'
        ]);
    }

    /**
     * Deletar usuário
     *
     * @group Usuários
     */
    public function delete(string $uuid)
    {
        $this->service->delete($uuid);

        return response()->json([
            'message' => 'Usuário excluído com sucesso.'
        ]);
    }

    /**
     * Restaurar usuário
     *
     * @group Usuários
     */
    public function restore(string $uuid)
    {
        $this->service->restore($uuid);

        return response()->json([
            'message' => 'Usuário restaurado com sucesso.'
        ]);
    }
}

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
     * Display a listing of the resource.
     */
    public function index(Request $request): UserCollection
    {
        $users = $this->service->index($request->all());

        return new UserCollection($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(StoreUserRequest $request)
    {
        $this->service->store($request->validated());

        return response()->json([
            'message' => 'Usuário criado com sucesso.'
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Condominio\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\UserRequest;

use App\Http\Resources\Condominio\Api\User\{
    UserCollection,
    UserResource,
};

use App\Models\Condominio\Painel\User;

use Illuminate\Support\Facades\{
    Storage,
    Hash,
};

class UserApiController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->id <= '3') {
            $users = $this->user->with('condominio', 'bloco', 'unidade', 'role')->latest()->paginate(15);
        } else {
            $users = $this->user->where('id', '=', auth()->user()->id)
                ->with('condominio', 'bloco', 'unidade', 'role')
                ->latest()
                ->paginate(15);
        }
        return new UserCollection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $nome_imagem = $request->image->getClientOriginalName();
            $request->image->storeAs('User', $nome_imagem);
        } else {
            $nome_imagem = 'default.jpg';
        }

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $data['image'] = $nome_imagem;

        if ($this->user->create($data)) {
            return response()->json([
                'data' => [
                    'msg' => 'Usuário cadastrado com sucesso'
                ]
            ], 200);
        } else {
            return response()->json(['error' => [
                'msg' => 'Falha ao cadastrar o usuário'
            ]], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $url)
    {
        if (!$user = $this->user->with('condominio', 'bloco', 'unidade', 'role')->where('url', $url)->first()) {
            return response()->json(['error' => [
                'msg' => 'Item não encontrado'
            ]], 404);
        }
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $url)
    {
        if (!$user = $this->user->with('condominio', 'bloco', 'unidade', 'role')->where('url', $url)->first()) {
            return response()->json(['error' => [
                'msg' => 'Item não encontrado'
            ]], 404);
        }

        //Update de Imagem
        if ($request->image) {
            if (Storage::exists($user->image)) {
                Storage::delete($user->image);
            }

            $nome_imagem_edit = $request->image->getClientOriginalName();
            $request->image->storeAs('User', $nome_imagem_edit);
        } elseif ($request->image === null) {
            $nome_imagem_edit = $user['image'];
        } else {
            $nome_imagem_edit = 'default.jpg';
        }
        //Update de Imagem

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $data['image'] = $nome_imagem_edit;

        if ($user->update($data)) {
            return response()->json([
                'data' => [
                    'msg' => 'Usuário editado com sucesso'
                ]
            ], 200);
        } else {
            return response()->json(['error' => [
                'msg' => 'Falha ao editar o usuário'
            ]], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $url)
    {
        if (!$user = $this->user->with('condominio', 'bloco', 'unidade', 'role')->where('url', $url)->first()) {
            return response()->json(['error' => [
                'msg' => 'Item não encontrado'
            ]], 404);
        }

        if ($user->id <= '4') {
            return response()->json(['error' => [
                'msg' => 'Você não pode deletar usuário padrão do sistema'
            ]], 422);
        }

        if ($user->delete()) {
            return response()->json([
                'data' => [
                    'msg' => 'Usuário excluído com sucesso'
                ]
            ], 200);
        } else {
            return response()->json(['error' => [
                'msg' => 'Falha ao excluir o usuário'
            ]], 422);
        }
    }
}

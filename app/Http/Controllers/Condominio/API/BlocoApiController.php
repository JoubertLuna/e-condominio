<?php

namespace App\Http\Controllers\Condominio\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\BlocoRequest;

use App\Http\Resources\Condominio\Api\Bloco\{
    BlocoCollection,
    BlocoResource
};

use App\Models\Condominio\Painel\{
    Bloco,
    Condominio
};

class BlocoApiController extends Controller
{
    private $bloco, $condominio;

    public function __construct(Bloco $bloco, Condominio $condominio)
    {
        $this->bloco = $bloco;
        $this->condominio = $condominio;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->id <= '3') {
            $blocos = $this->bloco->with('condominio')->latest()->paginate(15);
        } else {
            $blocos = $this->bloco->where('id', '=', auth()->user()->bloco_id)
                ->with('condominio')
                ->latest()
                ->paginate(15);
        }
        return new BlocoCollection($blocos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlocoRequest $request)
    {
        if ($this->bloco->create($request->all())) {
            return response()->json([
                'data' => [
                    'msg' => 'Bloco cadastrado com sucesso'
                ]
            ], 200);
        } else {
            return response()->json(['error' => [
                'msg' => 'Falha ao cadastrar o bloco'
            ]], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $url)
    {
        if (!$bloco = $this->bloco->with('condominio')->where('url', $url)->first()) {
            return response()->json(['error' => [
                'msg' => 'Item não encontrado'
            ]], 404);
        }
        return new BlocoResource($bloco);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlocoRequest $request, string $url)
    {
        if (!$bloco = $this->bloco->with('condominio')->where('url', $url)->first()) {
            return response()->json(['error' => [
                'msg' => 'Item não encontrado'
            ]], 404);
        }

        if ($bloco->update($request->all())) {
            return response()->json([
                'data' => [
                    'msg' => 'Bloco editado com sucesso'
                ]
            ], 200);
        } else {
            return response()->json(['error' => [
                'msg' => 'Falha ao editar o bloco'
            ]], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $url)
    {
        if (!$bloco = $this->bloco->with('condominio')->where('url', $url)->first()) {
            return response()->json(['error' => [
                'msg' => 'Item não encontrado'
            ]], 404);
        }

        if ($bloco->id == $this->bloco->first()->id && $bloco->id <= '1') {
            return response()->json(['error' => [
                'msg' => 'Você não pode deletar bloco padrão do sistema'
            ]], 422);
        }

        if ($bloco->delete()) {
            return response()->json([
                'data' => [
                    'msg' => 'Bloco excluído com sucesso'
                ]
            ], 200);
        } else {
            return response()->json(['error' => [
                'msg' => 'Falha ao excluir o bloco'
            ]], 422);
        }
    }
}

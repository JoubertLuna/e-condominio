<?php

namespace App\Http\Controllers\Condominio\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Condominio\Api\Unidade\UnidadeCollection;
use App\Http\Resources\Condominio\Api\Unidade\UnidadeResource;
use App\Models\Condominio\Painel\Unidade;

use Illuminate\Http\Request;

class UnidadeApiController extends Controller
{
    private $unidade;

    public function __construct(Unidade $unidade)
    {
        $this->unidade = $unidade;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->id <= '3') {
            $unidades = $this->unidade->with('bloco')->latest()->paginate(15);
        } else {
            $unidades = $this->unidade->where('id', '=', auth()->user()->unidade_id)
                ->with('bloco')
                ->latest()
                ->paginate(15);
        }
        return new UnidadeCollection($unidades);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($this->unidade->create($request->all())) {
            return response()->json([
                'data' => [
                    'msg' => 'Unidade cadastrada com sucesso'
                ]
            ], 200);
        } else {
            return response()->json(['error' => [
                'msg' => 'Falha ao cadastrar a unidade'
            ]], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $url)
    {
        if (!$unidade = $this->unidade->with('bloco')->where('url', $url)->first()) {
            return response()->json(['error' => [
                'msg' => 'Item não encontrado'
            ]], 404);
        }
        return new UnidadeResource($unidade);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $url)
    {
        if (!$unidade = $this->unidade->with('bloco')->where('url', $url)->first()) {
            return response()->json(['error' => [
                'msg' => 'Item não encontrado'
            ]], 404);
        }

        if ($unidade->update($request->all())) {
            return response()->json([
                'data' => [
                    'msg' => 'Unidade editada com sucesso'
                ]
            ], 200);
        } else {
            return response()->json(['error' => [
                'msg' => 'Falha ao editar a unidade'
            ]], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $url)
    {
        if (!$unidade = $this->unidade->with('bloco')->where('url', $url)->first()) {
            return response()->json(['error' => [
                'msg' => 'Item não encontrado'
            ]], 404);
        }

        if ($unidade->id == $this->unidade->first()->id && $unidade->id <= '1') {
            return response()->json(['error' => [
                'msg' => 'Você não pode deletar unidade padrão do sistema'
            ]], 422);
        }

        if ($unidade->delete()) {
            return response()->json([
                'data' => [
                    'msg' => 'Unidade excluída com sucesso'
                ]
            ], 200);
        } else {
            return response()->json(['error' => [
                'msg' => 'Falha ao excluir a unidade'
            ]], 422);
        }
    }
}

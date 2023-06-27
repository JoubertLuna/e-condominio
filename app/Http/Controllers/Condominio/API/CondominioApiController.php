<?php

namespace App\Http\Controllers\Condominio\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\CondominioRequest;
use App\Http\Resources\Condominio\Api\Condominio\CondominioCollection;
use App\Http\Resources\Condominio\Api\Condominio\CondominioResource;
use App\Models\Condominio\Painel\Condominio;
use Illuminate\Support\Facades\Storage;

class CondominioApiController extends Controller
{
    private $condominio;

    public function __construct(Condominio $condominio)
    {
        $this->condominio = $condominio;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->id <= '3') {
            $condominios = $this->condominio->latest()->paginate(15);
        } else {
            $condominios = $this->condominio->where('id', '=', auth()->user()->condominio_id)
                ->latest()
                ->paginate(15);
        }
        return new CondominioCollection($condominios);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $url)
    {
        if (!$condominio = $this->condominio->where('url', $url)->first()) {
            return response()->json(['error' => [
                'msg' => 'Item não encontrado'
            ]], 404);
        }
        return new CondominioResource($condominio);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CondominioRequest $request, string $url)
    {
        if (!$condominio = $this->condominio->where('url', $url)->first()) {
            return response()->json(['error' => [
                'msg' => 'Item não encontrado'
            ]], 404);
        }

        //Update de Imagem
        if ($request->image) {
            if (Storage::exists($condominio->image)) {
                Storage::delete($condominio->image);
            }

            $nome_imagem_edit = $request->image->getClientOriginalName();
            $request->image->storeAs('Condominio', $nome_imagem_edit);
        } elseif ($request->image === null) {
            $nome_imagem_edit = $condominio['image'];
        } else {
            $nome_imagem_edit = 'default.png';
        }
        //Update de Imagem

        $data = $request->all();
        $data['image'] = $nome_imagem_edit;

        if ($condominio->update($data)) {
            return response()->json([
                'data' => [
                    'msg' => 'Condomínio editado com sucesso'
                ]
            ], 200);
        } else {
            return response()->json(['error' => [
                'msg' => 'Falha ao editar o condomínio'
            ]], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $url)
    {
        if (!$condominio = $this->condominio->where('url', $url)->first()) {
            return response()->json(['error' => [
                'msg' => 'Item não encontrado'
            ]], 404);
        }

        if ($condominio->id == $this->condominio->first()->id && $condominio->id <= '1') {
            return response()->json(['error' => [
                'msg' => 'Você não pode deletar condomínio padrão do sistema'
            ]], 422);
        }

        if ($condominio->delete()) {
            return response()->json([
                'data' => [
                    'msg' => 'Condomínio excluído com sucesso'
                ]
            ], 200);
        } else {
            return response()->json(['error' => [
                'msg' => 'Falha ao excluir o condomínio'
            ]], 422);
        }
    }
}

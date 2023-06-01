<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\CondominioRequest;
use App\Models\Condominio\Painel\Condominio;
use Illuminate\Support\Facades\Storage;

class CondominioController extends Controller
{
    private $condominio;

    public function __construct(Condominio $condominio)
    {
        $this->condominio = $condominio;
    }

    /**
     * index
     */
    public function index()
    {
        $condominios = $this->condominio->latest()->paginate(100000000);
        return view('Condominio.Painel.Pages.Condominio.index', compact('condominios'));
    }

    /**
     * show
     */
    public function show($url)
    {
        if (!$condominio = $this->condominio->where('url', $url)->first()) {
            return redirect()->back();
        }

        return view('Condominio.Painel.Pages.Condominio.show', compact('condominio'));
    }

    /**
     * edit
     */
    public function edit($url)
    {
        if (!$condominio = $this->condominio->where('url', $url)->first()) {
            return redirect()->back();
        }

        return view('Condominio.Painel.Pages.Condominio.edit', compact('condominio'));
    }

    /**
     * update
     */
    public function update(CondominioRequest $request, $url)
    {
        if (!$condominio = $this->condominio->where('url', $url)->first()) {
            return redirect()->back();
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

        $data = $request->except('_token', '_method');
        $data['image'] = $nome_imagem_edit;

        if ($condominio->update($data)) {
            return redirect()->route('condominio.index')->with('success', 'Condomínio editado com sucesso');
        } else {
            return redirect()->route('condominio.index')->with('error', 'Falha ao editar o condomínio');
        }
    }

    /**
     * destroy
     */
    public function destroy($url)
    {
        if (!$condominio = $this->condominio->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($condominio->id == $this->condominio->first()->id && $condominio->id <= '1') {
            return redirect()->back()->with('error', 'Você não pode deletar condomínio padrão do sistema');
        }

        if ($condominio->delete()) {
            return redirect()->route('condominio.index')->with('danger', 'Condomínio excluído com sucesso');
        } else {
            return redirect()->route('condominio.index')->with('error', 'Falha ao excluir o condomínio');
        }
    }
}

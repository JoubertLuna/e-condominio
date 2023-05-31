<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\BlocoRequest;

use App\Models\Condominio\Painel\{
    Bloco,
    Condominio,
};

class BlocoController extends Controller
{
    private $bloco, $condominio;

    public function __construct(Bloco $bloco, Condominio $condominio)
    {
        $this->bloco = $bloco;
        $this->condominio = $condominio;
    }

    /**
     * index
     */
    public function index()
    {
        $blocos = $this->bloco->with('condominio')->paginate(100000000);
        $condominios = $this->condominio->all('id', 'nome');
        return view('Condominio.Painel.Pages.Bloco.index', compact('blocos', 'condominios'));
    }

    /**
     * Create
     */
    public function create()
    {
        $condominios = $this->condominio->all('id', 'nome');
        return view('Condominio.Painel.Pages.Bloco.create', compact('condominios'));
    }

    /**
     * Store
     */
    public function store(BlocoRequest $request)
    {
        if ($this->bloco->create($request->except('_token'))) {
            return redirect()->route('bloco.index')->with('success', 'Bloco cadastrado com sucesso');
        } else {
            return redirect()->route('bloco.index')->with('error', 'Falha ao cadastrar o bloco');
        }
    }

    /**
     * Show
     */
    public function show($id)
    {
        if (!$bloco = $this->bloco->with('condominio')->find($id)) {
            return redirect()->back();
        }

        $condominios = $this->condominio->all('id', 'nome');
        return view('Condominio.Painel.Pages.Bloco.show', compact('bloco', 'condominios'));
    }

    /**
     * Edit
     */
    public function edit($id)
    {
        if (!$bloco = $this->bloco->with('condominio')->find($id)) {
            return redirect()->back();
        }

        $condominios = $this->condominio->all('id', 'nome');
        return view('Condominio.Painel.Pages.Bloco.edit', compact('bloco', 'condominios'));
    }

    /**
     * Update
     */
    public function update(blocoRequest $request, $id)
    {
        if (!$bloco = $this->bloco->with('condominio')->find($id)) {
            return redirect()->back();
        }

        if ($bloco->update($request->except('_token', '_method'))) {
            return redirect()->route('bloco.index')->with('success', 'Bloco editado com sucesso');
        } else {
            return redirect()->route('bloco.index')->with('error', 'Falha ao editar o bloco');
        }
    }

    /**
     * destroy
     */
    public function destroy($id)
    {
        if (!$bloco = $this->bloco->with('condominio')->find($id)) {
            return redirect()->back();
        }

        if ($bloco->id == $this->bloco->first()->id && $bloco->id <= '1') {
            return redirect()->back()->with('error', 'Você não pode deletar bloco padrão do sistema');
        }

        if ($bloco->delete()) {
            return redirect()->route('bloco.index')->with('danger', 'Bloco excluído com sucesso!');
        } else {
            return redirect()->route('bloco.index')->with('error', 'Falha ao excluir o bloco');
        }
    }
}

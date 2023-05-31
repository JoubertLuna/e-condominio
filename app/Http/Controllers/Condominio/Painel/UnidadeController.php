<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\UnidadeRequest;

use App\Models\Condominio\Painel\{
    Bloco,
    Unidade
};

class UnidadeController extends Controller
{
    private $bloco, $unidade;

    public function __construct(Bloco $bloco, Unidade $unidade)
    {
        $this->bloco = $bloco;
        $this->unidade = $unidade;
    }

    /**
     * Index
     */
    public function index()
    {
        $unidades = $this->unidade->with('bloco')->paginate(100000000);
        $blocos = $this->bloco->all('id', 'nome');
        return view('Condominio.Painel.Pages.Unidade.index', compact('blocos', 'unidades'));
    }

    /**
     * create
     */
    public function create()
    {
        $blocos = $this->bloco->all('id', 'nome');
        return view('Condominio.Painel.Pages.Unidade.create', compact('blocos'));
    }

    /**
     * store
     */
    public function store(UnidadeRequest $request)
    {
        if ($this->unidade->create($request->except('_token'))) {
            return redirect()->route('unidade.index')->with('success', 'Unidade cadastrada com sucesso');
        } else {
            return redirect()->route('unidade.index')->with('error', 'Falha ao cadastrar a unidade');
        }
    }

    /**
     * show
     */
    public function show($id)
    {
        if (!$unidade = $this->unidade->with('bloco')->find($id)) {
            return redirect()->back();
        }

        $blocos = $this->bloco->all('id', 'nome');
        return view('Condominio.Painel.Pages.Unidade.show', compact('unidade', 'blocos'));
    }

    /**
     * edit
     */
    public function edit($id)
    {
        if (!$unidade = $this->unidade->with('bloco')->find($id)) {
            return redirect()->back();
        }

        $blocos = $this->bloco->all('id', 'nome');
        return view('Condominio.Painel.Pages.Unidade.edit', compact('unidade', 'blocos'));
    }

    /**
     * update
     */
    public function update(UnidadeRequest $request, $id)
    {
        if (!$unidade = $this->unidade->with('bloco')->find($id)) {
            return redirect()->back();
        }

        if ($unidade->update($request->except('_token', '_method'))) {
            return redirect()->route('unidade.index')->with('success', 'Unidade editada com sucesso');
        } else {
            return redirect()->route('unidade.index')->with('error', 'Falha ao editar a unidade');
        }
    }

    /**
     * destroy
     */
    public function destroy($id)
    {
        if (!$unidade = $this->unidade->with('bloco')->find($id)) {
            return redirect()->back();
        }

        if ($unidade->id == $this->unidade->first()->id && $unidade->id <= '1') {
            return redirect()->back()->with('error', 'Você não pode deletar unidade padrão do sistema');
        }

        if ($unidade->delete()) {
            return redirect()->route('unidade.index')->with('danger', 'Unidade excluída com sucesso!');
        } else {
            return redirect()->route('unidade.index')->with('error', 'Falha ao excluir a unidade');
        }
    }
}

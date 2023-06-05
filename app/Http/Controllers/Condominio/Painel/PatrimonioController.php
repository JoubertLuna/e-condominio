<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\PatrimonioRequest;
use App\Models\Condominio\Painel\{
    Condominio,
    Patrimonio
};

class PatrimonioController extends Controller
{
    private $patrimonio, $condominio;

    public function __construct(Patrimonio $patrimonio, Condominio $condominio)
    {
        $this->patrimonio = $patrimonio;
        $this->condominio = $condominio;
    }

    /**
     * index
     */
    public function index()
    {
        $patrimonios = $this->patrimonio->with('condominio')->paginate(100000000);
        $condominios = $this->condominio->all('id', 'nome');
        return view('Condominio.Painel.Pages.Patrimonio.index', compact('patrimonios', 'condominios'));
    }

    /**
     * Create
     */
    public function create()
    {
        $condominios = $this->condominio->all('id', 'nome');
        return view('Condominio.Painel.Pages.Patrimonio.create', compact('condominios'));
    }

    /**
     * Store
     */
    public function store(PatrimonioRequest $request)
    {
        if ($this->patrimonio->create($request->except('_token'))) {
            return redirect()->route('patrimonio.index')->with('success', 'Patrimônio cadastrado com sucesso');
        } else {
            return redirect()->route('patrimonio.index')->with('error', 'Falha ao cadastrar o patrimônio');
        }
    }

    /**
     * Show
     */
    public function show($url)
    {
        if (!$patrimonio = $this->patrimonio->with('condominio')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $condominios = $this->condominio->all('id', 'nome');
        return view('Condominio.Painel.Pages.Patrimonio.show', compact('patrimonio', 'condominios'));
    }

    /**
     * Edit
     */
    public function edit($url)
    {
        if (!$patrimonio = $this->patrimonio->with('condominio')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $condominios = $this->condominio->all('id', 'nome');
        return view('Condominio.Painel.Pages.Patrimonio.edit', compact('patrimonio', 'condominios'));
    }

    /**
     * Update
     */
    public function update(patrimonioRequest $request, $url)
    {
        if (!$patrimonio = $this->patrimonio->with('condominio')->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($patrimonio->update($request->except('_token', '_method'))) {
            return redirect()->route('patrimonio.index')->with('success', 'Patrimônio editado com sucesso');
        } else {
            return redirect()->route('patrimonio.index')->with('error', 'Falha ao editar o patrimônio');
        }
    }

    /**
     * destroy
     */
    public function destroy($url)
    {
        if (!$patrimonio = $this->patrimonio->with('condominio')->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($patrimonio->delete()) {
            return redirect()->route('patrimonio.index')->with('danger', 'Patrimônio excluído com sucesso!');
        } else {
            return redirect()->route('patrimonio.index')->with('error', 'Falha ao excluir o patrimônio');
        }
    }
}

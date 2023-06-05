<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\BancariaRequest;

use App\Models\Condominio\Painel\{
    Bancaria,
    Banco,
    Condominio
};


class BancariaController extends Controller
{
    private $bancaria, $banco, $condominio;

    public function __construct(Bancaria $bancaria, Banco $banco, Condominio $condominio)
    {
        $this->bancaria = $bancaria;
        $this->banco = $banco;
        $this->condominio = $condominio;
    }

    /**
     * index
     */
    public function index()
    {
        $bancarias = $this->bancaria->with('banco', 'condominio')->paginate(100000000);
        $bancos = $this->banco->all('id', 'nome');
        $condominios = $this->condominio->all('id', 'nome');
        return view('Condominio.Painel.Pages.Bancaria.index', compact('bancarias', 'bancos', 'condominios'));
    }

    /**
     * Create
     */
    public function create()
    {
        $bancos = $this->banco->all('id', 'nome');
        $condominios = $this->condominio->all('id', 'nome');
        return view('Condominio.Painel.Pages.Bancaria.create', compact('bancos', 'condominios'));
    }

    /**
     * Store
     */
    public function store(BancariaRequest $request)
    {
        if ($this->bancaria->create($request->except('_token'))) {
            return redirect()->route('bancaria.index')->with('success', 'Conta Bancaria cadastrada com sucesso');
        } else {
            return redirect()->route('bancaria.index')->with('error', 'Falha ao cadastrar a conta bancaria');
        }
    }

    /**
     * Show
     */
    public function show($url)
    {
        if (!$bancaria = $this->bancaria->with('banco', 'condominio')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $bancos = $this->banco->all('id', 'nome');
        $condominios = $this->condominio->all('id', 'nome');
        return view('Condominio.Painel.Pages.Bancaria.show', compact('bancaria', 'bancos', 'condominios'));
    }

    /**
     * Edit
     */
    public function edit($url)
    {
        if (!$bancaria = $this->bancaria->with('banco', 'condominio')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $bancos = $this->banco->all('id', 'nome');
        $condominios = $this->condominio->all('id', 'nome');
        return view('Condominio.Painel.Pages.Bancaria.edit', compact('bancaria', 'bancos', 'condominios'));
    }

    /**
     * Update
     */
    public function update(BancariaRequest $request, $url)
    {
        if (!$bancaria = $this->bancaria->with('banco', 'condominio')->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($bancaria->update($request->except('_token', '_method'))) {
            return redirect()->route('bancaria.index')->with('success', 'Conta bancaria editada com sucesso');
        } else {
            return redirect()->route('bancaria.index')->with('error', 'Falha ao editar a conta bancaria');
        }
    }

    /**
     * destroy
     */
    public function destroy($url)
    {
        if (!$bancaria = $this->bancaria->with('banco', 'condominio')->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($bancaria->delete()) {
            return redirect()->route('bancaria.index')->with('danger', 'Conta bancaria excluída com sucesso!');
        } else {
            return redirect()->route('bancaria.index')->with('error', 'Falha ao excluir a conta bancaria');
        }
    }
}

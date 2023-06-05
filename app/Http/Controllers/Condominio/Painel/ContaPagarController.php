<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\ContaPagarRequest;
use App\Models\Condominio\Painel\{
    Bancaria,
    Categoria,
    ContaPagar,
    Fornecedor
};


class ContaPagarController extends Controller
{
    private $contaPagar, $categoria, $bancaria, $fornecedor;

    public function __construct(ContaPagar $contaPagar, Categoria $categoria, Bancaria $bancaria, Fornecedor $fornecedor)
    {
        $this->contaPagar = $contaPagar;
        $this->categoria = $categoria;
        $this->bancaria = $bancaria;
        $this->fornecedor = $fornecedor;
    }

    /**
     * index
     */
    public function index()
    {
        $contaPagars = $this->contaPagar->with('categoria', 'fornecedor', 'bancaria')->paginate(100000000);
        $categorias = $this->categoria->all('id', 'nome');
        $fornecedors = $this->fornecedor->all('id', 'razao_social', 'ativo');
        $bancarias = $this->bancaria->all('id', 'nome');
        return view('Condominio.Painel.Pages.Conta_Pagar.index', compact('contaPagars', 'categorias', 'fornecedors', 'bancarias'));
    }

    /**
     * Create
     */
    public function create()
    {
        $categorias = $this->categoria->all('id', 'nome');
        $fornecedors = $this->fornecedor->all('id', 'razao_social', 'ativo');
        $bancarias = $this->bancaria->all('id', 'nome');
        return view('Condominio.Painel.Pages.Conta_Pagar.create', compact('categorias', 'fornecedors', 'bancarias'));
    }

    /**
     * Store
     */
    public function store(ContaPagarRequest $request)
    {
        if ($this->contaPagar->create($request->except('_token'))) {
            return redirect()->route('conta_pagar.index')->with('success', 'Conta a pagar cadastrada com sucesso');
        } else {
            return redirect()->route('conta_pagar.index')->with('error', 'Falha ao cadastrar a conta a pagar');
        }
    }

    /**
     * Show
     */
    public function show($url)
    {
        if (!$contaPagar = $this->contaPagar->with('categoria', 'fornecedor', 'bancaria')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $categorias = $this->categoria->all('id', 'nome');
        $fornecedors = $this->fornecedor->all('id', 'razao_social', 'ativo');
        $bancarias = $this->bancaria->all('id', 'nome');
        return view('Condominio.Painel.Pages.Conta_Pagar.show', compact('contaPagar', 'categorias', 'fornecedors', 'bancarias'));
    }

    /**
     * Edit
     */
    public function edit($url)
    {
        if (!$contaPagar = $this->contaPagar->with('categoria', 'fornecedor', 'bancaria')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $categorias = $this->categoria->all('id', 'nome');
        $fornecedors = $this->fornecedor->all('id', 'razao_social', 'ativo');
        $bancarias = $this->bancaria->all('id', 'nome');
        return view('Condominio.Painel.Pages.Conta_Pagar.edit', compact('contaPagar', 'categorias', 'fornecedors', 'bancarias'));
    }

    /**
     * Update
     */
    public function update(ContaPagarRequest $request, $url)
    {
        if (!$contaPagar = $this->contaPagar->with('categoria', 'fornecedor', 'bancaria')->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($contaPagar->update($request->except('_token', '_method'))) {
            return redirect()->route('conta_pagar.index')->with('success', 'Conta a pagar editada com sucesso');
        } else {
            return redirect()->route('conta_pagar.index')->with('error', 'Falha ao editar a conta a pagar');
        }
    }

    /**
     * destroy
     */
    public function destroy($url)
    {
        if (!$contaPagar = $this->contaPagar->with('categoria', 'fornecedor', 'bancaria')->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($contaPagar->delete()) {
            return redirect()->route('conta_pagar.index')->with('danger', 'Conta a pagar excluída com sucesso!');
        } else {
            return redirect()->route('conta_pagar.index')->with('error', 'Falha ao excluir a conta a pagar');
        }
    }
}

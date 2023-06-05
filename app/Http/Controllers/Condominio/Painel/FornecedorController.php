<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\FornecedorRequest;
use App\Models\Condominio\Painel\Fornecedor;

class FornecedorController extends Controller
{
    private $fornecedor;

    public function __construct(Fornecedor $fornecedor)
    {
        $this->fornecedor = $fornecedor;
    }

    /**
     * Index
     */
    public function index()
    {
        $fornecedores = $this->fornecedor->latest()->paginate(100000000);
        return view('Condominio.Painel.Pages.Fornecedor.index', compact('fornecedores'));
    }

    /**
     * create
     */
    public function create()
    {
        return view('Condominio.Painel.Pages.Fornecedor.create');
    }

    /**
     * store
     */
    public function store(FornecedorRequest $request)
    {
        if ($this->fornecedor->create($request->except('_token'))) {
            return redirect()->route('fornecedor.index')->with('success', 'Fornecedor cadastrado com sucesso');
        } else {
            return redirect()->route('fornecedor.index')->with('error', 'Falha ao cadastrar o Fornecedor');
        }
    }

    /**
     * show
     */
    public function show($url)
    {
        if (!$fornecedor = $this->fornecedor->where('url', $url)->first()) {
            return redirect()->back();
        }
        return view('Condominio.Painel.Pages.Fornecedor.show', compact('fornecedor'));
    }

    /**
     * edit
     */
    public function edit($url)
    {
        if (!$fornecedor = $this->fornecedor->where('url', $url)->first()) {
            return redirect()->back();
        }
        return view('Condominio.Painel.Pages.Fornecedor.edit', compact('fornecedor'));
    }

    /**
     * update
     */
    public function update(FornecedorRequest $request, $url)
    {
        if (!$fornecedor = $this->fornecedor->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($fornecedor->update($request->except('_token', '_method'))) {
            return redirect()->route('fornecedor.index')->with('success', 'Fornecedor editado com sucesso');
        } else {
            return redirect()->route('fornecedor.index')->with('error', 'Falha ao editar o Fornecedor');
        }
    }

    /**
     * excluir
     */
    public function destroy($url)
    {

        if (!$fornecedor = $this->fornecedor->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($fornecedor->delete()) {
            return redirect()->route('fornecedor.index')->with('danger', 'Fornecedor excluído com sucesso!');
        } else {
            return redirect()->route('fornecedor.index')->with('error', 'Falha ao excluir o Fornecedor');
        }
    }
}

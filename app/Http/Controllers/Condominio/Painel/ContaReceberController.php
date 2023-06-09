<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\ContaReceberRequest;
use App\Models\Condominio\Painel\{
    Bancaria,
    Bloco,
    Categoria,
    ContaReceber,
    Unidade,
    User
};

class ContaReceberController extends Controller
{
    private $contaReceber, $categoria, $bancaria, $bloco, $unidade, $user;

    public function __construct(ContaReceber $contaReceber, Categoria $categoria, Bancaria $bancaria, Bloco $bloco, Unidade $unidade, User $user)
    {
        $this->contaReceber = $contaReceber;
        $this->categoria = $categoria;
        $this->bancaria = $bancaria;
        $this->bloco = $bloco;
        $this->unidade = $unidade;
        $this->user = $user;
    }

    /**
     * index
     */
    public function index()
    {
        if (auth()->user()->id <= '2') {
            $contaRecebers = $this->contaReceber->with('categoria', 'bancaria', 'bloco', 'unidade', 'user')->latest()->paginate(100000000);
        } else {
            $contaRecebers = $this->contaReceber->where('user_id', '=', auth()->user()->id)
                ->with('categoria', 'bancaria', 'bloco', 'unidade', 'user')
                ->latest()
                ->paginate(100000000);
        }
        $categorias = $this->categoria->all('id', 'nome');
        $bancarias = $this->bancaria->all('id', 'nome');
        $blocos = $this->bloco->all('id', 'nome');
        $unidades = $this->unidade->all('id', 'nome');
        $users = $this->user->all('id', 'name');
        return view('Condominio.Painel.Pages.Conta_Receber.index', compact('contaRecebers', 'categorias', 'bancarias', 'blocos', 'unidades', 'users'));
    }

    /**
     * Create
     */
    public function create()
    {
        $categorias = $this->categoria->all('id', 'nome');
        $bancarias = $this->bancaria->all('id', 'nome');
        $blocos = $this->bloco->all('id', 'nome');
        $unidades = $this->unidade->all('id', 'nome');
        $users = $this->user->all('id', 'name');
        return view('Condominio.Painel.Pages.Conta_Receber.create', compact('categorias', 'bancarias', 'blocos', 'unidades', 'users'));
    }

    /**
     * Store
     */
    public function store(ContaReceberRequest $request)
    {
        if ($this->contaReceber->create($request->except('_token'))) {
            return redirect()->route('conta_receber.index')->with('success', 'Conta a receber cadastrada com sucesso');
        } else {
            return redirect()->route('conta_receber.index')->with('error', 'Falha ao cadastrar a conta a receber');
        }
    }

    /**
     * Show
     */
    public function show($url)
    {
        if (!$contaReceber = $this->contaReceber->with('categoria', 'bancaria', 'bloco', 'unidade', 'user')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $categorias = $this->categoria->all('id', 'nome');
        $bancarias = $this->bancaria->all('id', 'nome');
        $blocos = $this->bloco->all('id', 'nome');
        $unidades = $this->unidade->all('id', 'nome');
        $users = $this->user->all('id', 'name');
        return view('Condominio.Painel.Pages.Conta_Receber.show', compact('contaReceber', 'categorias', 'bancarias', 'blocos', 'unidades', 'users'));
    }

    /**
     * Edit
     */
    public function edit($url)
    {
        if (!$contaReceber = $this->contaReceber->with('categoria', 'bancaria', 'bloco', 'unidade', 'user')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $categorias = $this->categoria->all('id', 'nome');
        $bancarias = $this->bancaria->all('id', 'nome');
        $blocos = $this->bloco->all('id', 'nome');
        $unidades = $this->unidade->all('id', 'nome');
        $users = $this->user->all('id', 'name');
        return view('Condominio.Painel.Pages.Conta_Receber.edit', compact('contaReceber', 'categorias', 'bancarias', 'blocos', 'unidades', 'users'));
    }

    /**
     * Update
     */
    public function update(contaReceberRequest $request, $url)
    {
        if (!$contaReceber = $this->contaReceber->with('categoria', 'bancaria', 'bloco', 'unidade', 'user')->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($contaReceber->update($request->except('_token', '_method'))) {
            return redirect()->route('conta_receber.index')->with('success', 'Conta a receber editada com sucesso');
        } else {
            return redirect()->route('conta_receber.index')->with('error', 'Falha ao editar a conta a receber');
        }
    }

    /**
     * destroy
     */
    public function destroy($url)
    {
        if (!$contaReceber = $this->contaReceber->with('categoria', 'bancaria', 'bloco', 'unidade', 'user')->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($contaReceber->delete()) {
            return redirect()->route('conta_receber.index')->with('danger', 'Conta a receber excluída com sucesso!');
        } else {
            return redirect()->route('conta_receber.index')->with('error', 'Falha ao excluir a conta a receber');
        }
    }
}

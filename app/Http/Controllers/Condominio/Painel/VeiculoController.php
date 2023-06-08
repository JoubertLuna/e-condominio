<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\VeiculoRequest;

use App\Models\Condominio\Painel\{
    Unidade,
    User,
    Veiculo,
};

class VeiculoController extends Controller
{
    private $veiculo, $user, $unidade;

    public function __construct(Veiculo $veiculo, User $user, Unidade $unidade)
    {
        $this->veiculo = $veiculo;
        $this->unidade = $unidade;
        $this->user = $user;
    }

    /**
     * index
     */
    public function index()
    {
        if (auth()->user()->id <= '2') {
            $veiculos = $this->veiculo->with('user', 'unidade')->latest()->paginate(100000000);
        } else {
            $veiculos = $this->veiculo->where('user_id', '=', auth()->user()->id)
            ->with('user', 'unidade')
            ->latest()
            ->paginate(100000000);
        }

        $users = $this->user->all('id', 'name');
        $unidades = $this->unidade->all('id', 'nome');
        return view('Condominio.Painel.Pages.Veiculo.index', compact('veiculos', 'users', 'unidades'));
    }

    /**
     * Create
     */
    public function create()
    {
        $users = $this->user->all('id', 'name');
        $unidades = $this->unidade->all('id', 'nome');
        return view('Condominio.Painel.Pages.Veiculo.create', compact('users', 'unidades'));
    }

    /**
     * Store
     */
    public function store(VeiculoRequest $request)
    {
        if ($this->veiculo->create($request->except('_token'))) {
            return redirect()->route('veiculo.index')->with('success', 'Veículo cadastrado com sucesso');
        } else {
            return redirect()->route('veiculo.index')->with('error', 'Falha ao cadastrar o veículo');
        }
    }

    /**
     * Show
     */
    public function show($url)
    {
        if (!$veiculo = $this->veiculo->with('user', 'unidade')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $users = $this->user->all('id', 'name');
        $unidades = $this->unidade->all('id', 'nome');
        return view('Condominio.Painel.Pages.Veiculo.show', compact('veiculo', 'users', 'unidades'));
    }

    /**
     * Edit
     */
    public function edit($url)
    {
        if (!$veiculo = $this->veiculo->with('user', 'unidade')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $users = $this->user->all('id', 'name');
        $unidades = $this->unidade->all('id', 'nome');
        return view('Condominio.Painel.Pages.Veiculo.edit', compact('veiculo', 'users', 'unidades'));
    }

    /**
     * Update
     */
    public function update(VeiculoRequest $request, $url)
    {
        if (!$veiculo = $this->veiculo->with('user', 'unidade')->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($veiculo->update($request->except('_token', '_method'))) {
            return redirect()->route('veiculo.index')->with('success', 'Veículo editado com sucesso');
        } else {
            return redirect()->route('veiculo.index')->with('error', 'Falha ao editar o veículo');
        }
    }

    /**
     * destroy
     */
    public function destroy($url)
    {
        if (!$veiculo = $this->veiculo->with('user', 'unidade')->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($veiculo->delete()) {
            return redirect()->route('veiculo.index')->with('danger', 'Veículo excluído com sucesso!');
        } else {
            return redirect()->route('veiculo.index')->with('error', 'Falha ao excluir o veículo');
        }
    }
}

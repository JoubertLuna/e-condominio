<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\LivroRequest;
use App\Models\Condominio\Painel\{
    Area,
    Livro,
    User,
};

class LivroController extends Controller
{
    private $livro, $user , $area;

    public function __construct(Livro $livro, User $user, Area $area)
    {
        $this->livro = $livro;
        $this->user = $user;
        $this->area = $area;
    }

    /**
     * index
     */
    public function index()
    {
        $livros = $this->livro->with('user', 'area')->paginate(100000000);
        $users = $this->user->all('id', 'name');
        $areas = $this->area->all('id', 'nome');
        return view('Condominio.Painel.Pages.Livro.index', compact('livros', 'users', 'areas'));
    }

    /**
     * Create
     */
    public function create()
    {
        $users = $this->user->all('id', 'name');
        $areas = $this->area->all('id', 'nome');
        return view('Condominio.Painel.Pages.Livro.create', compact('users', 'areas'));
    }

    /**
     * Store
     */
    public function store(LivroRequest $request)
    {
        if ($this->livro->create($request->except('_token'))) {
            return redirect()->route('livro.index')->with('success', 'Ocorrência cadastrada com sucesso');
        } else {
            return redirect()->route('livro.index')->with('error', 'Falha ao cadastrar a ocorrência');
        }
    }

    /**
     * Show
     */
    public function show($url)
    {
        if (!$livro = $this->livro->with('user', 'area')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $users = $this->user->all('id', 'name');
        $areas = $this->area->all('id', 'nome');
        return view('Condominio.Painel.Pages.Livro.show', compact('livro', 'users', 'areas'));
    }

    /**
     * Edit
     */
    public function edit($url)
    {
        if (!$livro = $this->livro->with('user')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $users = $this->user->all('id', 'name');
        $areas = $this->area->all('id', 'nome');
        return view('Condominio.Painel.Pages.Livro.edit', compact('livro', 'users', 'areas'));
    }

    /**
     * Update
     */
    public function update(LivroRequest $request, $url)
    {
        if (!$livro = $this->livro->with('user', 'area')->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($livro->update($request->except('_token', '_method'))) {
            return redirect()->route('livro.index')->with('success', 'Ocorrência editada com sucesso');
        } else {
            return redirect()->route('livro.index')->with('error', 'Falha ao editar a ocorrência');
        }
    }

    /**
     * destroy
     */
    public function destroy($url)
    {
        if (!$livro = $this->livro->with('user', 'area')->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($livro->delete()) {
            return redirect()->route('livro.index')->with('danger', 'Ocorrência excluída com sucesso!');
        } else {
            return redirect()->route('livro.index')->with('error', 'Falha ao excluir a ocorrência');
        }
    }
}

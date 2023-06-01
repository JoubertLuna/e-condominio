<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\LivroRequest;
use App\Models\Condominio\Painel\{
    Livro,
    User,
};

class LivroController extends Controller
{
    private $livro, $user;

    public function __construct(Livro $livro, User $user)
    {
        $this->livro = $livro;
        $this->user = $user;
    }

    /**
     * index
     */
    public function index()
    {
        $livros = $this->livro->with('user')->paginate(100000000);
        $users = $this->user->all('id', 'name');
        return view('Condominio.Painel.Pages.Livro.index', compact('livros', 'users'));
    }

    /**
     * Create
     */
    public function create()
    {
        $users = $this->user->all('id', 'name');
        return view('Condominio.Painel.Pages.Livro.create', compact('users'));
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
    public function show($id)
    {
        if (!$livro = $this->livro->with('user')->find($id)) {
            return redirect()->back();
        }

        $users = $this->user->all('id', 'name');
        return view('Condominio.Painel.Pages.Livro.show', compact('livro', 'users'));
    }

    /**
     * Edit
     */
    public function edit($id)
    {
        if (!$livro = $this->livro->with('user')->find($id)) {
            return redirect()->back();
        }

        $users = $this->user->all('id', 'name');
        return view('Condominio.Painel.Pages.Livro.edit', compact('livro', 'users'));
    }

    /**
     * Update
     */
    public function update(LivroRequest $request, $id)
    {
        if (!$livro = $this->livro->with('user')->find($id)) {
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
    public function destroy($id)
    {
        if (!$livro = $this->livro->with('user')->find($id)) {
            return redirect()->back();
        }

        if ($livro->delete()) {
            return redirect()->route('livro.index')->with('danger', 'Ocorrência excluída com sucesso!');
        } else {
            return redirect()->route('livro.index')->with('error', 'Falha ao excluir a ocorrência');
        }
    }
}

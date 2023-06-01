<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\AnuncioRequest;
use App\Models\Condominio\Painel\{
    Anuncio,
    User,
};

class AnuncioController extends Controller
{
    private $anuncio, $user;

    public function __construct(Anuncio $anuncio, User $user)
    {
        $this->anuncio = $anuncio;
        $this->user = $user;
    }

    /**
     * index
     */
    public function index()
    {
        $anuncios = $this->anuncio->with('user')->paginate(100000000);
        $users = $this->user->all('id', 'name');
        return view('Condominio.Painel.Pages.Anuncio.index', compact('anuncios', 'users'));
    }

    /**
     * Create
     */
    public function create()
    {
        $users = $this->user->all('id', 'name');
        return view('Condominio.Painel.Pages.Anuncio.create', compact('users'));
    }

    /**
     * Store
     */
    public function store(AnuncioRequest $request)
    {
        if ($this->anuncio->create($request->except('_token'))) {
            return redirect()->route('anuncio.index')->with('success', 'Anúncio cadastrado com sucesso');
        } else {
            return redirect()->route('anuncio.index')->with('error', 'Falha ao cadastrar o anúncio');
        }
    }

    /**
     * Show
     */
    public function show($id)
    {
        if (!$anuncio = $this->anuncio->with('user')->find($id)) {
            return redirect()->back();
        }

        $users = $this->user->all('id', 'name');
        return view('Condominio.Painel.Pages.Anuncio.show', compact('anuncio', 'users'));
    }

    /**
     * Edit
     */
    public function edit($id)
    {
        if (!$anuncio = $this->anuncio->with('user')->find($id)) {
            return redirect()->back();
        }

        $users = $this->user->all('id', 'name');
        return view('Condominio.Painel.Pages.Anuncio.edit', compact('anuncio', 'users'));
    }

    /**
     * Update
     */
    public function update(AnuncioRequest $request, $id)
    {
        if (!$anuncio = $this->anuncio->with('user')->find($id)) {
            return redirect()->back();
        }

        if ($anuncio->update($request->except('_token', '_method'))) {
            return redirect()->route('anuncio.index')->with('success', 'Anúncio editado com sucesso');
        } else {
            return redirect()->route('anuncio.index')->with('error', 'Falha ao editar o anúncio');
        }
    }

    /**
     * destroy
     */
    public function destroy($id)
    {
        if (!$anuncio = $this->anuncio->with('user')->find($id)) {
            return redirect()->back();
        }

        if ($anuncio->delete()) {
            return redirect()->route('anuncio.index')->with('danger', 'Anúncio excluído com sucesso!');
        } else {
            return redirect()->route('anuncio.index')->with('error', 'Falha ao excluir o anúncio');
        }
    }
}

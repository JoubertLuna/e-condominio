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
        if (auth()->user()->id <= '2') {
            $anuncios = $this->anuncio->with('user')->latest()->paginate(100000000);
        } else {
            $anuncios = $this->anuncio->where('user_id', '=', auth()->user()->id)
                ->with('user')
                ->latest()
                ->paginate(100000000);
        }
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
    public function show($url)
    {
        if (!$anuncio = $this->anuncio->with('user')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $users = $this->user->all('id', 'name');
        return view('Condominio.Painel.Pages.Anuncio.show', compact('anuncio', 'users'));
    }

    /**
     * Edit
     */
    public function edit($url)
    {
        if (!$anuncio = $this->anuncio->with('user')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $users = $this->user->all('id', 'name');
        return view('Condominio.Painel.Pages.Anuncio.edit', compact('anuncio', 'users'));
    }

    /**
     * Update
     */
    public function update(AnuncioRequest $request, $url)
    {
        if (!$anuncio = $this->anuncio->with('user')->where('url', $url)->first()) {
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
    public function destroy($url)
    {
        if (!$anuncio = $this->anuncio->with('user')->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($anuncio->delete()) {
            return redirect()->route('anuncio.index')->with('danger', 'Anúncio excluído com sucesso!');
        } else {
            return redirect()->route('anuncio.index')->with('error', 'Falha ao excluir o anúncio');
        }
    }
}

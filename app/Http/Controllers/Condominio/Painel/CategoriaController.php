<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\CategoriaRequest;
use App\Models\Condominio\Painel\Categoria;

class CategoriaController extends Controller
{
    private $categoria;

    public function __construct(Categoria $categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * Index
     */
    public function index()
    {
        $categorias = $this->categoria->latest()->paginate(100000000);
        return view('Condominio.Painel.Pages.Categoria.index', compact('categorias'));
    }

    /**
     * create
     */
    public function create()
    {
        return view('Condominio.Painel.Pages.Categoria.create');
    }

    /**
     * store
     */
    public function store(CategoriaRequest $request)
    {
        if ($this->categoria->create($request->except('_token'))) {
            return redirect()->route('categoria.index')->with('success', 'Categoria cadastrada com sucesso');
        } else {
            return redirect()->route('categoria.index')->with('error', 'Falha ao cadastrar a categoria');
        }
    }

    /**
     * show
     */
    public function show($url)
    {
        if (!$categoria = $this->categoria->where('url', $url)->first()) {
            return redirect()->back();
        }
        return view('Condominio.Painel.Pages.Categoria.show', compact('categoria'));
    }

    /**
     * edit
     */
    public function edit($url)
    {
        if (!$categoria = $this->categoria->where('url', $url)->first()) {
            return redirect()->back();
        }
        return view('Condominio.Painel.Pages.Categoria.edit', compact('categoria'));
    }

    /**
     * update
     */
    public function update(CategoriaRequest $request, $url)
    {
        if (!$categoria = $this->categoria->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($categoria->update($request->except('_token', '_method'))) {
            return redirect()->route('categoria.index')->with('success', 'Categoria editada com sucesso');
        } else {
            return redirect()->route('categoria.index')->with('error', 'Falha ao editar a categoria');
        }
    }

    /**
     * excluir
     */
    public function destroy($url)
    {

        if (!$categoria = $this->categoria->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($categoria->delete()) {
            return redirect()->route('categoria.index')->with('danger', 'Categoria excluída com sucesso!');
        } else {
            return redirect()->route('categoria.index')->with('error', 'Falha ao excluir a categoria');
        }
    }
}

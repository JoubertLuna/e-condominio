<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\EstadoRequest;
use App\Models\Condominio\Painel\Estado;

class EstadoController extends Controller
{
    private $estado;

    public function __construct(Estado $estado)
    {
        $this->estado = $estado;
    }

    /**
     * Index
     */
    public function index()
    {
        $estados = $this->estado->latest()->paginate(100000000);
        return view('Condominio.Painel.Pages.Estado.index', compact('estados'));
    }

    /**
     * create
     */
    public function create()
    {
        return view('Condominio.Painel.Pages.Estado.create');
    }

    /**
     * store
     */
    public function store(EstadoRequest $request)
    {
        if ($this->estado->create($request->except('_token'))) {
            return redirect()->route('estado.index')->with('success', 'Estado cadastrado com sucesso');
        } else {
            return redirect()->route('estado.index')->with('error', 'Falha ao cadastrar o estado');
        }
    }

    /**
     * show
     */
    public function show($url)
    {
        if (!$estado = $this->estado->where('url', $url)->first()) {
            return redirect()->back();
        }
        return view('Condominio.Painel.Pages.Estado.show', compact('estado'));
    }

    /**
     * edit
     */
    public function edit($url)
    {
        if (!$estado = $this->estado->where('url', $url)->first()) {
            return redirect()->back();
        }
        return view('Condominio.Painel.Pages.Estado.edit', compact('estado'));
    }

    /**
     * update
     */
    public function update(EstadoRequest $request, $url)
    {
        if (!$estado = $this->estado->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($estado->update($request->except('_token', '_method'))) {
            return redirect()->route('estado.index')->with('success', 'Estado editado com sucesso');
        } else {
            return redirect()->route('estado.index')->with('error', 'Falha ao editar o estado');
        }
    }

    /**
     * excluir
     */
    public function destroy($url)
    {

        if (!$estado = $this->estado->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($estado->delete()) {
            return redirect()->route('estado.index')->with('danger', 'Estado excluído com sucesso!');
        } else {
            return redirect()->route('estado.index')->with('error', 'Falha ao excluir o estado');
        }
    }
}

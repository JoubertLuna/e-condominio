<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\AssembleiaRequest;
use App\Models\Condominio\Painel\{
    Area,
    Assembleia,
};

class AssembleiaController extends Controller
{
    private $assembleia, $area;

    public function __construct(Assembleia $assembleia, Area $area)
    {
        $this->assembleia = $assembleia;
        $this->area = $area;
    }

    /**
     * index
     */
    public function index()
    {
        $assembleias = $this->assembleia->with('area')->latest()->paginate(100000000);
        $areas = $this->area->all('id', 'nome');
        return view('Condominio.Painel.Pages.Assembleia.index', compact('assembleias', 'areas'));
    }

    /**
     * Create
     */
    public function create()
    {
        $areas = $this->area->all('id', 'nome');
        return view('Condominio.Painel.Pages.Assembleia.create', compact('areas'));
    }

    /**
     * Store
     */
    public function store(AssembleiaRequest $request)
    {
        if ($this->assembleia->create($request->except('_token'))) {
            return redirect()->route('assembleia.index')->with('success', 'Assembleia cadastrada com sucesso');
        } else {
            return redirect()->route('assembleia.index')->with('error', 'Falha ao cadastrar a Assembleia');
        }
    }

    /**
     * Show
     */
    public function show($url)
    {
        if (!$assembleia = $this->assembleia->with('area')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $areas = $this->area->all('id', 'nome');
        return view('Condominio.Painel.Pages.Assembleia.show', compact('assembleia', 'areas'));
    }

    /**
     * Edit
     */
    public function edit($url)
    {
        if (!$assembleia = $this->assembleia->with('area')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $areas = $this->area->all('id', 'nome');
        return view('Condominio.Painel.Pages.Assembleia.edit', compact('assembleia', 'areas'));
    }

    /**
     * Update
     */
    public function update(AssembleiaRequest $request, $url)
    {
        if (!$assembleia = $this->assembleia->with('area')->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($assembleia->update($request->except('_token', '_method'))) {
            return redirect()->route('assembleia.index')->with('success', 'Assembleia editada com sucesso');
        } else {
            return redirect()->route('assembleia.index')->with('error', 'Falha ao editar a Assembleia');
        }
    }

    /**
     * destroy
     */
    public function destroy($url)
    {
        if (!$assembleia = $this->assembleia->with('area')->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($assembleia->delete()) {
            return redirect()->route('assembleia.index')->with('danger', 'Assembleia excluída com sucesso!');
        } else {
            return redirect()->route('assembleia.index')->with('error', 'Falha ao excluir a Assembleia');
        }
    }
}

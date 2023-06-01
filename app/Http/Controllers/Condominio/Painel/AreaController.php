<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\AreaRequest;
use App\Models\Condominio\Painel\Area;

class AreaController extends Controller
{
    private $area;

    public function __construct(Area $area)
    {
        $this->area = $area;
    }

    /**
     * Index
     */
    public function index()
    {
        $areas = $this->area->latest()->paginate(100000000);
        return view('Condominio.Painel.Pages.Area.index', compact('areas'));
    }

    /**
     * create
     */
    public function create()
    {
        return view('Condominio.Painel.Pages.Area.create');
    }

    /**
     * store
     */
    public function store(AreaRequest $request)
    {
        if ($this->area->create($request->except('_token'))) {
            return redirect()->route('area.index')->with('success', 'Área comum cadastrada com sucesso');
        } else {
            return redirect()->route('area.index')->with('error', 'Falha ao cadastrar a área comum');
        }
    }

    /**
     * show
     */
    public function show($id)
    {
        if (!$area = $this->area->find($id)) {
            return redirect()->back();
        }
        return view('Condominio.Painel.Pages.Area.show', compact('area'));
    }

    /**
     * edit
     */
    public function edit($id)
    {
        if (!$area = $this->area->find($id)) {
            return redirect()->back();
        }
        return view('Condominio.Painel.Pages.Area.edit', compact('area'));
    }

    /**
     * update
     */
    public function update(AreaRequest $request, $id)
    {
        if (!$area = $this->area->find($id)) {
            return redirect()->back();
        }

        if ($area->update($request->except('_token', '_method'))) {
            return redirect()->route('area.index')->with('success', 'Área comum editada com sucesso');
        } else {
            return redirect()->route('area.index')->with('error', 'Falha ao editar a área comum');
        }
    }

    /**
     * excluir
     */
    public function destroy($id)
    {

        if (!$area = $this->area->find($id)) {
            return redirect()->back();
        }

        if ($area->delete()) {
            return redirect()->route('area.index')->with('danger', 'Área comum excluída com sucesso!');
        } else {
            return redirect()->route('area.index')->with('error', 'Falha ao excluir a área comum');
        }
    }
}

<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\ResourceRequest;
use App\Models\Condominio\Painel\Resource;

class ResourceController extends Controller
{
    private $resource;

    public function __construct(Resource $resource)
    {
        $this->resource = $resource;
    }

    /**
     * Index
     */
    public function index()
    {
        $resources = $this->resource->latest()->orderBy('nome', 'ASC')->paginate(100000000);
        return view('Condominio.Painel.Pages.Resource.index', compact('resources'));
    }

    /**
     * create
     */
    public function create()
    {
        return view('Condominio.Painel.Pages.Resource.create');
    }

    /**
     * store
     */
    public function store(ResourceRequest $request)
    {
        if ($this->resource->create($request->except('_token'))) {
            return redirect()->route('resource.index')->with('success', 'Permissão cadastrada com sucesso');
        } else {
            return redirect()->route('resource.index')->with('error', 'Falha ao cadastrar a permissão');
        }
    }

    /**
     * show
     */
    public function show($url)
    {
        if (!$resource = $this->resource->where('url', $url)->first()) {
            return redirect()->back();
        }
        return view('Condominio.Painel.Pages.Resource.show', compact('resource'));
    }

    /**
     * edit
     */
    public function edit($url)
    {
        if (!$resource = $this->resource->where('url', $url)->first()) {
            return redirect()->back();
        }

        return view('Condominio.Painel.Pages.Resource.edit', compact('resource'));
    }

    /**
     * update
     */
    public function update(resourceRequest $request, $url)
    {
        if (!$resource = $this->resource->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($resource->update($request->except('_token', '_method'))) {
            return redirect()->route('resource.index')->with('success', 'Permissão editada com sucesso');
        } else {
            return redirect()->route('resource.index')->with('error', 'Falha ao editar a permissão');
        }
    }

    /**
     * destroy
     */
    public function destroy($url)
    {

        if (!$resource = $this->resource->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($resource->id <= '159') {
            return redirect()->back()->with('error', 'Você não pode deletar permissão padrão do sistema');
        }

        if ($resource->delete()) {
            return redirect()->route('resource.index')->with('danger', 'Permissão excluída com sucesso!');
        } else {
            return redirect()->route('resource.index')->with('error', 'Falha ao excluir a permissão');
        }
    }
}

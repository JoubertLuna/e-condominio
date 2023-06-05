<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\BancoRequest;
use App\Models\Condominio\Painel\Banco;

class BancoController extends Controller
{
    private $banco;

  public function __construct(Banco $banco)
  {
    $this->banco = $banco;
  }

  /**
   * Index
   */
  public function index()
  {
    $bancos = $this->banco->latest()->paginate(100000000);
    return view('Condominio.Painel.Pages.Banco.index', compact('bancos'));
  }

  /**
   * create
   */
  public function create()
  {
    return view('Condominio.Painel.Pages.Banco.create');
  }

  /**
   * store
   */
  public function store(BancoRequest $request)
  {
    if ($this->banco->create($request->except('_token'))) {
      return redirect()->route('banco.index')->with('success', 'Banco cadastrado com sucesso');
    } else {
      return redirect()->route('banco.index')->with('error', 'Falha ao cadastrar o banco');
    }
  }

  /**
   * show
   */
  public function show($url)
  {
    if (!$banco = $this->banco->where('url', $url)->first()) {
      return redirect()->back();
    }
    return view('Condominio.Painel.Pages.Banco.show', compact('banco'));
  }

  /**
   * edit
   */
  public function edit($url)
  {
    if (!$banco = $this->banco->where('url', $url)->first()) {
      return redirect()->back();
    }
    return view('Condominio.Painel.Pages.Banco.edit', compact('banco'));
  }

  /**
   * update
   */
  public function update(BancoRequest $request, $url)
  {
    if (!$banco = $this->banco->where('url', $url)->first()) {
      return redirect()->back();
    }

    if ($banco->update($request->except('_token', '_method'))) {
      return redirect()->route('banco.index')->with('success', 'Banco editado com sucesso');
    } else {
      return redirect()->route('banco.index')->with('error', 'Falha ao editar o banco');
    }
  }

  /**
   * excluir
   */
  public function destroy($url)
  {

    if (!$banco = $this->banco->where('url', $url)->first()) {
      return redirect()->back();
    }

    if ($banco->delete()) {
      return redirect()->route('banco.index')->with('danger', 'Banco excluído com sucesso!');
    } else {
      return redirect()->route('banco.index')->with('error', 'Falha ao excluir o banco');
    }
  }
}

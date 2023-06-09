<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\VisitanteRequest;
use App\Models\Condominio\Painel\{
    Bloco,
    Unidade,
    User,
    Visitante,
};
use Illuminate\Support\Facades\Storage;

class VisitanteController extends Controller
{
    private $visitante, $bloco, $unidade, $user;

    public function __construct(Visitante $visitante, Bloco $bloco, Unidade $unidade, User $user)
    {
        $this->visitante = $visitante;
        $this->bloco = $bloco;
        $this->unidade = $unidade;
        $this->user = $user;
    }

    /**
     * index
     */
    public function index()
    {
        if (auth()->user()->id <= '2') {
            $visitantes = $this->visitante->with('bloco', 'user', 'unidade')->latest()->paginate(100000000);
        } else {
            $visitantes = $this->visitante->where('user_id', '=', auth()->user()->id)
                ->with('bloco', 'user', 'unidade')
                ->latest()
                ->paginate(100000000);
        }
        $blocos = $this->bloco->all('id', 'nome');
        $unidades = $this->unidade->all('id', 'nome');
        $users = $this->user->all('id', 'name');
        return view('Condominio.Painel.Pages.Visitante.index', compact('visitantes', 'blocos', 'users', 'unidades'));
    }

    /**
     * Create
     */
    public function create()
    {
        $blocos = $this->bloco->all('id', 'nome');
        $users = $this->user->all('id', 'name');
        $unidades = $this->unidade->all('id', 'nome');
        return view('Condominio.Painel.Pages.Visitante.create', compact('blocos', 'users', 'unidades'));
    }

    /**
     * Store
     */
    public function store(VisitanteRequest $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $nome_imagem = $request->image->getClientOriginalName();
            $request->image->storeAs('Visitante', $nome_imagem);
        } else {
            $nome_imagem = 'default.jpg';
        }

        $data = $request->except('_token');
        $data['image'] = $nome_imagem;

        if ($this->visitante->create($data)) {
            return redirect()->route('visitante.index')->with('success', 'Visitante cadastrado com sucesso');
        } else {
            return redirect()->route('visitante.index')->with('error', 'Falha ao cadastrar o visitante');
        }
    }

    /**
     * Show
     */
    public function show($url)
    {
        if (!$visitante = $this->visitante->with('bloco', 'user', 'unidade')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $blocos = $this->bloco->all('id', 'nome');
        $users = $this->user->all('id', 'name');
        $unidades = $this->unidade->all('id', 'nome');
        return view('Condominio.Painel.Pages.Visitante.show', compact('visitante', 'blocos', 'users', 'unidades'));
    }

    /**
     * Edit
     */
    public function edit($url)
    {
        if (!$visitante = $this->visitante->with('bloco', 'user', 'unidade')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $blocos = $this->bloco->all('id', 'nome');
        $users = $this->user->all('id', 'name');
        $unidades = $this->unidade->all('id', 'nome');
        return view('Condominio.Painel.Pages.Visitante.edit', compact('visitante', 'blocos', 'users', 'unidades'));
    }

    /**
     * Update
     */
    public function update(visitanteRequest $request, $url)
    {
        if (!$visitante = $this->visitante->with('bloco', 'user', 'unidade')->where('url', $url)->first()) {
            return redirect()->back();
        }

        //Update de Imagem
        if ($request->image) {
            if (Storage::exists($visitante->image)) {
                Storage::delete($visitante->image);
            }

            $nome_imagem_edit = $request->image->getClientOriginalName();
            $request->image->storeAs('Visitante', $nome_imagem_edit);
        } elseif ($request->image === null) {
            $nome_imagem_edit = $visitante['image'];
        } else {
            $nome_imagem_edit = 'default.jpg';
        }
        //Update de Imagem

        $data = $request->except('_token', '_method');
        $data['image'] = $nome_imagem_edit;

        if ($visitante->update($data)) {
            return redirect()->route('visitante.index')->with('success', 'Visitante editado com sucesso');
        } else {
            return redirect()->route('visitante.index')->with('error', 'Falha ao editar o visitante');
        }
    }

    /**
     * destroy
     */
    public function destroy($url)
    {
        if (!$visitante = $this->visitante->with('bloco', 'user', 'unidade')->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($visitante->delete()) {
            return redirect()->route('visitante.index')->with('danger', 'Visitante excluído com sucesso!');
        } else {
            return redirect()->route('visitante.index')->with('error', 'Falha ao excluir o visitante');
        }
    }
}

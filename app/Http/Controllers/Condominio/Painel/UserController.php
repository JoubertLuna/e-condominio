<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\UserRequest;

use App\Models\Condominio\Painel\{
    Bloco,
    Condominio,
    Unidade,
    User,
};

use Illuminate\Support\Facades\{
    Storage,
    Hash,
};


class UserController extends Controller
{
    private $bloco, $condominio, $unidade, $user;

    public function __construct(User $user, Bloco $bloco, Condominio $condominio, Unidade $unidade)
    {
        $this->bloco = $bloco;
        $this->condominio = $condominio;
        $this->unidade = $unidade;
        $this->user = $user;
    }

    /**
     * Index
     */
    public function index()
    {
        $users = $this->user->with('condominio', 'bloco', 'unidade')->paginate(100000000);
        $blocos = $this->bloco->all('id', 'nome');
        $unidades = $this->unidade->all('id', 'nome');
        $condominios = $this->condominio->all('id', 'nome');
        return view('Condominio.Painel.Pages.User.index', compact('blocos', 'condominios', 'unidades', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blocos = $this->bloco->all('id', 'nome');
        $unidades = $this->unidade->all('id', 'nome');
        $condominios = $this->condominio->all('id', 'nome');
        return view('Condominio.Painel.Pages.User.create', compact('condominios', 'unidades', 'blocos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $nome_imagem = $request->image->getClientOriginalName();
            $request->image->storeAs('User', $nome_imagem);
        } else {
            $nome_imagem = 'default.jpg';
        }

        $data = $request->except('_token');
        $data['password'] = Hash::make($request->password);
        $data['image'] = $nome_imagem;

        if ($this->user->create($data)) {
            return redirect()->route('user.index')->with('success', 'Usuário cadastrado com sucesso');
        } else {
            return redirect()->route('user.index')->with('error', 'Falha ao cadastrar o usuário');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $url)
    {
        if (!$user = $this->user->with('condominio', 'bloco', 'unidade')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $blocos = $this->bloco->all('id', 'nome');
        $unidades = $this->unidade->all('id', 'nome');
        $condominios = $this->condominio->all('id', 'nome');
        return view('Condominio.Painel.Pages.User.show', compact('blocos', 'condominios', 'unidades', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $url)
    {
        if (!$user = $this->user->with('condominio', 'bloco', 'unidade')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $blocos = $this->bloco->all('id', 'nome');
        $unidades = $this->unidade->all('id', 'nome');
        $condominios = $this->condominio->all('id', 'nome');
        return view('Condominio.Painel.Pages.User.edit', compact('blocos', 'condominios', 'unidades', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $url)
    {
        if (!$user = $this->user->with('condominio', 'bloco', 'unidade')->where('url', $url)->first()) {
            return redirect()->back();
        }

        //Update de Imagem
        if ($request->image) {
            if (Storage::exists($user->image)) {
                Storage::delete($user->image);
            }

            $nome_imagem_edit = $request->image->getClientOriginalName();
            $request->image->storeAs('User', $nome_imagem_edit);
        } elseif ($request->image === null) {
            $nome_imagem_edit = $user['image'];
        } else {
            $nome_imagem_edit = 'default.jpg';
        }
        //Update de Imagem

        $data = $request->except('_token', '_method');
        $data['password'] = Hash::make($request->password);
        $data['image'] = $nome_imagem_edit;

        if ($user->update($data)) {
            return redirect()->route('user.index')->with('success', 'Usuário editado com sucesso');
        } else {
            return redirect()->route('user.index')->with('error', 'Falha ao editar o usuário');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $url)
    {
        if (!$user = $this->user->with('condominio', 'bloco', 'unidade')->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($user->id <= '3') {
            return redirect()->back()->with('error', 'Você não pode deletar usuário padrão do sistema');
        }

        if ($user->delete()) {
            return redirect()->route('user.index')->with('danger', 'Usuário excluído com sucesso!');
        } else {
            return redirect()->route('user.index')->with('error', 'Falha ao excluir o usuário');
        }
    }
}

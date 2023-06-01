<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\PetRequest;

use App\Models\Condominio\Painel\{
    Pet,
    User,
};

class PetController extends Controller
{
    private $pet, $user;

    public function __construct(Pet $pet, User $user)
    {
        $this->pet = $pet;
        $this->user = $user;
    }

    /**
     * index
     */
    public function index()
    {
        $pets = $this->pet->with('user')->paginate(100000000);
        $users = $this->user->all('id', 'name');
        return view('Condominio.Painel.Pages.Pet.index', compact('pets', 'users'));
    }

    /**
     * Create
     */
    public function create()
    {
        $users = $this->user->all('id', 'name');
        return view('Condominio.Painel.Pages.Pet.create', compact('users'));
    }

    /**
     * Store
     */
    public function store(PetRequest $request)
    {
        if ($this->pet->create($request->except('_token'))) {
            return redirect()->route('pet.index')->with('success', 'Pet cadastrado com sucesso');
        } else {
            return redirect()->route('pet.index')->with('error', 'Falha ao cadastrar o pet');
        }
    }

    /**
     * Show
     */
    public function show($id)
    {
        if (!$pet = $this->pet->with('user')->find($id)) {
            return redirect()->back();
        }

        $users = $this->user->all('id', 'name');
        return view('Condominio.Painel.Pages.Pet.show', compact('pet', 'users'));
    }

    /**
     * Edit
     */
    public function edit($id)
    {
        if (!$pet = $this->pet->with('user')->find($id)) {
            return redirect()->back();
        }

        $users = $this->user->all('id', 'name');
        return view('Condominio.Painel.Pages.Pet.edit', compact('pet', 'users'));
    }

    /**
     * Update
     */
    public function update(PetRequest $request, $id)
    {
        if (!$pet = $this->pet->with('user')->find($id)) {
            return redirect()->back();
        }

        if ($pet->update($request->except('_token', '_method'))) {
            return redirect()->route('pet.index')->with('success', 'Pet editado com sucesso');
        } else {
            return redirect()->route('pet.index')->with('error', 'Falha ao editar o pet');
        }
    }

    /**
     * destroy
     */
    public function destroy($id)
    {
        if (!$pet = $this->pet->with('user')->find($id)) {
            return redirect()->back();
        }

        if ($pet->delete()) {
            return redirect()->route('pet.index')->with('danger', 'Pet excluído com sucesso!');
        } else {
            return redirect()->route('pet.index')->with('error', 'Falha ao excluir o pet');
        }
    }
}

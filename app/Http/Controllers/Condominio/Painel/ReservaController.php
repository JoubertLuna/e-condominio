<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condominio\Painel\ReservaRequest;

use App\Models\Condominio\Painel\{
    Area,
    Reserva,
    User
};

class ReservaController extends Controller
{
    private $reserva, $user, $area;

    public function __construct(Reserva $reserva, User $user, Area $area)
    {
        $this->reserva = $reserva;
        $this->user = $user;
        $this->area = $area;
    }

    /**
     * index
     */
    public function index()
    {
        if (auth()->user()->id <= '2') {
            $reservas = $this->reserva->with('user', 'area')->latest()->paginate(100000000);
        } else {
            $reservas = $this->reserva->where('user_id', '=', auth()->user()->id)
                ->with('user', 'area')
                ->latest()
                ->paginate(100000000);
        }
        $users = $this->user->all('id', 'name');
        $areas = $this->area->all('id', 'nome');
        return view('Condominio.Painel.Pages.Reserva.index', compact('reservas', 'users', 'areas'));
    }

    /**
     * Create
     */
    public function create()
    {
        $users = $this->user->all('id', 'name');
        $areas = $this->area->all('id', 'nome');
        return view('Condominio.Painel.Pages.Reserva.create', compact('users', 'areas'));
    }

    /**
     * Store
     */
    public function store(ReservaRequest $request)
    {
        if ($this->reserva->create($request->except('_token'))) {
            return redirect()->route('reserva.index')->with('success', 'Reserva de ambiente cadastrada com sucesso');
        } else {
            return redirect()->route('reserva.index')->with('error', 'Falha ao cadastrar a reserva de ambiente');
        }
    }

    /**
     * Show
     */
    public function show($url)
    {
        if (!$reserva = $this->reserva->with('user', 'area')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $users = $this->user->all('id', 'name');
        $areas = $this->area->all('id', 'nome');
        return view('Condominio.Painel.Pages.Reserva.show', compact('reserva', 'users', 'areas'));
    }

    /**
     * Edit
     */
    public function edit($url)
    {
        if (!$reserva = $this->reserva->with('user', 'area')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $users = $this->user->all('id', 'name');
        $areas = $this->area->all('id', 'nome');
        return view('Condominio.Painel.Pages.Reserva.edit', compact('reserva', 'users', 'areas'));
    }

    /**
     * Update
     */
    public function update(reservaRequest $request, $url)
    {
        if (!$reserva = $this->reserva->with('user', 'area')->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($reserva->update($request->except('_token', '_method'))) {
            return redirect()->route('reserva.index')->with('success', 'Reserva de ambiente editada com sucesso');
        } else {
            return redirect()->route('reserva.index')->with('error', 'Falha ao editar a reserva de ambiente');
        }
    }

    /**
     * destroy
     */
    public function destroy($url)
    {
        if (!$reserva = $this->reserva->with('user', 'area')->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($reserva->delete()) {
            return redirect()->route('reserva.index')->with('danger', 'Reserva de ambiente excluída com sucesso!');
        } else {
            return redirect()->route('reserva.index')->with('error', 'Falha ao excluir a reserva de ambiente');
        }
    }
}

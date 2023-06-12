<?php

namespace App\Http\Controllers\Condominio\Painel;

use App\Http\Controllers\Controller;
use App\Models\Condominio\Painel\{
    Anuncio,
    Assembleia,
    ContaPagar,
    ContaReceber,
    Livro,
    Reserva,
    Visitante,
};


use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $visitante, $anuncio, $reserva, $contaPagar, $contaReceber, $assembleia, $livro;

    public function __construct(Visitante $visitante, Anuncio $anuncio, Reserva $reserva, ContaPagar $contaPagar, ContaReceber $contaReceber, Assembleia $assembleia, Livro $livro)
    {
        $this->visitante = $visitante;
        $this->anuncio = $anuncio;
        $this->reserva = $reserva;
        $this->contaPagar = $contaPagar;
        $this->contaReceber = $contaReceber;
        $this->assembleia = $assembleia;
        $this->livro = $livro;
    }

    public function index()
    {
        if (auth()->user()->id <= '3') {
            $visitantes = $this->visitante->with('bloco', 'user', 'unidade')->latest()->paginate(100000000);
        } else {
            $visitantes = $this->visitante->where('user_id', '=', auth()->user()->id)
                ->with('bloco', 'user', 'unidade')
                ->latest()
                ->paginate(100000000);
        }

        if (auth()->user()->id <= '3') {
            $anuncios = $this->anuncio->with('user')->latest()->paginate(100000000);
        } else {
            $anuncios = $this->anuncio->where('user_id', '=', auth()->user()->id)
                ->with('user')
                ->latest()
                ->paginate(100000000);
        }

        if (auth()->user()->id <= '3') {
            $reservas = $this->reserva->with('user', 'area')->latest()->paginate(100000000);
        } else {
            $reservas = $this->reserva->where('user_id', '=', auth()->user()->id)
                ->with('user', 'area')
                ->latest()
                ->paginate(100000000);
        }
        return view('Condominio.Painel.Pages.home', compact('visitantes', 'anuncios', 'reservas'));
    }
}

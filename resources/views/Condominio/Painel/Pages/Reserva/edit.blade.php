@extends('adminlte::page')

@section('title', "Editar {$reserva->titulo}")

@section('content_header')
    <div align="right">
        <a href="{{ route('reserva.index') }}" class="btn btn-dark">Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('reserva.update', $reserva->id) }}" method="POST" class="form">
                @method('PUT')
                @include('Condominio.Painel.Pages.Reserva._partials.form')
            </form>
        </div>
    </div>
@stop

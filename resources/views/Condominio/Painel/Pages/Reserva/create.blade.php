@extends('adminlte::page')

@section('title', 'Cadastrar Reserva de Ambiente')

@section('content_header')
    <div align="right">
        <a href="{{ route('reserva.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('reserva.store') }}" method="POST" class="form">
                @include('Condominio.Painel.Pages.Reserva._partials.form')
            </form>
        </div>
    </div>
@stop

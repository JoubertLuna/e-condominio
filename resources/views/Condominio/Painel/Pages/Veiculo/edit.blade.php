@extends('adminlte::page')

@section('title', "Editar {$veiculo->placa}")

@section('content_header')
    <div align="right">
        <a href="{{ route('veiculo.index') }}" class="btn btn-dark">Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('veiculo.update', $veiculo->id) }}" method="POST" class="form">
                @method('PUT')
                @include('Condominio.Painel.Pages.Veiculo._partials.form')
            </form>
        </div>
    </div>
@stop

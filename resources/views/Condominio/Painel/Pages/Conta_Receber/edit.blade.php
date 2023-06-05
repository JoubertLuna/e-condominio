@extends('adminlte::page')

@section('title', "Editar {$contaReceber->nome}")

@section('content_header')
    <div align="right">
        <a href="{{ route('conta_receber.index') }}" class="btn btn-dark">Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('conta_receber.update', $contaReceber->url) }}" method="POST" class="form">
                @method('PUT')
                @include('Condominio.Painel.Pages.Conta_Receber._partials.form')
            </form>
        </div>
    </div>
@stop

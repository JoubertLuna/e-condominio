@extends('adminlte::page')

@section('title', "Editar {$contaPagar->nome}")

@section('content_header')
    <div align="right">
        <a href="{{ route('conta_pagar.index') }}" class="btn btn-dark">Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('conta_pagar.update', $contaPagar->url) }}" method="POST" class="form">
                @method('PUT')
                @include('Condominio.Painel.Pages.Conta_Pagar._partials.form')
            </form>
        </div>
    </div>
@stop

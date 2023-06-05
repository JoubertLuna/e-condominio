@extends('adminlte::page')

@section('title', "Editar {$banco->nome}")

@section('content_header')
    <div align="right">
        <a href="{{ route('banco.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('banco.update', $banco->url) }}" method="POST" class="form">
                @method('PUT')
                @include('Condominio.Painel.Pages.Banco._partials.form')
            </form>
        </div>
    </div>
@stop

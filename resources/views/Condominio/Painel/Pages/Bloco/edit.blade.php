@extends('adminlte::page')

@section('title', "Editar {$bloco->nome}")

@section('content_header')
    <div align="right">
        <a href="{{ route('bloco.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('bloco.update', $bloco->url) }}" method="POST" class="form">
                @method('PUT')
                @include('Condominio.Painel.Pages.Bloco._partials.form')
            </form>
        </div>
    </div>
@stop

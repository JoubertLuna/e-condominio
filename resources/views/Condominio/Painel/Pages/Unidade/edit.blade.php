@extends('adminlte::page')

@section('title', "Editar {$unidade->nome}")

@section('content_header')
    <div align="right">
        <a href="{{ route('unidade.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('unidade.update', $unidade->id) }}" method="POST" class="form">
                @method('PUT')
                @include('Condominio.Painel.Pages.Unidade._partials.form')
            </form>
        </div>
    </div>
@stop

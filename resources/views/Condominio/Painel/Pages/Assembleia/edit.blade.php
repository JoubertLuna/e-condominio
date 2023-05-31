@extends('adminlte::page')

@section('title', "Editar {$assembleia->nome}")

@section('content_header')
    <div align="right">
        <a href="{{ route('assembleia.index') }}" class="btn btn-dark">Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('assembleia.update', $assembleia->id) }}" method="POST" class="form">
                @method('PUT')
                @include('Condominio.Painel.Pages.Assembleia._partials.form')
            </form>
        </div>
    </div>
@stop

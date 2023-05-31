@extends('adminlte::page')

@section('title', "Editar {$categoria->nome}")

@section('content_header')
    <div align="right">
        <a href="{{ route('categoria.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('categoria.update', $categoria->id) }}" method="POST" class="form">
                @method('PUT')
                @include('Condominio.Painel.Pages.Categoria._partials.form')
            </form>
        </div>
    </div>
@stop

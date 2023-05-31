@extends('adminlte::page')

@section('title', 'Cadastrar Categoria')

@section('content_header')
    <div align="right">
        <a href="{{ route('categoria.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categoria.store') }}" class="form" method="POST">
                @include('Condominio.Painel.Pages.Categoria._partials.form')
            </form>
        </div>
    </div>
@stop

@extends('adminlte::page')

@section('title', 'Cadastrar Livro Ocorrência')

@section('content_header')
    <div align="right">
        <a href="{{ route('livro.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('livro.store') }}" method="POST" class="form">
                @include('Condominio.Painel.Pages.Livro._partials.form')
            </form>
        </div>
    </div>
@stop

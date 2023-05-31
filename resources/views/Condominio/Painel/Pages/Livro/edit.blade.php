@extends('adminlte::page')

@section('title', "Editar {$livro->titulo}")

@section('content_header')
    <div align="right">
        <a href="{{ route('livro.index') }}" class="btn btn-dark">Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('livro.update', $livro->id) }}" method="POST" class="form">
                @method('PUT')
                @include('Condominio.Painel.Pages.Livro._partials.form')
            </form>
        </div>
    </div>
@stop

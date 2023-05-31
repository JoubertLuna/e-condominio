@extends('adminlte::page')

@section('title', 'Cadastrar Anúncio')

@section('content_header')
    <div align="right">
        <a href="{{ route('anuncio.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('anuncio.store') }}" method="POST" class="form">
                @include('Condominio.Painel.Pages.Anuncio._partials.form')
            </form>
        </div>
    </div>
@stop

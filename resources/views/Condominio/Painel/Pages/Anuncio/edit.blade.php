@extends('adminlte::page')

@section('title', "Editar {$anuncio->titulo}")

@section('content_header')
    <div align="right">
        <a href="{{ route('anuncio.index') }}" class="btn btn-dark">Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('anuncio.update', $anuncio->url) }}" method="POST" class="form">
                @method('PUT')
                @include('Condominio.Painel.Pages.Anuncio._partials.form')
            </form>
        </div>
    </div>
@stop

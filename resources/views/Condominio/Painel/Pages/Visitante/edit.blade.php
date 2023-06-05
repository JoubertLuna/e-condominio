@extends('adminlte::page')

@section('title', "Editar {$visitante->nome}")

@section('content_header')
    <div align="right">
        <a href="{{ route('visitante.index') }}" class="btn btn-dark">Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('visitante.update', $visitante->url) }}" method="POST" class="form"
                enctype="multipart/form-data">
                @method('PUT')
                @include('Condominio.Painel.Pages.Visitante._partials.form')
            </form>
        </div>
    </div>
@stop

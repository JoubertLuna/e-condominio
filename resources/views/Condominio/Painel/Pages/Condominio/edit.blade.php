@extends('adminlte::page')

@section('title', "Editar {$condominio->nome}")

@section('content_header')
    <div align="right">
        <a href="{{ route('condominio.index') }}" class="btn btn-dark">Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('condominio.update', $condominio->url) }}" method="POST" class="form"
                enctype="multipart/form-data">
                @method('PUT')
                @include('Condominio.Painel.Pages.Condominio._partials.form')
            </form>
        </div>
    </div>
@stop

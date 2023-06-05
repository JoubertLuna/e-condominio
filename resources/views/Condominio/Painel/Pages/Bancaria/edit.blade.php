@extends('adminlte::page')

@section('title', "Editar {$bancaria->nome}")

@section('content_header')
    <div align="right">
        <a href="{{ route('bancaria.index') }}" class="btn btn-dark">Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('bancaria.update', $bancaria->url) }}" method="POST" class="form">
                @method('PUT')
                @include('Condominio.Painel.Pages.Bancaria._partials.form')
            </form>
        </div>
    </div>
@stop

@extends('adminlte::page')

@section('title', "Editar {$pet->nome}")

@section('content_header')
    <div align="right">
        <a href="{{ route('pet.index') }}" class="btn btn-dark">Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pet.update', $pet->url) }}" method="POST" class="form">
                @method('PUT')
                @include('Condominio.Painel.Pages.Pet._partials.form')
            </form>
        </div>
    </div>
@stop

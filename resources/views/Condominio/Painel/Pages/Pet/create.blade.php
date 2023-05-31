@extends('adminlte::page')

@section('title', 'Cadastrar Pet')

@section('content_header')
    <div align="right">
        <a href="{{ route('pet.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pet.store') }}" method="POST" class="form">
                @include('Condominio.Painel.Pages.Pet._partials.form')
            </form>
        </div>
    </div>
@stop

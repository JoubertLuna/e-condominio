@extends('adminlte::page')

@section('title', 'Cadastrar Assembleia')

@section('content_header')
    <div align="right">
        <a href="{{ route('assembleia.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('assembleia.store') }}" method="POST" class="form">
                @include('Condominio.Painel.Pages.Assembleia._partials.form')
            </form>
        </div>
    </div>
@stop

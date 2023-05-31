@extends('adminlte::page')

@section('title', 'Cadastrar Estados')

@section('content_header')
    <div align="right">
        <a href="{{ route('estado.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('estado.store') }}" class="form" method="POST">
                @include('Condominio.Painel.Pages.Estado._partials.form')
            </form>
        </div>
    </div>
@stop

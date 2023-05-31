@extends('adminlte::page')

@section('title', 'Cadastrar Visitante')

@section('content_header')
    <div align="right">
        <a href="{{ route('visitante.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('visitante.store') }}" method="POST" class="form" enctype="multipart/form-data">
                @include('Condominio.Painel.Pages.Visitante._partials.form')
            </form>
        </div>
    </div>
@stop

@extends('adminlte::page')

@section('title', 'Cadastrar Permissão')

@section('content_header')
    <div align="right">
        <a href="{{ route('resource.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('resource.store') }}" class="form" method="POST">
                @include('Condominio.Painel.Pages.Resource._partials.form')
            </form>
        </div>
    </div>
@stop

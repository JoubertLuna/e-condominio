@extends('adminlte::page')

@section('title', 'Cadastrar Perfil')

@section('content_header')
    <div align="right">
        <a href="{{ route('role.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('role.store') }}" class="form" method="POST">
                @include('Condominio.Painel.Pages.Role._partials.form')
            </form>
        </div>
    </div>
@stop

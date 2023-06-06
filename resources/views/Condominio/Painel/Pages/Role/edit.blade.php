@extends('adminlte::page')

@section('title', "Editar {$role->nome}")

@section('content_header')
    <div align="right">
        <a href="{{ route('role.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('role.update', $role->url) }}" method="POST" class="form">
                @method('PUT')
                @include('Condominio.Painel.Pages.Role._partials.form')
            </form>
        </div>
    </div>
@stop

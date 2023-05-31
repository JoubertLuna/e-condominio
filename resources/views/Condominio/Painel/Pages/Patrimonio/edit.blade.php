@extends('adminlte::page')

@section('title', "Editar {$patrimonio->nome}")

@section('content_header')
    <div align="right">
        <a href="{{ route('patrimonio.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('patrimonio.update', $patrimonio->id) }}" method="POST" class="form">
                @method('PUT')
                @include('Condominio.Painel.Pages.Patrimonio._partials.form')
            </form>
        </div>
    </div>
@stop

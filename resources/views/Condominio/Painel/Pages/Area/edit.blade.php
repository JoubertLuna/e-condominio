@extends('adminlte::page')

@section('title', "Editar {$area->nome}")

@section('content_header')
    <div align="right">
        <a href="{{ route('area.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('area.update', $area->id) }}" method="POST" class="form">
                @method('PUT')
                @include('Condominio.Painel.Pages.Area._partials.form')
            </form>
        </div>
    </div>
@stop

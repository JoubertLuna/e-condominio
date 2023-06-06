@extends('adminlte::page')

@section('title', "Editar {$resource->nome}")

@section('content_header')
    <div align="right">
        <a href="{{ route('resource.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('resource.update', $resource->url) }}" method="POST" class="form">
                @method('PUT')
                @include('Condominio.Painel.Pages.Resource._partials.form')
            </form>
        </div>
    </div>
@stop

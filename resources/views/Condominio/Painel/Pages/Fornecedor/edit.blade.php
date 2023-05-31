@extends('adminlte::page')

@section('title', "Editar {$fornecedor->razao_social}")

@section('content_header')
    <div align="right">
        <a href="{{ route('fornecedor.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('fornecedor.update', $fornecedor->id) }}" method="POST" class="form">
                @method('PUT')
                @include('Condominio.Painel.Pages.Fornecedor._partials.form')
            </form>
        </div>
    </div>
@stop

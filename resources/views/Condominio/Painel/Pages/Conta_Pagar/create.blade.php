@extends('adminlte::page')

@section('title', 'Cadastrar Conta a Pagar')

@section('content_header')
    <div align="right">
        <a href="{{ route('conta_pagar.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('conta_pagar.store') }}" method="POST" class="form">
                @include('Condominio.Painel.Pages.Conta_Pagar._partials.form')
            </form>
        </div>
    </div>
@stop

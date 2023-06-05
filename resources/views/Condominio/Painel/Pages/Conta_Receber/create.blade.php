@extends('adminlte::page')

@section('title', 'Cadastrar Conta a Receber')

@section('content_header')
    <div align="right">
        <a href="{{ route('conta_receber.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('conta_receber.store') }}" method="POST" class="form">
                @include('Condominio.Painel.Pages.Conta_Receber._partials.form')
            </form>
        </div>
    </div>
@stop

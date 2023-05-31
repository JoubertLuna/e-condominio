@extends('adminlte::page')

@section('title', 'Cadastrar Conta Bancária')

@section('content_header')
    <div align="right">
        <a href="{{ route('bancaria.index') }}" class="btn btn-dark">Voltar</a>
    </div>

@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('bancaria.store') }}" class="form" method="POST">
                @include('Condominio.Painel.Pages.Bancaria._partials.form')
            </form>
        </div>
    </div>
@stop

@extends('adminlte::page')

@section('title', 'Detalhes da Conta Bancária')

@section('content_header')
    <div align="left">
        <h1>Detalhes da Conta Bancária <b>{{ $bancaria->nome }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('bancaria.index') }}" class="btn btn-dark">Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5><b>Dados Gerais</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Nome Conta Bancária: </strong> {{ $bancaria->nome }}
                        </li>
                        <li>
                            <strong>Tipo da Conta Bancária: </strong>
                            {{ $bancaria->tipo_conta === 'P' ? 'Poupança' : ($bancaria->tipo_conta === 'C' ? 'Corrente' : 'Salário') }}
                        </li>
                        <li>
                            <strong>Agência</strong>: </strong> {{ $bancaria->agencia }}
                        </li>
                        <li>
                            <strong>Número da Conta: </strong> {{ $bancaria->numero }} - {{ $bancaria->digito }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <br>
                    <hr>
                    <ul>
                        <li>
                            <strong>Banco: </strong> {{ $bancaria->banco->nome }}
                        </li>
                        <li>
                            <strong>Condomínio: </strong> {{ $bancaria->condominio->nome }}
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            @include('Condominio.Painel.Includes.alerts')
            <div class="form-group">
                <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#modal-primary"><i
                        class="fa fa-trash text-danger"></i>
                    Deletar Conta Bancária - {{ $bancaria->nome }}</button>
            </div>

            <div class="modal fade" id="modal-primary">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-default">
                        <div class="modal-header">
                            <h4 class="modal-title">Deseja Realmente Excluir?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div align="center" class="modal-body">
                            <form action="{{ route('bancaria.destroy', $bancaria->url) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Deletar Conta Bancária - {{ $bancaria->nome }}"
                                    class="btn btn-sm btn-dark" width="150"><i class="fa fa-trash text-danger"></i>
                                    Deletar Conta Bancária - {{ $bancaria->nome }}</button>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

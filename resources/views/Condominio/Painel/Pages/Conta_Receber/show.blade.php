@extends('adminlte::page')

@section('title', 'Detalhes da Conta a Receber')

@section('content_header')
    <div align="left">
        <h1>Detalhes da Conta a Receber <b>{{ $contaReceber->nome }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('conta_receber.index') }}" class="btn btn-dark">Voltar</a>
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
                            <strong>Nome da Conta a Receber: </strong> {{ $contaReceber->nome }}
                        </li>
                        <li>
                            <strong>Categoria da Conta: </strong> {{ $contaReceber->categoria->nome }}
                        </li>
                        <li>
                            <strong>Data da Conta: </strong> {{ date('d/m/Y', strtotime($contaReceber->data)) }}
                        </li>
                        <li>
                            <strong>Conta Bancária: </strong> {{ $contaReceber->bancaria->nome }}
                        </li>
                        <li>
                            <strong>Valor: </strong> R$ {{ number_format($contaReceber->valor, 2, ',', '.') }}
                        </li>
                        <li>
                            <strong>Pago: </strong> {{ $contaReceber->pago === 'S' ? 'Sim' : 'Não' }}
                        </li>
                        <li>
                            <strong>Bloco: </strong> {{ $contaReceber->bloco->nome }}
                        </li>
                        <li>
                            <strong>Unidade: </strong> {{ $contaReceber->unidade->nome }}
                        </li>
                        <li>
                            <strong>Morador: </strong> {{ $contaReceber->user->name }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><b>Observação</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Obs: </strong> {{ $contaReceber->obs }}
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            @include('Condominio.Painel.Includes.alerts')
            @can('conta_receber.destroy')
                <div class="form-group">
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#modal-primary"><i
                            class="fa fa-trash text-danger"></i>
                        Deletar Conta a Receber - {{ $contaReceber->nome }}</button>
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
                                <form action="{{ route('conta_receber.destroy', $contaReceber->url) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Deletar Conta a Receber - {{ $contaReceber->nome }}"
                                        class="btn btn-sm btn-dark" width="150"><i class="fa fa-trash text-danger"></i>
                                        Deletar Conta a Receber - {{ $contaReceber->nome }}</button>
                                </form>
                            </div>
                            <div class="modal-footer justify-content-between"></div>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>
@stop

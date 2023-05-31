@extends('adminlte::page')

@section('title', 'Detalhes do Visitante')

@section('content_header')
    <div align="left">
        <h1>Detalhes do Visitante <b>{{ $visitante->nome }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('visitante.index') }}" class="btn btn-dark">Voltar</a>
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
                            <strong>Nome do Visitante: </strong> {{ $visitante->nome }}
                        </li>
                        <li>
                            <strong>RG Visitante: </strong> {{ $visitante->rg }}
                        </li>
                        <li>
                            <strong>CPF Visitante: </strong> {{ $visitante->cpf }}
                        </li>
                        <li>
                            <strong>Bloco: </strong> {{ $visitante->bloco->nome }}
                        </li>
                        <li>
                            <strong>Unidade: </strong> {{ $visitante->unidade->nome }}
                        </li>
                        <li>
                            <strong>Morador: </strong> {{ $visitante->user->name }}
                        </li>
                        <li>
                            <strong>Data da Entrada: </strong> {{ date('d/m/Y', strtotime($visitante->data_entrada)) }}
                        </li>
                        <li>
                            <strong>Hora da Entrada: </strong> {{ $visitante->hora_entrada }}
                        </li>
                        <li>
                            <strong>Data da Saída: </strong> {{ date('d/m/Y', strtotime($visitante->data_saida)) }}
                        </li>
                        <li>
                            <strong>Hora da Saída: </strong> {{ $visitante->hora_saida }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><b>Observação</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Obs: </strong> {{ $visitante->obs }}
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h5><b>Imagem</b></h5>
                    <hr>
                    <div align="center" class="form-group">
                        @if (@$visitante->image)
                            <img src="{{ asset('storage/Visitante/' . @$visitante->image) }}" width="180px"
                                alt="{{ @$visitante->nome }}">
                        @else
                            <img src="{{ asset('storage/visitante/default.jpg') }}" width="180px">
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            @include('Condominio.Painel.Includes.alerts')
            <div class="form-group">
                <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#modal-primary"><i
                        class="fa fa-trash text-danger"></i>
                    Deletar Visitante - {{ $visitante->nome }}</button>
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
                            <form action="{{ route('visitante.destroy', $visitante->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Deletar Visitante - {{ $visitante->nome }}"
                                    class="btn btn-sm btn-dark" width="150"><i class="fa fa-trash text-danger"></i>
                                    Deletar Visitante - {{ $visitante->nome }}</button>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

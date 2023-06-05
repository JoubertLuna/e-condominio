@extends('adminlte::page')

@section('title', 'Detalhes da Reserva de Ambiente')

@section('content_header')
    <div align="left">
        <h1>Detalhes da Reserva de Ambiente <b>{{ date('d/m/Y', strtotime($reserva->data)) }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('reserva.index') }}" class="btn btn-dark">Voltar</a>
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
                            <strong>Data da Reserva: </strong>{{ date('d/m/Y', strtotime($reserva->data)) }}
                        </li>
                        <li>
                            <strong>Área da Reserva: </strong> {{ $reserva->area->nome }}
                        </li>
                        <li>
                            <strong>Morador: </strong> {{ $reserva->user->name }}
                        </li>
                        <li>
                            <strong>Contato Morador: </strong> {{ $reserva->user->celular }}
                        </li>
                        <li>
                            <strong>Aprovado: </strong> {{ $reserva->aprovado === 'N' ? 'Não' : 'Sim' }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><b>Observação da Reserva</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Observação da Reserva: </strong> {{ $reserva->obs }}
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            @include('Condominio.Painel.Includes.alerts')
            <div class="form-group">
                <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#modal-primary"><i
                        class="fa fa-trash text-danger"></i>
                    Deletar Reserva de Ambiente - {{ date('d/m/Y', strtotime($reserva->data)) }}</button>
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
                            <form action="{{ route('reserva.destroy', $reserva->url) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    title="Deletar Reserva de Ambiente - {{ date('d/m/Y', strtotime($reserva->data)) }}"
                                    class="btn btn-sm btn-dark" width="150"><i class="fa fa-trash text-danger"></i>
                                    Deletar Reserva de Ambiente - {{ date('d/m/Y', strtotime($reserva->data)) }}</button>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

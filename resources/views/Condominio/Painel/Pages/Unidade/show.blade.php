@extends('adminlte::page')

@section('title', 'Detalhes da Unidade')

@section('content_header')
    <div align="left">
        <h1>Detalhes da Unidade <b>{{ $unidade->nome }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('unidade.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <hr>
                        <li>
                            <strong>Nome: </strong> {{ $unidade->nome }}
                        </li>
                        <li>
                            <strong>Bloco: </strong> {{ $unidade->bloco->nome }}
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            @include('Condominio.Painel.Includes.alerts')
            @can('unidade.destroy')
                <div class="form-group">
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#modal-primary"><i
                            class="fa fa-trash text-danger"></i>
                        Deletar unidade - {{ $unidade->nome }}</button>
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
                                <form action="{{ route('unidade.destroy', $unidade->url) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Deletar Unidade - {{ $unidade->nome }}"
                                        class="btn btn-sm btn-dark" width="150"><i class="fa fa-trash text-danger"></i>
                                        Deletar unidade - {{ $unidade->nome }}</button>
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

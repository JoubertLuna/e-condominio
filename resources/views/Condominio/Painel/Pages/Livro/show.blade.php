@extends('adminlte::page')

@section('title', 'Detalhes da Ocorrência')

@section('content_header')
    <div align="left">
        <h1>Detalhes da Ocorrência <b>{{ $livro->titulo }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('livro.index') }}" class="btn btn-dark">Voltar</a>
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
                            <strong>Título da Ocorrência: </strong> {{ $livro->titulo }}
                        </li>
                        <li>
                            <strong>Data da Ocorrência: </strong>{{ date('d/m/Y', strtotime($livro->data)) }}
                        </li>
                        <li>
                            <strong>Morador: </strong> {{ $livro->user->name }}
                        </li>
                        <li>
                            <strong>Contato Morador: </strong> {{ $livro->contato }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><b>Texto da livro</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Descrição da Ocorrência: </strong> {{ $livro->descricao }}
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            @include('Condominio.Painel.Includes.alerts')
            <div class="form-group">
                <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#modal-primary"><i
                        class="fa fa-trash text-danger"></i>
                    Deletar Ocorrência - {{ $livro->titulo }}</button>
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
                            <form action="{{ route('livro.destroy', $livro->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Deletar Ocorrência - {{ $livro->titulo }}"
                                    class="btn btn-sm btn-dark" width="150"><i class="fa fa-trash text-danger"></i>
                                    Deletar Ocorrência - {{ $livro->titulo }}</button>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

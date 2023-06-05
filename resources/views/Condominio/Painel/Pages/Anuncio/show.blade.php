@extends('adminlte::page')

@section('title', 'Detalhes do Anúncio')

@section('content_header')
    <div align="left">
        <h1>Detalhes do Anúncio <b>{{ $anuncio->titulo }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('anuncio.index') }}" class="btn btn-dark">Voltar</a>
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
                            <strong>Título da Anúncio: </strong> {{ $anuncio->titulo }}
                        </li>
                        <li>
                            <strong>Data da Anúncio: </strong>{{ date('d/m/Y', strtotime($anuncio->data)) }}
                        </li>
                        <li>
                            <strong>Morador: </strong> {{ $anuncio->user->name }}
                        </li>
                        <li>
                            <strong>Contato Morador: </strong> {{ $anuncio->user->celular }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><b>Texto do Anúncio</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Descrição da Anúncio: </strong> {{ $anuncio->descricao }}
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            @include('Condominio.Painel.Includes.alerts')
            <div class="form-group">
                <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#modal-primary"><i
                        class="fa fa-trash text-danger"></i>
                    Deletar Anúncio - {{ $anuncio->titulo }}</button>
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
                            <form action="{{ route('anuncio.destroy', $anuncio->url) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Deletar Anúncio - {{ $anuncio->titulo }}"
                                    class="btn btn-sm btn-dark" width="150"><i class="fa fa-trash text-danger"></i>
                                    Deletar Anúncio - {{ $anuncio->titulo }}</button>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

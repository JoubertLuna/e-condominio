@extends('adminlte::page')

@section('title', 'Detalhes do Condomínio')

@section('content_header')
    <div align="left">
        <h1>Detalhes do Condomínio <b>{{ $condominio->nome }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('condominio.index') }}" class="btn btn-dark">Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <h5><b>Dados Gerais</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Empresa: </strong> {{ $condominio->nome }}
                        </li>
                        <li>
                            <strong>CNPJ: </strong> {{ $condominio->cnpj }}
                        </li>
                        <li>
                            <strong>E-mail: </strong> {{ $condominio->email }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5><b>Contatos</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Telefone: </strong> {{ $condominio->fone }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5><b>Redes Sociais</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Facebook: </strong> {{ $condominio->facebook }}
                        </li>
                        <li>
                            <strong>Twitter: </strong> {{ $condominio->twitter }}
                        </li>
                        <li>
                            <strong>Linkedin: </strong> {{ $condominio->linkedin }}
                        </li>
                        <li>
                            <strong>Instagram: </strong> {{ $condominio->instagram }}
                        </li>
                        <li>
                            <strong>Tiktok: </strong> {{ $condominio->tiktok }}
                        </li>
                        <li>
                            <strong>Whatsapp: </strong> {{ $condominio->whatsapp }}
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h5><b>Endereço</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>CEP: </strong> {{ $condominio->cep }}
                        </li>
                        <li>
                            <strong>Logradouro: </strong> {{ $condominio->logradouro }}
                        </li>
                        <li>
                            <strong>Bairro: </strong> {{ $condominio->bairro }}
                        </li>
                        <li>
                            <strong>Cidade: </strong> {{ $condominio->cidade }}
                        </li>
                        <li>
                            <strong>Estado: </strong> {{ $condominio->uf }}
                        </li>
                        <li>
                            <strong>Número: </strong> {{ $condominio->numero }}
                        </li>
                        <li>
                            <strong>Complemento: </strong> {{ $condominio->complemento }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><b>Imagem</b></h5>
                    <hr>
                    <div align="center" class="form-group">
                        @if (@$condominio->image)
                            <img src="{{ asset('storage/Condominio/' . @$condominio->image) }}" width="170px"
                                alt="{{ @$condominio->nome }}">
                        @else
                            <img src="{{ asset('storage/Condominio/default.png') }}" width="170px">
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            @include('Condominio.Painel.Includes.alerts')
            <div class="form-group">
                <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#modal-primary"><i
                        class="fa fa-trash text-danger"></i>
                    Deletar Condomínio - {{ $condominio->nome }}</button>
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
                            <form action="{{ route('condominio.destroy', $condominio->url) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Deletar Condomínio - {{ $condominio->nome }}"
                                    class="btn btn-sm btn-dark" width="150"><i class="fa fa-trash text-danger"></i>
                                    Deletar Condomínio - {{ $condominio->nome }}</button>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

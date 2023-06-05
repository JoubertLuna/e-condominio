@extends('adminlte::page')

@section('title', 'Detalhes do Fornecedor')

@section('content_header')
    <div align="left">
        <h1>Detalhes do Fornecedor <b>{{ $fornecedor->razao_social }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('fornecedor.index') }}" class="btn btn-dark">Voltar</a>
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
                            <strong>Nome: </strong> {{ $fornecedor->razao_social }}
                        </li>
                        <li>
                            <strong>Nome Fantasia: </strong> {{ $fornecedor->nome_fantasia }}
                        </li>
                        <li>
                            <strong>RG: </strong> {{ $fornecedor->rg }}
                        </li>
                        <li>
                            <strong>CPF: </strong> {{ $fornecedor->cpf }}
                        </li>
                        <li>
                            <strong>CNPJ: </strong> {{ $fornecedor->cnpj }}
                        </li>
                        <li>
                            <strong>Data de Cadastro: </strong> {{ $fornecedor->data_cadastro }}
                        </li>
                        <li>
                            <strong>Ativo: </strong> {{ $fornecedor->ativo === 'S' ? 'Sim' : 'Não' }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><b>Contatos</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Telefone: </strong> {{ $fornecedor->fone }}
                        </li>
                        <li>
                            <strong>Celular: </strong> {{ $fornecedor->celular }}
                        </li>
                        <li>
                            <strong>E-mail: </strong> {{ $fornecedor->email }}
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h5><b>Endereço</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>CEP: </strong> {{ $fornecedor->cep }}
                        </li>
                        <li>
                            <strong>Logradouro: </strong> {{ $fornecedor->logradouro }}
                        </li>
                        <li>
                            <strong>Bairro: </strong> {{ $fornecedor->bairro }}
                        </li>
                        <li>
                            <strong>Cidade: </strong> {{ $fornecedor->cidade }}
                        </li>
                        <li>
                            <strong>Estado: </strong> {{ $fornecedor->uf }}
                        </li>
                        <li>
                            <strong>Número: </strong> {{ $fornecedor->numero }}
                        </li>
                        <li>
                            <strong>Complemento: </strong> {{ $fornecedor->complemento }}
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            @include('Condominio.Painel.Includes.alerts')
            <div class="form-group">
                <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#modal-primary"><i
                        class="fa fa-trash text-danger"></i>
                    Deletar Fornecedor - {{ $fornecedor->razao_social }}</button>
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
                            <form action="{{ route('fornecedor.destroy', $fornecedor->url) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Deletar Fornecedor - {{ $fornecedor->razao_social }}"
                                    class="btn btn-sm btn-dark" width="150"><i class="fa fa-trash text-danger"></i>
                                    Deletar Fornecedor - {{ $fornecedor->razao_social }}</button>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

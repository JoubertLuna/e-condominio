@extends('adminlte::page')

@section('title', 'Detalhes do Pet')

@section('content_header')
    <div align="left">
        <h1>Detalhes do Pet <b>{{ $pet->nome }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('pet.index') }}" class="btn btn-dark">Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5><b>Dados do Pet</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Nome do Pet: </strong> {{ $pet->nome }}
                        </li>
                        <li>
                            <strong>Especie do Pet: </strong> {{ $pet->especie }}
                        </li>
                        <li>
                            <strong>Sexo do Pet: </strong> {{ $pet->sexo === 'F' ? 'Feminino' : 'Masculino' }}
                        </li>
                        <li>
                            <strong>Raça do Pet: </strong> {{ $pet->raca }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><b>Contatos</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Dono do Pet: </strong> {{ $pet->user->name }}
                        </li>
                        <li>
                            <strong>Contato do Dono: </strong> {{ $pet->user->celular }}
                        </li>
                    </ul>
                </div>
            </div>
            @include('Condominio.Painel.Includes.alerts')
            <div class="form-group">
                <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#modal-primary"><i
                        class="fa fa-trash text-danger"></i>
                    Deletar Pet - {{ $pet->nome }}</button>
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
                            <form action="{{ route('pet.destroy', $pet->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Deletar Pet - {{ $pet->nome }}"
                                    class="btn btn-sm btn-dark" width="150"><i class="fa fa-trash text-danger"></i>
                                    Deletar Pet - {{ $pet->nome }}</button>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

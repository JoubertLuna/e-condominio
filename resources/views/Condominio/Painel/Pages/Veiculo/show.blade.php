@extends('adminlte::page')

@section('title', 'Detalhes do Veículo')

@section('content_header')
    <div align="left">
        <h1>Detalhes do Veículo <b>{{ $veiculo->placa }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('veiculo.index') }}" class="btn btn-dark">Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5><b>Dados do Veículo</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Placa do Veículo: </strong> {{ $veiculo->placa }}
                        </li>
                        <li>
                            <strong>Marca do Veículo: </strong> {{ $veiculo->marca }}
                        </li>
                        <li>
                            <strong>Modelo do Veículo: </strong> {{ $veiculo->modelo }}
                        </li>
                        <li>
                            <strong>Tipo do Veículo: </strong> {{ $veiculo->tipo_veiculo === 'C' ? 'Carro' : 'Moto' }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><b>Contatos</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Dono do Veículo: </strong> {{ $veiculo->user->name }}
                        </li>
                        <li>
                            <strong>Contato do Dono: </strong> {{ $veiculo->user->celular }}
                        </li>
                        <li>
                            <strong>Unidade do dono/Veículo: </strong> {{ $veiculo->unidade->nome }}
                        </li>
                    </ul>
                </div>
            </div>
            @include('Condominio.Painel.Includes.alerts')
            <div class="form-group">
                <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#modal-primary"><i
                        class="fa fa-trash text-danger"></i>
                    Deletar Veículo - {{ $veiculo->placa }}</button>
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
                            <form action="{{ route('veiculo.destroy', $veiculo->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Deletar Veículo - {{ $veiculo->placa }}"
                                    class="btn btn-sm btn-dark" width="150"><i class="fa fa-trash text-danger"></i>
                                    Deletar Veículo - {{ $veiculo->placa }}</button>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

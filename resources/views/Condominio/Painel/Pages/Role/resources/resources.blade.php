@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('role.resources.available', $role->id) }}" class="btn btn-dark"><i
                    class="fas fa-plus-circle"></i> Adicionar Permissão ao Perfil</a>
        </div>
        <div align="right" class="col-md-6">
            <a href="{{ route('role.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
        </div>
    </div>
@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome da Permissão</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resources as $resource)
                        <tr>
                            <td>{{ $resource->nome }}</td>
                            <td>
                                <a href="{{ route('role.resources.detach', [$role->id, $resource->id]) }}"
                                    title="Remover Permissão"><i class="fa fa-trash text-danger"></i></a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {!! $resources->links() !!}
        </div>
    </div>
@stop

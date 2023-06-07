@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')

    <div align="right">
        <a href="{{ route('resource.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome do Perfil</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->nome }}</td>
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
            {!! $roles->links() !!}
        </div>
    </div>
@stop

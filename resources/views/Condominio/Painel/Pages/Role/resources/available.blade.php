@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    <div align="right">
        <a href="{{ route('role.resources', $role->id) }}" class="btn btn-dark"><i class="fas fa-backward"></i>
            Voltar</a>
    </div>
@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('role.resources.attach', $role->id) }}" method="POST">
                @csrf
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px">#</th>
                            <th>Nome da Permissão</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($resources as $resource)
                            <tr>
                                <td align="center">
                                    <input type="checkbox" name="resources[]" value="{{ $resource->id }}">
                                </td>
                                <td>{{ $resource->nome }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <tr>
                    <td colspan="500">
                        <button type="submit" class="btn btn-success">Vincular Permissão</button>
                    </td>
                </tr>
            </form>
        </div>
        <div class="card-footer">
            {!! $resources->links() !!}
        </div>
    </div>
@stop

@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('profile.permissions.available', $profile->id) }}" class="btn btn-dark"><i
                    class="fas fa-plus-circle"></i> Adicionar Permissão ao Perfil</a>
        </div>
        <div align="right" class="col-md-6">
            <a href="{{ route('profile.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
        </div>
    </div>
@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome da Permissão</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->nome }}</td>
                            <td>
                                <a href="{{ route('profile.permissions.detach', [$profile->id, $permission->id]) }}"
                                    title="Remover Permissão"><i class="fa fa-trash text-danger"></i></a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop

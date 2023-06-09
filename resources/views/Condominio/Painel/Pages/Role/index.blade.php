@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    @can('role.create')
        <a href="{{ route('role.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Novo Perfil</a>
    @endcan
@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome do Perfil</th>
                        <th class="esc">Descricão do Perfil</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->nome }}</td>
                            <td class="esc"><b><i>{{ $role->role }}</i></b></td>

                            <td>
                                <a href="{{ route('role.resources', $role->id) }}" title="Inserir Permissões"><i
                                        class="fas fa-shield-alt text-success"></i>
                                    @if ($role->resources->count() > 0)
                                        <span
                                            class="badge badge-danger"><small>{{ $role->resources->count() }}</small></span>
                                    @endif
                                </a>
                                @can('role.show')
                                    <a href="{{ route('role.show', $role->url) }}" title="Ver Perfil ou deletar"><i
                                            class="fas fa-list text-dark"></i></a>
                                @endcan
                                @can('role.edit')
                                    <a href="{{ route('role.edit', $role->url) }}" title="Editar Dados"><i
                                            class="fa fa-edit text-primary"></i></a>
                                @endcan
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

@section('css')
    <style>
        @media screen and (max-width: 480px) {
            .esc {
                display: none;
            }
        }
    </style>
@stop

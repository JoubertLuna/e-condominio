@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    <a href="{{ route('role.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Novo Perfil</a>
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
                                {{-- <a href="{{ route('profile.permissions', $profile->id) }}" title="Inserir Permissões"><i
                                        class="fas fa-shield-alt text-success"></i>
                                    @if ($profile->permissions->count() > 0)
                                        <span
                                            class="badge badge-danger"><small>{{ $profile->permissions->count() }}</small></span>
                                    @endif
                                </a> --}}

                                <a href="{{ route('role.show', $role->url) }}" title="Ver Perfil ou deletar"><i
                                        class="fas fa-list text-dark"></i></a>

                                <a href="{{ route('role.edit', $role->url) }}" title="Editar Dados"><i
                                        class="fa fa-edit text-primary"></i></a>
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

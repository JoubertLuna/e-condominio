@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    @can('estado.create')
        <a href="{{ route('estado.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Cadastrar Estado</a>
    @endcan
@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Estado</th>
                        <th>Iniciais</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estados as $estado)
                        <tr>
                            <td>{{ $estado->nome_estado }}</td>
                            <td class="esc">{{ $estado->iniciais }}</td>
                            <td>
                                @can('estado.show')
                                    <a href="{{ route('estado.show', $estado->url) }}" title="Ver Estado Cadastrado"><i
                                            class="fas fa-list text-dark"></i></a>
                                @endcan
                                @can('estado.edit')
                                    <a href="{{ route('estado.edit', $estado->url) }}" title="Editar Dados"><i
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

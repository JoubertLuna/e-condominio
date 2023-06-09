@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    @can('patrimonio.create')
        <a href="{{ route('patrimonio.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Cadastrar Patrimônio</a>
    @endcan
@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Patrimônio</th>
                        <th>Condomínio</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patrimonios as $patrimonio)
                        <tr>
                            <td>{{ $patrimonio->nome }}</td>
                            <td>{{ $patrimonio->condominio->nome }}</td>
                            <td>
                                @can('patrimonio.show')
                                    <a href="{{ route('patrimonio.show', $patrimonio->url) }}" title="Ver patrimônio"><i
                                            class="fas fa-list text-dark"></i></a>
                                @endcan
                                @can('patrimonio.edit')
                                    <a href="{{ route('patrimonio.edit', $patrimonio->url) }}" title="Editar Dados"><i
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

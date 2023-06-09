@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    @can('banco.create')
        <a href="{{ route('banco.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Cadastrar Banco</a>
    @endcan
@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome do Banco</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bancos as $banco)
                        <tr>
                            <td>{{ $banco->codigo }}</td>
                            <td>{{ $banco->nome }}</td>
                            <td>
                                @can('banco.show')
                                    <a href="{{ route('banco.show', $banco->url) }}" title="Ver Banco"><i
                                            class="fas fa-list text-dark"></i></a>
                                @endcan
                                @can('banco.edit')
                                    <a href="{{ route('banco.edit', $banco->url) }}" title="Editar Dados"><i
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

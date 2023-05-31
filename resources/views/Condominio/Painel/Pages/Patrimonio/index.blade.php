@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    <a href="{{ route('patrimonio.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Cadastrar Patrimônio</a>
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
                                <a href="{{ route('patrimonio.show', $patrimonio->id) }}" title="Ver patrimônio"><i
                                        class="fas fa-list text-dark"></i></a>

                                <a href="{{ route('patrimonio.edit', $patrimonio->id) }}" title="Editar Dados"><i
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

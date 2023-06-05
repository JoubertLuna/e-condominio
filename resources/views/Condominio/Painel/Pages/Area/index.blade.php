@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    <a href="{{ route('area.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Cadastrar Área Comum</a>
@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Área Comum</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($areas as $area)
                        <tr>
                            <td>{{ $area->nome }}</td>
                            <td>
                                <a href="{{ route('area.show', $area->url) }}" title="Ver Área Comum"><i
                                        class="fas fa-list text-dark"></i></a>

                                <a href="{{ route('area.edit', $area->url) }}" title="Editar Dados"><i
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

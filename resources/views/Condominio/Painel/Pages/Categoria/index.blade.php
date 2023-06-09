@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    @can('categoria.create')
        <a href="{{ route('categoria.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Cadastrar Categoria</a>
    @endcan
@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->nome }}</td>
                            <td>
                                @can('categoria.show')
                                    <a href="{{ route('categoria.show', $categoria->url) }}" title="Ver Categoria"><i
                                            class="fas fa-list text-dark"></i></a>
                                @endcan
                                @can('categoria.edit')
                                    <a href="{{ route('categoria.edit', $categoria->url) }}" title="Editar Dados"><i
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

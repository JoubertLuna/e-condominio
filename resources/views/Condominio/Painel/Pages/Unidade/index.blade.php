@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    @can('unidade.create')
        <a href="{{ route('unidade.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Cadastrar Unidade</a>
    @endcan

@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome da Unidade</th>
                        <th class="esc">Bloco</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unidades as $unidade)
                        <tr>
                            <td>{{ $unidade->nome }}</td>
                            <td class="esc"><b><i>{{ $unidade->bloco->nome }}</i></b></td>
                            <td>
                                @can('unidade.show')
                                    <a href="{{ route('unidade.show', $unidade->url) }}" title="Ver Unidade"><i
                                            class="fas fa-list text-dark"></i></a>
                                @endcan
                                @can('unidade.edit')
                                    <a href="{{ route('unidade.edit', $unidade->url) }}" title="Editar Dados"><i
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

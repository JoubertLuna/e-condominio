@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    <a href="{{ route('bloco.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Cadastrar Bloco</a>
@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome do Bloco</th>
                        <th class="esc">Condomínio</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blocos as $bloco)
                        <tr>
                            <td>{{ $bloco->nome }}</td>
                            <td class="esc">{{ $bloco->condominio->nome }}</td>
                            <td>
                                <a href="{{ route('bloco.show', $bloco->url) }}" title="Ver Bloco"><i
                                        class="fas fa-list text-dark"></i></a>

                                <a href="{{ route('bloco.edit', $bloco->url) }}" title="Editar Dados"><i
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

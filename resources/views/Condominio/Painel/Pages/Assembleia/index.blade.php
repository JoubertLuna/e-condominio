@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    <a href="{{ route('assembleia.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Cadastrar Assembleia</a>
@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th class="esc">Data</th>
                        <th class="esc">Hora</th>
                        <th class="esc">Local</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assembleias as $assembleia)
                        <tr>
                            <td>{{ $assembleia->titulo }}</td>
                            <td class="esc">{{ date('d/m/Y', strtotime($assembleia->data)) }}</td>
                            <td class="esc">{{ $assembleia->hora }}</td>
                            <td class="esc">{{ $assembleia->area->nome }}</td>
                            <td>
                                <a href="{{ route('assembleia.show', $assembleia->url) }}" title="Ver Assembleia"><i
                                        class="fas fa-list text-dark"></i></a>

                                <a href="{{ route('assembleia.edit', $assembleia->url) }}" title="Editar Dados"><i
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

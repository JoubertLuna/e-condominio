@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    @can('anuncio.create')
        <a href="{{ route('anuncio.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Cadastrar Anúncio</a>
    @endcan
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
                        <th class="esc">Morador</th>
                        <th class="esc">Contato</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anuncios as $anuncio)
                        <tr>
                            <td>{{ $anuncio->titulo }}</td>
                            <td class="esc">{{ date('d/m/Y', strtotime($anuncio->data)) }}</td>
                            <td class="esc">{{ $anuncio->user->name }}</td>
                            <td class="esc">{{ $anuncio->user->celular }}</td>
                            <td>
                                @can('anuncio.show')
                                    <a href="{{ route('anuncio.show', $anuncio->url) }}" title="Ver Anúncio"><i
                                            class="fas fa-list text-dark"></i></a>
                                @endcan
                                @can('anuncio.edit')
                                    <a href="{{ route('anuncio.edit', $anuncio->url) }}" title="Editar Dados"><i
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

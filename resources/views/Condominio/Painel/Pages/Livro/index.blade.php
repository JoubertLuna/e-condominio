@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    @can('livro.create')
        <a href="{{ route('livro.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Cadastrar Ocorrência</a>
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
                        <th class="esc">Local</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($livros as $livro)
                        <tr>
                            <td>{{ $livro->titulo }}</td>
                            <td class="esc">{{ date('d/m/Y', strtotime($livro->data)) }}</td>
                            <td class="esc">{{ $livro->user->name }}</td>
                            <td class="esc">{{ $livro->user->celular }}</td>
                            <td class="esc">{{ $livro->area->nome }}</td>
                            <td>
                                @can('livro.show')
                                    <a href="{{ route('livro.show', $livro->url) }}" title="Ver Ocorrência"><i
                                            class="fas fa-list text-dark"></i></a>
                                @endcan
                                @can('livro.edit')
                                    <a href="{{ route('livro.edit', $livro->url) }}" title="Editar Dados"><i
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

@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    <a href="{{ route('visitante.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Cadastrar Visitante</a>
@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th class="esc">Bloco</th>
                        <th class="esc">Unidade</th>
                        <th class="esc">Morador</th>
                        <th class="esc">Hora de Entrada</th>
                        <th class="esc">Hora de Saída</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visitantes as $visitante)
                        <tr>
                            <td>
                                @if (@$visitante->image)
                                    <img src="{{ asset('storage/Visitante/' . @$visitante->image) }}" width="40px"
                                        alt="{{ @$visitante->nome }}" id="imgup">
                                @else
                                    <img src="{{ asset('storage/Visitante/default.jpg') }}" width="40px" id="imgup">
                                @endif
                                - {{ $visitante->nome }}
                            </td>
                            <td class="esc">{{ $visitante->bloco->nome }}</td>
                            <td class="esc">{{ $visitante->unidade->nome }}</td>
                            <td class="esc">{{ $visitante->user->name }}</td>
                            <td class="esc">{{ $visitante->hora_entrada }}</td>
                            <td class="esc">{{ $visitante->hora_saida }}</td>
                            <td>
                                <a href="{{ route('visitante.show', $visitante->url) }}" title="Ver Visitante"><i
                                        class="fas fa-list text-dark"></i></a>

                                <a href="{{ route('visitante.edit', $visitante->url) }}" title="Editar Dados"><i
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

@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    @can('reserva.create')
        <a href="{{ route('reserva.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Cadastrar Reserva de
            Ambiente</a>
    @endcan

@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Título do Evento</th>
                        <th>Área Comum</th>
                        <th class="esc">Data do Evento</th>
                        <th class="esc">Morador</th>
                        <th class="esc">Contato</th>
                        <th class="esc">Aprovado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservas as $reserva)
                        <tr>
                            <td>{{ $reserva->titulo }}</td>
                            <td>{{ $reserva->area->nome }}</td>
                            <td class="esc">{{ date('d/m/Y', strtotime($reserva->data)) }}</td>
                            <td class="esc">{{ $reserva->user->name }}</td>
                            <td class="esc">{{ $reserva->user->celular }}</td>
                            <td class="esc">{{ $reserva->aprovado === 'N' ? 'Não' : 'Sim' }}</td>
                            <td>
                                @can('reserva.show')
                                    <a href="{{ route('reserva.show', $reserva->url) }}" title="Ver Reserva de Ambiente"><i
                                            class="fas fa-list text-dark"></i></a>
                                @endcan
                                @can('reserva.edit')
                                    <a href="{{ route('reserva.edit', $reserva->url) }}" title="Editar Dados"><i
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

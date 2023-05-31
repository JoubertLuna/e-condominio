@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    <a href="{{ route('reserva.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Cadastrar Reserva de
        Ambiente</a>
@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
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
                            <td>{{ $reserva->area->nome }}</td>
                            <td class="esc">{{ date('d/m/Y', strtotime($reserva->data)) }}</td>
                            <td class="esc">{{ $reserva->user->name }}</td>
                            <td class="esc">{{ $reserva->contato_dono }}</td>
                            <td class="esc">{{ $reserva->aprovado === 'N' ? 'Não' : 'Sim' }}</td>
                            <td>
                                <a href="{{ route('reserva.show', $reserva->id) }}"
                                    title="Ver Reserva de Ambiente"><i class="fas fa-list text-dark"></i></a>

                                <a href="{{ route('reserva.edit', $reserva->id) }}" title="Editar Dados"><i
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

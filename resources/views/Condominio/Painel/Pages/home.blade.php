@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    <div align="right">
        <h6 id="time"></h6>
    </div>
@stop

@section('content')
    @can('visitante.index')
        <div class="card">
            <div class="card-body">
                <p>Visitantes</p>
                <table id="visitante" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th class="esc">Bloco</th>
                            <th class="esc">Unidade</th>
                            <th class="esc">Morador</th>
                            <th class="esc">Hora de Entrada</th>
                            <th class="esc">Hora de Saída</th>
                            @can('visitante.show')
                                <th>Ações</th>
                            @endcan
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
                                    @can('visitante.show')
                                        <a href="{{ route('visitante.show', $visitante->url) }}" title="Ver Visitante"><i
                                                class="fas fa-list text-dark"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
    @endcan
    @can('anuncio.index')
        <div class="card">
            <div class="card-body">
                <p>Anúncios</p>
                <table id="anuncio" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th class="esc">Data</th>
                            <th class="esc">Morador</th>
                            <th class="esc">Contato</th>
                            @can('anuncio.show')
                                <th>Ações</th>
                            @endcan
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
    @endcan
    @can('reserva.index')
        <div class="card">
            <div class="card-body">
                <p>Reservas de Ambientes</p>
                <table id="reserva" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Título do Evento</th>
                            <th>Área Comum</th>
                            <th class="esc">Data do Evento</th>
                            <th class="esc">Morador</th>
                            <th class="esc">Aprovado</th>
                            @can('reserva.show')
                                <th>Ações</th>
                            @endcan

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservas as $reserva)
                            <tr>
                                <td>{{ $reserva->titulo }}</td>
                                <td>{{ $reserva->area->nome }}</td>
                                <td class="esc">{{ date('d/m/Y', strtotime($reserva->data)) }}</td>
                                <td class="esc">{{ $reserva->user->name }}</td>
                                <td class="esc">{{ $reserva->aprovado === 'N' ? 'Não' : 'Sim' }}</td>
                                <td>
                                    @can('reserva.show')
                                        <a href="{{ route('reserva.show', $reserva->url) }}" title="Ver Reserva de Ambiente"><i
                                                class="fas fa-list text-dark"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
    @endcan
@stop

@section('js')
    <script>
        $(function() {
            $("#visitante").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        $(function() {
            $("#anuncio").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        $(function() {
            $("#reserva").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        var timeDisplay = document.getElementById("time");

        function refreshTime() {
            var dateString = new Date().toLocaleString("en-US", {
                timeZone: "America/Sao_Paulo"
            });
            var formattedString = dateString.replace(", ", " - ");
            timeDisplay.innerHTML = formattedString;
        }

        setInterval(refreshTime, 1000);
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

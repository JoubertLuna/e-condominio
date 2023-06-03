@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    <a href="{{ route('veiculo.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Cadastrar Veículo</a>
@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="esc">Unidade</th>
                        <th class="esc">Morador</th>
                        <th class="esc">Tipo do Veículo</th>
                        <th class="esc">Marca</th>
                        <th class="esc">Modelo</th>
                        <th>Placa</th>
                        <th class="esc">Contato</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($veiculos as $veiculo)
                        <tr>
                            <td class="esc">{{ $veiculo->unidade->nome }}</td>
                            <td class="esc">{{ $veiculo->user->name }}</td>
                            <td class="esc">{{ $veiculo->tipo_veiculo === 'C' ? 'Carro' : 'Moto' }}</td>
                            <td class="esc">{{ $veiculo->marca }}</td>
                            <td class="esc">{{ $veiculo->modelo }}</td>
                            <td>{{ $veiculo->placa }}</td>
                            <td>{{ $veiculo->user->celular }}</td>
                            <td>
                                <a href="{{ route('veiculo.show', $veiculo->url) }}" title="Ver Veículo"><i
                                        class="fas fa-list text-dark"></i></a>

                                <a href="{{ route('veiculo.edit', $veiculo->url) }}" title="Editar Dados"><i
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

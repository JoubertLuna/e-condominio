@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    <a href="{{ route('bancaria.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Cadastrar Conta
        Bancária</a>
@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th class="esc">Banco</th>
                        <th class="esc">Tipo da Conta</th>
                        <th class="esc">Agencia</th>
                        <th class="esc">Número da Conta</th>
                        <th class="esc">Condomínio</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bancarias as $bancaria)
                        <tr>
                            <td>{{ $bancaria->nome }}</td>
                            <td class="esc"> {{ $bancaria->banco->nome }}</td>
                            <td class="esc">
                                {{ $bancaria->tipo_conta === 'P' ? 'Poupança' : ($bancaria->tipo_conta === 'C' ? 'Corrente' : 'Salário') }}
                            </td>
                            <td class="esc">{{ $bancaria->agencia }}</td>
                            <td class="esc">{{ $bancaria->numero }} - {{ $bancaria->digito }}</td>
                            <td class="esc"> {{ $bancaria->condominio->nome }}</td>
                            <td>
                                <a href="{{ route('bancaria.show', $bancaria->id) }}" title="Ver Conta Bancária"><i
                                        class="fas fa-list text-dark"></i></a>

                                <a href="{{ route('bancaria.edit', $bancaria->id) }}" title="Editar Dados"><i
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

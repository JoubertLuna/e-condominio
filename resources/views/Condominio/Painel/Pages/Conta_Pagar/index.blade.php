@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    @can('conta_pagar.create')
        <a href="{{ route('conta_pagar.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Cadastrar Conta a
            Pagar</a>
    @endcan
@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th class="esc">Data</th>
                        <th class="esc">Categoria</th>
                        <th class="esc">Conta Bancária</th>
                        <th class="esc">Valor</th>
                        <th class="esc">Pago</th>
                        <th class="esc">Fornecedor</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contaPagars as $contaPagar)
                        @if ($contaPagar->pago === 'S')
                            <tr class="text-success">
                                <td>{{ $contaPagar->nome }}</td>
                                <td class="esc">{{ date('d/m/Y', strtotime($contaPagar->data)) }}</td>
                                <td class="esc">{{ $contaPagar->categoria->nome }}</td>
                                <td class="esc">{{ $contaPagar->bancaria->nome }}</td>
                                <td class="esc">R$ {{ number_format($contaPagar->valor, 2, ',', '.') }}</td>
                                <td class="esc">{{ $contaPagar->pago === 'S' ? 'Sim' : 'Não' }}</td>
                                <td class="esc">{{ $contaPagar->fornecedor->razao_social }}</td>
                                <td>
                                    @can('conta_pagar.show')
                                        <a href="{{ route('conta_pagar.show', $contaPagar->url) }}" title="Ver Conta a Pagar"><i
                                                class="fas fa-list text-dark"></i></a>
                                    @endcan
                                    @can('conta_pagar.edit')
                                        <a href="{{ route('conta_pagar.edit', $contaPagar->url) }}" title="Editar Dados"><i
                                                class="fa fa-edit text-primary"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @elseif ($contaPagar->pago === 'N')
                            <tr class="text-danger">
                                <td>{{ $contaPagar->nome }}</td>
                                <td class="esc">{{ date('d/m/Y', strtotime($contaPagar->data)) }}</td>
                                <td class="esc">{{ $contaPagar->categoria->nome }}</td>
                                <td class="esc">{{ $contaPagar->bancaria->nome }}</td>
                                <td class="esc">R$ {{ number_format($contaPagar->valor, 2, ',', '.') }}</td>
                                <td class="esc">{{ $contaPagar->pago === 'S' ? 'Sim' : 'Não' }}</td>
                                <td class="esc">{{ $contaPagar->fornecedor->razao_social }}</td>
                                <td>
                                    <a href="{{ route('conta_pagar.show', $contaPagar->url) }}"
                                        title="Ver Conta a Pagar"><i class="fas fa-list text-dark"></i></a>

                                    <a href="{{ route('conta_pagar.edit', $contaPagar->url) }}" title="Editar Dados"><i
                                            class="fa fa-edit text-primary"></i></a>
                                </td>
                            </tr>
                        @endif
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

@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    @can('conta_receber.create')
        <a href="{{ route('conta_receber.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Cadastrar Conta a
            Receber</a>
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
                        <th class="esc">Categoria</th>
                        <th class="esc">Data</th>
                        <th class="esc">Conta Bancária</th>
                        <th class="esc">Valor</th>
                        <th class="esc">Pago</th>
                        <th class="esc">Bloco</th>
                        <th class="esc">Unidade</th>
                        <th class="esc">Morador</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contaRecebers as $contaReceber)
                        @if ($contaReceber->pago === 'S')
                            <tr class="text-success">
                                <td>{{ $contaReceber->nome }}</td>
                                <td class="esc">{{ $contaReceber->categoria->nome }}</td>
                                <td class="esc">{{ date('d/m/Y', strtotime($contaReceber->data)) }}</td>
                                <td class="esc">{{ $contaReceber->bancaria->nome }}</td>
                                <td class="esc">R$ {{ number_format($contaReceber->valor, 2, ',', '.') }}</td>
                                <td class="esc">{{ $contaReceber->pago === 'S' ? 'Sim' : 'Não' }}</td>
                                <td class="esc">{{ $contaReceber->bloco->nome }}</td>
                                <td class="esc">{{ $contaReceber->unidade->nome }}</td>
                                <td class="esc">{{ $contaReceber->user->name }}</td>
                                <td>
                                    @can('conta_receber.show')
                                        <a href="{{ route('conta_receber.show', $contaReceber->url) }}"
                                            title="Ver Conta a Receber"><i class="fas fa-list text-dark"></i></a>
                                    @endcan
                                    @can('conta_receber.edit')
                                        <a href="{{ route('conta_receber.edit', $contaReceber->url) }}" title="Editar Dados"><i
                                                class="fa fa-edit text-primary"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @elseif ($contaReceber->pago === 'N')
                            <tr class="text-danger">
                                <td>{{ $contaReceber->nome }}</td>
                                <td class="esc">{{ $contaReceber->categoria->nome }}</td>
                                <td class="esc">{{ date('d/m/Y', strtotime($contaReceber->data)) }}</td>
                                <td class="esc">{{ $contaReceber->bancaria->nome }}</td>
                                <td class="esc">R$ {{ number_format($contaReceber->valor, 2, ',', '.') }}</td>
                                <td class="esc">{{ $contaReceber->pago === 'S' ? 'Sim' : 'Não' }}</td>
                                <td class="esc">{{ $contaReceber->bloco->nome }}</td>
                                <td class="esc">{{ $contaReceber->unidade->nome }}</td>
                                <td class="esc">{{ $contaReceber->user->name }}</td>
                                <td>
                                    @can('conta_receber.show')
                                        <a href="{{ route('conta_receber.show', $contaReceber->url) }}"
                                            title="Ver Conta a Receber"><i class="fas fa-list text-dark"></i></a>
                                    @endcan
                                    @can('conta_receber.edit')
                                        <a href="{{ route('conta_receber.edit', $contaReceber->url) }}" title="Editar Dados"><i
                                                class="fa fa-edit text-primary"></i></a>
                                    @endcan
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

@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    @can('fornecedor.create')
        <a href="{{ route('fornecedor.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Cadastrar Fornecedor</a>
    @endcan
@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome do Fornecedor</th>
                        <th class="esc">E-mail</th>
                        <th>Contato</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fornecedores as $fornecedor)
                        @if ($fornecedor->ativo === 'N')
                            <tr class="text-muted">
                                <td>{{ $fornecedor->razao_social }}</td>
                                <td class="esc">{{ $fornecedor->email }}</td>
                                <td>{{ $fornecedor->fone }}</td>

                                <td>
                                    @can('fornecedor.show')
                                        <a href="{{ route('fornecedor.show', $fornecedor->url) }}" title="Ver Fornecedor"><i
                                                class="fas fa-list text-dark"></i></a>
                                    @endcan
                                    @can('fornecedor.edit')
                                        <a href="{{ route('fornecedor.edit', $fornecedor->url) }}" title="Editar Dados"><i
                                                class="fa fa-edit text-primary"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td>{{ $fornecedor->razao_social }}</td>
                                <td class="esc">{{ $fornecedor->email }}</td>
                                <td>{{ $fornecedor->fone }}</td>

                                <td>
                                    <a href="{{ route('fornecedor.show', $fornecedor->url) }}" title="Ver Fornecedor"><i
                                            class="fas fa-list text-dark"></i></a>

                                    <a href="{{ route('fornecedor.edit', $fornecedor->url) }}" title="Editar Dados"><i
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

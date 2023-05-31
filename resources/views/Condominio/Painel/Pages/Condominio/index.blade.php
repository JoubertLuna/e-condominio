@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    @foreach ($condominios as $condominio)
        <a href="{{ route('condominio.edit', $condominio->id) }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i>
            Editar Condomínio</a>
    @endforeach
@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th class="esc">CNPJ</th>
                        <th class="esc">E-mail</th>
                        <th class="esc">Endereço</th>
                        <th class="esc">Cidade</th>
                        <th class="esc">Estado</th>
                        <th class="esc">Bairro</th>
                        <th class="esc">Número</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($condominios as $condominio)
                        <tr>
                            <td>
                                @if (@$condominio->image)
                                    <img src="{{ asset('storage/Condominio/' . @$condominio->image) }}" width="40px"
                                        alt="{{ @$condominio->nome }}" id="imgup">
                                @else
                                    <img src="{{ asset('storage/Condominio/default.png') }}" width="40px" id="imgup">
                                @endif
                                - {{ $condominio->nome }}
                            </td>
                            <td class="esc">{{ $condominio->cnpj }}</td>
                            <td class="esc">{{ $condominio->email }}</td>
                            <td class="esc">{{ $condominio->logradouro }}</td>
                            <td class="esc">{{ $condominio->cidade }}</td>
                            <td class="esc">{{ $condominio->uf }}</td>
                            <td class="esc">{{ $condominio->bairro }}</td>
                            <td class="esc">{{ $condominio->numero }}</td>
                            <td>
                                <a href="{{ route('condominio.show', $condominio->id) }}" title="Ver Comdomínio"><i
                                        class="fas fa-list text-dark"></i></a>
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

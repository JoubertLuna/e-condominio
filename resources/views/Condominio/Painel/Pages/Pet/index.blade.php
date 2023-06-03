@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    <a href="{{ route('pet.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Cadastrar Pet</a>
@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th class="esc">Especie</th>
                        <th class="esc">Raça</th>
                        <th class="esc">Sexo do Pet</th>
                        <th class="esc">Dono</th>
                        <th class="esc">Contato Dono</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pets as $pet)
                        <tr>
                            <td>{{ $pet->nome }}</td>
                            <td class="esc">{{ $pet->especie }}</td>
                            <td class="esc">{{ $pet->raca }}</td>
                            <td class="esc">{{ $pet->sexo === 'F' ? 'Feminino' : 'Masculino' }}</td>
                            <td class="esc">{{ $pet->user->name }}</td>
                            <td class="esc">{{ $pet->user->celular }}</td>
                            <td>
                                <a href="{{ route('pet.show', $pet->url) }}" title="Ver Pet"><i
                                        class="fas fa-list text-dark"></i></a>

                                <a href="{{ route('pet.edit', $pet->url) }}" title="Editar Dados"><i
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

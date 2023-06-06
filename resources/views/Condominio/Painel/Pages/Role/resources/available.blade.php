@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    <div align="right">
        <a href="{{ route('profile.permissions', $profile->id) }}" class="btn btn-dark"><i class="fas fa-backward"></i>
            Voltar</a>
    </div>
@stop

@section('content')

    @include('Condominio.Painel.Includes.alerts')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('profile.permissions.attach', $profile->id) }}" method="POST">
                @csrf
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px">#</th>
                            <th>Nome da Permissão</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($permissions as $permission)
                            <tr>
                                <td align="center">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                </td>
                                <td>{{ $permission->nome }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <tr>
                    <td colspan="500">
                        <button type="submit" class="btn btn-success">Vincular Permissão</button>
                    </td>
                </tr>
            </form>
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

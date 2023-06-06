@include('Condominio.Painel.Includes.alerts')
@csrf
<div class="form-group">
    <h4><b><i class="fas fa-id-card"></i> Cadastro do Perfil</b></h4>
    <hr>
    <div class="form-group">
        <label>Nome do Perfil:</label>
        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do Perfil"
            value="{{ $role->nome ?? old('nome') }}">
    </div>

    <div class="form-group">
        <label>Padrão do Perfil:</label>
        <input type="text" name="role" id="role" class="form-control" placeholder="Padrão do Perfil"
            value="Role_{{ $role->role ?? old('role') }}">
    </div>

</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Perfil</button>
</div>

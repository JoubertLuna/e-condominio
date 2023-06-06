@include('Condominio.Painel.Includes.alerts')
@csrf
<div class="form-group">
    <h4><b><i class="fas fa-shield-alt"></i> Cadastro da Permissão</b></h4>
    <hr>
    <div class="form-group">
        <label>Nome da Permissão:</label>
        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome da Permissão"
            value="{{ $resource->nome ?? old('nome') }}">
    </div>

    <div class="form-group">
        <label>Permissão Route:</label>
        <input type="text" name="resource" id="resource" class="form-control" placeholder="Permissão Route"
            value="{{ $resource->resource ?? old('resource') }}">
    </div>

</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Permissão</button>
</div>

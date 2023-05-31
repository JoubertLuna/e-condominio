@include('Condominio.Painel.Includes.alerts')
@csrf
<div class="form-group">
    <h4><b><i class="fas fa-globe"></i> Cadastro de Área Comum</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Nome da Área Comum:</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome da Área Comum"
                    value="{{ $area->nome ?? old('nome') }}">
            </div>
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Área Comum</button>
</div>

@include('Condominio.Painel.Includes.alerts')
@csrf
<div class="form-group">
    <h4><b><i class="fas fa-shopping-basket"></i> Cadastro de Patrimônio</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nome do Patrimônio:</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do Patrimônio"
                    value="{{ $patrimonio->nome ?? old('nome') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Condomínio:</label>
                <select class="form-control" name="condominio_id" id="condominio_id" style="width: 100%;">
                    @foreach ($condominios as $condominio)
                        @if ($condominio->id === @$patrimonio->condominio_id)
                            <option value="{{ $condominio->id }}" selected>{{ $condominio->nome }}</option>
                        @else
                            <option value="{{ $condominio->id }}">{{ $condominio->nome }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Patrimônio</button>
</div>

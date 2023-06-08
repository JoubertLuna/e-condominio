@include('Condominio.Painel.Includes.alerts')
@csrf
<div class="form-group">
    <h4><b><i class="fas fa-list-alt"></i> Cadastro de Bloco</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nome do Bloco:</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do Bloco"
                    value="{{ $bloco->nome ?? old('nome') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Condomínio:</label>
                <select class="form-control" name="condominio_id" id="condominio_id" style="width: 100%;">
                    @foreach ($condominios as $condominio)
                        @if (auth()->user()->id <= '2' || $condominio->id === auth()->user()->condominio_id)
                            @if ($condominio->id === @$bloco->condominio_id)
                                <option value="{{ $condominio->id }}" selected>{{ $condominio->nome }}</option>
                            @else
                                <option value="{{ $condominio->id }}">{{ $condominio->nome }}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Bloco</button>
</div>

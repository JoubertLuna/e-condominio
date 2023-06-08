@include('Condominio.Painel.Includes.alerts')
@csrf
<div class="form-group">
    <h4><b><i class="fab fa-unity"></i> Cadastro de Unidade</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome da Unidade"
                    value="{{ $unidade->nome ?? old('nome') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Bloco:</label>
                <select class="form-control" name="bloco_id" id="bloco_id" style="width: 100%;">
                    @foreach ($blocos as $bloco)
                        @if (auth()->user()->id <= '2' || $bloco->id === auth()->user()->bloco_id)
                            @if ($bloco->id === @$unidade->bloco_id)
                                <option value="{{ $bloco->id }}" selected>{{ $bloco->nome }}</option>
                            @else
                                <option value="{{ $bloco->id }}">{{ $bloco->nome }}</option>
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
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Unidade</button>
</div>

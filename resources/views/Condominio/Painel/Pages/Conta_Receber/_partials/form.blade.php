@include('Condominio.Painel.Includes.alerts')
@csrf
<div class="form-group">
    <h4><b><i class="fas fa-money-bill-alt"></i> Cadastro de Contas a Receber</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nome da Conta a Receber:</label>
                <input type="text" name="nome" id="nome" class="form-control"
                    placeholder="Nome da Conta a Receber" value="{{ $contaReceber->nome ?? old('nome') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Data da Conta:</label>
                <input type="date" name="data" id="data" class="form-control" placeholder="08/08/8888"
                    value="{{ $contaReceber->data ?? old('data') }}">
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Categoria da Conta:</label>
                <select class="form-control" name="categoria_id" id="categoria_id" style="width: 100%;">
                    @foreach ($categorias as $categoria)
                        @if ($categoria->id === @$contaReceber->categoria_id)
                            <option value="{{ $categoria->id }}" selected>{{ $categoria->nome }}</option>
                        @else
                            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Conta Bancária:</label>
                <select class="form-control" name="bancaria_id" id="bancaria_id" style="width: 100%;">
                    @foreach ($bancarias as $bancaria)
                        @if ($bancaria->id === @$contaReceber->bancaria_id)
                            <option value="{{ $bancaria->id }}" selected>{{ $bancaria->nome }}</option>
                        @else
                            <option value="{{ $bancaria->id }}">{{ $bancaria->nome }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Bloco:</label>
                <select class="form-control" name="bloco_id" id="bloco_id" style="width: 100%;">
                    @foreach ($blocos as $bloco)
                        @if ($bloco->id === @$contaReceber->bloco_id)
                            <option value="{{ $bloco->id }}" selected>{{ $bloco->nome }}</option>
                        @else
                            <option value="{{ $bloco->id }}">{{ $bloco->nome }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Unidade:</label>
                <select class="form-control" name="unidade_id" id="unidade_id" style="width: 100%;">
                    @foreach ($unidades as $unidade)
                        @if ($unidade->id === @$contaReceber->unidade_id)
                            <option value="{{ $unidade->id }}" selected>{{ $unidade->nome }}</option>
                        @else
                            <option value="{{ $unidade->id }}">{{ $unidade->nome }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Morador:</label>
                <select class="form-control" name="user_id" id="user_id" style="width: 100%;">
                    @foreach ($users as $user)
                        @if ($user->id === @$contaReceber->user_id)
                            <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                        @else
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Pago:</label>
                <select class="form-control" name="pago" id="pago" style="width: 100%;">
                    <option value="S" {{ old('pago', $contaReceber->pago ?? '') === 'S' ? 'selected' : '' }}>Sim
                    </option>
                    <option value="N" {{ old('pago', $contaReceber->pago ?? '') === 'N' ? 'selected' : '' }}>
                        Não</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Valor:</label>
                <input type="text" name="valor" id="valor" class="form-control mascara-dinheiro"
                    placeholder="EX: 1000" value="{{ $contaReceber->valor ?? old('valor') }}" required>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Observação</label>
                <textarea class="form-control" name="obs" id="obs" placeholder="Obs" rows="8">{{ $contaReceber->obs ?? old('obs') }}</textarea>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Conta a Receber</button>
</div>

@section('js')

    <script src="{{ asset('e-condominio/painel/jquery.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/js.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/jquery.mask.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/componentes/js_mascara.js') }}"></script>

@stop

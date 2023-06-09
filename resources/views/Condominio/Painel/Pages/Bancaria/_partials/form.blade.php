@include('Condominio.Painel.Includes.alerts')
@csrf
<div class="form-group">
    <h4><b><i class="fas fa-money-check-alt"></i> Cadastro de Conta Bancária</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nome da Conta:</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome da Conta"
                    value="{{ $bancaria->nome ?? old('nome') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Tipo da Conta:</label>
                <select class="form-control" name="tipo_conta" id="tipo_conta" style="width: 100%;">
                    <option value="P"
                        {{ old('tipo_conta', $bancaria->tipo_conta ?? '') === 'P' ? 'selected' : '' }}>Poupança
                    </option>
                    <option value="C"
                        {{ old('tipo_conta', $bancaria->tipo_conta ?? '') === 'C' ? 'selected' : '' }}>
                        Corrente</option>
                    <option value="S"
                        {{ old('tipo_conta', $bancaria->tipo_conta ?? '') === 'S' ? 'selected' : '' }}>
                        Salário</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label>Agência:</label>
                <input type="text" name="agencia" id="agencia" class="form-control agencia" placeholder="Agência"
                    value="{{ $bancaria->agencia ?? old('agencia') }}" required>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label>Número da Conta:</label>
                <input type="text" name="numero" id="numero" class="form-control conta" placeholder="Número"
                    value="{{ $bancaria->numero ?? old('numero') }}" required>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>Digito da Conta:</label>
                <input type="text" name="digito" id="digito" class="form-control digito" placeholder="Número"
                    value="{{ $bancaria->digito ?? old('digito') }}" required>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Condomínio:</label>
                <select class="form-control" name="condominio_id" id="condominio_id" style="width: 100%;">
                    @foreach ($condominios as $condominio)
                        @if (auth()->user()->id <= '3' || $condominio->id === auth()->user()->condominio_id)
                            @if ($condominio->id === @$bancaria->condominio_id)
                                <option value="{{ $condominio->id }}" selected>{{ $condominio->nome }}</option>
                            @else
                                <option value="{{ $condominio->id }}">{{ $condominio->nome }}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Banco:</label>
                <select class="form-control" name="banco_id" id="banco_id" style="width: 100%;">
                    @foreach ($bancos as $banco)
                        @if ($banco->id === @$bancaria->banco_id)
                            <option value="{{ $banco->id }}" selected>{{ $banco->nome }}</option>
                        @else
                            <option value="{{ $banco->id }}">{{ $banco->nome }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <hr>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Conta Bancária</button>
</div>

@section('js')
    <script src="{{ asset('e-condominio/painel/jquery.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/js.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/jquery.mask.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/componentes/js_mascara.js') }}"></script>
@stop

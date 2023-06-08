@include('Condominio.Painel.Includes.alerts')
@csrf
<div class="form-group">
    <h4><b><i class="fas fa-car"></i> Cadastro de Veículo</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Unidade do Veículo:</label>
                <select class="form-control" name="unidade_id" id="unidade_id" style="width: 100%;">
                    @foreach ($unidades as $unidade)
                        @if (auth()->user()->id <= '2' || $unidade->id === auth()->user()->unidade_id)
                            @if ($unidade->id === @$veiculo->unidade_id)
                                <option value="{{ $unidade->id }}" selected>{{ $unidade->nome }}</option>
                            @else
                                <option value="{{ $unidade->id }}">{{ $unidade->nome }}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Dono do Veículo:</label>
                <select class="form-control" name="user_id" id="user_id" style="width: 100%;">
                    @foreach ($users as $user)
                        @if (auth()->user()->id <= '2' || $user->id === auth()->user()->id)
                            @if ($user->id === @$veiculo->user_id)
                                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                            @else
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Tipo do Veículo:</label>
                <select class="form-control" name="tipo_veiculo" id="tipo_veiculo" style="width: 100%;">
                    <option value="C"
                        {{ old('tipo_veiculo', $veiculo->tipo_veiculo ?? '') === 'C' ? 'selected' : '' }}>Carro
                    </option>
                    <option value="M"
                        {{ old('tipo_veiculo', $veiculo->tipo_veiculo ?? '') === 'M' ? 'selected' : '' }}>Moto
                    </option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Placa do Veículo:</label>
                <input type="text" name="placa" id="placa" class="form-control" placeholder="Placa do Veículo"
                    value="{{ $veiculo->placa ?? old('placa') }}" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Marca do Veículo:</label>
                <input type="text" name="marca" id="marca" class="form-control" placeholder="Marca do Veículo"
                    value="{{ $veiculo->marca ?? old('marca') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Modelo do Veículo:</label>
                <input type="text" name="modelo" id="modelo" class="form-control" placeholder="Modelo do Veículo"
                    value="{{ $veiculo->modelo ?? old('modelo') }}">
            </div>
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Veículo</button>
</div>

@section('js')

    <script src="{{ asset('e-condominio/painel/jquery.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/js.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/jquery.mask.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/componentes/js_mascara.js') }}"></script>

@stop

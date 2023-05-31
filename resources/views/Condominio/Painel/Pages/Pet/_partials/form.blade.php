@include('Condominio.Painel.Includes.alerts')
@csrf
<div class="form-group">
    <h4><b><i class="fas fa-dog"></i> Cadastro de Pet</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nome do Pet:</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do Pet"
                    value="{{ $pet->nome ?? old('nome') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Especie do Pet:</label>
                <input type="text" name="especie" id="especie" class="form-control" placeholder="Especie do Pet"
                    value="{{ $pet->especie ?? old('especie') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Sexo do Pet:</label>
                <select class="form-control" name="sexo" id="sexo" style="width: 100%;">
                    <option value="F" {{ old('sexo', $pet->sexo ?? '') === 'F' ? 'selected' : '' }}>Feminino
                    </option>
                    <option value="M" {{ old('sexo', $pet->sexo ?? '') === 'M' ? 'selected' : '' }}>Masculino
                    </option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Raça do Pet:</label>
                <input type="text" name="raca" id="raca" class="form-control" placeholder="Raça do Pet"
                    value="{{ $pet->raca ?? old('raca') }}">
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Dono do Pet:</label>
                <select class="form-control" name="user_id" id="user_id" style="width: 100%;">
                    @foreach ($users as $user)
                        @if ($user->id === @$pet->user_id)
                            <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                        @else
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Condomínio</button>
</div>

@section('js')

    <script src="{{ asset('e-condominio/painel/jquery.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/js.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/jquery.mask.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/componentes/js_mascara.js') }}"></script>
@stop

@include('Condominio.Painel.Includes.alerts')
@csrf
<div class="form-group">
    <h4><b><i class="fas fa-pen-square"></i> Cadastro de Reserva de Ambiente</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Data da Reserva:</label>
                <input type="date" name="data" id="data" class="form-control" placeholder="08/08/8888"
                    value="{{ $reserva->data ?? old('data') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Aprovado:</label>
                <select class="form-control" name="aprovado" id="aprovado" style="width: 100%;">
                    <option value="S" {{ old('aprovado', $reserva->aprovado ?? '') === 'S' ? 'selected' : '' }}>Sim
                    </option>
                    <option value="N" {{ old('aprovado', $reserva->aprovado ?? '') === 'N' ? 'selected' : '' }}>Não
                    </option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Observação da Reserva</label>
                <textarea class="form-control" name="obs" id="obs" placeholder="Observação da Reserva" rows="8">{{ $reserva->obs ?? old('obs') }}</textarea>
            </div>
        </div>
    </div>

</div>
<hr>
<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <label>Área da Reserva:</label>
            <select class="form-control" name="area_id" id="area_id" style="width: 100%;">
                @foreach ($areas as $area)
                    @if ($area->id === @$reserva->area_id)
                        <option value="{{ $area->id }}" selected>{{ $area->nome }}</option>
                    @else
                        <option value="{{ $area->id }}">{{ $area->nome }}</option>
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
                    @if ($user->id === @$reserva->user_id)
                        <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                    @else
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Contato do Morador:</label>
            <input type="text" name="contato_dono" id="contato_dono" class="form-control mascara-celular"
                placeholder="Contato do Morador" value="{{ $reserva->contato_dono ?? old('contato_dono') }}">
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Reserva de Ambiente</button>
</div>

@section('js')

    <script src="{{ asset('e-condominio/painel/jquery.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/js.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/jquery.mask.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/componentes/js_mascara.js') }}"></script>

@stop

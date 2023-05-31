@include('Condominio.Painel.Includes.alerts')
@csrf
<div class="form-group">
    <h4><b><i class="fas fa-book"></i> Cadastro de Assembleia</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Título da Assembleia:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título da Assembleia"
                    value="{{ $assembleia->titulo ?? old('titulo') }}" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Ordem Dia</label>
                <textarea class="form-control" name="ordem_dia" id="ordem_dia" placeholder="Ordem Dia" rows="8">{{ $assembleia->ordem_dia ?? old('ordem_dia') }}</textarea>
            </div>
        </div>
    </div>

</div>
<hr>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>Data da Assembleia:</label>
            <input type="date" name="data" id="data" class="form-control" placeholder="08/08/8888"
                value="{{ $assembleia->data ?? old('data') }}">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Hora da Assembleia:</label>
            <input type="time" name="hora" id='hora' class="form-control" placeholder="Hora da Assembleia"
                value="{{ $assembleia->hora ?? old('hora') }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Local da Assembleia:</label>
            <select class="form-control" name="area_id" id="area_id" style="width: 100%;">
                @foreach ($areas as $area)
                    @if ($area->id === @$assembleia->area_id)
                        <option value="{{ $area->id }}" selected>{{ $area->nome }}</option>
                    @else
                        <option value="{{ $area->id }}">{{ $area->nome }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Assembleia</button>
</div>

@include('Condominio.Painel.Includes.alerts')
@csrf
<div class="form-group">
    <h4><b><i class="fas fa-address-book"></i> Cadastro de Anúncio</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Título da Anúncio:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título da Anúncio"
                    value="{{ $anuncio->titulo ?? old('titulo') }}" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Descrição da Anúncio</label>
                <textarea class="form-control" name="descricao" id="descricao" placeholder="Descrição da Anúncio" rows="8">{{ $anuncio->descricao ?? old('descricao') }}</textarea>
            </div>
        </div>
    </div>

</div>
<hr>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Data do Anúncio:</label>
            <input type="date" name="data" id="data" class="form-control" placeholder="08/08/8888"
                value="{{ $anuncio->data ?? old('data') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Morador:</label>
            <select class="form-control" name="user_id" id="user_id" style="width: 100%;">
                @foreach ($users as $user)
                    @if (auth()->user()->id <= '2' || $user->id === auth()->user()->id)
                        @if ($user->id === @$anuncio->user_id)
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
<hr>
<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Anúncio</button>
</div>

@section('js')

    <script src="{{ asset('e-condominio/painel/jquery.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/js.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/jquery.mask.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/componentes/js_mascara.js') }}"></script>

@stop

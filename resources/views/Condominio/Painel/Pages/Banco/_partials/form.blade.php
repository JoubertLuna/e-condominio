@include('Condominio.Painel.Includes.alerts')
@csrf
<div class="form-group">
    <h4><b><i class="fas fa-university"></i> Cadastro de Banco</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Código do Banco:</label>
                <input type="text" name="codigo" id="codigo" class="form-control codigo-banco"
                    placeholder="Código do Banco" value="{{ $banco->codigo ?? old('codigo') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Nome do Banco:</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do Banco"
                    value="{{ $banco->nome ?? old('nome') }}">
            </div>
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Banco</button>
</div>

@section('js')
    <script src="{{ asset('e-condominio/painel/jquery.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/js.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/jquery.mask.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/componentes/js_mascara.js') }}"></script>
@stop

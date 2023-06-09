@include('Condominio.Painel.Includes.alerts')
@csrf
<div class="form-group">
    <h4><b><i class="fas fa-user-plus"></i> Cadastro de Visitantes</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nome do Visitante:</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do Visitante"
                    value="{{ $visitante->nome ?? old('nome') }}" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>RG:</label>
                <input type="text" name="rg" id="rg" class="form-control mascara-rg"
                    placeholder="Digite um RG" value="{{ $visitante->rg ?? old('rg') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>CPF:</label>
                <input type="text" name="cpf" id="cpf" class="form-control mascara-cpf"
                    placeholder="XXX.XXX.XXX-XX" value="{{ $visitante->cpf ?? old('cpf') }}">
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Bloco:</label>
                <select class="form-control" name="bloco_id" id="bloco_id" style="width: 100%;">
                    @foreach ($blocos as $bloco)
                        @if (auth()->user()->id <= '2' || $bloco->id === auth()->user()->bloco_id)
                            @if ($bloco->id === @$visitante->bloco_id)
                                <option value="{{ $bloco->id }}" selected>{{ $bloco->nome }}</option>
                            @else
                                <option value="{{ $bloco->id }}">{{ $bloco->nome }}</option>
                            @endif
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
                        @if (auth()->user()->id <= '2' || $unidade->id === auth()->user()->unidade_id)
                            @if ($unidade->id === @$visitante->unidade_id)
                                <option value="{{ $unidade->id }}" selected>{{ $unidade->nome }}</option>
                            @else
                                <option value="{{ $unidade->id }}">{{ $unidade->nome }}</option>
                            @endif
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
                        @if (auth()->user()->id <= '2' || $user->id === auth()->user()->id)
                            @if ($user->id === @$visitando->user_id)
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
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Data da Entrada:</label>
                <input type="date" name="data_entrada" id="data_entrada" class="form-control"
                    placeholder="08/08/8888" value="{{ $visitante->data_entrada ?? old('data_entrada') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Hora da Entrada:</label>
                <input type="time" name="hora_entrada" id='hora_entrada' class="form-control"
                    placeholder="Hora da Entrada" value="{{ $visitante->hora_entrada ?? old('hora_entrada') }}">
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Data da Saída:</label>
                <input type="date" name="data_saida" id="data_saida" class="form-control" placeholder="08/08/8888"
                    value="{{ $visitante->data_saida ?? old('data_saida') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Hora da Saída:</label>
                <input type="time" name="hora_saida" id='hora_saida' class="form-control" placeholder="Hora da Saída"
                    value="{{ $visitante->hora_saida ?? old('hora_saida') }}">
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Observação</label>
            <textarea class="form-control" name="obs" id="obs" placeholder="Obs" rows="8">{{ $visitante->obs ?? old('obs') }}</textarea>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-7">
        <div class="btn-group w-100">
            <span class="btn btn-primary col fileinput-button">
                <span>
                    <input type="file" name="image" id="image" class="form-control-file"
                        onchange="pegaArquivo(this.files)" value="{{ $visitante->image ?? old('image') }}">
                </span>
            </span>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="form-group">
            @if (@$visitante->image)
                <img src="{{ asset('storage/Visitante/' . @$visitante->image) }}" width="200px"
                    alt="{{ @$visitante->nome }}" id="imgup">
            @else
                <img src="{{ asset('storage/Visitante/default.jpg') }}" width="200px" id="imgup">
            @endif
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Visitantes</button>
</div>

@section('js')
    <script>
        function pegaArquivo(files) {
            var file = files[0];
            const fileReader = new FileReader();
            fileReader.onloadend = function() {
                $("#imgup").attr("src", fileReader.result);
            }
            fileReader.readAsDataURL(file);
        }
    </script>

    <script src="{{ asset('e-condominio/painel/jquery.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/js.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/jquery.mask.js') }}"></script>
    <script src="{{ asset('e-condominio/painel/componentes/js_mascara.js') }}"></script>

@stop

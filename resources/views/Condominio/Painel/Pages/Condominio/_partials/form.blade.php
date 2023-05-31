@include('Condominio.Painel.Includes.alerts')
@csrf
<div class="form-group">
    <h4><b><i class="fas fa-building"></i> Cadastro de Condomínio</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nome da Condomínio:</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome da Condomínio"
                    value="{{ $condominio->nome ?? old('nome') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>E-mail da Condomínio:</label>
                <input type="email" name="email" id="email" class="form-control"
                    placeholder="E-mail da Condomínio" value="{{ $condominio->email ?? old('email') }}" required>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>CNPJ:</label>
                <input type="text" name="cnpj" id="cnpj" class="form-control mascara-cnpj"
                    placeholder="XX.XXX.XXX/0001-XX" value="{{ $condominio->cnpj ?? old('cnpj') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Contato Telefone:</label>
                <input type="text" name="fone" id="fone" class="form-control mascara-fone"
                    placeholder="(00) 0000-0000" value="{{ $condominio->fone ?? old('fone') }}">
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label>CEP:</label>
                <input type="text" name="cep" id="cep" class="form-control mascara-cep busca_cep"
                    placeholder="00.000-000" value="{{ $condominio->cep ?? old('cep') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Logradouro:</label>
                <input type="text" name="logradouro" id="logradouro" class="form-control rua"
                    placeholder="Digite o Logradouro" value="{{ $condominio->logradouro ?? old('logradouro') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Bairro:</label>
                <input type="text" name="bairro" id="bairro" class="form-control bairro"
                    placeholder="Digite o Bairro" value="{{ $condominio->bairro ?? old('bairro') }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>Número:</label>
                <input type="text" name="numero" id="numero" class="form-control" placeholder="Digite o Número"
                    value="{{ $condominio->numero ?? old('numero') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Cidade:</label>
                <input type="text" name="cidade" id="cidade" class="form-control cidade"
                    placeholder="Digite a Cidade" value="{{ $condominio->cidade ?? old('cidade') }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>Estado:</label>
                <input type="text" name="uf" id="uf" class="form-control estado" placeholder="EX: PB"
                    value="{{ $condominio->uf ?? old('uf') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Complemento:</label>
                <input type="text" name="complemento" id="complemento" class="form-control complemento"
                    placeholder="Digite o Complemento" value="{{ $condominio->complemento ?? old('complemento') }}">
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Facebook:</label>
                <input type="text" name="facebook" id="facebook" class="form-control" placeholder="Facebook"
                    value="{{ $condominio->facebook ?? old('facebook') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Twitter:</label>
                <input type="text" name="twitter" id="twitter" class="form-control" placeholder="Twitter"
                    value="{{ $condominio->twitter ?? old('twitter') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Linkedin:</label>
                <input type="text" name="linkedin" id="linkedin" class="form-control" placeholder="Linkedin"
                    value="{{ $condominio->linkedin ?? old('linkedin') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Instagram:</label>
                <input type="text" name="instagram" id="instagram" class="form-control" placeholder="Instagram"
                    value="{{ $condominio->instagram ?? old('instagram') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Tiktok:</label>
                <input type="text" name="tiktok" id="tiktok" class="form-control" placeholder="Tiktok"
                    value="{{ $condominio->tiktok ?? old('tiktok') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Whatsapp:</label>
                <input type="text" name="whatsapp" id="whatsapp" class="form-control mascara-celular"
                    placeholder="(00) 00000-0000" value="{{ $condominio->whatsapp ?? old('whatsapp') }}">
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
                            onchange="pegaArquivo(this.files)" value="{{ $condominio->image ?? old('image') }}">
                    </span>
                </span>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                @if (@$condominio->image)
                    <img src="{{ asset('storage/Condominio/' . @$condominio->image) }}" width="200px"
                        alt="{{ @$condominio->nome }}" id="imgup">
                @else
                    <img src="{{ asset('storage/Condominio/default.png') }}" width="200px" id="imgup">
                @endif
            </div>
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Condomínio</button>
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

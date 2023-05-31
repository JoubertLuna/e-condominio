@include('Condominio.Painel.Includes.alerts')
@csrf
<div class="form-group">
    <h4><b><i class="fas fa-user"></i> Cadastro de Usuários / Moradores</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nome do Usuário:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nome do Usuário"
                    value="{{ $user->name ?? old('name') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>E-mail do Usuário:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail do Usuário"
                    value="{{ $user->email ?? old('email') }}" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Senha do Usuário: mínimo 8 e máximo 36 caracteres</label>
                <p>Senha deve ter no mínimo uma letra maiúscula, uma letra minúscula, no mínimo um numero, no mínimo um
                    caractere especial(!#@$%&)</p>
                <input type="password" name="password" id="password" class="form-control"
                    placeholder="Senha do Usuário" value="{{ old('password', '') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Confirmar Senha do Usuário: mínimo 8 e máximo 36 caracteres</label>
                <p>Senha deve ter no mínimo uma letra maiúscula, uma letra minúscula, no mínimo um numero, no mínimo um
                    caractere especial(!#@$%&)</p>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                    placeholder="Confirmar Senha do Usuário" value="{{ old('password_confirmation', '') }}" required>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>CPF:</label>
                <input type="text" name="cpf" id="cpf" class="form-control mascara-cpf"
                    placeholder="XXX.XXX.XXX-XX" value="{{ $user->cpf ?? old('cpf') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>RG:</label>
                <input type="text" name="rg" id="rg" class="form-control mascara-rg"
                    placeholder="XX.XXX-XX" value="{{ $user->rg ?? old('rg') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Contato Telefone:</label>
                <input type="text" name="fone" id="fone" class="form-control mascara-fone"
                    placeholder="(00) 0000-0000" value="{{ $user->fone ?? old('fone') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Contato Celular:</label>
                <input type="text" name="celular" id="celular" class="form-control mascara-celular"
                    placeholder="(00) 00000-0000" value="{{ $user->celular ?? old('celular') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Apelido do Usuário:</label>
                <input type="text" name="surname" id="surname" class="form-control"
                    placeholder="Apelido do Usuário" value="{{ $user->surname ?? old('surname') }}">
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Tipo do Morador:</label>
                <select class="form-control" name="tipo_morador" id="tipo_morador" style="width: 100%;">
                    <option value="P"
                        {{ old('tipo_morador', $user->tipo_morador ?? '') === 'P' ? 'selected' : '' }}>Proprietário
                    </option>
                    <option value="I"
                        {{ old('tipo_morador', $user->tipo_morador ?? '') === 'I' ? 'selected' : '' }}>
                        Inquilino</option>
                    <option value="F"
                        {{ old('tipo_morador', $user->tipo_morador ?? '') === 'F' ? 'selected' : '' }}>
                        Funcionário</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Condomínio:</label>
                <select class="form-control" name="condominio_id" id="condominio_id" style="width: 100%;">
                    @foreach ($condominios as $condominio)
                        @if ($condominio->id === @$user->condominio_id)
                            <option value="{{ $condominio->id }}" selected>{{ $condominio->nome }}</option>
                        @else
                            <option value="{{ $condominio->id }}">{{ $condominio->nome }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Bloco:</label>
                <select class="form-control" name="bloco_id" id="bloco_id" style="width: 100%;">
                    @foreach ($blocos as $bloco)
                        @if ($bloco->id === @$user->bloco_id)
                            <option value="{{ $bloco->id }}" selected>{{ $bloco->nome }}</option>
                        @else
                            <option value="{{ $bloco->id }}">{{ $bloco->nome }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Data de Cadastro:</label>
                <input type="date" name="data_cadastro" id="data_cadastro" class="form-control"
                    placeholder="08/08/8888" value="{{ $user->data_cadastro ?? old('data_cadastro') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Unidade:</label>
                <select class="form-control" name="unidade_id" id="unidade_id" style="width: 100%;">
                    @foreach ($unidades as $unidade)
                        @if ($unidade->id === @$user->unidade_id)
                            <option value="{{ $unidade->id }}" selected>{{ $unidade->nome }}</option>
                        @else
                            <option value="{{ $unidade->id }}">{{ $unidade->nome }}</option>
                        @endif
                    @endforeach
                </select>
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
                            onchange="pegaArquivo(this.files)" value="{{ $user->image ?? old('image') }}">
                    </span>
                </span>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                @if (@$user->image)
                    <img src="{{ asset('storage/User/' . @$user->image) }}" width="200px"
                        alt="{{ @$user->name }}" id="imgup">
                @else
                    <img src="{{ asset('storage/User/default.jpg') }}" width="200px" id="imgup">
                @endif
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Usuário</button>
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

@extends('layouts.app')

@section('content')
    @include('app.includes.spinner')
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('layouts._partials.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper p-0">
            <!-- partial:partials/_navbar.html -->
            @include('layouts._partials.navtop')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-center stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="position-absolute absolute-position">
                                        <a href="{{ route('produto.index') }}"
                                            class="btn btn-warning rounded-circle mdi mdi-keyboard-return"
                                            style="font-size: 24px">
                                        </a>
                                    </div>

                                    <h3 class="card-title">Editar Produto</h3>
                                    <hr>


                                    <form method="POST" action="{{ route('produto.update', $produto->id) }}"
                                        class="forms-sample">
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


                                        <div class="row">
                                            <div class="col-8">
                                                {{-- --------------------------- 
                                                    Dados do Cliente 
                                                --------------------------- --}}
                                                <div class="row">
                                                    <h4>Dados do Cliente</h4>
                                                    <div class="form-group col-6">
                                                        <label for="cliente_id" class="form-label">Cliente</label>
                                                        <select class="form-control text-white" id="cliente_id"
                                                            name="cliente_id" style="line-height: 1.5rem; cursor:pointer;" disabled>
                                                            <option value="{{ $produto->cliente->id }}"
                                                                {{ ($produto->cliente_id ?? old('cliente_id')) == $produto->cliente->id ? 'selected' : '' }}>
                                                                {{ $produto->cliente->nomeFantasia }} -
                                                                {{ $produto->cliente->cnpj }}
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('cliente_id'))
                                                            <span class="text-danger">
                                                                {{ $errors->first('cliente_id') }}
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group col-2">
                                                        <label for="tipo_licenca" class="form-label">Tipo Licença</label>
                                                        <select class="form-control text-white" id="tipo_licenca"
                                                            name="tipo_licenca"
                                                            style="line-height: 1.5rem; cursor:pointer;">
                                                            <option value="Locação"
                                                                {{ $produto->tipo_licenca == 'Locação' ? 'selected' : '' }}>
                                                                Locação
                                                            </option>
                                                            <option value="Proprietário"
                                                                {{ $produto->tipo_licenca == 'Proprietário' ? 'selected' : '' }}>
                                                                Proprietário</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-4 resp-col-md resp-col-sm">
                                                        <label for="versao_sistema_id" class="form-label">Versão</label>
                                                        <select class="form-control text-white" id="versao_sistema_id"
                                                            name="versao_sistema_id"
                                                            style="line-height: 1.5rem; cursor:pointer;">
                                                            <option>-- Selecione uma versão --</option>
                                                            @foreach ($versoes_sistema as $versao_sistema)
                                                                <option value="{{ $versao_sistema->id }}"
                                                                    {{ ($produto->versao_sistema_id ?? old('versao_sistema_id')) == $versao_sistema->id ? 'selected' : '' }}>
                                                                    {{ $versao_sistema->versao }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('versao_sistema_id'))
                                                            <span class="text-danger">
                                                                {{ $errors->first('versao_sistema_id') }}
                                                            </span>
                                                        @endif
                                                    </div>

                                                </div>
                                                {{-- --------------------------- 
                                                    Dados de Acesso 
                                                --------------------------- --}}

                                                <div class="row">
                                                    <h5 class="card-title">Dados de Acesso</h5>
                                                    <hr>
                                                    <div class="form-group col-3">
                                                        <label for="tipo_acesso" class="form-label">Tipo de Acesso</label>
                                                        <select class="form-control text-white" id="tipo_acesso"
                                                            name="tipo_acesso" style="line-height: 1.5rem; cursor:pointer;">
                                                            <option value="SSH"
                                                                {{ $produto->tipo_acesso == 'SSH' ? 'selected' : '' }}>SSH
                                                            </option>
                                                            <option value="RDP"
                                                                {{ $produto->tipo_acesso == 'RDP' ? 'selected' : '' }}>RDP
                                                            </option>
                                                            <option value="VIACLOUD"
                                                                {{ $produto->tipo_acesso == 'VIACLOUD' ? 'selected' : '' }}>
                                                                Viacloud</option>
                                                            <option value="LOCAL"
                                                                {{ $produto->tipo_acesso == 'LOCAL' ? 'selected' : '' }}>
                                                                Local</option>

                                                        </select>
                                                    </div>

                                                    <div class="form-group col-5">
                                                        <label for="endereco_acesso" class="form-label">Endereço
                                                            Servidor</label>
                                                        <input type="text" class="form-control text-white"
                                                            id="endereco_acesso" name="endereco_acesso"
                                                            value="{{ $produto->endereco_acesso ?? old('endereco_acesso') }}">
                                                        @if ($errors->has('endereco_acesso'))
                                                            <span class="text-danger">
                                                                {{ $errors->first('endereco_acesso') }}
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group col-4">
                                                        <label for="porta_acesso" class="form-label">Porta Servidor</label>
                                                        <input type="text" class="form-control text-white"
                                                            id="porta_acesso" name="porta_acesso"
                                                            value="{{ $produto->porta_acesso ?? old('porta_acesso') }}">
                                                        @if ($errors->has('porta_acesso'))
                                                            <span class="text-danger">
                                                                {{ $errors->first('porta_acesso') }}
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group col-4">
                                                        <label for="usuario_acesso" class="form-label">Usuário
                                                            Servidor</label>
                                                        <input type="text" class="form-control text-white"
                                                            id="usuario_acesso" name="usuario_acesso"
                                                            value="{{ $produto->usuario_acesso ?? old('usuario_acesso') }}">
                                                        @if ($errors->has('usuario_acesso'))
                                                            <span class="text-danger">
                                                                {{ $errors->first('usuario_acesso') }}
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group col-3">
                                                        <label for="senha_acesso" class="form-label">Senha Servidor</label>
                                                        <input type="text" class="form-control text-white"
                                                            id="senha_acesso" name="senha_acesso"
                                                            value="{{ $produto->senha_acesso ?? old('senha_acesso') }}">
                                                        @if ($errors->has('senha_acesso'))
                                                            <span class="text-danger">
                                                                {{ $errors->first('senha_acesso') }}
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group col-3">
                                                        <label for="senha_aberta" class="form-label">Senha Aberta</label>
                                                        <input type="text" class="form-control text-white"
                                                            id="senha_aberta" name="senha_aberta"
                                                            value="{{ $produto->senha_aberta ?? old('senha_aberta') }}">
                                                    </div>
                                                    <div class="form-group col-2">
                                                        <label for="usuario_banco" class="form-label">Usuário
                                                            Banco</label>
                                                        <input type="text" class="form-control text-white"
                                                            id="usuario_banco" name="usuario_banco"
                                                            value="{{ $produto->usuario_banco ?? old('usuario_banco') }}">
                                                    </div>

                                                </div>
                                                {{-- --------------------------- 
                                                    Caminhos do Sistema 
                                                --------------------------- --}}
                                                <div class="row">
                                                    <h5 class="card-title">Caminhos Sistema</h5>
                                                    <hr>

                                                    <div class="form-group col-4">
                                                        <label for="caminho_atualiza" class="form-label">Caminho
                                                            Atualiza</label>
                                                        <input type="text"
                                                            class="form-control @error('caminho_atualiza') is-invalid @enderror text-white"
                                                            id="caminho_atualiza" name="caminho_atualiza"
                                                            value="{{ $produto->caminho_atualiza ?? old('caminho_atualiza') }}">
                                                    </div>

                                                    <div class="form-group col-4">
                                                        <label for="caminho_banco" class="form-label">Caminho
                                                            Banco</label>
                                                        <input type="text" class="form-control text-white"
                                                            id="caminho_banco" name="caminho_banco"
                                                            value="{{ $produto->caminho_banco ?? old('caminho_banco') }}">
                                                    </div>

                                                    <div class="form-group col-4">
                                                        <label for="caminho_executavel" class="form-label">Caminho
                                                            Executável</label>
                                                        <input type="text"
                                                            class="form-control @error('caminho_executavel') is-invalid @enderror text-white"
                                                            id="caminho_executavel" name="caminho_executavel"
                                                            value="{{ $produto->caminho_executavel ?? old('caminho_executavel') }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label for="caminho_backup" class="form-label">Caminho
                                                            Backup</label>
                                                        <input type="text" class="form-control text-white"
                                                            id="caminho_backup" name="caminho_backup"
                                                            value="{{ $produto->caminho_backup ?? old('caminho_backup') }}">
                                                    </div>

                                                    <div class="form-group col-6">
                                                        <label for="caminho_interno" class="form-label">Caminho
                                                            Interno</label>
                                                        <input type="text"
                                                            class="form-control @error('caminho_interno') is-invalid @enderror text-white"
                                                            id="caminho_interno" name="caminho_interno"
                                                            value="{{ $produto->caminho_interno ?? old('caminho_interno') }}">
                                                    </div>
                                                </div>

                                                <div class="row">


                                                    <div class="form-group col-6">
                                                        <label for="endereco_tzion" class="form-label">Endereço
                                                            Tzion</label>
                                                        <input type="text"
                                                            class="form-control @error('endereco_tzion') is-invalid @enderror text-white"
                                                            id="endereco_tzion" name="endereco_tzion"
                                                            value="{{ $produto->endereco_tzion ?? old('endereco_tzion') }}">
                                                    </div>



                                                    <div class="form-group col-6">
                                                        <label for="endereco_zeus" class="form-label">Endereço
                                                            Zeus</label>
                                                        <input type="text"
                                                            class="form-control @error('endereco_zeus') is-invalid @enderror text-white"
                                                            id="endereco_zeus" name="endereco_zeus"
                                                            value="{{ $produto->endereco_zeus ?? old('endereco_zeus') }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-12">
                                                        <label for="observacoes" class="form-label">Observações</label>
                                                        <textarea id="observacoes" name="observacoes" rows="10" class="form-control text-white">{{ $produto->observacoes ?? old('observacoes') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">

                                                <div class="row">
                                                    <div class="col-5">
                                                        <h4>Módulos Ativos</h4>
                                                    </div>
                                                    <div class="col-5">
                                                        <h4>Quantidade</h4>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-check form-check-primary">
                                                            <label for="checkImportacao" class="form-label">
                                                                <input type="checkbox" class="checkbox"
                                                                    id="checkImportacao"
                                                                    {{ in_array('Importação', $produto->produtos_cliente) ? 'checked' : '' }}
                                                                    name="produtos_cliente[]" value="Importação">
                                                                Importação
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <input type="number" min="1"
                                                                class="form-control modulos-ativos text-white"
                                                                name="quantidade_importacao"
                                                                value="{{ $produto->quantidade_importacao ?? old('quantidade_importacao') }}">
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-check form-check-primary">
                                                            <label for="checkFatura" class="form-label">
                                                                <input type="checkbox" class="checkbox"
                                                                    name="produtos_cliente[]" id="checkFatura"
                                                                    {{ in_array('Fatura', $produto->produtos_cliente) ? 'checked' : '' }}
                                                                    value="Fatura">
                                                                Fatura
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <input type="number" min="1"
                                                                class="form-control modulos-ativos text-white"
                                                                name="quantidade_fatura"
                                                                value="{{ $produto->quantidade_fatura ?? old('quantidade_fatura') }}">
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-check form-check-primary">
                                                            <label for="checkFinanceiro" class="form-label">
                                                                <input type="checkbox" class="checkbox"
                                                                    name="produtos_cliente[]"
                                                                    {{ in_array('Financeiro', $produto->produtos_cliente) ? 'checked' : '' }}
                                                                    id="checkFinanceiro" value="Financeiro">
                                                                Financeiro
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <input type="number" min="1"
                                                                class="form-control modulos-ativos text-white"
                                                                name="quantidade_financeiro"
                                                                value="{{ $produto->quantidade_financeiro ?? old('quantidade_financeiro') }}">
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-check form-check-primary">
                                                            <label for="checkExportacao" class="form-label">
                                                                <input type="checkbox" class="checkbox"
                                                                    name="produtos_cliente[]"
                                                                    {{ in_array('Exportação', $produto->produtos_cliente) ? 'checked' : '' }}
                                                                    id="checkExportacao" value="Exportação">
                                                                Exportação
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <input type="number" min="1"
                                                                class="form-control modulos-ativos text-white"
                                                                name="quantidade_exportacao"
                                                                value="{{ $produto->quantidade_exportacao ?? old('quantidade_exportacao') }}">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-check form-check-primary">
                                                            <span class="form-label">
                                                                Total de Licenças
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <input type="number" min="1"
                                                                class="form-control modulos-ativos text-white"
                                                                name="total_licencas"
                                                                value="{{ $produto->total_licencas ?? old('total_licencas') }}">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-check form-check-primary">
                                                            <span class="form-label">
                                                                Estações Liberadas
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <input type="number" min="1"
                                                                class="form-control modulos-ativos text-white"
                                                                name="estacoes_liberadas"
                                                                value="{{ $produto->estacoes_liberadas ?? old('estacoes_liberadas') }}">
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-check form-check-primary">
                                                            <label for="checkZeus" class="form-label">
                                                                <input type="checkbox" class="checkbox"
                                                                    name="produtos_cliente[]"
                                                                    {{ in_array('Zeus', $produto->produtos_cliente) ? 'checked' : '' }}
                                                                    id="checkZeus" value="Zeus">
                                                                Zeus
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-5">
                                                        <div class="form-check form-check-primary">
                                                            <label for="checkTzion" class="form-label">
                                                                <input type="checkbox" class="checkbox"
                                                                    name="produtos_cliente[]" id="checkTzion"
                                                                    {{ in_array('Tzion', $produto->produtos_cliente) ? 'checked' : '' }}
                                                                    value="Tzion">
                                                                Tzion
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-check form-check-primary">
                                                            <label for="checkParametrizacao" class="form-label">
                                                                <input type="checkbox" class="checkbox"
                                                                    id="checkParametrizacao" name="produtos_cliente[]"
                                                                    value="Parametrização"
                                                                    {{ in_array('Parametrização', $produto->produtos_cliente) ? 'checked' : '' }}>
                                                                Script Parametrização
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-5">
                                                        <div class="form-check form-check-primary">
                                                            <label for="checkParametrizacao" class="form-label">
                                                                <input type="checkbox" class="checkbox"
                                                                    id="checkParametrizacao" name="produtos_cliente[]"
                                                                    value="WsNota"
                                                                    {{ in_array('WsNota', $produto->produtos_cliente) ? 'checked' : '' }}>
                                                                Webservice Nota
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-check form-check-primary">
                                                            <label for="checkBackup" class="form-label">
                                                                <input type="checkbox" class="checkbox" id="checkBackup"
                                                                    name="produtos_cliente[]" value="Backup"
                                                                    {{ in_array('Backup', $produto->produtos_cliente) ? 'checked' : '' }}>
                                                                Backup
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>



                                        <button type="submit" class="btn btn-primary me-2">Atualizar</button>

                                        <a href="{{ route('produto.index') }}" class="btn btn-warning">Cancelar</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('layouts._partials.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

@section('script')
    <script type="text/javascript"></script>
    <script src="{{ asset('js/utils.js') }}"></script>
@endsection

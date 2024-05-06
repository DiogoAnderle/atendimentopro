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
                                        <a href="{{ route('cliente.index') }}"
                                            class="btn btn-warning rounded-circle mdi mdi-keyboard-return"
                                            style="font-size: 24px">
                                        </a>
                                    </div>
                                    <h4 class="card-title">Cadastrar Cliente</h4>
                                    <hr>


                                    <form method="POST" action="{{ route('cliente.store') }}" class="forms-sample"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                        <div class="row" id="rowCnpj">
                                            <div class="form-group col-3 resp-col-md resp-col-sm">
                                                <label for="cnpj" class="form-label">CNPJ</label>
                                                <div class="position-relative">
                                                    <input required minlength="18" type="text" style="position: relative"
                                                        class="form-control text-white" id="cnpj" name="cnpj"
                                                        value="{{ $cliente->cnpj ?? old('cnpj') }}" data-mask-for-cnpj>

                                                    <button type="button" class="mdi mdi-magnify btn btn-outline-primary"
                                                        style="position: absolute; top: 0; right: 0; height: 40px;"
                                                        onclick="consultarCNPJ()" data-bs-toggle="modal"
                                                        data-bs-target="#spinner"></button>
                                                    @if ($errors->has('cnpj'))
                                                        <span class="text-danger" role="alert">
                                                            {{ $errors->first('cnpj') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-5 resp-col-md resp-col-sm">
                                                <label for="razaoSocial" class="form-label">Razão Social</label>
                                                <input type="text"
                                                    class="form-control @error('razaoSocial') is-invalid @enderror text-white"
                                                    id="razaoSocial" name="razaoSocial" autofocus
                                                    value="{{ $cliente->razaoSocial ?? old('razaoSocial') }}">
                                                @if ($errors->has('razaoSocial'))
                                                    <span class="text-danger">
                                                        {{ $errors->first('razaoSocial') }}
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group col-3 resp-col-md resp-col-sm">
                                                <label for="nomeFantasia" class="form-label">Nome Fantasia</label>
                                                <input type="text" class="form-control text-white" id="nomeFantasia"
                                                    name="nomeFantasia"value="{{ old('nomeFantasia') }}">
                                            </div>



                                            <div class="form-group col-1 resp-col-md resp-col-sm">
                                                <label for="cnpj" class="form-label">Status</label>
                                                <select class="form-control text-white" id="status" name="status"
                                                    style="line-height: 24px; cursor: pointer">
                                                    <option value="A">Ativo</option>
                                                    <option value="I">Inativo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="form-group col-4 resp-col-md resp-col-sm">
                                                <label for="telefone" class="form-label">Telefone</label>
                                                <input type="tel" class="form-control text-white" id="telefone"
                                                    name="telefone" value="{{ $responsavel->telefone ?? old('telefone') }}"
                                                    maxlength="15" onkeyup="handlePhone(event)">
                                            </div>

                                            <div class="form-group col-4 resp-col-md resp-col-sm">
                                                <label for="dataInicioAtividade" class="form-label">Data Inicio
                                                    Atividade</label>
                                                <input type="date"
                                                    class="form-control @error('dataInicioAtividade') is-invalid @enderror text-white"
                                                    id="dataInicioAtividade" name="dataInicioAtividade"
                                                    value="{{ $cliente->dataInicioAtividade ?? old('dataInicioAtividade') }}">
                                                @if ($errors->has('dataInicioAtividade'))
                                                    <span class="text-danger" role="alert">
                                                        {{ $errors->first('dataInicioAtividade') }}
                                                    </span>
                                                @endif

                                            </div>

                                            <div class="form-group col-4 resp-col-md resp-col-sm">
                                                <label for="dataInicioParceria" class="form-label">Data Inicio
                                                    Parceria</label>
                                                <input type="date"
                                                    class="form-control @error('dataInicioParceria') is-invalid @enderror text-white"
                                                    id="dataInicioParceria" name="dataInicioParceria"
                                                    value="{{ $cliente->dataInicioParceria ?? old('dataInicioParceria') }}">
                                                @if ($errors->has('dataInicioParceria'))
                                                    <span class="text-danger" role="alert">
                                                        {{ $errors->first('dataInicioParceria') }}
                                                    </span>
                                                @endif

                                            </div>



                                        </div>

                                        <div class="row">
                                            <h4>Endereço</h4>
                                            <hr>

                                            <div class="form-group col-2 resp-col-md resp-col-sm">
                                                <label for="cep" class="form-label">CEP</label>
                                                <div class="position-relative">
                                                    <input type="text"
                                                        class="form-control @error('cep') is-invalid @enderror text-white"
                                                        id="cep" name="cep"
                                                        value="{{ $cliente->cep ?? old('cep') }}" maxlength="8">

                                                    <button type="button" class="mdi mdi-magnify btn btn-outline-primary"
                                                        style="position: absolute; top: 0; right: 0; height: 40px;"
                                                        onclick="consultarCEP()" data-bs-toggle="modal"
                                                        data-bs-target="#spinner"></button>
                                                    @if ($errors->has('cep'))
                                                        <span class="text-danger" role="alert">
                                                            {{ $errors->first('cep') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-4 resp-col-md resp-col-sm">
                                                <label for="logradouro" class="form-label">Logradouro</label>
                                                <input type="text"
                                                    class="form-control @error('logradouro') is-invalid @enderror text-white"
                                                    id="logradouro" name="logradouro"
                                                    value="{{ $cliente->Logradouro ?? old('logradouro') }}">
                                                @if ($errors->has('logradouro'))
                                                    <span class="text-danger" role="alert">
                                                        {{ $errors->first('logradouro') }}
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group col-2 resp-col-md resp-col-sm">
                                                <label for="numero" class="form-label">Número</label>
                                                <input type="text"
                                                    class="form-control @error('numero') is-invalid @enderror text-white"
                                                    id="numero" name="numero"
                                                    value="{{ $cliente->numero ?? old('numero') }}">
                                                @if ($errors->has('numero'))
                                                    <span class="text-danger" role="alert">
                                                        {{ $errors->first('numero') }}
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group col-4 resp-col-md resp-col-sm">
                                                <label for="complemento" class="form-label">Complemento</label>
                                                <input type="text"
                                                    class="form-control @error('complemento') is-invalid @enderror text-white"
                                                    id="complemento" name="complemento"
                                                    value="{{ $cliente->complemento ?? old('complemento') }}">
                                                @if ($errors->has('complemento'))
                                                    <span class="text-danger" role="alert">
                                                        {{ $errors->first('complemento') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-3 resp-col-md resp-col-sm">
                                                <label for="bairro" class="form-label">Bairro</label>
                                                <input type="text"
                                                    class="form-control @error('bairro') is-invalid @enderror text-white"
                                                    id="bairro" name="bairro"
                                                    value="{{ $cliente->bairro ?? old('bairro') }}">
                                                @if ($errors->has('bairro'))
                                                    <span class="text-danger" role="alert">
                                                        {{ $errors->first('bairro') }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-5 resp-col-md resp-col-sm">
                                                <label for="cidade" class="form-label">Cidade</label>
                                                <input type="text"
                                                    class="form-control @error('cidade') is-invalid @enderror text-white"
                                                    id="cidade" name="cidade"
                                                    value="{{ $cliente->cidade ?? old('cidade') }}">
                                                @if ($errors->has('cidade'))
                                                    <span class="text-danger" role="alert">
                                                        {{ $errors->first('cidade') }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-2 resp-col-md resp-col-sm">
                                                <label for="ibge" class="form-label">IBGE</label>
                                                <input type="text"
                                                    class="form-control @error('ibge') is-invalid @enderror text-white"
                                                    id="ibge" name="ibge"
                                                    value="{{ $cliente->ibge ?? old('ibge') }}">
                                                @if ($errors->has('ibge'))
                                                    <span class="text-danger" role="alert">
                                                        {{ $errors->first('ibge') }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-2 resp-col-md resp-col-sm">
                                                <label for="uf" class="form-label">UF</label>
                                                <input type="text"
                                                    class="form-control @error('uf') is-invalid @enderror text-white"
                                                    id="uf" name="uf"
                                                    value="{{ $cliente->uf ?? old('uf') }}">
                                                @if ($errors->has('uf'))
                                                    <span class="text-danger" role="alert">
                                                        {{ $errors->first('uf') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>



                                        <button type="submit" class="btn btn-primary me-2">Cadastrar</button>

                                        <a href="{{ route('cliente.index') }}" class="btn btn-warning">Cancelar</a>
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
    <script type="text/javascript">
        @include('app.includes.mensagens')
    </script>
    <script src="{{ asset('js/utils.js') }}"></script>
@endsection

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

                                    <section>
                                        <h4 class="card-title">Detalhes do Cliente</h4>
                                        <hr>
                                        <div class="row">
                                            <div class="form-group col-3 resp-col-md resp-col-sm">
                                                <label for="cnpj" class="form-label">CNPJ</label>
                                                <input required minlength="18" type="text" style="position: relative"
                                                    class="form-control text-white" id="cnpj" readonly
                                                    value="{{ $cliente->cnpj }}" data-mask-for-cnpj>
                                            </div>
                                            <div class="form-group col-5 resp-col-md resp-col-sm">
                                                <label for="razaoSocial" class="form-label">Razão Social</label>
                                                <input type="text" class="form-control text-white" id="razaoSocial"
                                                    readonly value="{{ $cliente->razaoSocial }}">
                                            </div>

                                            <div class="form-group col-3 resp-col-md resp-col-sm">
                                                <label for="nomeFantasia" class="form-label">Nome Fantasia</label>
                                                <input type="text" class="form-control text-white" id="nomeFantasia"
                                                    readonly value="{{ $cliente->nomeFantasia }}">
                                            </div>

                                            <div class="form-group col-1 resp-col-md resp-col-sm">
                                                <label for="cnpj" class="form-label">Status</label>
                                                <select class="form-control text-white" id="status"
                                                    style="line-height: 24px; cursor: pointer">
                                                    <option selected value="{{ $cliente->status }}">
                                                        {{ $cliente->status == 'A' ? 'Ativo' : 'Inativo' }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="form-group col-4 resp-col-md resp-col-sm">
                                                <label for="telefone" class="form-label">Telefone</label>
                                                <input type="tel" class="form-control text-white" id="telefone"
                                                    name="telefone" value="{{ $cliente->telefone }}" readonly>
                                            </div>

                                            <div class="form-group col-4 resp-col-md resp-col-sm">
                                                <label for="dataInicioAtividade" class="form-label">Data Inicio
                                                    Atividade</label>
                                                <input type="date" class="form-control text-white"
                                                    id="dataInicioAtividade" readonly
                                                    value="{{ date('Y-m-d', strtotime($cliente->dataInicioAtividade)) }}">
                                            </div>

                                            <div class="form-group col-4 resp-col-md resp-col-sm">
                                                <label for="dataInicioParceria" class="form-label">Data Inicio
                                                    Parceria</label>
                                                <input type="date"
                                                    class="form-control @error('dataInicioParceria') is-invalid @enderror text-white"
                                                    id="dataInicioParceria" readonly
                                                    value="{{ date('Y-m-d', strtotime($cliente->dataInicioParceria)) }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <h4>Endereço</h4>
                                            <hr>
                                            <div class="form-group col-2 resp-col-md resp-col-sm">
                                                <label for="cep" class="form-label">CEP</label>
                                                <input type="text"
                                                    class="form-control @error('cep') is-invalid @enderror text-white"
                                                    id="cep" readonly value="{{ $cliente->cep }}" maxlength="8">
                                            </div>
                                            <div class="form-group col-4 resp-col-md resp-col-sm">
                                                <label for="logradouro" class="form-label">Logradouro</label>
                                                <input type="text" readonly class="form-control text-white"
                                                    id="logradouro" value="{{ $cliente->logradouro }}">
                                            </div>

                                            <div class="form-group col-2 resp-col-md resp-col-sm">
                                                <label for="numero" class="form-label">Número</label>
                                                <input type="text" readonly class="form-control text-white"
                                                    id="numero" value="{{ $cliente->numero }}">
                                            </div>

                                            <div class="form-group col-4 resp-col-md resp-col-sm">
                                                <label for="complemento" class="form-label">Complemento</label>
                                                <input type="text" readonly class="form-control text-white"
                                                    id="complemento" value="{{ $cliente->complemento }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-3 resp-col-md resp-col-sm">
                                                <label for="bairro" class="form-label">Bairro</label>
                                                <input type="text" class="form-control text-white" id="bairro"
                                                    readonly value="{{ $cliente->bairro }}">
                                            </div>
                                            <div class="form-group col-5 resp-col-md resp-col-sm">
                                                <label for="cidade" class="form-label">Cidade</label>
                                                <input type="text" readonly class="form-control text-white"
                                                    id="cidade" value="{{ $cliente->cidade }}">
                                            </div>

                                            <div class="form-group col-2 resp-col-md resp-col-sm">
                                                <label for="ibge" class="form-label">IBGE</label>
                                                <input type="text" readonly class="form-control text-white"
                                                    id="ibge" value="{{ $cliente->ibge ?? old('ibge') }}">
                                            </div>

                                            <div class="form-group col-2 resp-col-md resp-col-sm">
                                                <label for="uf" class="form-label">UF</label>
                                                <input type="text" readonly class="form-control text-white"
                                                    id="uf" value="{{ $cliente->uf }}">
                                            </div>
                                        </div>
                                    </section>

                                    <section>
                                        <hr>
                                        <h4 class="card-title">Responsáveis Vinculados</h4>
                                        <table id="dataTable" class="table-hover table-bordered table text-white">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Responsável</th>
                                                    <th>Cargo</th>
                                                    <th>Telefone</th>
                                                    <th>Whatsapp</th>
                                                    <th>E-mail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cliente->responsaveis as $responsavel)
                                                    <tr>
                                                        <td>{{ $responsavel->id }}</td>
                                                        <td>{{ $responsavel->firstName }} {{ $responsavel->lastName }}
                                                        </td>
                                                        <td>{{ $responsavel->cargo }}</td>
                                                        <td>{{ $responsavel->telefone }}</td>
                                                        <td>{{ $responsavel->whatsapp }}</td>
                                                        <td>{{ $responsavel->email }}</td>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </section>
                                    <a href="{{ route('cliente.index') }}" class="btn btn-primary mt-3">Voltar</a>
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
    <script src="{{ asset('js/utils.js') }}"></script>
@endsection

@extends('layouts.app')

@section('content')
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
                                    @include('app.includes.mensagens')
                                    <h4 class="card-title">Vincular Responsável ao Cliente</h4>
                                    <hr>

                                    <h5>Razão Social: {{ $cliente->razaoSocial }}</h5>
                                    <h5>Nome Fantasia: {{ $cliente->nomeFantasia }}</h5>
                                    <h5>CNPJ: {{ $cliente->cnpj }}</h5>

                                    <br>

                                    <form action="{{ route('responsavel-cliente.store', $cliente->id) }}" method="POST"
                                        class="forms-sample">
                                        @csrf
                                        <div class="form-group">
                                            <label for="grupo" class="form-label">Responsável</label>
                                            <select class="form-control text-white" id="responsavel" name="responsavel_id">
                                                <option>-- Selecione um responsável --</option>
                                                @foreach ($responsaveis as $responsavel)
                                                    <option value="{{ $responsavel->id }}"
                                                        {{ old('responsavel_id') == $responsavel->id ? 'selected' : '' }}>
                                                        {{ $responsavel->firstName }} {{ $responsavel->lastName }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('responsavel_id'))
                                                <span class="text-danger">
                                                    {{ $errors->first('responsavel_id') }}
                                                </span>
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Incluir</button>

                                        <a href="{{ route('grupo.index') }}" class="btn btn-warning">Cancelar</a>
                                    </form>
                                </div>
                                <table id="dataTable" class="table-hover table-bordered table text-white">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Responsável</th>
                                            <th>Cargo</th>
                                            <th>Excluir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cliente->responsaveis as $responsavel)
                                            <tr>
                                                <td>{{ $responsavel->id }}
                                                <td>{{ $responsavel->firstName }} {{ $responsavel->lastName }}</td>
                                                </td>
                                                <td>{{ $responsavel->cargo }}</td>
                                                <td> <a data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal-{{ $responsavel->pivot->id }}"
                                                        class="btn btn-inverse-danger btn-icon btn-inverse-action mdi mdi-delete text-danger"
                                                        title="Excluir">
                                                    </a>
                                                    @include('app.responsavel-cliente.modals.delete')
                                                </td>
                                        @endforeach
                                    </tbody>
                                </table>
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

@endsection

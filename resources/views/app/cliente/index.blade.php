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


                        <div class="col-12 grid-margin">
                            <div class="card bg-dark text-white">
                                <div class="card-body">
                                    <div class="btn-fixed-position">
                                        <a href="{{ route('cliente.create') }}"
                                            class="btn btn-success rounded-circle mdi mdi-plus">
                                        </a>
                                    </div>
                                    <span id="mensagemCopia"
                                        class="mensagem-copia d-none fade show animated fadeInDown bg-success"><i
                                            class="mdi mdi-content-copy"></i> Conteúdo Copiado</span>
                                    @include('app.includes.mensagens')
                                    <h4 class="card-title">Clientes</h4>
                                    <table id="dataTable" class="table-hover table-bordered table text-white"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-light">#</th>
                                                <th class="text-light">Cliente</th>
                                                <th class="text-light">CNPJ</th>
                                                <th class="text-light">Status</th>
                                                <th class="text-light">Telefone</th>
                                                <th class="text-light">Inicio Atividade:</th>
                                                <th class="text-light">Inicio Parceria:</th>
                                                <th class="text-light">Editado por:</th>
                                                <th class="text-light">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clientes as $key => $cliente)
                                                <tr>
                                                    <td> {{ $key }}</td>
                                                    <td nowrap style="line-height:15px;">{{ $cliente->nomeFantasia }}
                                                        <a href="{{ route('cliente.show', $cliente->id) }}"
                                                            class="mdi mdi-eye" title="Detalhes" style="float:right;">
                                                        </a>
                                                    </td>
                                                    <td nowrap>{{ $cliente->cnpj }}</td>
                                                    <td class="text-center">
                                                        @if ($cliente->status == 'A')
                                                            <button class="btn btn-sm btn-success text-light">
                                                                Ativo
                                                            </button>
                                                        @elseif($cliente->status == 'I')
                                                            <button class="btn btn-sm btn-danger text-light">
                                                                Inativo
                                                            </button>
                                                        @endif
                                                    </td>

                                                    <td nowrap>{{ $cliente->telefone }}</td>
                                                    <td>
                                                        {{ $cliente->dataInicioAtividade != null ? date('d/m/Y', strtotime($cliente->dataInicioAtividade)) : 'Não informada' }}
                                                    </td>
                                                    <td>
                                                        {{ $cliente->dataInicioParceria != null ? date('d/m/Y', strtotime($cliente->dataInicioParceria)) : 'Não informada' }}
                                                    </td>
                                                    <td>{{ $cliente->user->firstName }}</td>
                                                    <td>
                                                        <a href="{{ route('responsavel-cliente.create', $cliente->id) }} "
                                                            class="mdi mdi-account-plus acoes text-success"
                                                            title="Adicionar Responsável">
                                                        </a>

                                                        <a href="{{ route('cliente.edit', $cliente->id) }}"
                                                            class="mdi mdi-pencil acoes" title="Editar">
                                                        </a>
                                                        <a href="" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal-{{ $cliente->id }}"
                                                            class="mdi mdi-delete text-danger" title="Excluir"></a>
                                                    </td>
                                                    @include('app.cliente.modals.delete')
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
        $(document).ready(function() {
            $('#dataTable').DataTable({
                responsive: true,
                "columns": [
                    null,
                    null,
                    null,
                    null,
                    null,
                    {
                        "type": "date-eu"
                    },
                    {
                        "type": "date-eu"
                    },
                    null,
                    null,
                ],
                order: [
                    [1, 'asc']
                ]

            })
        });
    </script>
@endsection

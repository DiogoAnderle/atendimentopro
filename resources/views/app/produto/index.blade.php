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
                                        <a href="{{ route('produto.create') }}"
                                            class="btn btn-success rounded-circle mdi mdi-plus">
                                        </a>
                                    </div>
                                    <span id="mensagemCopia"
                                        class="mensagem-copia d-none fade show animated fadeInDown bg-success"><i
                                            class="mdi mdi-content-copy"></i> Conteúdo Copiado</span>
                                    @include('app.includes.mensagens')
                                    <h4 class="card-title">Produtos</h4>

                                    <table id="dataTable" class="table-hover table-bordered table text-white"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-light">Status</th>
                                                <th class="text-light">Cliente</th>
                                                <th class="text-light">Versão</th>
                                                <th class="text-light">Tipo Acesso</th>
                                                <th class="text-light">Endereco Acesso</th>
                                                <th class="text-light">Usuario Servidor</th>
                                                <th class="text-light">Senha Servidor</th>
                                                <th class="text-light">Senha Aberta</th>
                                                <th class="text-light">Cidade</th>
                                                <th class="text-light">Licença</th>
                                                <th class="text-light">Usuário Banco</th>
                                                <th class="text-light">Caminho Atualiza</th>
                                                <th class="text-light">Caminho Banco</th>
                                                <th class="text-light">Caminho Executável</th>
                                                <th class="text-light">Caminho Interno</th>
                                                <th class="text-light">Endereço Zeus</th>
                                                <th class="text-light">Endereço Tzion</th>
                                                <th class="text-light">Módulos</th>
                                                <th class="text-light">Observações</th>
                                                <th class="text-light">Editado</th>
                                                <th class="text-light">Data</th>

                                                <th class="text-light">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($produtos as $produto)
                                                <tr>
                                                    <td class="text-center">
                                                        <button
                                                            class="btn btn-sm {{ $produto->status == 'Atualizado' ? 'btn-success' : 'btn-danger' }} text-light"
                                                            title="{{ $produto->status }}">
                                                            {{ $produto->status == 'Atualizado' ? 'A' : 'D' }}
                                                        </button>

                                                    </td>
                                                    <td nowrap>{{ $produto->cliente->nomeFantasia }}</td>
                                                    <td>{{ $produto->versao_sistema->versao }}</td>

                                                    <td nowrap>
                                                        <button
                                                            class="btn btn-sm @if ($produto->tipo_acesso == 'SSH') btn-info
                                                            @elseif ($produto->tipo_acesso == 'RDP') btn-primary 
                                                            @elseif ($produto->tipo_acesso == 'VIACLOUD') btn-warning
                                                            @elseif ($produto->tipo_acesso == 'LOCAL') btn-danger @endif">
                                                            {{ $produto->tipo_acesso }}
                                                        </button>
                                                    </td>
                                                    <td nowrap>
                                                        <textarea class="textAreaSelected copy endereco-acesso" id="{{ $produto->id }}" readonly>
                                                            {{ $produto->endereco_acesso }}{{ $produto->porta_acesso != null ? ':' : '' }}{{ $produto->porta_acesso }}</textarea>

                                                    </td>

                                                    <td nowrap>
                                                        <textarea class="textAreaSelected copy usuario-acesso" readonly>{{ $produto->usuario_acesso }}</textarea>
                                                    </td>

                                                    <td nowrap>
                                                        <textarea class="textAreaSelected copy" readonly>{{ $produto->senha_acesso }}</textarea>
                                                    </td>
                                                    <td nowrap>
                                                        <textarea class="textAreaSelected copy" readonly>{{ $produto->senha_aberta }}</textarea>
                                                    </td>

                                                    <td nowrap>{{ $produto->cliente->cidade }}</td>

                                                    <td nowrap>{{ $produto->tipo_licenca }}</td>
                                                    <td nowrap>{{ $produto->usuario_banco }}</td>
                                                    <td nowrap>{{ $produto->caminho_atualiza }}</td>
                                                    <td nowrap>{{ $produto->caminho_banco }}</td>
                                                    <td nowrap>{{ $produto->caminho_executavel }}</td>
                                                    <td nowrap>{{ $produto->caminho_interno }}</td>
                                                    <td nowrap>{{ $produto->endereco_zeus }}</td>
                                                    <td nowrap>{{ $produto->endereco_tzion }}</td>
                                                    <td nowrap>
                                                        @foreach ($produto->produtos_cliente as $modulo)
                                                            {{ $modulo }},
                                                        @endforeach
                                                    </td>


                                                    <td nowrap>{{ $produto->observacoes }}</td>
                                                    <td nowrap>{{ $produto->user->firstName }}</td>

                                                    <td>
                                                        {{ date('d/m/Y H:i:s', strtotime($produto->updated_at)) }}
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('produto.edit', $produto->id) }}"
                                                            class="mdi mdi-pencil acoes" title="Editar">
                                                        </a>
                                                        <a href="" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal-{{ $produto->id }}"
                                                            class="mdi mdi-delete text-danger" title="Excluir">
                                                        </a>

                                                    </td>
                                                    @include('app.produto.modals.delete')
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="text-light">Status</th>
                                                <th class="text-light">Cliente</th>
                                                <th class="text-light">Versão</th>
                                                <th class="text-light">Tipo Acesso</th>
                                                <th class="text-light">Endereco Acesso</th>
                                                <th class="text-light">Usuario Servidor</th>
                                                <th class="text-light">Senha Servidor</th>
                                                <th class="text-light">Senha Aberta</th>
                                                <th class="text-light">Cidade</th>
                                                <th class="text-light">Licença</th>
                                                <th class="text-light">Usuário Banco</th>
                                                <th class="text-light">Caminho Atualiza</th>
                                                <th class="text-light">Caminho Banco</th>
                                                <th class="text-light">Caminho Executável</th>
                                                <th class="text-light">Caminho Interno</th>
                                                <th class="text-light">Endereço Zeus</th>
                                                <th class="text-light">Endereço Tzion</th>
                                                <th class="text-light">Módulos</th>
                                                <th class="text-light">Observações</th>
                                                <th class="text-light">Editado</th>
                                                <th class="text-light">Data</th>

                                                <th class="text-light">Ações</th>
                                            </tr>
                                        </tfoot>
                                    </table>


                                </div>

                            </div>
                        </div>
                    </div>
                    {{--
                    <form action="{{ route('produto.update-all') }}" method="post">


                        <input type="hidden" name="status" value="Desatualizado">

                        <a href="" data-bs-toggle="modal"
                            data-bs-target="#modalDesatualizarTodos"class="btn btn-sm btn-danger desatualizar-todos">
                            Desatualizar Todos
                        </a>
                        @include('app.produto.modals.desatualizar')

                    </form>
                    --}}
                </div>
            </div>


            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->

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
                order: [
                    [1, 'asc']
                ]

            })
        });
    </script>
@endsection

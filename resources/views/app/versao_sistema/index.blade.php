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
                                        <a href="{{ route('versao_sistema.create') }}"
                                            class="btn btn-success rounded-circle mdi mdi-plus">
                                        </a>
                                    </div>
                                    <h4 class="card-title">Versões Sistema</h4>
                                    <div class="table-responsive">
                                        <table id="dataTable" class="table-hover table-bordered table text-white"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-light text-center">Versao</th>
                                                    <th class="text-light text-center">Atualizado por</th>
                                                    <th class="text-light text-center">Data</th>
                                                    <th class="text-light text-center">Ações</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($versoesSistema as $versaoSistema)
                                                    <tr>
                                                        <td>{{ $versaoSistema->versao }}</td>
                                                        <td>{{ $versaoSistema->user->firstName }}</td>
                                                        <td>{{ date('d/m/Y H:i:s', strtotime($versaoSistema->updated_at)) }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('versao_sistema.show', $versaoSistema->id) }}"
                                                                class="mdi mdi-eye acoes text-success" title="detalhes">
                                                            </a>


                                                            <a href="{{ route('versao_sistema.edit', $versaoSistema->id) }}"
                                                                class="mdi mdi-pencil acoes" title="Editar">
                                                            </a>
                                                            <a href="" data-bs-toggle="modal"
                                                                data-bs-target="#deleteModal-{{ $versaoSistema->id }}"
                                                                class="mdi mdi-delete text-danger" title="Excluir"></a>
                                                            @include('app.versao_sistema.modals.delete')
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
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
    <script>
        @include('app.includes.mensagens')
    </script>

@endsection

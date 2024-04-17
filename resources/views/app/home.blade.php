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

                        <div class="col-home grid-margin stretch-card">
                            <a class="link-labels" href="{{ route('responsavel.index') }}">
                                <div class="card card-light">
                                    <div class="card-body text-center">
                                        <h4 class="font-weight-normal">Responsáveis</h4>
                                        <div class="d-flex justify-content-evenly align-items-center">
                                            <h3 class="mt-1">{{ $responsaveis }}</h3>
                                            <div class="icon icon-box-light">
                                                <span class="mdi mdi-account-tie text-success"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-home grid-margin stretch-card">
                            <a class="link-labels" href="{{ route('cliente.index') }}">
                                <div class="card card-light">
                                    <div class="card-body text-center">
                                        <h4 class="font-weight-normal">Clientes</h4>
                                        <div class="d-flex justify-content-evenly align-items-center">
                                            <h3 class="mt-1">{{ $clientes }}</h3>
                                            <div class="icon icon-box-light">
                                                <span class="mdi mdi-account-box-multiple text-info"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-home grid-margin stretch-card">
                            <a class="link-labels" href="{{ route('produto.index') }}">
                                <div class="card card-light">
                                    <div class="card-body text-center">
                                        <h4 class="font-weight-normal">Produtos</h4>
                                        <div class="d-flex justify-content-evenly align-items-center">
                                            <h3 class="mt-1">{{ $produtos }}</h3>
                                            <div class="icon icon-box-light">
                                                <span class="mdi mdi-format-list-checkbox text-warning"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-home grid-margin stretch-card">
                            <a class="link-labels" href="{{ route('arvore_conhecimento.index') }}">
                                <div class="card card-light">
                                    <div class="card-body text-center">
                                        <h4 class="font-weight-normal">Conhecimentos</h4>
                                        <div class="d-flex justify-content-evenly align-items-center">
                                            <h3 class="mt-1">{{ $conhecimentos }}</h3>
                                            <div class="icon icon-box-light">
                                                <span class="mdi mdi-database-plus text-primary"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-home grid-margin stretch-card">
                            <a class="link-labels" href="{{ route('user.index') }}">
                                <div class="card card-light">
                                    <div class="card-body text-center">
                                        <h4 class="font-weight-normal">Usuários</h4>
                                        <div class="d-flex justify-content-evenly align-items-center">
                                            <h3 class="mt-1">{{ $users }}</h3>
                                            <div class="icon icon-box-light">
                                                <span class="mdi mdi-account text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
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
@endsection

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
                                    <div class="position-absolute absolute-position">
                                        <a href="{{ route('user.create') }}"
                                            class="btn btn-success rounded-circle mdi mdi-plus">
                                        </a>
                                    </div>
                                    @include('app.includes.mensagens')
                                    <h4 class="card-title">Usuários</h4>
                                    <div class="table-responsive">
                                        <table id="example" class="table-hover table-bordered table text-white"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-light">ID</th>
                                                    <th class="text-light">Nome Completo</th>
                                                    <th class="text-light">E-mail</th>
                                                    <th class="text-light">Atualizado em:</th>
                                                    <th class="text-light text-center">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $user->id }}</td>
                                                        <td>{{ $user->firstName }} {{ $user->lastName }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ date('d/m/Y H:i:s', strtotime($user->updated_at)) }}</td>
                                                        <td class="text-center">
                                                            <a class="mdi mdi-pencil acoes"
                                                                href="{{ route('user.edit', $user->id) }}" title="Editar">
                                                            </a>
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

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
                                        <a href="{{ route('grupo.create') }}"
                                            class="btn btn-success rounded-circle mdi mdi-plus">
                                        </a>
                                    </div>
                                    <h4 class="card-title">Grupos</h4>
                                    <div class="table-responsive">
                                        <table id="dataTable" class="table-hover table-bordered table text-white"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-light">ID</th>
                                                    <th class="text-light">Grupo</th>
                                                    <th class="text-light">Criado/Editado por:</th>
                                                    <th class="text-light">Atualizado em:</th>
                                                    <th class="text-light">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($grupos as $grupo)
                                                    <tr>
                                                        <td>{{ $grupo->id }}</td>
                                                        <td>{{ $grupo->nome }}</td>
                                                        <td>{{ $grupo->user->firstName }}</td>
                                                        <td>{{ date('d/m/Y H:i:s', strtotime($grupo->updated_at)) }}</td>
                                                        <td>
                                                            <a href="{{ route('grupo.edit', $grupo->id) }}"
                                                                class="mdi mdi-pencil acoes">

                                                            </a>

                                                            <a href="" data-bs-toggle="modal"
                                                                data-bs-target="#deleteModal-{{ $grupo->id }}"
                                                                class="mdi mdi-delete text-danger acoes"></a>
                                                        </td>
                                                        @include('app.grupo.modals.delete')
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable({
                responsive: true,
            })
        });
        @include('app.includes.mensagens')
    </script>
@endsection

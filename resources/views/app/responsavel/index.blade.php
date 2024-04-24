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
                                        <a href="{{ route('responsavel.create') }}"
                                            class="btn btn-success rounded-circle mdi mdi-plus">
                                        </a>
                                    </div>
                                    <h4 class="card-title">Responsável Empresa</h4>
                                    <table id="dataTable" class="table-hover table-bordered table text-white"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-light text-center">ID</th>
                                                <th class="text-light text-center">Nome</th>
                                                <th class="text-light text-center">Data Nascimento:</th>
                                                <th class="text-light text-center">Email:</th>
                                                <th class="text-light text-center">Telefone:</th>
                                                <th class="text-light text-center">Whatsapp:</th>
                                                <th class="text-light text-center">Cargo:</th>
                                                <th class="text-light text-center">Editado por:</th>
                                                <th class="text-light text-center">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($responsaveis as $responsavel)
                                                <tr>
                                                    <td>{{ $responsavel->id }}</td>
                                                    <td nowrap>{{ $responsavel->firstName }} {{ $responsavel->lastName }}</
                                                            </td>
                                                        @if ($responsavel->dataNascimento != null)
                                                    <td>{{ date('d/m/Y', strtotime($responsavel->dataNascimento)) }}
                                                    </td>
                                                @else
                                                    <td>Não informada</td>
                                            @endif

                                            <td><a class="nav-link text-white" href="mailto:{{ $responsavel->email }}">
                                                    {{ $responsavel->email }}</a></td>
                                            <td>{{ $responsavel->telefone }}</td>
                                            <td>{{ $responsavel->whatsapp }}</td>
                                            <td>{{ $responsavel->cargo }}</td>
                                            <td>{{ $responsavel->user->firstName }}</td>
                                            <td>

                                                <a href="{{ route('responsavel.show', $responsavel->id) }}"
                                                    class="mdi mdi-eye acoes text-success" title="Detalhes">
                                                </a>

                                                <a href="{{ route('responsavel.edit', $responsavel->id) }}"
                                                    class="mdi mdi-pencil acoes" title="Editar">
                                                </a>
                                                <a href="" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal-{{ $responsavel->id }}"
                                                    class="mdi mdi-delete text-danger" title="Excluir"></a>
                                            </td>
                                            @include('app.responsavel.modals.delete')
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
                    {
                        "type": "date-eu"
                    },
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                ],
                order: [
                    [1, 'asc']
                ]
            })
        });

        @include('app.includes.mensagens')
    </script>
@endsection

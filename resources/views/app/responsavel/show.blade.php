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

                                    <div class="card text-center">
                                        <div class="position-absolute absolute-position">
                                            <a href="{{ route('responsavel.index') }}"
                                                class="btn btn-warning rounded-circle mdi mdi-keyboard-return"
                                                style="font-size: 24px">
                                            </a>
                                        </div>
                                        <div class="card-header">
                                            <h3>Detalhes</h3>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">#{{ $responsavel->id }} -
                                                {{ $responsavel->firstName }}
                                                {{ $responsavel->lastName }}</h4>
                                            <p class="card-text">
                                                {{ date('d/m/Y', strtotime($responsavel->dataNascimento)) }}
                                            </p>
                                            <p class="card-text">
                                                {{ $responsavel->email }}
                                            </p>
                                            <p class="card-text">
                                                T: {{ $responsavel->telefone }} | W: {{ $responsavel->whatsapp }}
                                            </p>
                                        </div>
                                        <div class="card-footer">
                                            <h4>Clientes Vinculados</h4>
                                            <table id="dataTable" class="table-hover table-bordered table text-white">
                                                <thead>
                                                    <tr>
                                                        <th>Cliente</th>
                                                        <th>CNPJ</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($responsavel->clientes as $cliente)
                                                        <tr>
                                                            <td>{{ $cliente->razaoSocial }}</td>
                                                            <td>{{ $cliente->cnpj }}</td>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
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
        const handlePhone = (event) => {
            let input = event.target
            input.value = phoneMask(input.value)
        }

        const phoneMask = (value) => {
            if (!value) return ""
            value = value.replace(/\D/g, '')
            value = value.replace(/(\d{2})(\d)/, "($1) $2")
            value = value.replace(/(\d)(\d{4})$/, "$1-$2")
            return value
        }
    </script>
@endsection

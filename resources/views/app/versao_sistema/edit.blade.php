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
                                        <a href="{{ route('versao_sistema.index') }}"
                                            class="btn btn-warning rounded-circle mdi mdi-keyboard-return"
                                            style="font-size: 24px">
                                        </a>
                                    </div>
                                    <h4 class="card-title">Cadastrar Versão</h4>


                                    <form method="POST" action="{{ route('versao_sistema.update', $versaoSistema->id) }}"
                                        class="forms-sample" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="versao" class="form-label">Versão</label>
                                                <input type="text" class="form-control text-white" id="versao"
                                                    name="versao" autofocus
                                                    value="{{ $versaoSistema->versao ?? old('versao') }}">
                                                @if ($errors->has('versao'))
                                                    <span class="text-danger">
                                                        {{ $errors->first('versao') }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-6" style="padding-top: 35px;">
                                                <label for="ultima_versao" class="form-label"
                                                    style="padding: 5px 25px 0px 0px">Última Versão</label>
                                                <input type="checkbox" id="ultima_versao" name="ultima_versao"
                                                    class="checkbox" value=""
                                                    {{ $versaoSistema->ultima_versao == '1' || old('ultima_versao') ? 'checked' : '' }} />
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="descricao" class="form-label">Descrição</label>
                                            <textarea rows="5" class="form-control text-white" id="descricao" name="descricao">{{ $versaoSistema->descricao ?? old('descricao') }}</textarea>
                                            @if ($errors->has('descricao'))
                                                <span class="text-danger">
                                                    {{ $errors->first('descricao') }}
                                                </span>
                                            @endif
                                        </div>

                                        <button type="submit" class="btn btn-primary me-2">Cadastrar</button>

                                        <a href="{{ route('versao_sistema.index') }}" class="btn btn-warning">Cancelar</a>
                                    </form>
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

    <script src="{{ asset('js/summernote.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#descricao').summernote({
                placeholder: "Descrição....",
                tabsize: 2,
                height: 150,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol']],
                    [' table', [
                        ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                        ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                    ]],

                ]
            });
        });
    </script>
@endsection

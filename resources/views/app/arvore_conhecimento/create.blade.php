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
                                        <a href="{{ route('arvore_conhecimento.index') }}"
                                            class="btn btn-warning rounded-circle mdi mdi-keyboard-return"
                                            style="font-size: 24px">
                                        </a>
                                    </div>
                                    <h4 class="card-title">Cadastrar Conhecimento</h4>


                                    <form method="POST" action="{{ route('arvore_conhecimento.store') }}"
                                        class="forms-sample" enctype="multipart/form-data" id="formArvoreConhecimento"
                                        data-subgrupos-url="{{ route('carrega_subgrupos') }}">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                        <div class="form-group">
                                            <label for="assunto" class="form-label">Assunto</label>
                                            <input type="text" class="form-control text-white" id="assunto"
                                                name="assunto" autofocus
                                                value="{{ $arvoreConhecimento->assunto ?? old('assunto') }}"
                                                @if ($errors->has('assunto')) style='border: 1px solid red' @endif>
                                            @if ($errors->has('assunto'))
                                                <span class="text-danger">
                                                    {{ $errors->first('assunto') }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-6 resp-col-md resp-col-sm">
                                                <label for="grupo_id" class="form-label">Grupo</label>
                                                <select class="form-control text-white" id="grupo_id" name="grupo_id"
                                                    @if ($errors->has('grupo_id')) style='border: 1px solid red' @endif>
                                                    <option>-- Selecione um grupo --</option>

                                                    @foreach ($grupos as $grupo)
                                                        <option value="{{ $grupo->id }}"
                                                            {{ ($grupo_id ?? old('grupo_id')) == $grupo->id ? 'selected' : '' }}>
                                                            {{ $grupo->nome }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('grupo_id'))
                                                    <span class="text-danger">
                                                        {{ $errors->first('grupo_id') }}
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group col-6 resp-col-md resp-col-sm">
                                                <label for="subgrupo_id" class="form-label">Subgrupo</label>
                                                <select class="form-control text-white" id="subgrupo_id" disabled
                                                    name="subgrupo_id"
                                                    @if ($errors->has('subgrupo_id')) style='border: 1px solid red' @endif>
                                                    <option value="" selected>-- Selecione um grupo --</option>
                                                </select>
                                                @if ($errors->has('subgrupo_id'))
                                                    <span class="text-danger">
                                                        {{ $errors->first('subgrupo_id') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="descricao" class="form-label">Descrição</label>
                                            <textarea rows="5" class="form-control text-white" id="descricao" name="descricao" value="{{ old('descricao') }}"
                                                @if ($errors->has('descricao')) style='border: 1px solid red' @endif>{{ $arvoreConhecimento->descricao ?? old('descricao') }}</textarea>
                                            @if ($errors->has('descricao'))
                                                <span class="text-danger">
                                                    {{ $errors->first('descricao') }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="form-label">Imagem:</label>
                                            <input type="file" class="form-control-sm text-white" id="image"
                                                name="image" onchange="previewImagem()">
                                            <img src="" name="preview" class="d-none" alt=""
                                                style="width: 150px; height: 150px; border-radius: 50%">

                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Cadastrar</button>

                                        <a href="{{ route('arvore_conhecimento.index') }}"
                                            class="btn btn-warning">Cancelar</a>
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
        let preview = document.querySelector('img[name=preview]').getAttribute("src");
        if (preview == "" || preview == null) {


        } else {
            alert(preview)
        }

        function previewImagem() {

            let image = document.querySelector('input[name=image]').files[0];
            let preview = document.querySelector('img[name=preview]');

            console.log(image)
            console.log(preview)

            var reader = new FileReader();
            reader.onloadend = function() {
                preview.src = reader.result;
                console.log(image)
                console.log(preview.src)

            }
            if (image) {
                reader.readAsDataURL(image);
                preview.classList.remove('d-none')
                preview.classList.add('d-block')
                preview.classList.add('previewImage')

            } else {
                preview.src = "";
            }

        }
        $(document).ready(function() {
            $('#descricao').summernote({
                placeholder: "Descrição....",
                tabsize: 2,
                height: 150,
                toolbar: [
                    ['insert', ['picture']],
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol']],
                    [' table', [
                        ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                        ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                    ]],

                ]
            });
        });

        $(document).ready(function() {
            $('#grupo_id').change(function() {
                let url = $("#formArvoreConhecimento").attr("data-subgrupos-url");
                let grupoId = $(this).val();
                $.ajax({
                    url: url,
                    data: {
                        'grupo_id': grupoId,
                    },
                    success: function(data) {
                        document.getElementById('subgrupo_id').removeAttribute('disabled');
                        $("#subgrupo_id").html(data);
                    }
                });
            });
        });
    </script>
@endsection

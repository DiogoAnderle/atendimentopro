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
                                        <a href="{{ route('responsavel.index') }}"
                                            class="btn btn-warning rounded-circle mdi mdi-keyboard-return"
                                            style="font-size: 24px">
                                        </a>
                                    </div>

                                    <h4 class="card-title">Editar Responsável</h4>


                                    <form method="POST" action="{{ route('responsavel.update', $responsavel->id) }}"
                                        class="forms-sample">
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                        <div class="row">
                                            <div class="form-group col-6 resp-col-md resp-col-sm">
                                                <label for="firstName" class="form-label">Nome</label>
                                                <input type="text"
                                                    class="form-control @error('firstName') is-invalid @enderror text-white"
                                                    id="firstName" name="firstName" autofocus
                                                    value="{{ $responsavel->firstName ?? old('firstName') }}">
                                                @if ($errors->has('firstName'))
                                                    <span class="text-danger" id="erroFirstName">
                                                        {{ $errors->first('firstName') }}
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group col-6 resp-col-md resp-col-sm">
                                                <label for="lastName" class="form-label">Sobrenome</label>
                                                <input type="text"
                                                    class="form-control @error('lastName') is-invalid @enderror text-white"
                                                    id="lastName" name="lastName"
                                                    value="{{ $responsavel->lastName ?? old('lastName') }}">
                                                @if ($errors->has('lastName'))
                                                    <span class="text-danger" id="erroFirstName" role="alert">
                                                        {{ $errors->first('lastName') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-6 resp-col-md resp-col-sm">
                                                <label for="email" class="form-label">E-mail</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror text-white"
                                                    id="email" name="email"
                                                    value="{{ $responsavel->email ?? old('email') }}">
                                                @if ($errors->has('email'))
                                                    <span class="text-danger" role="alert">
                                                        {{ $errors->first('email') }}
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group col-6 resp-col-md resp-col-sm">
                                                <label for="dataNascimento" class="form-label">Data Nascimento</label>
                                                <input type="date"
                                                    class="form-control @error('dataNascimento') is-invalid @enderror text-white"
                                                    id="dataNascimento" name="dataNascimento"
                                                    value="{{ date('Y-m-d', strtotime($responsavel->dataNascimento)) }}">
                                                @if ($errors->has('dataNascimento'))
                                                    <span class="text-danger" role="alert">
                                                        {{ $errors->first('dataNascimento') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6 resp-col-md resp-col-sm">
                                                <label for="telefone" class="form-label">Telefone</label>
                                                <input type="tel"
                                                    class="form-control @error('telefone') is-invalid @enderror text-white"
                                                    id="telefone" name="telefone"
                                                    value="{{ $responsavel->telefone ?? old('telefone') }}" maxlength="15"
                                                    onkeyup="handlePhone(event)">
                                                @if ($errors->has('telefone'))
                                                    <span class="text-danger" role="alert">
                                                        {{ $errors->first('telefone') }}
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group col-6 resp-col-md resp-col-sm">
                                                <label for="whatsapp" class="form-label">Whatsapp</label>
                                                <input type="tel"
                                                    class="form-control @error('whatsapp') is-invalid @enderror text-white"
                                                    id="whatsapp" name="whatsapp"
                                                    value="{{ $responsavel->whatsapp ?? old('whatsapp') }}" maxlength="15"
                                                    onkeyup="handlePhone(event)">
                                                @if ($errors->has('whatsapp'))
                                                    <span class="text-danger" role="alert">
                                                        {{ $errors->first('whatsapp') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-6 resp-col-md resp-col-sm">
                                                <label for="cargo" class="form-label">Cargo</label>
                                                <input type="text"
                                                    class="form-control @error('telefone') is-invalid @enderror text-white"
                                                    id="cargo" name="cargo"
                                                    value="{{ $responsavel->cargo ?? old('cargo') }}">
                                                @if ($errors->has('cargo'))
                                                    <span class="text-danger" role="alert">
                                                        {{ $errors->first('cargo') }}
                                                    </span>
                                                @endif
                                            </div>

                                        </div>

                                        <button type="submit" class="btn btn-primary me-2">Atualizar</button>

                                        <a href="{{ route('responsavel.index') }}" class="btn btn-warning">Cancelar</a>
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


    <script type="text/javascript">
        const handlePhone = (event) => {
            let input = event.target
            input.value = phoneMask(input.value)
        };

        const phoneMask = (value) => {
            if (!value) return ""
            value = value.replace(/\D/g, '')
            value = value.replace(/(\d{2})(\d)/, "($1) $2")
            value = value.replace(/(\d)(\d{4})$/, "$1-$2")
            return value
        };
    </script>
@endsection

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
                                        <a href="{{ route('user.index') }}"
                                            class="btn btn-warning rounded-circle mdi mdi-keyboard-return"
                                            style="font-size: 24px">
                                        </a>
                                    </div>
                                    <h4 class="card-title">Atualizar Usuário</h4>


                                    <form method="POST" action="{{ route('user.update', $user->id) }}" class="forms-sample"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <h4 class="card-title text-white mt-4 mb-4"disabled>{{ $user->firstName }}
                                            {{ $user->lastName }}</h4>

                                        <div class="form-group col-lg-3 col-sm-12">
                                            <label for="email" class="form-label">E-mail</label>
                                            <input type="email" class="form-control text-white" id="email"
                                                name="email" autofocus value="{{ $user->email ?? old('email') }}"
                                                @if ($errors->has('email')) style='border: 1px solid red' @endif>
                                            @if ($errors->has('email'))
                                                <span class="text-danger">
                                                    {{ $errors->first('email') }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-3 col-sm-12">
                                            <label class="form-label">Nova Senha</label>
                                            <span style="position: relative;">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror bg-dark text-white"
                                                    name="password" required autocomplete="current-password"><i
                                                    id="showPassword" class="mdi mdi-eye"
                                                    style="position: absolute; top: 50%; right:10px; cursor:pointer;"></i>
                                            </span>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-3 col-sm-12">
                                            <label for="password-confirm" class="form-label">Confirmar Senha</label>
                                            <span style="position: relative;">
                                                <input id="password-confirm" type="password" value="{{ old('password') }}"
                                                    class="form-control p_input bg-dark text-white"
                                                    name="password_confirmation" required autocomplete="new-password"><i
                                                    id="showPasswordConfirm" class="mdi mdi-eye"
                                                    style="position: absolute; top: 50%; right:10px; cursor:pointer;"></i>
                                            </span>

                                        </div>


                                        <button type="submit" class="btn btn-primary me-2">Atualizar</button>

                                        <a href="{{ route('user.index') }}" class="btn btn-warning">Cancelar</a>
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

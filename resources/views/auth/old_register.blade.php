@extends('layouts.app')

@section('classname', 'bg-body')

@section('content')

<div class="container-scroller my-5">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
            <div class="full-page-wrapper d-flex align-items-center auth">
                <div class="card col-lg-4 mx-auto " style="opacity: 0.85;">
                    <div class="card-body px-5 py-4">
                        <h3 class=" text-left mb-3">{{ __('Registrar-se') }}</h3>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group ">
                                <label for="firstName">Nome</label>
                                <input id="firstName" type="text"
                                    class="form-control p_input bg-dark text-white @error('firstName') is-invalid @enderror"
                                    name="firstName" value="{{ old('firstName') }}" autocomplete="firstName" autofocus>

                                @error('firstName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="lastName">Sobrenome</label>
                                <input id="lastName" type="text"
                                    class="form-control p_input bg-dark text-white @error('lastName') is-invalid @enderror"
                                    name="lastName" value="{{ old('lastName') }}" autocomplete="lastName" autofocus>

                                @error('lastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="emaiç">Email</label>
                                <input id="email" type="email"
                                    class="form-control p_input bg-dark text-white @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Senha</label>
                                <input id="password" type="password" value="{{ old('password') }}"
                                    class="form-control p_input bg-dark text-white @error('password') is-invalid @enderror"
                                    name="password" autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div> 

                            <div class="form-group">
                                <label for="password-confirm">Confirmar Senha</label>
                                <input id="password-confirm" type="password" value="{{ old('password') }}"
                                    class="form-control p_input bg-dark text-white" name="password_confirmation"
                                    required autocomplete="new-password">
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{
                                            old('remember') ? 'checked' : '' }}> {{
                                        __('Lembrar-me') }} </label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-warning btn-block ">{{ __('Registrar')}}
                                </button>
                                <p class="sign-up text-center">Já possui uma Conta?
                                    <strong><a class="nav-link color-warning" href="{{ route('login') }}">{{__('Faça
                                            Login')}}</a>
                                    </strong>
                                </p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
@endsection
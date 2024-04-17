@extends('layouts.app')

@section('classname', 'bg-body')

@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="full-page-wrapper d-flex align-items-center auth">
                    <div class="card col-lg-4 mx-auto" style="opacity: 0.85;">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title mb-3 text-left">Login</h3>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="email">{{ __('Email *') }}</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror bg-dark text-white"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">{{ __('Senha *') }}</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror bg-dark text-white"
                                        name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}> {{ __('Lembrar-me') }} </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="nav-link" href="{{ route('password.request') }}">
                                            {{ __('Esqueceu sua senha?') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-warning btn-block enter-btn">
                                        {{ __('Login') }}
                                    </button>
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

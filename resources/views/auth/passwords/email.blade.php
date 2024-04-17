@extends('layouts.app')

@section('classname', 'bg-body')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
            <div class="full-page-wrapper d-flex align-items-center auth">
                <div class="card col-lg-4 mx-auto " style="opacity: 0.85;">
                    <div class="card-body px-5 py-5">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <h3 class="card-title text-left mb-3">Login</h3>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">{{ __('Email *')
                                    }}</label>
                                <input id="email" type="email"
                                    class="form-control bg-dark text-white @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>

                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-warning btn-block enter-btn">
                                    {{ __('Enviar Link Para Resetar Senha') }}
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
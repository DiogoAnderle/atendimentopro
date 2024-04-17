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
                                    <a href="{{route('user.index')}}"
                                        class="btn btn-warning rounded-circle mdi mdi-keyboard-return"
                                        style="font-size: 24px">
                                    </a>
                                </div>
                                <h4 class="card-title">Novo Usuário</h4>


                                <form method="POST" action="{{route('user.store')}}" class="forms-sample"
                                    enctype="multipart/form-data">
                                    @csrf
                                   
                                     <div class="form-group">
                                        <label for="firstName" class="form-label">Nome</label>
                                        <input type="text" class="form-control text-white @error('firstName') is-invalid @enderror" id="firstName" name="firstName" autofocus  value="{{ $user->firstName ?? old('firstName')}}">
                                        @if ($errors->has('firstName'))
                                            <span class="text-danger">
                                                {{$errors->first('firstName')}}
                                            </span>
                                        @endif
                                    </div>

                                     <div class="form-group">
                                        <label for="lastName" class="form-label">Sobrenome</label>
                                        <input type="text" class="form-control text-white @error('lastName') is-invalid @enderror" id="lastName" name="lastName" value="{{ $user->lastName ?? old('lastName')}}">
                                        @if ($errors->has('lastName'))
                                            <span class="text-danger" role="alert">
                                                {{$errors->first('lastName')}}
                                            </span>
                                        @endif
                                    </div>
                                   
                                    
                                    <div class="form-group">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input type="email" class="form-control text-white @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email ?? old('email')}}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger" role="alert">
                                                {{$errors->first('email')}}
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Senha</label>
                                        <input id="password" type="password" value="{{ old('password') }}"
                                            class="form-control p_input bg-dark text-white @error('password') is-invalid @enderror"
                                            name="password" autocomplete="new-password">

                                        @error('password')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password-confirm" class="form-label">Confirmar Senha</label>
                                        <input id="password-confirm" type="password" value="{{ old('password') }}"
                                            class="form-control p_input bg-dark text-white" name="password_confirmation"
                                            autocomplete="new-password">
                                    </div>
                                                                           
                                    <button type="submit" class="btn btn-primary me-2">Cadastrar</button>

                                    <a href="{{route('user.index')}}" class="btn btn-warning">Cancelar</a>
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

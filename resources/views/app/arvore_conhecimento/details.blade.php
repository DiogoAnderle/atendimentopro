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
                                    <a href="{{route('arvore_conhecimento.index')}}" class="btn btn-warning rounded-circle mdi mdi-keyboard-return" style="font-size: 24px">
                                    </a>
                                </div>
                                 @if ($arvoreConhecimento->image != null)
                                        <a a href="" data-bs-toggle="modal"
                                            data-bs-target="#imagemModal-{{$arvoreConhecimento->id}}">
                                            <img src="{{url("storage/{$arvoreConhecimento->image}")}}" 
                                            alt="Imagem {{$arvoreConhecimento->assunto}}" width=200px></a>
                                            @include('app.arvore_conhecimento.modals.imagem')                                  
                                    @endif
                                    <h3 class="card-title mt-4">Detalhes Conhecimento</h3>

                                    <h4>Assunto: {{$arvoreConhecimento->assunto}}</h4>
                                    <h5><strong>Grupo:</strong> {{$arvoreConhecimento->grupo->nome}}</h5>
                                    <h5><strong>Subgrupo:</strong> {{$arvoreConhecimento->subgrupo->nome}}</h>
                                    <div class="container card-body">
                                        <h5>Descrição:</h5>
                                        {!! $arvoreConhecimento->descricao !!}
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

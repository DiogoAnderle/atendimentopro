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


                    <div class="col-12 grid-margin">
                        <div class="card bg-dark text-white">
                            <div class="card-body">
                                <div class="position-absolute absolute-position">
                                    <a href="{{route('arvore_conhecimento.create')}}" class="btn btn-success rounded-circle mdi mdi-plus">
                                    </a>
                                </div>
                                @include('app.includes.mensagens')
                                <h4 class="card-title">Arvore de Conhecimento</h4>
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-hover table-bordered text-white"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-light text-center"></th>
                                                <th class="text-light text-center">ID</th>
                                                <th class="text-light text-center">Assunto</th>
                                                <th class="text-light text-center">Grupo</th>
                                                <th class="text-light text-center">Subgrupo</th>
                                                <th class="text-light text-center">Detalhes</th>
                                                <th class="text-light text-center">Criado/Editado por:</th>
                                                <th class="text-light text-center">Atualizado em:</th>
                                                <th class="text-light text-center">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($arvoreConhecimentos as $arvoreConhecimento)
                                            
                                            <tr>
                                                  @if ($arvoreConhecimento->image != null)
                                                    <td><a a href="" data-bs-toggle="modal"
                                                            data-bs-target="#imagemModal-{{$arvoreConhecimento->id}}"><img src="{{url("storage/{$arvoreConhecimento->image}")}}" alt=""></a>
                                                            @include('app.arvore_conhecimento.modals.imagem')
                                                    </td>
                                                  @else
                                                 
                                                    <td></td>
                                                  @endif
                                                <td>{{$arvoreConhecimento->id}}</td>
                                                <td>{{$arvoreConhecimento->assunto}}</td>
                                                <td>{{$arvoreConhecimento->grupo->nome}}</td>
                                                <td>{{$arvoreConhecimento->subgrupo->nome}}</td>
                                                <td class="text-center"><a class=" mdi mdi-eye text-success" href="{{route('arvore_conhecimento.show', $arvoreConhecimento->id)}}" title="Detalhes"></a></td>
                                                <td>{{$arvoreConhecimento->user->firstName}}</td>
                                                <td>{{date('d/m/Y H:m', strtotime($arvoreConhecimento->updated_at))}}</td>
                                                <td>
                                                    

                                                    <a href="{{route('arvore_conhecimento.edit', $arvoreConhecimento->id)}}" class="mdi mdi-pencil acoes" title="Editar">
                                                    </a>
                                                    <a href="" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal-{{$arvoreConhecimento->id}}"
                                                        class="mdi mdi-delete text-danger" title="Excluir"></a>
                                                    @include('app.arvore_conhecimento.modals.delete')
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

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

@endsection


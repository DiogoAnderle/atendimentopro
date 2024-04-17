@if ($mensagem = Session::get('sucesso'))
    <div class="alert alert-success fade show animated left-50 fadeInDown" id="alert" role="alert">
        {{ $mensagem }}

    </div>
@endif

@if ($mensagem = Session::get('erro'))
    <div class="alert alert-danger fade show animated left-50 fadeInDown" id="alert" role="alert">
        {{ $mensagem }}

    </div>
@endif

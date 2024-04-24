@if ($mensagem = Session::get('sucesso'))
    Swal.fire({
    position: "center",
    icon: "success",
    title: "{{ $mensagem }}",
    background: "#000",
    showConfirmButton: false,
    timer: 1200
    });

    {{-- <div class="alert alert-success fade show animated left-50 fadeInDown" id="alert" role="alert">
        {{ $mensagem }}

    </div> --}}
@endif

@if ($mensagem = Session::get('erro'))
    Swal.fire({
    position: "center",
    icon: "error",
    title: "{{ $mensagem }}",
    background: "#000",
    showConfirmButton: false,
    timer: 1200
    });
    {{-- <div class="alert alert-danger fade show animated left-50 fadeInDown" id="alert" role="alert">
        {{ $mensagem }}

    </div> --}}
@endif

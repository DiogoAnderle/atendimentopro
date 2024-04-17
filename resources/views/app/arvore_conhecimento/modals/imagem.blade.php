<!-- Modal Imagem-->
<div class="modal fade modal-imagem" id="imagemModal-{{$arvoreConhecimento->id}}" tabindex="-1" aria-labelledby="ImagemModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <button type="button" class="btn btn-danger btn-modal-dismiss" data-bs-dismiss="modal"
                    aria-label="Close">X</button>
            <div class="modal-body">
                <img src="{{url("storage/{$arvoreConhecimento->image}")}}" alt="Foto Chamado">
            </div>

        </div>
    </div>
</div>
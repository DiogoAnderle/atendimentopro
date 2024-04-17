<!-- Modal Excluir-->
<div class="modal fade" id="deleteModal-{{ $responsavel->pivot->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title relative-title" id="exampleModalLongTitle">
                    <span class="mdi mdi-delete absolute-icon"></span> Deseja Excluir?
                </h5>
                <button type="button" class="btn btn-danger btn-modal-dismiss" data-bs-dismiss="modal"
                    aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <p>
                    Tem certeza que deseja remover este responsável? <br><br>
                    <strong>{{ $responsavel->firstName }} {{ $responsavel->lastName }}</strong>?
                </p>
            </div>

            <div class="modal-footer">

                <button class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>

                <form action="{{ route('responsavel-cliente.destroy', $responsavel->pivot->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
                    <button type="submit" class="btn btn-primary">Sim, remover</button>
                </form>
            </div>
        </div>
    </div>
</div>

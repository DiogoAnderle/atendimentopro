<!-- Modal Excluir-->
<div class="modal fade" id="modalDesatualizarTodos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title relative-title" id="exampleModalLongTitle">
                    <span class="mdi mdi-delete absolute-icon"></span> Tem Certeza?
                </h5>
                <button type="button" class="btn btn-danger btn-modal-dismiss" data-bs-dismiss="modal"
                    aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <p>
                    Tem certeza que deseja marcar todos como Desatualizado?
                    <br>
                    <strong>Essa ação não poderá ser desfeita!</strong>
                </p>
            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                    aria-label="Close">Cancelar</button>

                <form action="{{ route('produto.update-all') }}" method="post">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger">Desatualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

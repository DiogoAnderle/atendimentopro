 <!-- Modal starts -->
 <div class="text-center">
     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dadosProduto">Visualizar
         Produto</button>
 </div>
 <div class="modal fade" id="dadosProduto" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Detalhes do
                     Produto</h5>
                 <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">


                 <form>
                     <div class="row">
                         <!-- Coluna 1 -->
                         <div class="col-lg-3 col-md-6">
                             <div class="form-group col-sm-12">
                                 <label>Status:</label>
                                 <input type="text" class="form-control text-white copy"
                                     value="{{ $produto->status }}" readonly>
                             </div>
                             <div class="form-group col-sm-12">
                                 <label>Usuário Servidor:</label>
                                 <input type="text" class="form-control text-white copy"
                                     value="{{ $produto->usuario_acesso }}" readonly>
                             </div>
                             <div class="form-group col-sm-12">
                                 <label>Cidade:</label>
                                 <input type="text" class="form-control text-white copy"
                                     value="{{ $produto->cliente->cidade }}" readonly>
                             </div>
                             <div class="form-group col-sm-12">
                                 <label>Caminho Executável</label>
                                 <input class="form-control text-white copy" readonly
                                     value="{{ $produto->caminho_executavel }}">
                             </div>
                             <div class="form-group col-sm-12">
                                 <label>Editado:</label>
                                 <input type="text" class="form-control text-white copy"
                                     value="{{ $produto->user->firstName }}" readonly>
                             </div>
                         </div>
                         <!-- Fim Coluna 1 -->

                         <!-- Coluna 2 -->
                         <div class="col-lg-3 col-md-6">
                             <div class="form-group col-sm-12">
                                 <label>Versão:</label>
                                 <input type="text" class="form-control text-white copy"
                                     value="{{ $produto->versao_sistema->versao }}" readonly>
                             </div>
                             <div class="form-group col-sm-12">
                                 <label>Senha Servidor:</label>
                                 <input type="text" class="form-control text-white copy"
                                     value="{{ $produto->senha_acesso }}" readonly>
                             </div>
                             <div class="form-group col-sm-12">
                                 <label>Licença:</label>
                                 <input type="text" class="form-control text-white copy"
                                     value="{{ $produto->tipo_licenca }}" readonly>
                             </div>
                             <div class="form-group col-sm-12">
                                 <label>Caminho Interno:</label>
                                 <input type="text" class="form-control text-white copy"
                                     value="{{ $produto->caminho_interno }}" readonly>
                             </div>
                             <div class="form-group col-sm-12">
                                 <label>Data da Edição:</label>
                                 <input type="text" class="form-control text-white copy"
                                     value="{{ date('d/m/Y H:i:s', strtotime($produto->updated_at)) }}" readonly>
                             </div>
                         </div>
                         <!-- Fim Coluna 2 -->

                         <!-- Coluna 3 -->
                         <div class="col-lg-3 col-md-6">
                             <div class="form-group col-sm-12">
                                 <label>Tipo de Acesso:</label>
                                 <input type="text" class="form-control text-white copy"
                                     value="{{ $produto->tipo_acesso }}" readonly>
                             </div>
                             <div class="form-group col-sm-12">
                                 <label>Senha Aberta:</label>
                                 <input type="text" class="form-control text-white copy"
                                     value="{{ $produto->senha_aberta }}" readonly>
                             </div>
                             <div class="form-group col-sm-12">
                                 <label>Caminho Atualiza:</label>
                                 <input type="text" class="form-control text-white copy"
                                     value="{{ $produto->caminho_atualiza }}" readonly>
                             </div>
                             <div class="form-group col-sm-12">
                                 <label>Endereço Zeus:</label>
                                 <input type="text" class="form-control text-white copy"
                                     value="{{ $produto->endereco_zeus }}" readonly>
                             </div>
                             <div class="form-group col-sm-12">
                                 <label>Módulos:</label>
                                 <textarea type="text" class="form-control text-white copy" cols="30" rows="10" readonly><?php
                                 foreach ($produto->produtos_cliente as $produto_cliente) {
                                     echo $produto_cliente . ', ';
                                 }
                                 ?></textarea>
                             </div>
                         </div>
                         <!-- Fim Coluna 3 -->

                         <!-- Coluna 4 -->
                         <div class="col-lg-3 col-md-6">
                             <div class="form-group col-sm-12">
                                 <label>Endereço Acesso:</label>
                                 <input class="form-control text-white copy" readonly
                                     value="{{ $produto->endereco_acesso }}{{ $produto->porta_acesso != null ? ':' : '' }}{{ $produto->porta_acesso }}">
                             </div>
                             <div class="form-group col-sm-12">
                                 <label>Usuário Banco:</label>
                                 <input type="text" class="form-control text-white copy"
                                     value="{{ $produto->usuario_banco != null ? $produto->usuario_banco : 'SYSDBA' }}"
                                     readonly>
                             </div>
                             <div class="form-group col-sm-12">
                                 <label>Caminho Banco:</label>
                                 <input type="text" class="form-control text-white copy"
                                     value="{{ $produto->caminho_banco }}" readonly>
                             </div>
                             <div class="form-group col-sm-12">
                                 <label>Endereço Tzion:</label>
                                 <input type="text" class="form-control text-white copy"
                                     value="{{ $produto->endereco_tzion }}" readonly>
                             </div>
                             <div class="form-group col-sm-12">
                                 <label>Observações:</label>
                                 <textarea class="form-control text-white copy" id="observacoes" cols="30" rows="10" readonly><?php echo $produto->observacoes; ?></textarea>
                             </div>
                         </div>
                         <!-- Fim Coluna 4 -->
                     </div>
                 </form>


             </div>
         </div>
     </div>
 </div>
 <!-- Modal Ends -->

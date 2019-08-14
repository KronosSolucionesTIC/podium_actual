<!-- Form asignacion -->
<div class="modal fade bs-example-modal-lg" id="frm_modal_asignacion" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header fondomodalheader">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="imgedicion"></div><h3 class="modal-title titulomodal" id="lbl_form_asignacion">-</h3>
      </div>
      <div class="modal-body">
        <!-- form modal contenido -->

                <form id="form_asignacion" method="POST">
                    <br>
                    <div class="form-group " hidden>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pkID" name="pkID">
                        </div>
                    </div>

                    <div class="form-group " hidden>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="contador" name="contador">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Primer Nombre" required = "true">
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Costo</label>
                            <select class="form-control" id="fkID_costo" name="fkID_costo">
                              <option></option>
                              <?php echo $asignacionInst->getSelectCosto(); ?>
                            </select>

                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Valor</label>
                            <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor Costo" >
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Afiliado</label>
                            <select class="form-control" id="fkID_afiliado" name="fkID_afiliado">
                              <option></option>
                              <?php echo $asignacionInst->getSelectAfiliado(); ?>
                            </select>

                    </div>

                </form>

        <!-- /form modal contenido-->
      </div>
      <div class="modal-footer">
        <button id="btn_actionasignacion" type="button" class="btn btn-primary botonnewgrupo" data-action="-">
            <span id="lbl_btn_actionasignacion"></span>
        </button>
      </div>
    </div>
  </div>
</div>
<!-- /form modal -->

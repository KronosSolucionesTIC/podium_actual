<!-- Form ingresos -->
<div class="modal fade bs-example-modal-lg" id="frm_modal_ingresos" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header fondomodalheader">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="imgedicion"></div><h3 class="modal-title titulomodal" id="lbl_form_ingresos">-</h3>
      </div>
      <div class="modal-body">
        <!-- form modal contenido -->

                <form id="form_ingresos" method="POST">
                    <br>
                    <div class="form-group " hidden>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pkID" name="pkID">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Fecha</label>
                            <input type="date" class="form-control" id="fec_ing" name="fec_ing" placeholder="Primer Nombre" required = "true">
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Tipo ingreso</label>
                            <select class="form-control" id="fkID_tipo_ingreso" name="fkID_tipo_ingreso">
                              <option></option>
                              <?php echo $ingresosInst->getSelectTipoIngreso(); ?>
                            </select>

                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Valor</label>
                            <input type="text" class="form-control" id="val_ing" name="val_ing" placeholder="Valor Ingreso" >
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Responsable</label>
                            <select class="form-control" id="fkID_profesor" name="fkID_profesor">
                              <option></option>
                              <?php echo $ingresosInst->getSelectProfesor(); ?>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Afiliado</label>
                            <select class="form-control" id="fkID_afiliado" name="fkID_afiliado">
                              <option></option>
                              <?php echo $ingresosInst->getSelectAfiliado(); ?>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Observación</label>
                            <input type="text" class="form-control" id="obs_ing" name="obs_ing" placeholder="Observación" >
                    </div>

                </form>

        <!-- /form modal contenido-->
      </div>
      <div class="modal-footer">
        <button id="btn_actioningresos" type="button" class="btn btn-primary botonnewgrupo" data-action="-">
            <span id="lbl_btn_actioningresos"></span>
        </button>
      </div>
    </div>
  </div>
</div>
<!-- /form modal -->

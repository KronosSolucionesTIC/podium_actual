<!-- Form gastos -->
<div class="modal fade bs-example-modal-lg" id="frm_modal_gastos" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header fondomodalheader">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="imgedicion"></div><h3 class="modal-title titulomodal" id="lbl_form_gastos">-</h3>
      </div>
      <div class="modal-body">
        <!-- form modal contenido -->

                <form id="form_gastos" method="POST">
                    <br>
                    <div class="form-group " hidden>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pkID" name="pkID">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha_gasto" name="fecha_gasto" placeholder="Primer Nombre" required = "true">
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Tipo gasto</label>
                            <select class="form-control" id="fkID_tipo_gasto" name="fkID_tipo_gasto">
                              <option></option>
                              <?php echo $gastosInst->getSelectTipoGasto(); ?>
                            </select>

                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Valor</label>
                            <input type="text" class="form-control" id="valor_gasto" name="valor_gasto" placeholder="Valor Ingreso" >
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Responsable</label>
                            <select class="form-control" id="fkID_profesor" name="fkID_profesor">
                              <option></option>
                              <?php echo $gastosInst->getSelectProfesor(); ?>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Proveedor</label>
                            <select class="form-control" id="fkID_proveedor" name="fkID_proveedor">
                              <option></option>
                              <?php echo $gastosInst->getSelectProveedor(); ?>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Observación</label>
                            <input type="text" class="form-control" id="obs_gasto" name="obs_gasto" placeholder="Observación" >
                    </div>

                </form>

        <!-- /form modal contenido-->
      </div>
      <div class="modal-footer">
        <button id="btn_actiongastos" type="button" class="btn btn-primary botonnewgrupo" data-action="-">
            <span id="lbl_btn_actiongastos"></span>
        </button>
      </div>
    </div>
  </div>
</div>
<!-- /form modal -->

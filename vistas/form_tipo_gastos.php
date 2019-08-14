<!-- Form tipo_gastos -->
<div class="modal fade bs-example-modal-lg" id="frm_modal_tipo_gastos" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header fondomodalheader">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="imgedicion"></div><h3 class="modal-title titulomodal" id="lbl_form_tipo_gastos">-</h3>
      </div>
      <div class="modal-body">
        <!-- form modal contenido -->

                <form id="form_tipo_gastos" method="POST">
                    <br>
                    <div class="form-group " hidden>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pkID" name="pkID">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Nombre</label>
                            <input type="text" class="form-control" id="nom_gas" name="nom_gas" placeholder="Tipo ingreso" required = "true">
                    </div>

                </form>

        <!-- /form modal contenido-->
      </div>
      <div class="modal-footer">
        <button id="btn_actiontipo_gastos" type="button" class="btn btn-primary botonnewgrupo" data-action="-">
            <span id="lbl_btn_actiontipo_gastos"></span>
        </button>
      </div>
    </div>
  </div>
</div>
<!-- /form modal -->

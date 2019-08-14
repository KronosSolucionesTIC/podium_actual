<!-- Form costos -->
<div class="modal fade bs-example-modal-lg" id="frm_modal_costos" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header fondomodalheader">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="imgedicion"></div><h3 class="modal-title titulomodal" id="lbl_form_costos">-</h3>
      </div>
      <div class="modal-body">
        <!-- form modal contenido -->

                <form id="form_costos" method="POST">
                    <br>
                    <div class="form-group " hidden>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pkID" name="pkID">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Costo</label>
                            <input type="text" class="form-control" id="nom_costo" name="nom_costo" placeholder="Costo" required = "true">
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Valor</label>
                            <input type="text" class="form-control" id="val_costo" name="val_costo" placeholder="Valor" required = "true">
                    </div>

                </form>

        <!-- /form modal contenido-->
      </div>
      <div class="modal-footer">
        <button id="btn_actioncostos" type="button" class="btn btn-primary botonnewgrupo" data-action="-">
            <span id="lbl_btn_actioncostos"></span>
        </button>
      </div>
    </div>
  </div>
</div>
<!-- /form modal -->

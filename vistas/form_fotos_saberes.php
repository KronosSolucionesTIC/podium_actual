<!-- Form estudiantes -->
<div class="modal fade bs-example-modal-lg" id="frm_modal_foto_saber" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header fondomodalheader">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="imgedicion"></div><h3 class="modal-title titulomodal" id="lbl_form_foto_saber">-</h3>
      </div>
      <div class="modal-body">
        <!-- form modal contenido -->

                <form id="form_foto_saber" method="POST" enctype="multipart/form-data">
                <br>

                    <div class="form-group " hidden>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pkID" name="pkID">
                        </div>
                    </div>  


                    <div class="form-group">
                        <label for="descripcón" class=" control-label">Descripción</label>
                        <input type="text" class="form-control" id="descripcion_foto_saber" name="descripcion_foto_saber" placeholder="Descripción de la foto" required = "true">
                    </div>

                    <div class="form-group" id="foto_saber">
                        <label for="adjunto" id="lbl_url_foto" class=" control-label">Fotos</label>
                        <input type="file" class="form-control" id="url_foto" name="url_foto[]" required = "true" multiple="" >
                    </div>

                    
                    <div class="form-group " hidden>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fkID_saber" name="fkID_saber" value="<?php echo $pkID_grupo; ?>">
                        </div>
                    </div>

                </form>

        <!-- /form modal contenido-->
      </div>
      <div class="modal-footer">
        <button id="btn_actionfoto_saber" type="button" class="btn btn-primary botonnewgrupo" data-action="-">
            <span id="lbl_btn_actionfoto_saber"></span>
        </button>
      </div>
    </div>
  </div>
</div>
<!-- /form modal -->
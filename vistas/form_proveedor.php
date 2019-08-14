<!-- Form proveedor -->
<div class="modal fade bs-example-modal-lg" id="frm_modal_proveedor" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header fondomodalheader">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="imgedicion"></div><h3 class="modal-title titulomodal" id="lbl_form_proveedor">-</h3>
      </div>
      <div class="modal-body">
        <!-- form modal contenido -->

                <form id="form_proveedor" method="POST">
                    <br>
                    <div class="form-group " hidden>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pkID" name="pkID">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Identificación</label>
                            <input type="text" class="form-control" id="id_prov" name="id_prov" placeholder="Numero de Identificación">
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Primer Nombre</label>
                            <input type="text" class="form-control" id="nom1_prov" name="nom1_prov" placeholder="Primer Nombre" required = "true">
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Segundo Nombre</label>
                            <input type="text" class="form-control" id="nom2_prov" name="nom2_prov" placeholder="Segundo Nombre" >
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Primer Apellido</label>
                            <input type="text" class="form-control" id="apel1_prov" name="apel1_prov" placeholder="Primer Apellido" required = "true">
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Segundo Apellido</label>
                            <input type="text" class="form-control" id="apel2_prov" name="apel2_prov" placeholder="Segundo Apellido">
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Dirección</label>
                            <input type="text" class="form-control" id="dir_prov" name="dir_prov" placeholder="Dirección de Residencia" >
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Celular</label>
                            <input type="text" class="form-control" id="cel1_prov" name="cel1_prov" placeholder="Numero de Celular" >
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Otro celular</label>
                            <input type="text" class="form-control" id="cel2_prov" name="cel2_prov" placeholder="Numero de Celular alternativo">
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Email</label>
                            <input type="text" class="form-control" id="email_prov" name="email_prov" placeholder="Email">
                    </div>

                </form>

        <!-- /form modal contenido-->
      </div>
      <div class="modal-footer">
        <button id="btn_actionproveedor" type="button" class="btn btn-primary botonnewgrupo" data-action="-">
            <span id="lbl_btn_actionproveedor"></span>
        </button>
      </div>
    </div>
  </div>
</div>
<!-- /form modal -->

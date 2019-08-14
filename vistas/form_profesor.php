<!-- Form profesor -->
<div class="modal fade bs-example-modal-lg" id="frm_modal_profesor" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header fondomodalheader">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="imgedicion"></div><h3 class="modal-title titulomodal" id="lbl_form_profesor">-</h3>
      </div>
      <div class="modal-body">
        <!-- form modal contenido -->

                <form id="form_profesor" method="POST">
                    <br>
                    <div class="form-group " hidden>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pkID" name="pkID">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Identificación</label>
                            <input type="text" class="form-control" id="id_pro" name="id_pro" placeholder="Numero de Identificación">
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Primer Nombre</label>
                            <input type="text" class="form-control" id="nom1_pro" name="nom1_pro" placeholder="Primer Nombre" required = "true">
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Segundo Nombre</label>
                            <input type="text" class="form-control" id="nom2_pro" name="nom2_pro" placeholder="Segundo Nombre" >
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Primer Apellido</label>
                            <input type="text" class="form-control" id="apel1_pro" name="apel1_pro" placeholder="Primer Apellido" required = "true">
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Segundo Apellido</label>
                            <input type="text" class="form-control" id="apel2_pro" name="apel2_pro" placeholder="Segundo Apellido">
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Dirección</label>
                            <input type="text" class="form-control" id="dir_pro" name="dir_pro" placeholder="Dirección de Residencia" >
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Celular</label>
                            <input type="text" class="form-control" id="cel1_pro" name="cel1_pro" placeholder="Numero de Celular" >
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Otro celular</label>
                            <input type="text" class="form-control" id="cel2_pro" name="cel2_pro" placeholder="Numero de Celular alternativo">
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Email</label>
                            <input type="text" class="form-control" id="email_pro" name="email_pro" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="fnac_pro" class="control-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fnac_pro" name="fnac_pro" placeholder="Fecha de Nacimiento">
                    </div>

                </form>

        <!-- /form modal contenido-->
      </div>
      <div class="modal-footer">
        <button id="btn_actionprofesor" type="button" class="btn btn-primary botonnewgrupo" data-action="-">
            <span id="lbl_btn_actionprofesor"></span>
        </button>
      </div>
    </div>
  </div>
</div>
<!-- /form modal -->

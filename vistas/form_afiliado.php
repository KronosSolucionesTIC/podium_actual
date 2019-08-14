<!-- Form afiliado -->
<div class="modal fade bs-example-modal-lg" id="frm_modal_afiliado" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header fondomodalheader">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="imgedicion"></div><h3 class="modal-title titulomodal" id="lbl_form_afiliado">-</h3>
      </div>
      <div class="modal-body">
        <!-- form modal contenido -->

                <form id="form_afiliado" method="POST">
                    <br>
                    <div class="form-group " hidden>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pkID" name="pkID">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Identificación</label>
                            <input type="text" class="form-control" id="id_afi" name="id_afi" placeholder="Numero de Identificación">
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Primer Nombre</label>
                            <input type="text" class="form-control" id="nom1_afi" name="nom1_afi" placeholder="Primer Nombre" required = "true">
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Segundo Nombre</label>
                            <input type="text" class="form-control" id="nom2_afi" name="nom2_afi" placeholder="Segundo Nombre" >
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Primer Apellido</label>
                            <input type="text" class="form-control" id="apel1_afi" name="apel1_afi" placeholder="Primer Apellido" required = "true">
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Segundo Apellido</label>
                            <input type="text" class="form-control" id="apel2_afi" name="apel2_afi" placeholder="Segundo Apellido">
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Dirección</label>
                            <input type="text" class="form-control" id="dir_afi" name="dir_afi" placeholder="Dirección de Residencia" >
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Celular</label>
                            <input type="text" class="form-control" id="cel1_afi" name="cel1_afi" placeholder="Numero de Celular" >
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Otro celular</label>
                            <input type="text" class="form-control" id="cel2_afi" name="cel2_afi" placeholder="Numero de Celular alternativo">
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">RH</label>
                            <input type="text" class="form-control" id="rh_afi" name="rh_afi" placeholder="RH">
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label">Email</label>
                            <input type="text" class="form-control" id="email_afi" name="email_afi" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="fkID_eps" class="control-label">EPS</label>
                            <select class="form-control" id="fkID_eps" name="fkID_eps">
                              <option></option>
                              <?php echo $afiliadoInst->getSelectEps(); ?>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="fnac_afi" class="control-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fnac_afi" name="fnac_afi" placeholder="Fecha de Nacimiento">
                    </div>

                    <div class="form-group">
                        <label for="fins_afi" class="control-label">Fecha Inscripción</label>
                        <input type="date" class="form-control" id="fins_afi" name="fins_afi" placeholder="Fecha de Inscripción">
                    </div>

                    <div class="form-group">
                        <label for="fkID_eps" class="control-label">Categoria</label>
                            <select class="form-control" id="fkID_categoria" name="fkID_categoria">
                              <option></option>
                              <?php echo $afiliadoInst->getSelectCategoria(); ?>
                            </select>
                    </div>

                </form>

        <!-- /form modal contenido-->
      </div>
      <div class="modal-footer">
        <button id="btn_actionafiliado" type="button" class="btn btn-primary botonnewgrupo" data-action="-">
            <span id="lbl_btn_actionafiliado"></span>
        </button>
      </div>
    </div>
  </div>
</div>
<!-- /form modal -->

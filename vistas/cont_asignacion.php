<?php

include '../controller/asignacionController.php';

$asignacionInst = new asignacionController();
$arrPermisos    = $asignacionInst->getPermisosModulo_Tipo($id_modulo, $_COOKIE[$NomCookiesApp . '_IDtipo']);
$crea           = $arrPermisos[0]['crear'];

include "form_asignacion.php";
?>

<div id="page-wrapper" style="margin: 0px;">

  <div class="row">

      <input type="hidden" id="id_mod_page_asignacion" value=<?php echo $id_modulo ?>>

      <div class="col-lg-12">
          <h2 class="page-header titleprincipal">Asignación Costos</h2>
      </div>

      <div class="col-lg-12">
        <ol class="breadcrumb migadepan">
          <li><a href="principal.php" class="migadepan">Inicio</a></li>
          <li><a href="personal.php" class="migadepan">Personal</a></li>
          <li class="active migadepan">Asignación costos</li>
        </ol>
      </div>

  </div>
  <div class="row">

      <div class="col-lg-12">

        <div class="panel panel-default">

          <div class="panel-heading" style="background-image: linear-gradient(to bottom,#FFBF00 0,#FFBF00 100%); padding: 5px 15px;">

            <div class="row">
              <div class="col-md-6">
                  <div class="titleprincipal"><h4>Registro de asignacion</h4></div>
              </div>
              <div class="col-md-6 text-right">
                 <button id="btn_nuevoasignacion" type="button"  class="btn btn-primary botonnewgrupo" data-toggle="modal" data-target="#frm_modal_asignacion"  >
                 <span class="glyphicon glyphicon-plus"></span>Nuevo asignacion</button>
              </div>
            </div>

          </div>
          <!-- /.panel-heading -->

        <div class="panel-body">

          <div class="dataTable_wrapper">
              <table class="display table table-striped table-bordered table-hover" id="tbl_asignacion">
                  <thead>
                      <tr>
                          <th>Fecha</th>
                          <th>Afiliado</th>
                          <th>Costo</th>
                          <th>Valor</th>
                          <th data-orderable="false">Opciones</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php echo $asignacionInst->getTablaAsignacion(); ?>
                  </tbody>
              </table>
          </div>
          <!-- /.table-responsive -->

        </div>
        <!-- /.panel-body -->

        </div>
        <!-- /.panel -->

      </div>
      <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->
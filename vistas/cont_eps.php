<?php

include '../controller/epsController.php';

$epsInst     = new epsController();
$arrPermisos = $epsInst->getPermisosModulo_Tipo($id_modulo, $_COOKIE[$NomCookiesApp . '_IDtipo']);
$crea        = $arrPermisos[0]['crear'];

include "form_eps.php";
?>

<div id="page-wrapper" style="margin: 0px;">

  <div class="row">

      <input type="hidden" id="id_mod_page_eps" value=<?php echo $id_modulo ?>>

      <div class="col-lg-12">
          <h2 class="page-header titleprincipal">EPS</h2>
      </div>

      <div class="col-lg-12">
        <ol class="breadcrumb migadepan">
          <li><a href="principal.php" class="migadepan">Inicio</a></li>
          <li><a href="configuracion.php?id_proyectoM=<?php echo $pkID_proyectoM; ?>" class="migadepan">Configuración</a></li>
          <li class="active migadepan"> EPS </li>
        </ol>
      </div>

  </div>
  <div class="row">

      <div class="col-lg-12">

        <div class="panel panel-default">

          <div class="panel-heading" style="background-image: linear-gradient(to bottom,#FFBF00 0,#FFBF00 100%); padding: 5px 15px;">

            <div class="row">
              <div class="col-md-6">
                  <div class="titleprincipal"><h4>Registro de EPS</h4></div>
              </div>
              <div class="col-md-6 text-right">
                 <button id="btn_nuevoeps" type="button"  class="btn btn-primary botonnewgrupo" data-toggle="modal" data-target="#frm_modal_eps"  >
                 <span class="glyphicon glyphicon-plus"></span>Nueva EPS</button>
              </div>
            </div>

          </div>
          <!-- /.panel-heading -->

        <div class="panel-body">

          <div class="dataTable_wrapper">
              <table class="display table table-striped table-bordered table-hover" id="tbl_eps">
                  <thead>
                      <tr>
                          <th>Nombre</th>
                          <th data-orderable="false">Opciones</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php echo $epsInst->getTablaEps(); ?>
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
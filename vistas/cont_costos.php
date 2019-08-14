<?php

include '../controller/costosController.php';

$costosInst  = new costosController();
$arrPermisos = $costosInst->getPermisosModulo_Tipo($id_modulo, $_COOKIE[$NomCookiesApp . '_IDtipo']);
$crea        = $arrPermisos[0]['crear'];

include "form_costos.php";
?>

<div id="page-wrapper" style="margin: 0px;">

  <div class="row">

      <input type="hidden" id="id_mod_page_costos" value=<?php echo $id_modulo ?>>

      <div class="col-lg-12">
          <h2 class="page-header titleprincipal">Costos</h2>
      </div>

      <div class="col-lg-12">
        <ol class="breadcrumb migadepan">
          <li><a href="principal.php" class="migadepan">Inicio</a></li>
          <li><a href="configuracion.php" class="migadepan">Configuración</a></li>
          <li class="active migadepan">Costos </li>
        </ol>
      </div>

  </div>
  <div class="row">

      <div class="col-lg-12">

        <div class="panel panel-default">

          <div class="panel-heading" style="background-image: linear-gradient(to bottom,#FFBF00 0,#FFBF00 100%); padding: 5px 15px;">

            <div class="row">
              <div class="col-md-6">
                  <div class="titleprincipal"><h4>Registro de costos</h4></div>
              </div>
              <div class="col-md-6 text-right">
                 <button id="btn_nuevocostos" type="button"  class="btn btn-primary botonnewgrupo" data-toggle="modal" data-target="#frm_modal_costos"  >
                 <span class="glyphicon glyphicon-plus"></span>Nuevos costos</button>
              </div>
            </div>

          </div>
          <!-- /.panel-heading -->

        <div class="panel-body">

          <div class="dataTable_wrapper">
              <table class="display table table-striped table-bordered table-hover" id="tbl_costos">
                  <thead>
                      <tr>
                          <th>Nombre</th>
                          <th>Valor</th>
                          <th data-orderable="false">Opciones</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php echo $costosInst->getTablaCostos(); ?>
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
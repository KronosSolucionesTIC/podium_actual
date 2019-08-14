<?php

include '../controller/gastosController.php';

$gastosInst  = new gastosController();
$arrPermisos = $gastosInst->getPermisosModulo_Tipo($id_modulo, $_COOKIE[$NomCookiesApp . '_IDtipo']);
$crea        = $arrPermisos[0]['crear'];

include "form_gastos.php";
?>

<div id="page-wrapper" style="margin: 0px;">

  <div class="row">

      <input type="hidden" id="id_mod_page_gastos" value=<?php echo $id_modulo ?>>

      <div class="col-lg-12">
          <h2 class="page-header titleprincipal"><img src="../img/botones/gastosesonly.png"> - Gastos</h2>
      </div>

      <div class="col-lg-12">
        <ol class="breadcrumb migadepan">
          <li><a href="principal.php" class="migadepan">Inicio</a></li>
          <li><a href="personal.php" class="migadepan">Personal</a></li>
          <li class="active migadepan">gastos</li>
        </ol>
      </div>

  </div>
  <div class="row">

      <div class="col-lg-12">

        <div class="panel panel-default">

          <div class="panel-heading" style="background-image: linear-gradient(to bottom,#FFBF00 0,#FFBF00 100%); padding: 5px 15px;">

            <div class="row">
              <div class="col-md-6">
                  <div class="titleprincipal"><h4>Registro de gastos</h4></div>
              </div>
              <div class="col-md-6 text-right">
                 <button id="btn_nuevogastos" type="button"  class="btn btn-primary botonnewgrupo" data-toggle="modal" data-target="#frm_modal_gastos"  >
                 <span class="glyphicon glyphicon-plus"></span>Nuevo gastos</button>
              </div>
            </div>

          </div>
          <!-- /.panel-heading -->

        <div class="panel-body">

          <div class="dataTable_wrapper">
              <table class="display table table-striped table-bordered table-hover" id="tbl_gastos">
                  <thead>
                      <tr>
                          <th>Fecha</th>
                          <th>Proveedor</th>
                          <th>Tipo ingreso</th>
                          <th>Valor</th>
                          <th data-orderable="false">Opciones</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php echo $gastosInst->getTablaGastos(); ?>
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
<?php

include '../controller/tipo_gastosController.php';

$tipo_gastosInst = new tipo_gastosController();
$arrPermisos     = $tipo_gastosInst->getPermisosModulo_Tipo($id_modulo, $_COOKIE[$NomCookiesApp . '_IDtipo']);
$crea            = $arrPermisos[0]['crear'];

include "form_tipo_gastos.php";
?>

<div id="page-wrapper" style="margin: 0px;">

  <div class="row">

      <input type="hidden" id="id_mod_page_tipo_gastos" value=<?php echo $id_modulo ?>>

      <div class="col-lg-12">
          <h2 class="page-header titleprincipal">Tipo gastos</h2>
      </div>

      <div class="col-lg-12">
        <ol class="breadcrumb migadepan">
          <li><a href="principal.php" class="migadepan">Inicio</a></li>
          <li><a href="configuracion.php" class="migadepan">Configuración</a></li>
          <li class="active migadepan"> Tipo gastos </li>
        </ol>
      </div>

  </div>
  <div class="row">

      <div class="col-lg-12">

        <div class="panel panel-default">

          <div class="panel-heading" style="background-image: linear-gradient(to bottom,#FFBF00 0,#FFBF00 100%); padding: 5px 15px;">

            <div class="row">
              <div class="col-md-6">
                  <div class="titleprincipal"><h4>Registro de Tipo gastos</h4></div>
              </div>
              <div class="col-md-6 text-right">
                 <button id="btn_nuevotipo_gastos" type="button"  class="btn btn-primary botonnewgrupo" data-toggle="modal" data-target="#frm_modal_tipo_gastos"  >
                 <span class="glyphicon glyphicon-plus"></span>Nuevos Tipo gastos</button>
              </div>
            </div>

          </div>
          <!-- /.panel-heading -->

        <div class="panel-body">

          <div class="dataTable_wrapper">
              <table class="display table table-striped table-bordered table-hover" id="tbl_tipo_gastos">
                  <thead>
                      <tr>
                          <th>Nombre</th>
                          <th data-orderable="false">Opciones</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php echo $tipo_gastosInst->getTablaTipo_gastos(); ?>
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
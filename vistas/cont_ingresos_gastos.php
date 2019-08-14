<?php

include '../controller/ingresos_gastosController.php';

$ingresos_gastosInst = new ingresos_gastosController();
$arrPermisos         = $ingresos_gastosInst->getPermisosModulo_Tipo($id_modulo, $_COOKIE[$NomCookiesApp . '_IDtipo']);
$crea                = $arrPermisos[0]['crear'];

include "form_ingresos_gastos.php";
?>

<div id="page-wrapper" style="margin: 0px;">

  <div class="row">

      <input type="hidden" id="id_mod_page_ingresos_gastos" value=<?php echo $id_modulo ?>>

      <div class="col-lg-12">
          <h2 class="page-header titleprincipal">Reporte de Ingresos y Gastos</h2>
      </div>

      <div class="col-lg-12">
        <ol class="breadcrumb migadepan">
          <li><a href="principal.php" class="migadepan">Inicio</a></li>
          <li><a href="reportes.php" class="migadepan">Reportes</a></li>
          <li class="active migadepan">Reporte de Ingresos y Gastos</li>
        </ol>
      </div>

  </div>
  <div class="row">

      <div class="col-lg-12">

        <div class="panel panel-default">

          <div class="panel-heading" style="background-image: linear-gradient(to bottom,#FFBF00 0,#FFBF00 100%); padding: 5px 15px;">

            <div class="row">
              <div class="col-md-6">
                  <div class="titleprincipal"><h4></h4></div>
              </div>
              <div class="col-md-6 text-right">
              </div>
            </div>

          </div>
          <!-- /.panel-heading -->

        <div class="panel-body">

          <form action="informe_ingresos_gastos.php" POST>
            <div class="form-group">
              <label for="exampleInputEmail1">Fecha de inicio</label>
              <input type="date" class="form-control" id="fec_ini" name="fec_ini">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Fecha fin</label>
              <input type="date" class="form-control" id="fec_fin" name="fec_fin">
            </div>
            <div class="form-group text-center">
              <!-- Button trigger modal -->
              <button type="submit" class="btn btn-primary">
                Ver Reporte
              </button>
            </div>
          </form>
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
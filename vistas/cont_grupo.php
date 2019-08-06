<?php

//ini_set('error_reporting', E_ALL|E_STRICT);
//ini_set('display_errors', 1);
include '../controller/docentesController.php';

include '../controller/grupoController.php';

include '../conexion/datos.php';

$docentesInst = new docentesController();

$arrPermisosD = $docentesInst->getPermisosModulo_Tipo(26, $_COOKIE[$NomCookiesApp . '_IDtipo']);

$creaD = $arrPermisosD[0]['crear'];

$pkID_user = $_COOKIE[$NomCookiesApp . '_id'];

if (isset($_GET["anio"])) {
    $filtro = $_GET["anio"];
} else {
    $filtro = "Todos";
}
if (isset($_GET["tipo"])) {
    $filtro2 = $_GET["tipo"];
} else {
    $filtro2 = "Todos";
}
//print_r($pkID_user);

$pkID_tipo_user = $_COOKIE[$NomCookiesApp . '_IDtipo'];

//print_r($pkID_tipo_user);
$pkID_grupo = $_GET["id_grupo"];

$grupoInst = new grupoController();

$arrPermisos = $grupoInst->getPermisosModulo_Tipo($id_modulo, $_COOKIE[$NomCookiesApp . '_IDtipo']);

$crea = $arrPermisos[0]['crear'];

$pkID_proyectoM = $_GET["id_proyectoM"];
$proyectoMGen   = $docentesInst->getProyectosMarcoId($pkID_proyectoM);

include "form_grupo.php";
include "form_novedades.php";

?>

<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  -->

<div id="page-wrapper" style="margin: 0px;">

  <div class="row">
    <!-- Campo que contiene el valor del id del modulo para auditoria con el nombre del modulo-->
      <input type="hidden" id="id_mod_page_grupo" value=<?php echo $id_modulo ?>>


      <div class="col-lg-12">
          <h1 class="page-header titleprincipal"><img src="../img/botones/grupoonly.png"><?php echo $proyectoMGen[0]["nombre"] ?> - Grupos</h1>
      </div>
      <!-- /.col-lg-12 -->
    <div class="col-md-5">
          <ol class="breadcrumb migadepan">
            <li><a href="proyecto_marco.php" class="migadepan">Inicio</a></li>
            <li><a href="descripcion.php?id_proyectoM=<?php echo $pkID_proyectoM; ?>" class="migadepan">Descripción</a></li>
            <li><a href="principal.php?id_proyectoM=<?php echo $pkID_proyectoM; ?>" class="migadepan">Menú principal</a></li>
            <li><a href="academico.php?id_proyectoM=<?php echo $pkID_proyectoM; ?>" class="migadepan">Académico</a></li>
            <li class="active migadepan">Grupos </li>
          </ol>
    </div>

    <div class="col-md-4 text-right form-inline">
                    <label for="grupo_filtrop" class="control-label">Tipo de Grupo: </label>
                      <?php
$grupoInst->getSelectTipogrupoFiltro();
?>
     </div>
    <div class="col-md-2 text-center form-inline">
                    <label for="grupo_filtrop" class="control-label">Año: </label>
                      <?php
$grupoInst->getSelectAnioFiltro();
?>
     </div>
    <div class="col-md-1 text-left form-inline">
                     <button class="btn btn-success" id="btn_filtro_anio"><span class="glyphicon glyphicon-filter"></span> Filtrar</button>

                     <hr>

            </div>

  </div>
  <!-- /.row -->

  <div class="row">

    <?php //echo 'el perfil es '.$_COOKIE["log_lunelAdmin_tipo"];; ?>

      <div class="col-lg-12">

        <div class="panel panel-default">

          <div class="titulohead">

            <div class="row">
              <div class="col-md-6">
                  <div class="titleprincipal"><h4>Registro de Grupos - <?php echo $proyectoMGen[0]["nombre"] ?></h4></div>
              </div>
              <div class="col-md-6 text-right">
                 <button id="btn_nuevogrupo" type="button" class="btn btn-primary botonnewgrupo" data-toggle="modal" data-proyecto="<?php echo $pkID_proyectoM; ?>" data-target="#frm_modal_grupo" <?php if ($crea != 1) {echo 'disabled="disabled"';}?> >
                 <span class="glyphicon glyphicon-plus"></span>Nuevo Grupo</button>
              </div>
            </div>

          </div>
          <!-- /.panel-heading -->

        <div class="panel-body">

          <div class="dataTable_wrapper">
              <table class="display table table-striped table-bordered table-hover" id="tbl_grupo">
                  <thead>
                      <tr>
                         <!-- <th>ID Grupo</th>-->
                          <th>Nombre</th>
                          <th >Tipo de Proyecto</th>
                          <th>Año</th>
                          <th>Institución</th>
                          <th>Grado</th>
                          <th data-orderable="false">Opciones</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php
//print_r($_COOKIE);
//echo "valor de cookie de tipo ".$_COOKIE[$NomCookiesApp."_tipo"];
if (($pkID_tipo_user == 8) || ($pkID_tipo_user == 9)) {
    $grupoInst->getTablaGruposUsuario($pkID_user);
} else {
    $grupoInst->getTablaGrupo($pkID_proyectoM, $filtro, $filtro2);
}
?>
                  </tbody>
              </table>
              <div class="col-md-6 text-right">
                                <label for="total_ingresos" class="control-label"><B>Total Estudiantes</B></label>
              </div>
                                <div class="input-group col-md-2 text-left">
                                   <?php $grupoInst->getSelectTotal($pkID_proyectoM, $filtro, $filtro2);?>
                                </div>
                            </div>
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



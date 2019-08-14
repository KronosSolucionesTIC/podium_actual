<?php
include "../conexion/datos.php";
//--------------------------------------------------------------------
include '../controller/principalController.php';
//--------------------------------------------------------------------
//intancias menu principal
$principalInst  = new principalController();
$pkID_proyectoM = $_GET["id_proyectoM"];
$proyectoMGen   = $principalInst->getProyectosMarcoId($pkID_proyectoM);
//--------------------------------------------------------------------
?>

<div id="page-principal" style="margin: 0px;">

             <!-- Contenido del Index -->
             <div class="row">
                <div class="col-lg-12">
                    <!--<h1 class="page-header">SISEP <h4>Sistema de Información, Seguimiento y Evaluación Permanente</h4>  </h1>--><br>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <div class="titulohead">
                            <div class="text-center titulo-menu"><h3>Configuración</h3></div>
                        </div>
                        <div class="panel-body">

                            <div class="col-lg-12">
                                  <ol class="breadcrumb migadepan">
                                    <li><a href="principal.php" class="migadepan">Inicio</a></li>
                                    <li class="active migadepan">Configuración</li>
                                  </ol>
                              </div>

                            <!-- contenedor de los registros-->
                            <div class="col-lg-12">

                                <!-- contenido de las tablas -->
                                <div class="tab-content">

                                    <!-- Pestaña grupoInv -->
                                    <div role="tabpanel" class="tab-pane active" id="grupoInv">

                                        <br>

                                        <div class="">
                                            <div class="">
                                                <div class="col-md-2 zoom"><a class="" href="eps.php"><img class="zoom" src="../img/botones/instituciones.png"></a></div>
                                                <div class="col-md-2 zoom"><a class="" href="categoria.php"><img  class="zoom" src="../img/botones/docentes.png"></a></div>
                                                <div class="col-md-2 zoom"><a class="" href="costos.php"><img  class="zoom" src="../img/botones/estudiantes.png"></a></div>
                                                <div class="col-md-2 zoom"><a class="" href="tipo_ingresos.php"><img class="zoom" src="../img/botones/funcionarios.png"></a></div>
                                                <div class="col-md-2 zoom"><a class="" href="tipo_gastos.php"><img class="zoom" src="../img/botones/participantes.png"></a></div>
                                                <div class="col-md-2 zoom"><a class="" href="proveedor.php"><img class="zoom" src="../img/botones/participantes.png"></a></div>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- /.Pestaña grupoInv -->


                                    </div>
                                    <!-- /.Pestaña config -->

                                </div>
                                <!-- ./contenido de las tablas -->

                            </div>
                            <!-- ./contenedor de los registros-->

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

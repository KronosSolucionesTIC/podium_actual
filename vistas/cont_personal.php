<?php
include "../conexion/datos.php";
//--------------------------------------------------------------------
include '../controller/personalController.php';
//--------------------------------------------------------------------
//intancias menu personal
$personalInst   = new personalController();
$pkID_proyectoM = $_GET["id_proyectoM"];
$proyectoMGen   = $personalInst->getProyectosMarcoId($pkID_proyectoM);
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
                            <div class="text-center titulo-menu"><h3>Menú personal</h3></div>
                        </div>
                        <div class="panel-body">

                            <div class="col-lg-12">
                                  <ol class="breadcrumb migadepan">
                                    <li><a href="principal.php" class="migadepan">Inicio</a></li>
                                    <li class="active migadepan">Personal</li>
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
                                                <div class="col-md-3 zoom text-center"><a class="" href="afiliado.php"><img class="zoom" src="../img/talento_humano.png"></a></div>
                                                <div class="col-md-3 zoom text-center"><a class="" href="asignacion.php"><img  class="zoom" src="../img/academico.png"></a></div>
                                                <div class="col-md-3 zoom text-center"><a class="" href="habilitar.php"><img class="zoom" src="../img/cientifico.png"></a></div>
                                                <div class="col-md-3 zoom text-center"><a class="" href="profesor.php"><img class="zoom" src="../img/talento_humano.png"></a></div>
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

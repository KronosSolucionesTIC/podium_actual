<?php

/*
----------------------------------------------------------------------------------------
Nombre de las cookies que viene del archivo de datos, según sea el nombre de la app.
 */
include '../conexion/datos.php';
//--------------------------------------------------------------------------------------

$nombre = $_COOKIE[$NomCookiesApp . "_nombre"];
$alias  = $_COOKIE[$NomCookiesApp . "_alias"];
$tipo   = $_COOKIE[$NomCookiesApp . "_tipo"];

?>
      <!-- Navigation -->
        <nav class="estilonav2 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-image: linear-gradient(to bottom,#1a7679 0,#139498 100%) !important;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="col-md-12">
                <div class="text-center col-md-2"><a class="logo-sisep" title="Seleccionar Proyecto Marco" href="principal.php"><img src="../img/logo.png"></a></div>
                <div class="text-center fuente col-md-10" style="color: #fff; font-size: 20px; padding-left: 55px;margin-top: 10px;">Sistema de Información, Seguimiento y Evaluación Permanente</div>
                </div>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right" style="margin-right: 0px !important;">
                <li class="dropdown">
                    <a class="dropdown-toggle tituloUser" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo $nombre ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> </a>
                        </li>-->
                        <li class="dropdown-header">Configuración</li>

                        <?php

if (($tipo == "Administrador")) {
    # code...
    //if($ProyectoM <> ''){
    echo '<li class="modulo-usuarios"><a href="usuarios.php"><i class="fa fa-user fa-fw"></i> <ins>Usuarios</ins></a>';
    //}
    echo '<li class="modulo-roles"><a href="roles.php"><i class="fa fa-wrench fa-fw"></i> <ins>Roles</ins></a>';
} else {
    echo '<li><a href="usuarios.php"><i class="fa fa-user fa-fw"></i> <ins>Editar Perfil</ins></a>';
}
?>

                        <li class="dropdown-header">Tipo de Usuario</li>
                        <li><a href="#"><i class="fa fa-tag fa-fw"></i> <?php echo $tipo ?></a></li>
                        <li class="divider"></li>
                        <li><a href="../controller/logout.php"><i class="fa fa-sign-out fa-fw"></i> <ins>Salir</ins></a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

        </nav>
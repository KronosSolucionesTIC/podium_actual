<?php

/**/
include '../controller/muestra_pagina.php';

$muestra_asignacion = new mostrar();

//---------------------------------------------------------
$pagina    = 'cont_asignacion.php';
$scripts   = array('cont_asignacion.js');
$id_modulo = 1;
//---------------------------------------------------------

$muestra_asignacion->mostrar_pagina_scripts($pagina, $scripts, $id_modulo);

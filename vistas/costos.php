<?php

/**/
include '../controller/muestra_pagina.php';

$muestra_costos = new mostrar();

//---------------------------------------------------------
$pagina    = 'cont_costos.php';
$scripts   = array('cont_costos.js');
$id_modulo = 1;
//---------------------------------------------------------

$muestra_costos->mostrar_pagina_scripts($pagina, $scripts, $id_modulo);

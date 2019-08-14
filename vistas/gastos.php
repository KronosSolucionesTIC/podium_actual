<?php

/**/
include '../controller/muestra_pagina.php';

$muestra_gastos = new mostrar();

//---------------------------------------------------------
$pagina    = 'cont_gastos.php';
$scripts   = array('cont_gastos.js');
$id_modulo = 1;
//---------------------------------------------------------

$muestra_gastos->mostrar_pagina_scripts($pagina, $scripts, $id_modulo);

<?php

/**/
include '../controller/muestra_pagina.php';

$muestra_tipo_gastos = new mostrar();

//---------------------------------------------------------
$pagina    = 'cont_tipo_gastos.php';
$scripts   = array('cont_tipo_gastos.js');
$id_modulo = 1;
//---------------------------------------------------------

$muestra_tipo_gastos->mostrar_pagina_scripts($pagina, $scripts, $id_modulo);

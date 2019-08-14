<?php

/**/
include '../controller/muestra_pagina.php';

$muestra_ingresos_gastos = new mostrar();

//---------------------------------------------------------
$pagina    = 'cont_informe_ingresos_gastos.php';
$scripts   = array('cont_ingresos_gastos.js');
$id_modulo = 1;
//---------------------------------------------------------

$muestra_ingresos_gastos->mostrar_pagina_scripts($pagina, $scripts, $id_modulo);

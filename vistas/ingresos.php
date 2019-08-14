<?php

/**/
include '../controller/muestra_pagina.php';

$muestra_ingresos = new mostrar();

//---------------------------------------------------------
$pagina    = 'cont_ingresos.php';
$scripts   = array('cont_ingresos.js');
$id_modulo = 1;
//---------------------------------------------------------

$muestra_ingresos->mostrar_pagina_scripts($pagina, $scripts, $id_modulo);

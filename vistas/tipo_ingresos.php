<?php

/**/
include '../controller/muestra_pagina.php';

$muestra_tipo_ingresos = new mostrar();

//---------------------------------------------------------
$pagina    = 'cont_tipo_ingresos.php';
$scripts   = array('cont_tipo_ingresos.js');
$id_modulo = 1;
//---------------------------------------------------------

$muestra_tipo_ingresos->mostrar_pagina_scripts($pagina, $scripts, $id_modulo);

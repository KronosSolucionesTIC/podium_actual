<?php

/**/
include '../controller/muestra_pagina.php';

$muestra_proveedor = new mostrar();

//---------------------------------------------------------
$pagina    = 'cont_proveedor.php';
$scripts   = array('cont_proveedor.js');
$id_modulo = 1;
//---------------------------------------------------------

$muestra_proveedor->mostrar_pagina_scripts($pagina, $scripts, $id_modulo);

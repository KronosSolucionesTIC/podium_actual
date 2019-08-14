<?php

/**/
include '../controller/muestra_pagina.php';

$muestra_habilitar = new mostrar();

//---------------------------------------------------------
$pagina    = 'cont_habilitar.php';
$scripts   = array('cont_habilitar.js');
$id_modulo = 1;
//---------------------------------------------------------

$muestra_habilitar->mostrar_pagina_scripts($pagina, $scripts, $id_modulo);

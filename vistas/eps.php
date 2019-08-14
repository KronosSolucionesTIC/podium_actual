<?php

/**/
include '../controller/muestra_pagina.php';

$muestra_eps = new mostrar();

//---------------------------------------------------------
$pagina    = 'cont_eps.php';
$scripts   = array('cont_eps.js');
$id_modulo = 1;
//---------------------------------------------------------

$muestra_eps->mostrar_pagina_scripts($pagina, $scripts, $id_modulo);

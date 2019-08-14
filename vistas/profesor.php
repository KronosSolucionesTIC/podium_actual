<?php

/**/
include '../controller/muestra_pagina.php';

$muestra_profesor = new mostrar();

//---------------------------------------------------------
$pagina    = 'cont_profesor.php';
$scripts   = array('cont_profesor.js');
$id_modulo = 1;
//---------------------------------------------------------

$muestra_profesor->mostrar_pagina_scripts($pagina, $scripts, $id_modulo);

<?php

/**/
include '../controller/muestra_pagina.php';

$muestra_afiliado = new mostrar();

//---------------------------------------------------------
$pagina    = 'cont_afiliado.php';
$scripts   = array('cont_afiliado.js');
$id_modulo = 1;
//---------------------------------------------------------

$muestra_afiliado->mostrar_pagina_scripts($pagina, $scripts, $id_modulo);

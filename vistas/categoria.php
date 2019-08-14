<?php

/**/
include '../controller/muestra_pagina.php';

$muestra_categoria = new mostrar();

//---------------------------------------------------------
$pagina    = 'cont_categoria.php';
$scripts   = array('cont_categoria.js');
$id_modulo = 1;
//---------------------------------------------------------

$muestra_categoria->mostrar_pagina_scripts($pagina, $scripts, $id_modulo);

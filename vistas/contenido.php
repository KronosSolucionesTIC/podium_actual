<?php

/**/
include '../controller/muestra_pagina.php';

$muestra_grupo = new mostrar();

//---------------------------------------------------------
$pagina    = 'cont_contenido.php';
$scripts   = array('test_validaPV3.js', 'cont_detalles_contenido.js', 'cont_contenido.js', 'cont_filtro_anio.js');
$id_modulo = 26;
//---------------------------------------------------------

$muestra_grupo->mostrar_pagina_scripts($pagina, $scripts, $id_modulo);

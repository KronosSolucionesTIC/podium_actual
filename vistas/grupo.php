<?php
	
	/**/
	include('../controller/muestra_pagina.php');
	
	$muestra_grupo = new mostrar();
	
	//---------------------------------------------------------
	$pagina = 'cont_grupo.php';
	$scripts = array('test_validaPV3.js','cont_grupo.js');
	$id_modulo = 12;
	//---------------------------------------------------------
	
	$muestra_grupo->mostrar_pagina_scripts($pagina,$scripts,$id_modulo);
?>

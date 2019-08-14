<?php

include '../controller/valida.php';

include '../DAO/proyecto_marcoDAO.php';

$login = new valida();

$proyectoM_inst = new proyecto_marcoDAO();

function valida_login()
{

    global $login;
    global $proyectoM_inst;

    $valida_login = $login->valida_vals();

    if ($valida_login) {
        //validar que tipo de rol es
        //si es 8 o 9 debera consultar en que proyecto M
        //esta asignado, si hay 1 entonces redireccionar al
        //detalle de proyecto marco

        $proyectosM = $proyectoM_inst->getProyectosMarco($login->getIdUser());

        //si el usuario es docente o estudiante
        if (($login->getIDtipo() == 8) || ($login->getIDtipo() == 9)) {
            //--------------------------------------------------------
            //se consulta en que proyectoM se encuentra asociado
            //echo $login->getIDtipo()." ok";

            //print_r($proyectosM);

            header('Location: detalles_proyectoM.php?id_proyectoM=' . $proyectosM[0]["pkID"] . '&nom_proyectoM=' . $proyectosM[0]["nombre"]);
            //--------------------------------------------------------
        } else {
            //es de otro perfil y lo envia a escoger proyecto marco
            header('Location: principal.php');
        }

    } else {
        # code...
        //echo "No esta logueado.";
        header('Location: cont_login.php');
    }
}

valida_login();

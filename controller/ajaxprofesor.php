<?php

include '../DAO/genericoDAO.php';

class Generico_DAO
{

    use GenericoDAO;

}

$r         = array();
$tipo      = isset($_POST['tipo']) ? $_POST['tipo'] : "";
$id        = isset($_POST['pkID']) ? $_POST['pkID'] : "";
$nom1_pro  = isset($_POST['nom1_pro']) ? $_POST['nom1_pro'] : "";
$nom2_pro  = isset($_POST['nom2_pro']) ? $_POST['nom2_pro'] : "";
$apel1_pro = isset($_POST['apel1_pro']) ? $_POST['apel1_pro'] : "";
$apel2_pro = isset($_POST['apel2_pro']) ? $_POST['apel2_pro'] : "";
$id_pro    = isset($_POST['id_pro']) ? $_POST['id_pro'] : "";
$dir_pro   = isset($_POST['dir_pro']) ? $_POST['dir_pro'] : "";
$email_pro = isset($_POST['email_pro']) ? $_POST['email_pro'] : "";
$cel1_pro  = isset($_POST['cel1_pro']) ? $_POST['cel1_pro'] : "";
$cel2_pro  = isset($_POST['cel2_pro']) ? $_POST['cel2_pro'] : "";
$fnac_pro  = isset($_POST['fnac_pro']) ? $_POST['fnac_pro'] : "";

switch ($tipo) {
    case 'crear':
        $generico = new Generico_DAO();
        if (isset($_FILES['file']["name"])) {
            $nombre = $_FILES['file']["name"];
        } else {
            $nombre = "";
        }

        if ($nombre != "") {
            $nombre  = str_replace(" ", "_", $nombre);
            $destino = "../vistas/fotos/" . $nombre;
            if (move_uploaded_file($_FILES['file']["tmp_name"], $destino)) {
                $nombre = $nombre;
            } else {
                $nombre = "";
            }
        }
        $q_inserta  = "INSERT INTO `profesor`(nom1_pro, nom2_pro, apel1_pro, apel2_pro, id_pro, dir_pro, email_pro, cel1_pro, cel2_pro, fnac_pro, foto_pro) VALUES ('$nom1_pro', '$nom2_pro', '$apel1_pro', '$apel2_pro', '$id_pro', '$dir_pro','$email_pro', '$cel1_pro', '$cel2_pro', '$fnac_pro', '$nombre')";
        $r["query"] = $q_inserta;

        $resultado = $generico->EjecutaInsertar($q_inserta);
        if ($resultado) {

            $r[] = $resultado;

        } else {

            $r["estado"]  = "Error";
            $r["mensaje"] = "No se inserto.";
        }

        break;
    case 'editar':
        $generico = new Generico_DAO();
        if (isset($_FILES['file']["name"])) {
            $nombre = $_FILES['file']["name"];
        } else {
            $nombre = "";
        }
        if ($nombre != "") {
            $nombre  = str_replace(" ", "_", $nombre);
            $destino = "../vistas/fotos/" . $nombre;
            if (move_uploaded_file($_FILES['file']["tmp_name"], $destino)) {
                $q_inserta  = "UPDATE `profesor` SET `nom1_pro`='$nom1_pro',`nom2_pro`='$nom2_pro',`apel1_pro`='$apel1_pro',`apel2_pro`='$apel2_pro',id_pro='$id_pro', dir_pro='$dir_pro', email_pro='$email_pro', cel1_pro='$cel1_pro', cel2_pro='$cel2_pro', foto_pro='$nombre',fnac_pro='$fnac_pro' where pkID='$id'";
                $r["query"] = $q_inserta;
            } else {
                $r["mensaje"] = "No se inserto en el servidor.";
            }
        } else {
            $q_inserta  = "UPDATE `profesor` SET `nom1_pro`='$nom1_pro',`nom2_pro`='$nom2_pro',`apel1_pro`='$apel1_pro',`apel2_pro`='$apel2_pro',id_pro='$id_pro', dir_pro='$dir_pro', email_pro='$email_pro', cel1_pro='$cel1_pro', cel2_pro='$cel2_pro',fnac_pro='$fnac_pro' where pkID='$id'";
            $r["query"] = $q_inserta;
        }
        $resultado = $generico->EjecutaActualizar($q_inserta);
        /**/
        if ($resultado) {
            $r[] = $resultado;

        } else {
            $r["estado"]  = "Error";
            $r["mensaje"] = "No se inserto.";
        }
        echo json_encode($nombre);
        break;
    case 'eliminarlogico':
        $generico   = new Generico_DAO();
        $q_inserta  = "update `saber_propio` SET estadoV=2 where pkID='$id'";
        $r["query"] = $q_inserta;
        $resultado  = $generico->EjecutaActualizar($q_inserta);
        /**/
        if ($resultado) {
            $r[] = $resultado;

        } else {
            $r["estado"]  = "Error";
            $r["mensaje"] = "No se inserto.";
        }
        break;
    case 'eliminararchivo':
        $generico   = new Generico_DAO();
        $q_inserta  = "UPDATE profesor SET foto_pro='' where pkID='$id' ";
        $r["query"] = $q_inserta;
        $resultado  = $generico->EjecutaActualizar($q_inserta);
        if ($resultado) {
            $r[] = $resultado;
        } else {
            $r["estado"]  = "Error";
            $r["mensaje"] = "No se inserto.";
        }
        break;
    case 'crear_foto':
        $generico = new Generico_DAO();
        if ($descripcion_foto == "") {
            $descripcion_foto = "foto";
        }
        if (!empty($_FILES['url_foto'])) {
            // File upload configuration
            $targetDir  = "../img/";
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

            $images_arr = array();
            foreach ($_FILES['url_foto']['name'] as $key => $val) {
                $image_name = $_FILES['url_foto']['name'][$key];

                // File upload path
                $fileName       = basename($_FILES['url_foto']['name'][$key]);
                $targetFilePath = $targetDir . $fileName;

                // Check whether file type is valid
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                if (in_array($fileType, $allowTypes)) {
                    // Store images on the server
                    if (move_uploaded_file($_FILES['url_foto']['tmp_name'][$key], $targetFilePath)) {
                        $nombre     = $_FILES['url_foto']['name'][$key];
                        $q_inserta  = "insert into `fotos_saber`(`url_foto`, `descripcion`, `fkID_saber`) VALUES ('$nombre', '$descripcion_foto', '$fkID_saber')";
                        $r["query"] = $q_inserta;

                        $resultado = $generico->EjecutaInsertar($q_inserta);

                        if ($resultado) {

                            $r[] = $resultado;

                        } else {

                            $r["estado"]  = "Error";
                            $r["mensaje"] = "No se inserto.";
                        }
                    }
                }
            }
        }
        break;
    default:
        # code...
        break;
}

echo json_encode($r);

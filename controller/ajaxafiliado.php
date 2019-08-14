<?php

include '../DAO/genericoDAO.php';

class Generico_DAO
{

    use GenericoDAO;

}

$r              = array();
$tipo           = isset($_POST['tipo']) ? $_POST['tipo'] : "";
$id             = isset($_POST['pkID']) ? $_POST['pkID'] : "";
$nom1_afi       = isset($_POST['nom1_afi']) ? $_POST['nom1_afi'] : "";
$nom2_afi       = isset($_POST['nom2_afi']) ? $_POST['nom2_afi'] : "";
$apel1_afi      = isset($_POST['apel1_afi']) ? $_POST['apel1_afi'] : "";
$apel2_afi      = isset($_POST['apel2_afi']) ? $_POST['apel2_afi'] : "";
$id_afi         = isset($_POST['id_afi']) ? $_POST['id_afi'] : "";
$dir_afi        = isset($_POST['dir_afi']) ? $_POST['dir_afi'] : "";
$email_afi      = isset($_POST['email_afi']) ? $_POST['email_afi'] : "";
$rh_afi         = isset($_POST['rh_afi']) ? $_POST['rh_afi'] : "";
$cel1_afi       = isset($_POST['cel1_afi']) ? $_POST['cel1_afi'] : "";
$cel2_afi       = isset($_POST['cel2_afi']) ? $_POST['cel2_afi'] : "";
$fkID_eps       = isset($_POST['fkID_eps']) ? $_POST['fkID_eps'] : "";
$fkID_categoria = isset($_POST['fkID_categoria']) ? $_POST['fkID_categoria'] : "";
$fnac_afi       = isset($_POST['fnac_afi']) ? $_POST['fnac_afi'] : "";
$fins_afi       = isset($_POST['fins_afi']) ? $_POST['fins_afi'] : "";

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
        $q_inserta  = "INSERT INTO `afiliado`(nom1_afi, nom2_afi, apel1_afi, apel2_afi, id_afi, dir_afi, email_afi, cel1_afi, cel2_afi, fnac_afi, fins_afi, fkID_eps,fkID_categoria, rh_afi, foto_afi) VALUES ('$nom1_afi', '$nom2_afi', '$apel1_afi', '$apel2_afi', '$id_afi', '$dir_afi','$email_afi', '$cel1_afi', '$cel2_afi', '$fnac_afi', '$fins_afi', '$fkID_eps','$fkID_categoria', '$rh_afi', '$nombre')";
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
                $q_inserta  = "UPDATE `afiliado` SET `nom1_afi`='$nom1_afi',`nom2_afi`='$nom2_afi',`apel1_afi`='$apel1_afi',`apel2_afi`='$apel2_afi',id_afi='$id_afi', dir_afi='$dir_afi', email_afi='$email_afi', cel1_afi='$cel1_afi', cel2_afi='$cel2_afi', fkID_eps='$fkID_eps',fkID_categoria='$fkID_categoria',rh_afi='$rh_afi', foto_afi='$nombre',fnac_afi='$fnac_afi', fins_afi='$fins_afi' where pkID='$id'";
                $r["query"] = $q_inserta;
            } else {
                $r["mensaje"] = "No se inserto en el servidor.";
            }
        } else {
            $q_inserta  = "UPDATE `afiliado` SET `nom1_afi`='$nom1_afi',`nom2_afi`='$nom2_afi',`apel1_afi`='$apel1_afi',`apel2_afi`='$apel2_afi',id_afi='$id_afi', dir_afi='$dir_afi', email_afi='$email_afi', cel1_afi='$cel1_afi', cel2_afi='$cel2_afi', fkID_eps='$fkID_eps',fkID_categoria='$fkID_categoria',rh_afi='$rh_afi',fnac_afi='$fnac_afi', fins_afi='$fins_afi' where pkID='$id'";
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
    case 'crearsin':
        $generico   = new Generico_DAO();
        $q_inserta  = "insert into `saber_propio`(`fecha_salida`, `fkID_grupo`, `comunidad_visitada`, `fkID_asesor`) VALUES ('$fechas', '$fkID_grupo', '$comunidad', '$fk_asesor')";
        $r["query"] = $q_inserta;

        $resultado = $generico->EjecutaInsertar($q_inserta);
        if ($resultado) {
            $r[] = $resultado;
        } else {
            $r["estado"]  = "Error";
            $r["mensaje"] = "No se inserto.";
        }
        break;
    case 'eliminararchivo':
        $generico   = new Generico_DAO();
        $q_inserta  = "UPDATE afiliado SET foto_afi='' where pkID='$id' ";
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

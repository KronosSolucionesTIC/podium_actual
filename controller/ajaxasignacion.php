<?php

include '../DAO/genericoDAO.php';

class Generico_DAO
{

    use GenericoDAO;

}

$r         = array();
$tipo      = isset($_POST['tipo']) ? $_POST['tipo'] : "";
$id        = isset($_POST['pkID']) ? $_POST['pkID'] : "";
$nom1_afi  = isset($_POST['nom1_afi']) ? $_POST['nom1_afi'] : "";
$nom2_afi  = isset($_POST['nom2_afi']) ? $_POST['nom2_afi'] : "";
$apel1_afi = isset($_POST['apel1_afi']) ? $_POST['apel1_afi'] : "";
$apel2_afi = isset($_POST['apel2_afi']) ? $_POST['apel2_afi'] : "";
$id_afi    = isset($_POST['id_afi']) ? $_POST['id_afi'] : "";
$dir_afi   = isset($_POST['dir_afi']) ? $_POST['dir_afi'] : "";
$email_afi = isset($_POST['email_afi']) ? $_POST['email_afi'] : "";
$rh_afi    = isset($_POST['rh_afi']) ? $_POST['rh_afi'] : "";
$cel1_afi  = isset($_POST['cel1_afi']) ? $_POST['cel1_afi'] : "";
$cel2_afi  = isset($_POST['cel2_afi']) ? $_POST['cel2_afi'] : "";
$fkID_eps  = isset($_POST['fkID_eps']) ? $_POST['fkID_eps'] : "";
$fnac_afi  = isset($_POST['fnac_afi']) ? $_POST['fnac_afi'] : "";
$fins_afi  = isset($_POST['fins_afi']) ? $_POST['fins_afi'] : "";

switch ($tipo) {
    case 'consultaValor':
        $id       = $_POST['id'];
        $generico = new Generico_DAO();

        $q_carga = "SELECT * FROM `costos` where pkID=" . $id . "";

        $resultado = $generico->EjecutarConsulta($q_carga);
        /**/
        if ($resultado) {

            $r["estado"]  = "ok";
            $r["mensaje"] = $resultado;

        } else {

            $r["estado"]  = "Error";
            $r["mensaje"] = "No hay registros.";
        }

        break;
    default:
        # code...
        break;
}

echo json_encode($r);

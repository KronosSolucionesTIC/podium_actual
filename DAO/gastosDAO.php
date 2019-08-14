<?php
/**/
include_once 'genericoDAO.php';

class gastosDAO
{
    use GenericoDAO;
    public $q_general;

    public function getGastos()
    {
        $this->q_general = "SELECT *,gastos.pkID AS pkID,CONCAT(nom1_prov,' ',nom2_prov,' ',apel1_prov,' ',apel2_prov) AS proveedor FROM gastos
                            INNER JOIN proveedor ON proveedor.pkID = gastos.fkID_proveedor
                            INNER JOIN tipo_gastos ON tipo_gastos.pkID = gastos.fkID_tipo_gasto
                            WHERE gastos.estado = 1
                            ORDER BY fecha_gasto DESC";

        return $this->EjecutarConsulta($this->q_general);
    }

    public function getProveedor()
    {
        $this->q_general = "SELECT *,CONCAT(nom1_prov,' ',nom2_prov,' ',apel1_prov,' ',apel2_prov) AS proveedor FROM proveedor
                            WHERE estado = 1
                            ORDER BY proveedor";

        return $this->EjecutarConsulta($this->q_general);
    }

    public function getTipoGasto()
    {
        $this->q_general = "SELECT * FROM tipo_gastos
                            WHERE estado = 1
                            ORDER BY nom_gas";

        return $this->EjecutarConsulta($this->q_general);
    }

    public function getProfesor()
    {
        $this->q_general = "SELECT *,CONCAT(nom1_pro,' ',nom2_pro,' ',apel1_pro,' ',apel2_pro) AS profesor FROM profesor
                            WHERE estado = 1
                            ORDER BY profesor";

        return $this->EjecutarConsulta($this->q_general);
    }
}

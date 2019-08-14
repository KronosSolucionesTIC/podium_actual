<?php
/**/
include_once 'genericoDAO.php';

class ingresos_gastosDAO
{
    use GenericoDAO;
    public $q_general;

    public function getIngresos($fec_ini, $fec_fin)
    {
        $this->q_general = "SELECT *,CONCAT(nom1_afi,' ',nom2_afi,' ',apel1_afi,' ',apel2_afi) as afiliado  FROM ingresos
                            INNER JOIN tipo_ingresos ON tipo_ingresos.pkID = ingresos.fkID_tipo_ingreso
                            INNER JOIN afiliado ON afiliado.pkID = ingresos.fkID_afiliado
                            WHERE ingresos.estado = 1 AND (fec_ing >= '" . $fec_ini . "' AND fec_ing <= '" . $fec_fin . "')";

        return $this->EjecutarConsulta($this->q_general);
    }

    public function getGastos($fec_ini, $fec_fin)
    {
        $this->q_general = "SELECT *,CONCAT(nom1_prov,' ',nom2_prov,' ',apel1_prov,' ',apel2_prov) as proveedor  FROM gastos
                            INNER JOIN tipo_gastos ON tipo_gastos.pkID = gastos.fkID_tipo_gasto
                            INNER JOIN proveedor ON proveedor.pkID = gastos.fkID_proveedor
                            WHERE gastos.estado = 1 AND (fecha_gasto >= '" . $fec_ini . "' AND fecha_gasto <= '" . $fec_fin . "')";

        return $this->EjecutarConsulta($this->q_general);
    }
}

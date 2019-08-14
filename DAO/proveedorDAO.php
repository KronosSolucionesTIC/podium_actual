<?php
/**/
include_once 'genericoDAO.php';

class proveedorDAO
{
    use GenericoDAO;
    public $q_general;

    public function getproveedor()
    {
        $this->q_general = "SELECT * FROM proveedor WHERE estado = 1";

        return $this->EjecutarConsulta($this->q_general);
    }

    public function getEps()
    {
        $this->q_general = "SELECT * FROM eps WHERE estado = 1 ORDER BY nombre_eps";

        return $this->EjecutarConsulta($this->q_general);
    }
}

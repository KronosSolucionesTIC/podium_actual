<?php
/**/
include_once 'genericoDAO.php';

class afiliadoDAO
{
    use GenericoDAO;
    public $q_general;

    public function getAfiliado()
    {
        $this->q_general = "SELECT *,afiliado.pkID AS pkID FROM afiliado
                            LEFT JOIN categoria ON categoria.pkID = afiliado.fkID_categoria
                            WHERE afiliado.estado = 1";

        return $this->EjecutarConsulta($this->q_general);
    }

    public function getEps()
    {
        $this->q_general = "SELECT * FROM eps WHERE estado = 1 ORDER BY nombre_eps";

        return $this->EjecutarConsulta($this->q_general);
    }

    public function getCategoria()
    {
        $this->q_general = "SELECT * FROM categoria WHERE estado = 1 ORDER BY nombre_categoria";

        return $this->EjecutarConsulta($this->q_general);
    }
}

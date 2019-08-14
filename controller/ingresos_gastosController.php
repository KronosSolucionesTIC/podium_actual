<?php
/**/
include_once '../DAO/ingresos_gastosDAO.php';
include_once 'helper_controller/render_table.php';

class ingresos_gastosController extends ingresos_gastosDAO
{

    public $NameCookieApp;
    public $id_modulo;
    public $table_inst;
    public $ingresos_gastosId;

    public function __construct()
    {

        include '../conexion/datos.php';

        $this->id_modulo     = 16; //id de la tabla modulos
        $this->NameCookieApp = $NomCookiesApp;

    }

    //Funciones-------------------------------------------
    //Espacio para las funciones de esta clase
    public function getIngresosGastos($fecha_inicio, $fecha_fin)
    {
        $this->ingresos = $this->getIngresos($fecha_inicio, $fecha_fin);

        if (($this->ingresos)) {

            echo "
            <div class='datagrid'>
                <table>
                    <thead>
                        <tr>
                            <th colspan='4'><div align='center'>INGRESOS</div></td>
                        </tr>
                        <tr>
                            <th align='center'>FECHA</td>
                            <th align='center'>AFILIADO</td>
                            <th align='center'>TIPO INGRESO</td>
                            <th align='center'>VALOR</td>
                        </tr>
                    </thead>
                    <tbody>";

            $total_ingresos = 0;
            $cont           = 0;

            for ($a = 0; $a < sizeof($this->ingresos); $a++) {

                $id       = $this->ingresos[$a]["pkID"];
                $fecha    = $this->ingresos[$a]["fec_ing"];
                $afiliado = $this->ingresos[$a]["afiliado"];
                $nom_ting = $this->ingresos[$a]["nom_ting"];
                $val_ing  = $this->ingresos[$a]["val_ing"];

                if ($cont == 0) {
                    $clase_tr = "alt";
                    $cont     = 1;
                } else {
                    $clase_tr = "";
                    $cont     = 0;
                }

                echo '
                             <tr class="' . $clase_tr . '">
                                 <td title="Click Ver Detalles" href="detalles_ingresos.php?id_ingresos=' . $id . '" class="detail">' . $fecha . '</td>
                                 <td title="Click Ver Detalles" href="detalles_ingresos.php?id_ingresos=' . $id . '" class="detail">' . $afiliado . '</td>
                                 <td title="Descargar Archivo">' . $nom_ting . '</td>
                                <td class="text-right" title="Descargar Archivo">' . number_format($val_ing, 0, '.', '.') . '</td>
                             </tr>';

                $total_ingresos = $total_ingresos + $val_ing;
            };

            echo '
            <tr>
                <td colspan="3" class="text-right">Total</td>
                <td class="text-right">' . number_format($total_ingresos, 0, '.', '.') . '</td>
            </tr>';

            echo "</tbody>
                </table>
            </div>";
        } else {
            echo "<h2>No existen ingresos en este rango de fechas.</h2>";
        }

        echo "<br>";

        $this->gastos = $this->getGastos($fecha_inicio, $fecha_fin);

        if (($this->gastos)) {

            echo "
            <div class='datagrid'>
                <table>
                    <thead>
                        <tr>
                            <th colspan='4'><div align='center'>GASTOS</div></td>
                        </tr>
                        <tr>
                            <th align='center'>FECHA</td>
                            <th align='center'>PROVEEDOR</td>
                            <th align='center'>TIPO GASTO</td>
                            <th align='center'>VALOR</td>
                        </tr>
                    </thead>
                    <tbody>";

            $total_gastos = 0;
            $cont         = 0;

            for ($a = 0; $a < sizeof($this->gastos); $a++) {

                $id          = $this->gastos[$a]["pkID"];
                $fecha       = $this->gastos[$a]["fecha_gasto"];
                $proveedor   = $this->gastos[$a]["proveedor"];
                $nom_gas     = $this->gastos[$a]["nom_gas"];
                $valor_gasto = $this->gastos[$a]["valor_gasto"];

                if ($cont == 0) {
                    $clase_tr = "alt";
                    $cont     = 1;
                } else {
                    $clase_tr = "";
                    $cont     = 0;
                }

                echo '
                             <tr class="' . $clase_tr . '">

                                 <td title="Click Ver Detalles" href="detalles_gastos.php?id_gastos=' . $id . '" class="detail">' . $fecha . '</td>
                                 <td title="Click Ver Detalles" href="detalles_gastos.php?id_gastos=' . $id . '" class="detail">' . $proveedor . '</td>
                                 <td title="Descargar Archivo">' . $nom_gas . '</td>
                                <td class="text-right" title="Descargar Archivo">' . number_format($valor_gasto, 0, '.', '.') . '</td>
                             </tr>';

                $total_gastos = $total_gastos + $valor_gasto;
            };

            echo '
            <tr>
                <td colspan="3" class="text-right">Total</td>
                <td class="text-right">' . number_format($total_gastos, 0, '.', '.') . '</td>
            </tr>';

            echo "</tbody>
                </table>
            </div>";
        } else {
            echo "<h2>No existen gastos en este rango de fechas.</h2>";
        }

        echo "<br>";

        echo "
            <div class='datagrid'>
                <table>
                    <thead>
                        <tr>
                            <th colspan='4'><div align='center'>INGRESOS VS GASTOS</div></td>
                        </tr>
                        <tr>
                            <th align='center'>TOTAL INGRESOS</td>
                            <th align='center'>TOTAL GASTOS</td>
                            <th align='center'>DIFERENCIA</td>
                        </tr>
                    </thead>
                    <tbody>";

        if ($total_ingresos - $total_gastos > 0) {
            $clase_dif = "ingresos_ok";
        } else {
            $clase_dif = "ingresos_fail";
        }

        echo '
            <tr>
                <td class="text-right">' . number_format($total_ingresos, 0, '.', '.') . '</td>
                <td class="text-right">' . number_format($total_gastos, 0, '.', '.') . '</td>
                <td class="text-right ' . $clase_dif . '">' . number_format($total_ingresos - $total_gastos, 0, '.', '.') . '</td>
            </tr>';

        echo "</tbody>
                </table>
            </div>";
    }
}

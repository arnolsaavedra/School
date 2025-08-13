<?php
class TraerCombo {


    public $conexion;

    function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function cmbCursosCMB() {
    $columnas = "cur_dip_pre_id AS value, cur_dip_pre_nom AS name";
    $tabla = "curso_diplomado_presencial";
    $rs = $this->conexion->consultar($columnas, $tabla,false);
    return $rs;
    //echo $this->conexion->cerrarConexion(); 
    }
}


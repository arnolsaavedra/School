<?php

include_once 'DBManejador.php';

$conn = new DBManejador();
if (is_array($conn->error)) {
    echo $conn->error[2];
    exit();
}

$opcion = $_REQUEST['opcion'];

switch ($opcion) {
    case 1:cargarImagenCampus();break;
}


function cargarImagenCampus() {
    global $conn;
    $tabla     = "img_campus";
    $columnas  = "img_campus_id,img_campus_url,img_campus_text"; 
    //$condicion = "curso.cur_dip_pre_moda = 1 AND curso.cur_dip_pre_cur_dip = 1 LIMIT 6";
    //$valores   = array(":cursoId" => $idCurso);
    ///$rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    $rs = $conn->consultar($columnas, $tabla,false);
    if (is_array($conn->error)) {   
    echo json_encode("logCreado");
    exit();
    }
    echo json_encode($rs);
    $conn->cerrarConexion();
}
?>
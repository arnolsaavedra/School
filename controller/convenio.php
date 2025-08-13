<?php
/*
 * @autor: Arnol Saavedra
 * @objetivo: Controlador cargar datos curso
 */
@session_start();
date_default_timezone_set('America/Bogota');
ini_set("display_errors", '1');

include_once 'DBManejador.php';

$conn = new DBManejador();

if (is_array($conn->error)) {
    echo $conn->error[2];
    exit();
}

$opcion = $_POST['opcion'];


switch ($opcion) {
    case 1:gtImgConvenio();break;
}
function gtImgConvenio() {
    global $conn;
    $tabla     = "convenio";
    $columnas  = "convenio.conv_img AS urlImgConvenio, convenio.conv_nombre AS nombreConvenio"; 
    $rs = $conn->consultar($columnas, $tabla, false);
    if ($rs == null) {
    $conn->cerrarConexion();
    return false;
    }
    echo json_encode($rs);
    $conn->cerrarConexion();
}




?>
<?php
/*
 * @autor: Arnol Saavedra
 * @fecha de creación: Julio 15 de 2019
 * @objetivo: Menau Usuario
 */
@session_start();
date_default_timezone_set('America/Bogota');
ini_set("display_errors", '1');

include_once 'DBManejador.php';
include_once '../util/util.php';

$conn = new DBManejador();
if (is_array($conn->error)) {
    echo $conn->error[2];
    exit();
}

$opcion = $_REQUEST['v0'];
//Opciones administrativas ---------------------------------------------

switch ($opcion) {
    case 1:agregarInformacion();break;
}
//Auxiliar Administrativo ---------------------------------------------
function xxx() {
    global $conn;
    $columnas  = "*";    
    $tabla     = "prospecto";
    $condicion = ":codigoDirector";
    $valores   = array(":codigoDirector" => "1");
    $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    if ($rs == null) {
    echo 98; 
    return;
    }
    echo json_encode($rs);
}

function agregarInformacion() {
    global $conn;
    
    if( isset($_REQUEST['prospectoNombre'])) $prospectoNombre = $_REQUEST['prospectoNombre'];
    if( isset($_REQUEST['prospectoCorreo'])) $prospectoCorreo = $_REQUEST['prospectoCorreo'];
    if( isset($_REQUEST['prospectoCelular'])) $prospectoCelular = $_REQUEST['prospectoCelular'];
    
        if(is_numeric($prospectoCelular) == false){
        $rs = "letrasNo";
        echo json_encode($rs);
        $conn->cerrarConexion();
        return false;
    }

    $tablas    = "prospecto"; 

    $columnas  = "nombre_prospecto,correo_prospecto,celular_prospecto,estado_prospecto";

    $campos    = ":nombre_prospecto,:correo_prospecto,:celular_prospecto,:estado_prospecto";

    $valores   = array(":nombre_prospecto" =>$prospectoNombre,
    ":correo_prospecto" => $prospectoCorreo,
    ":celular_prospecto" =>$prospectoCelular,
    ":estado_prospecto" =>"1");
    $rs = $conn->agregar($tablas, $columnas, $campos, $valores);
    if (is_array($conn->error)) {   
    echo json_encode($conn->error[2]);
    exit();
    }
    echo json_encode($rs);
}



?>
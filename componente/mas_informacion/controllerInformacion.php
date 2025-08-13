<?php

@session_start();
date_default_timezone_set('America/Bogota');
ini_set("display_errors", '1');

include_once '../../controller/DBManejador.php';
//include_once '../util/util.php';

$conn = new DBManejador();
if (is_array($conn->error)) {
    echo $conn->error[2];
    exit();
}

$opcion = $_REQUEST['v0'];
switch ($opcion) {
    case 1:agregarProspectoInformacion();break;
}
function errorLog($numero,$texto){ 
 $ddf = fopen('error.log','a'); 
 fwrite($ddf,"[".date("r")."] Error $numero: $texto\r\n"); 
 fclose($ddf); 
} 

function agregarProspectoInformacion() {
    global $conn;
    if( isset($_REQUEST['prospectoNombre'])) $prospectoNombre = $_REQUEST['prospectoNombre'];
    if( isset($_REQUEST['prospectoCorreo'])) $prospectoCorreo = $_REQUEST['prospectoCorreo'];
    if( isset($_REQUEST['prospectoCelular'])) $prospectoCelular = $_REQUEST['prospectoCelular'];
    if( isset($_REQUEST['fechaNaceDia'])) $fechaNaceDia = $_REQUEST['fechaNaceDia'];
    if( isset($_REQUEST['prospectoInteresCurso'])) $prospectoInteresCurso = $_REQUEST['prospectoInteresCurso'];
    
    if(is_numeric($prospectoCelular) == false){
        $rs = "letrasNo";
        echo json_encode($rs);
        $conn->cerrarConexion();
        return false;
    }
    if($prospectoNombre == "" || $prospectoCorreo == "" || $fechaNaceDia =="" ||$prospectoInteresCurso =="0" ||$prospectoInteresCurso == NULL){
        $rs = "vacio";
        echo json_encode($rs);
        $conn->cerrarConexion();
        return false;
    }
    
    $rs= $conn->procedure_consulta("agregarProspecto('".$prospectoNombre."','".$fechaNaceDia."','".$prospectoCorreo."','".$prospectoCelular."','".$prospectoInteresCurso."')");
     echo json_encode($rs);
    $conn->cerrarConexion();
    errorLog("cargandoProspecto0",' CONSULTA EJECUTADA : "agregarProspecto('.$prospectoNombre.','.$fechaNaceDia.','.$prospectoCorreo.','.$prospectoCelular.')" RESPUESTA: '.json_encode($rs).'' );
   
/*
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
    */
}
?>
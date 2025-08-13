<?php

@session_start();
date_default_timezone_set('America/Bogota');
ini_set("display_errors", '1');

include_once '../../controller/DBManejador.php';

$conn = new DBManejador();
if (is_array($conn->error)) {
    echo $conn->error[2];
    exit();
}

$opcion = $_POST['v0'];
switch ($opcion) {
    case 1:frmContactoMensaje();break;
}
function errorLog($numero,$texto){ 
 $ddf = fopen('error.log','a'); 
 fwrite($ddf,"[".date("r")."] Error $numero: $texto\r\n"); 
 fclose($ddf); 
} 

function frmContactoMensaje() {
    global $conn;
    
    if( isset($_POST['frmContactoNombre'])) $frmContactoNombre = $_POST['frmContactoNombre'];
    if( isset($_POST['frmContactoCorreo'])) $frmContactoCorreo = $_POST['frmContactoCorreo'];
    if( isset($_POST['frmContactoCelular'])) $frmContactoCelular = $_POST['frmContactoCelular'];
    if( isset($_POST['frmContactoMensaje'])) $frmContactoMensaje = $_POST['frmContactoMensaje'];
    
        if($frmContactoNombre == "" || $frmContactoCorreo == "" || $frmContactoCelular == "" || $frmContactoMensaje == ""){
            $rs = "vacio";
            echo json_encode($rs);
            $conn->cerrarConexion();
            return false;
        }
    
        if(is_numeric($frmContactoCelular) == false){
            $rs = "letrasNo";
            echo json_encode($rs);
            $conn->cerrarConexion();
            return false;
    }

    $tablas    = "contacto"; 

    $columnas  = "cont_nombre,cont_correo,cont_celular,cont_menesaje";

    $campos    = ":cont_nombre,:cont_correo,:cont_celular,:cont_menesaje";

    $valores   = array(":cont_nombre" =>$frmContactoNombre,
    ":cont_correo" => $frmContactoCorreo,
    ":cont_celular" =>$frmContactoCelular,
    ":cont_menesaje" => $frmContactoMensaje);
    
    $rs = $conn->agregar($tablas, $columnas, $campos, $valores);
    if (is_array($conn->error)) {   
    echo json_encode("error");
    errorLog("envioContacto",''.$frmContactoNombre.','.$frmContactoCorreo.','.$frmContactoCelular.','.$frmContactoMensaje.', ERROR '.$rs.'' );
    return false;
    
    }
    echo json_encode($rs);
}

?>
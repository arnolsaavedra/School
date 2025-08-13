<?php
session_start();

include_once '../../controller/DBManejador.php';

$conn = new DBManejador();
if (is_array($conn->error)) {
    echo $conn->error[2];
    exit();
}

$opcion = $_POST['v0'];
switch ($opcion) {
    case 1:frmLogin();break;
}
function errorLog($numero,$texto){ 
 $ddf = fopen('errorlogin.log','a'); 
 fwrite($ddf,"[".date("r")."] Error $numero: $texto\r\n"); 
 fclose($ddf); 
} 

function frmLogin() {
    global $conn;
    
    if( isset($_POST['userLogin'])) $userLogin = $_POST['userLogin'];
    if( isset($_POST['passwordLogin'])) $passwordLogin = $_POST['passwordLogin'];
    
        if($userLogin == "" || $passwordLogin == ""){
            $rs = "vacio";
            echo json_encode($rs);
            $conn->cerrarConexion();
            return false;
        }
    $passwordLogin=  hash('sha256', $passwordLogin);
    $tabla     = "user";
    $columnas  = "user_id,user_correo,user_contrasena"; 
    $condicion = "user_correo=:usuario AND user_contrasena=:contrasena LIMIT 1";
    $valores   = array(":usuario" =>$userLogin,":contrasena" =>$passwordLogin);
    $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    if (is_array($conn->error)) {   
    echo json_encode("error");
    errorLog("INTENTO LOGIN",''.$userLogin.', ERROR '.$rs.'' );
    return false;
    }
    json_encode($rs);
    if($userLogin == $rs[0]['user_correo'] && $passwordLogin == $rs[0]['user_contrasena']){
      $_SESSION['user_id'] = $rs[0]['user_id'];
        echo json_encode("logeoCorrecto");
    }else{
        echo json_encode("logeoFallido");
    }
}

?>
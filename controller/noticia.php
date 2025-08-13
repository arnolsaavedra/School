<?php

include_once 'DBManejador.php';

$conn = new DBManejador();
if (is_array($conn->error)) {
    echo $conn->error[2];
    exit();
}

$opcion = $_REQUEST['opcion'];

switch ($opcion) {
    case 1:cargarNoticia();break;
}


function cargarNoticia() {
    global $conn;
    if( isset($_POST['idNoticia'])) $idNoticia = $_POST['idNoticia'];
    $tabla     = "noticias";
    $columnas  = "noti_url,noti_titulo,noti_texto,noti_img_porta";
    $condicion = "noti_url = :idNoticia AND noti_estado = 0 LIMIT 1";
    $valores   = array(":idNoticia" => $idNoticia);
    $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    if (is_array($conn->error)) {   
    echo json_encode("logCreado");
    exit();
    }
    echo json_encode($rs);
    $conn->cerrarConexion();
}
?>
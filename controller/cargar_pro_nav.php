<?php
include_once 'DBManejador.php';
$conn = new DBManejador();
function errorLog($numero,$texto){ 
 $ddf = fopen('error-cargar_nav_curso.log','a'); 
 fwrite($ddf,"[".date("r")."] Error $numero: $texto\r\n"); 
 fclose($ddf); 
} 
if (is_array($conn->error)) {
    echo $conn->error[2];
    exit();
}
$opcion = $_POST['opcion'];

switch ($opcion) {
    case 1:cargarProgNav();break;
    case 2:cargarDipNav();break;
    case 3:cargarProgVirtuaNav();break;
}
function cargarProgVirtuaNav() {
    global $conn;
    $tabla     = "curso_diplomado_presencial AS curso";
    $columnas  = "curso.cur_dip_pre_url AS urlCursoVir, curso.cur_dip_pre_nom AS nombreCursoVir"; 
    $valores   = array(":tipoCurso" => "2");
    $condicion = "curso.cur_dip_pre_moda = 2 || curso.cur_dip_pre_moda = 3";
    $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    if ($rs == null) {
    errorLog("cargar Nav Programas",' error' ); 
    echo json_encode("logCargado");
    $conn->cerrarConexion();
    return;
    }
    echo json_encode($rs);
    $conn->cerrarConexion();

}

function cargarProgNav() {
    global $conn;
    $tabla     = "curso_diplomado_presencial AS curso  WHERE curso.cur_dip_pre_cur_dip = 3 AND curso.cur_dip_pre_moda=1 ORDER BY curso.cur_dip_pre_nom ASC";
    $columnas  = "curso.cur_dip_pre_nom AS nombre, curso.cur_dip_pre_url AS url"; 
    $rs = $conn->consultar($columnas, $tabla,false);
    if ($rs == null) {
    errorLog("cargar Nav Programas",' error' ); 
    echo json_encode("logCargado");
    $conn->cerrarConexion();
    return false;
    }
    echo json_encode($rs);
    $conn->cerrarConexion();
}

function cargarDipNav() {
    global $conn;
    $tabla     = "curso_diplomado_presencial AS curso  WHERE curso.cur_dip_pre_cur_dip=2 AND curso.cur_dip_pre_moda = 1 || curso.cur_dip_pre_moda = 3 ORDER BY curso.cur_dip_pre_nom ASC";
    $columnas  = "curso.cur_dip_pre_nom AS nombre, curso.cur_dip_pre_url AS url"; 
    $rs = $conn->consultar($columnas, $tabla,false);
    if ($rs == null) {
    errorLog("cargar Nav Programas",' error' ); 
    echo json_encode("logCargado");
    $conn->cerrarConexion();
    return false;
    }
    echo json_encode($rs);
    $conn->cerrarConexion();
}

?>
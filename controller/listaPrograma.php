<?php

include_once 'DBManejador.php';

$conn = new DBManejador();
if (is_array($conn->error)) {
    echo $conn->error[2];
    exit();
}

$opcion = $_REQUEST['opcion'];

switch ($opcion) {
    case 1:getInfCurso();break;
}


function getInfCurso() {
    global $conn;
    if( isset($_POST['idCurso'])) $idCurso = $_POST['idCurso'];
    $tabla     = "curso_diplomado_presencial as curso";
    $columnas  = "curso.cur_dip_pre_url AS urlCurso,
    curso.cur_dip_pre_nom AS nombreCurso,
    curso.cur_dip_pre_img1 AS cursoImg1"; 
    $condicion = "curso.cur_dip_pre_moda = 1 AND curso.cur_dip_pre_cur_dip = 3 LIMIT 6";
    $valores   = array(":cursoId" => $idCurso);
    $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    if (is_array($conn->error)) {   
    echo json_encode("logCreado");
    exit();
    }
    echo json_encode($rs);
    $conn->cerrarConexion();
}
?>
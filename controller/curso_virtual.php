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
    case 2:getInfGeneralCurso();break;
    case 6:getListaCursosPres();break;
}

function getListaCursosPres() {
    global $conn;
    $tabla     = "curso_diplomado_presencial AS curso ";
    $columnas  = "curso.cur_dip_pre_id AS idCurso"; 
    $condicion = "curso.cur_dip_pre_moda = 2 || curso.cur_dip_pre_moda = 3 ";
    $valores   = array(":tipoCurso" => "2");
    $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    //if (is_array($conn->error)) {   
    //echo json_encode("logCreado");
    //exit();
    //}
    echo json_encode($rs);
    $conn->cerrarConexion();
}



function getInfCurso() {
    global $conn;
    if( isset($_POST['idCurso'])) $idCurso = $_POST['idCurso'];
    $tabla     = "curso_diplomado_presencial as curso
   ";
    $columnas  = "curso.cur_dip_pre_url AS urlCurso,
    curso.cur_dip_pre_nom AS nombreCurso,
    LEFT(curso.cur_dip_pre_des,450) AS cursoDescripcion,
    curso.cur_dip_pre_img_micro AS cursoImg1"; 
    $condicion = "curso.cur_dip_pre_id=:cursoId LIMIT 1";
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
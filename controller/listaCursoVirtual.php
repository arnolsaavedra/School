<?php
include_once 'DBManejador.php';

$conn = new DBManejador();
if (is_array($conn->error)) {
    echo $conn->error[2];
    exit();
}

$opcion = $_REQUEST['opcion'];


switch ($opcion) {
    case 1:getInfCursoVirtual();break;
    case 6:getListaCursosVirtual();break;
}

function getListaCursosVirtual() {
    global $conn;
    $tabla     = "curso_diplomado_presencial AS curso";
    $columnas  = "curso.cur_dip_pre_id AS idCurso"; 
    $valores   = array(":tipoCurso" => "2");
    $condicion = "curso.cur_dip_pre_cur_dip = 2 || curso.cur_dip_pre_cur_dip = 1 AND curso.cur_dip_pre_moda = 1   ORDER BY RAND() LIMIT 3";
    $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    if (is_array($conn->error)) {   
    echo json_encode($conn->error[2]);
    exit();
    }
    echo json_encode($rs);
    $conn->cerrarConexion();
}




function getInfCursoVirtual() {
    global $conn;
    if( isset($_REQUEST['idCurso'])) $idCurso = $_REQUEST['idCurso'];
    $tabla     = "curso_diplomado_presencial as curso
    INNER JOIN cur_dip_pre_cer as cer ON cer.cur_dip_pre_cer_id = curso.cur_dip_pre_cer
    INNER JOIN cur_dip_pre_mod AS modalidad ON modalidad.cur_dip_pre_mod_id = curso.cur_dip_pre_moda";
    $columnas  = "curso.cur_dip_pre_url AS urlCurso,
    curso.cur_dip_pre_nom AS nombreCurso,
    LEFT(curso.cur_dip_pre_des,450) AS cursoDescripcion,
    cer.cur_dip_pre_cer_text AS certificado,
    curso.cur_dip_pre_sem AS semestre,
    curso.cur_dip_pre_img_micro AS cursoImg1,
    modalidad.cur_dip_pre_mod_Text AS modalida"; 
    $condicion = "curso.cur_dip_pre_id=:cursoId LIMIT 1";
    $valores   = array(":cursoId" => $idCurso);
    $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    if (is_array($conn->error)) {   
    echo json_encode($conn->error[2]);
    exit();
    }
    echo json_encode($rs);
    $conn->cerrarConexion();
}
?>
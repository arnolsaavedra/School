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
    case 3:getInfGeneralCursoSedes();break;
    case 6:getListaCursosPres();break;
}

function getListaCursosPres() {
    global $conn;
    $tabla     = "curso_diplomado_presencial AS curso";
    $columnas  = "curso.cur_dip_pre_id AS idCurso"; 
    $condicion = "curso.cur_dip_pre_moda = 1 AND curso.cur_dip_pre_cur_dip = :tipoCurso ORDER BY RAND() LIMIT 3";
    $valores   = array(":tipoCurso" => "3");
    $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    //if (is_array($conn->error)) {   
    //echo json_encode("logCreado");
    //exit();
    //}
    echo json_encode($rs);
    $conn->cerrarConexion();
}

function getInfGeneralCursoSedes() {
    global $conn;
    if( isset($_POST['idCurso'])) $idCurso = $_POST['idCurso'];
 
    $tabla     = "cur_dip_sed as sed
    INNER JOIN sedes ON sedes.sedes_id = sed.cur_dip_sed_sed_id";
    $columnas  = "sedes.sedes_ciudad as sede"; 
    $condicion = "sed.cur_dip_sed_cur__id=:cursoId";
    $valores   = array(":cursoId" => $idCurso);
    $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    if (is_array($conn->error)) {   
    echo json_encode("logCreado");
    exit();
    }
    echo json_encode($rs);
    $conn->cerrarConexion();
}

function getInfGeneralCurso() {
    global $conn;
    if( isset($_POST['idCurso'])) $idCurso = $_POST['idCurso'];
 
    $tabla     = "cur_dip_mod as curso
    INNER JOIN cur_dip_pre_mod as modo ON modo.cur_dip_pre_mod_id = curso.cur_dip_mod_mod";
    $columnas  = "modo.cur_dip_pre_mod_Text as modalidad"; 
    $condicion = "curso.cur_dip_mod_cur__id=:cursoId";
    $valores   = array(":cursoId" => $idCurso);
    $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    if (is_array($conn->error)) {   
    echo json_encode("logCreado");
    exit();
    }
    echo json_encode($rs);
    $conn->cerrarConexion();
}

function getInfCurso() {
    global $conn;
    if( isset($_POST['idCurso'])) $idCurso = $_POST['idCurso'];
    $tabla     = "curso_diplomado_presencial as curso
    INNER JOIN cur_dip_pre_cer as cer ON cer.cur_dip_pre_cer_id = curso.cur_dip_pre_cer
    INNER JOIN cur_dip_pre_mod AS modalidad ON modalidad.cur_dip_pre_mod_id = curso.cur_dip_pre_moda
    INNER JOIN sedes ON sedes.sedes_id = curso.cur_dip_pre_sedes";
    $columnas  = "curso.cur_dip_pre_url AS urlCurso,
    curso.cur_dip_pre_nom AS nombreCurso,
    LEFT(curso.cur_dip_pre_des,450) AS cursoDescripcion,
    cer.cur_dip_pre_cer_text AS certificado,
    curso.cur_dip_pre_sem AS semestre,
    curso.cur_dip_pre_img_micro AS cursoImg1,
    modalidad.cur_dip_pre_mod_Text AS modalidad,
	sedes.sedes_ciudad AS sede"; 
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
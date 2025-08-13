<?php
/*
 * @autor: Arnol Saavedra
 * @objetivo: Controlador cargar datos curso
 */
@session_start();
date_default_timezone_set('America/Bogota');
ini_set("display_errors", '1');

include_once 'DBManejador.php';
include_once '../util/util.php';

$conn = new DBManejador();

function errorLog($numero,$texto){ 
 $ddf = fopen('error-cargar_info_curso.log','a'); 
 fwrite($ddf,"[".date("r")."] Error $numero: $texto\r\n"); 
 fclose($ddf); 
} 
if (is_array($conn->error)) {
    echo $conn->error[2];
    exit();
}

$opcion = $_POST['opcion'];


switch ($opcion) {
    case 1:getInfCurso();break;
    case 2:getInfGeneralCurso();break;
    case 3:getInfGeneralCursoSedes();break;
    case 4:getInfSemestres();break;
    case 5:getRazones();break;
}
function getRazones() {
    global $conn;
    if( isset($_POST['idCurso'])) $idCurso = $_POST['idCurso'];
    $tabla     = "cur_dip_pre_raz AS razon";
    $columnas  = "razon.cur_dip_pre_raz1 AS razon0,
    razon.cur_dip_pre_raz2 AS razon1,
    razon.cur_dip_pre_raz3 AS razon2,
    razon.cur_dip_pre_raz4 AS razon3"; 
    $condicion = "razon.cur_dip_pre_raz_cur_id =:cursoId";
    $valores   = array(":cursoId" => $idCurso);
    $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    if ($rs == null) {
    errorLog("cargarRazones",' CONSULTA EJECUTADA : ":cursoId" =>'. $idCurso.'' ); 
    echo json_encode("logCargado");
    $conn->cerrarConexion();
    return false;
    }
    echo json_encode($rs);
    $conn->cerrarConexion();
}

function getInfSemestres() {
    global $conn;
    if( isset($_POST['idCurso'])) $idCurso = $_POST['idCurso'];
   
    $tabla     = "cur_dip_pre_sem as sem ";
    $columnas  = "sem.cur_dip_pre_sem_num AS numeroSemestre, 
    sem.cur_dip_pre_sem_tema AS tema1,
    sem.cur_dip_pre_sem_tema1 AS tema2, 
    sem.cur_dip_pre_sem_tema2 AS tema3,
    sem.cur_dip_pre_sem_tema3 AS tema4,
    sem.cur_dip_pre_sem_tema4 AS tema5, 
    sem.cur_dip_pre_sem_tema5 AS tema6"; 
    $condicion = "cur_dip_pre_sem_curso_id =:cursoId ORDER BY cur_dip_pre_sem_num ASC";
    $valores   = array(":cursoId" => $idCurso);
    $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    if ($rs == null) {
    errorLog("cargarSemestres",' CONSULTA EJECUTADA : ":cursoId" =>'. $idCurso.'' ); 
    echo json_encode("logCargado");
    $conn->cerrarConexion();
    }
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
    if ($rs == null) {
    errorLog("cargandarSedes",' CONSULTA EJECUTADA : ":cursoId" =>'. $idCurso.'' ); 
    echo json_encode("logCargado");
    return false;
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
    if ($rs == null) {
    errorLog("cargarModalidad",' CONSULTA EJECUTADA : ":cursoId" =>'. $idCurso.'' ); 
    echo json_encode("logCargado");
    $conn->cerrarConexion();
    return false;
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
    $columnas  = "curso.cur_dip_pre_id AS idCursoS,
    curso.cur_dip_pre_nom as nombreCurso,
    curso.cur_dip_pre_cur_dip AS dipOCurso,
    curso.cur_dip_pre_des as cursoDescripcion,
    cer.cur_dip_pre_cer_text as certificado,
    curso.cur_dip_pre_sem as semestre,
    curso.cur_dip_pre_img as cursoImg1,
    curso.cur_dip_pre_img1 as cursoImg2,
    curso.cur_dip_pre_img2 as cursoImg3,
    curso.cur_dip_pre_img_por AS imgPortada,
    curso.cur_dip_pre_video AS videoTestCur,
    curso.cur_dip_pre_testi AS testiCurso,
    curso.cur_dip_pre_moda AS modaliIf,
    modalidad.cur_dip_pre_mod_Text AS modalidad,
    sedes.sedes_ciudad AS sede"; 
    $condicion = "curso.cur_dip_pre_url = :cursoId";
    $valores   = array(":cursoId" => $idCurso);
    $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    if ($rs == null) {
    errorLog("cargarinformaciongeneral",' CONSULTA EJECUTADA : ":cursoId" =>'. $idCurso.'' ); 
    echo json_encode("logCargado");
    $conn->cerrarConexion();
    return false;
    }
    echo json_encode($rs);
    $conn->cerrarConexion();
}
?>
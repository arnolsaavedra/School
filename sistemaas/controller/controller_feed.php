<?php
session_start();

include_once '../../controller/DBManejador.php';

$conn = new DBManejador();
if (is_array($conn->error)) {
    echo $conn->error[2];
    exit();
}

$opcion = $_POST['opcion'];
switch ($opcion) {
    case 1:consultaProspectoAS();break;
    case 2:calificarBien();break;
    case 3:contactoPersonas();break;
    case 4:mensajeContacto();break;
    case 5:checkContacto();break;
    case 6:cmbCursos();break;
    case 7:carInfoGeneralCurso();break;
    case 8:cmbCertificadoOpciones();break;
    case 9:cmbModalidadOciones();break;
    case 10:cmbSedeOciones();break;
    case 11:cmbDipOPreOpciones();break;
    case 12:getRazonesEditCurso();break;
    case 13:getTemarioEdit();break;
    case 14:actualizarInfoGenerCurso();break;
    case 15:actualizarInfoRazonCurso();break;
    case 16:actualizarInfoTemarioCurso();break;
    case 17:cargarImagen();break;
    case 18:mostrarImagen();break;
    case 19:cargarNoticias();break;
    case 20:verMasNoticia();break;
    case 21:actualizarNoticia();break;
    case 22:agregarNoticia();break;
    case 23:verImagenCampus();break;
    case 24:actualizarImagenCampus();break;
    case 25:registroProspectos();break;
}
function registroProspectos() {

    if( isset($_REQUEST['fechaDesde'])) $fechaDesde = $_REQUEST['fechaDesde'];
    if( isset($_REQUEST['fechaHasta'])) $fechaHasta = $_REQUEST['fechaHasta'];
    if( isset($_REQUEST['interes'])) $interes = $_REQUEST['interes'];
    
    if($fechaDesde == ""|| $fechaHasta == ""){
        echo json_encode("vacio"); 
        exit();
    }
    
    global $conn;
    $conn->consultarCondicionDateColom();

    $tabla    = "prospecto";
    $columnas  = "prospecto.nombre_prospecto AS nombre,
    prospecto.celular_prospecto AS celular,
    prospecto.correo_prospecto AS correo,
    prospecto.programa_interes_prospecto AS programaInteres,
    prospecto.pro_modificacion AS checkeado";
    $condicion = "prospecto.estado_prospecto =:interes AND
    pro_modificacion BETWEEN :minFecha AND :maxFechaCita";
    $valores   = array(":minFecha" => $fechaDesde, ":maxFechaCita" => $fechaHasta, ":interes" => $interes);
    $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    if ($rs == null) {
    echo json_encode("vacio"); 
    return;
    }
    echo json_encode($rs);
    $conn->cerrarConexion();
}

function actualizarImagenCampus() {
    if( isset($_REQUEST['idImgenCampus'])) $idImgenCampus = $_REQUEST['idImgenCampus'];
    if( isset($_REQUEST['imgCampusUrl'])) $imgCampusUrl = $_REQUEST['imgCampusUrl'];
    if( isset($_REQUEST['imgCampusText'])) $imgCampusText = $_REQUEST['imgCampusText'];
    
    if( $idImgenCampus == ""      ||
        $imgCampusUrl == ""  ||
        $imgCampusText == "" )
    {
        echo json_encode("vacio");
        exit();
    }else{

    }
    global $conn;
    $tabla      = "img_campus";
    
    $campos     = "img_campus_url=:img_campus_url,
                    img_campus_text=:img_campus_text";
                    
    $condicion  = "img_campus_id=:img_campus_id";
    $valores = array(":img_campus_id"=>$idImgenCampus, 
        ":img_campus_url"=>$imgCampusUrl, 
        ":img_campus_text"=>$imgCampusText
    );
    $rs = $conn->actualizar($tabla, $campos, $valores, $condicion);
    if ($rs !=0) {
        echo json_encode($rs);
        $conn->cerrarConexion();
    }else{
        echo json_encode("yaExiste");
        $conn->cerrarConexion();
        exit();
    }
}

function verImagenCampus() {
    global $conn;
    $tabla     = "img_campus";
    $columnas  = "img_campus_id,img_campus_url,img_campus_text"; 

    $rs = $conn->consultar($columnas, $tabla, false);
    if (is_array($conn->error)) {   
    echo json_encode($conn->error[2]);
    exit();
    }
    echo json_encode($rs);
    $conn->cerrarConexion();
}

function agregarNoticia() {   

    if( isset($_REQUEST['notiUrlAgregar'])) $notiUrlAgregar = $_REQUEST['notiUrlAgregar'];
    if( isset($_REQUEST['notiTituloAgregar'])) $notiTituloAgregar = $_REQUEST['notiTituloAgregar'];
    if( isset($_REQUEST['notiTextoAgregar'])) $notiTextoAgregar = $_REQUEST['notiTextoAgregar'];
    if( isset($_REQUEST['notiImgPortadaAgregar'])) $notiImgPortadaAgregar = $_REQUEST['notiImgPortadaAgregar'];
    if( isset($_REQUEST['notiImgMicro'])) $notiImgMicro = $_REQUEST['notiImgMicro'];
    
    if($notiUrlAgregar == "" || $notiTituloAgregar == "" || $notiTextoAgregar == "" || $notiImgPortadaAgregar == "" || $notiImgMicro == "" ){
        echo json_encode("vacio");
        exit();
    }
    
    global $conn;
    
    $tablas    = "noticias"; 
    
    $columnas  = "noti_url,noti_titulo,noti_texto,noti_img_porta,noti_img_micro";
    
    $campos    = ":noti_url,:noti_titulo,:noti_texto,:noti_img_porta,:noti_img_micro";
    
    $valores   = array(":noti_url" =>$notiUrlAgregar,
    ":noti_titulo" =>$notiTituloAgregar,
    ":noti_texto" =>$notiTextoAgregar,
    ":noti_img_porta" =>$notiImgPortadaAgregar,
    ":noti_img_micro" =>$notiImgMicro);
    $rs = $conn->agregar($tablas, $columnas, $campos, $valores);
    if (is_array($conn->error)) {   
    echo json_encode($conn->error[2]);
    exit();
    }
    echo json_encode($rs);
    $conn->cerrarConexion();

}


function actualizarNoticia() {
    if( isset($_REQUEST['noticiaId'])) $noticiaId = $_REQUEST['noticiaId'];
    if( isset($_REQUEST['notiUrl'])) $notiUrl = $_REQUEST['notiUrl'];
    if( isset($_REQUEST['notiTitulo'])) $notiTitulo = $_REQUEST['notiTitulo'];
    if( isset($_REQUEST['notiTexto'])) $notiTexto = $_REQUEST['notiTexto'];
    if( isset($_REQUEST['notiImgPortada'])) $notiImgPortada = $_REQUEST['notiImgPortada'];
    if( isset($_REQUEST['notiImgMicro'])) $notiImgMicro = $_REQUEST['notiImgMicro'];
    
    
    if( $notiUrl == ""      ||
        $notiTitulo == ""  ||
        $notiTexto == ""  ||
        $notiImgPortada == "" ||
        $notiImgMicro == "")
    {
        echo json_encode("vacio");
        exit();
    }else{

    }
    global $conn;
    $tabla      = "noticias";
    $campos     = "noti_url=:notiUrl,
    noti_titulo=:notiTitulo,
    noti_texto=:notiTexto,
    noti_img_porta=:notiImgPortada,
    noti_img_micro=:notiImgMicro";
    $condicion  = "noti_id=:noticiaId";
    $valores = array(":noticiaId"=>$noticiaId, 
        ":notiUrl"=>$notiUrl, 
        ":notiTitulo"=>$notiTitulo ,
        ":notiTexto"=>$notiTexto ,
        ":notiImgPortada"=>$notiImgPortada,
        ":notiImgMicro"=>$notiImgMicro 
    );
    $rs = $conn->actualizar($tabla, $campos, $valores, $condicion);
    if (is_array($conn->error)) {   
    echo json_encode($conn->error[2]);
    exit();
    }
    echo json_encode($rs);
}


function verMasNoticia() {
    global $conn;
    if( isset($_REQUEST['noticiaId'])) $noticiaId = $_REQUEST['noticiaId'];
    $tabla     = "noticias";
    $columnas  = "noti_id,noti_url,noti_titulo,noti_texto,noti_img_porta,noti_img_micro,noti_registro"; 
    $condicion = "noti_id =:noticiaId LIMIT 1";
    $valores   = array(":noticiaId" => $noticiaId);
    $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    if (is_array($conn->error)) {   
    echo json_encode($conn->error[2]);
    exit();
    }
    echo json_encode($rs);
    $conn->cerrarConexion();
}

function cargarNoticias() {
    global $conn;

    $tabla     = "noticias";
    $columnas  = "noti_id,noti_titulo,noti_img_micro"; 
    //$condicion = "cur_dip_pre_sem_curso_id =:cursoId ORDER BY galeria_id ASC";
    //$valores   = array(":cursoId" => $idCurso);
    $rs = $conn->consultar($columnas, $tabla, false);
    //$rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    if (is_array($conn->error)) {   
    echo json_encode($conn->error[2]);
    exit();
    }
    echo json_encode($rs);
    $conn->cerrarConexion();
}

function mostrarImagen() {
    global $conn;

    $tabla     = "galeria ORDER BY galeria_id DESC";
    $columnas  = "galeria_id,galeria_url,galeria_ingreso"; 
    //$condicion = "cur_dip_pre_sem_curso_id =:cursoId ORDER BY galeria_id ASC";
    //$valores   = array(":cursoId" => $idCurso);
    $rs = $conn->consultar($columnas, $tabla, false);
    //$rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    if (is_array($conn->error)) {   
    echo json_encode($conn->error[2]);
    exit();
    }
    echo json_encode($rs);
    $conn->cerrarConexion();
}

function cargarImagen() {   
   
    if( isset($_FILES)) $archivo = $_FILES;
    if( isset($_REQUEST['nombreImg'])) $nombreImg = $_REQUEST['nombreImg'];
    
    if($nombreImg == NULL || $nombreImg ==""){
        echo "vacio";
        exit();
    }
    if(array_key_exists('archivoImg', $archivo) == false){
                echo "vacio";
                exit();
            }

        if ($archivo['archivoImg']['type'] == 'image/png' || $archivo['archivoImg']['type'] == 'image/jpeg' || $archivo['archivoImg']['type'] == 'image/pjpeg' || $archivo['archivoImg']['type'] == 'image/jpg' || $archivo['archivoImg']['type'] == 'video/mp4') {
            $extencionImgen = $archivo['archivoImg']['type'];
            $extencionTipo = substr($extencionImgen, 6);
            $nombreArchivo = "$nombreImg".".$extencionTipo";
            if ($archivo['archivoImg']['size'] <= 3000000) {
                   global $conn;
                    $tablas    = "galeria"; 
                
                    $columnas  = "galeria_url";
                
                    $campos    = ":galeria_url";
                
                    $valores   = array(":galeria_url" =>$nombreArchivo);
                    $rs = $conn->agregar($tablas, $columnas, $campos, $valores);
                    
                    if ($rs !=0) {
                    copy($archivo['archivoImg']['tmp_name'], "../imagen/".$nombreArchivo."");
                    echo "cargado";
                    }else{
                        echo "yaExiste";
                        $conn->cerrarConexion();
                        exit();
                    }
                    /*if (is_array($conn->error)) {   
                    echo $conn->error[2];
                    $conn->cerrarConexion();
                    exit();
                    }*/
            }else{
             echo json_encode("archivoPesado");
            return; 
            }
        }else{
            echo json_encode("archivoNo");
            return;
        }
}

function actualizarInfoTemarioCurso() {
    
    if( isset($_REQUEST['idTemario'])) $idTemario = $_REQUEST['idTemario'];
    if( isset($_REQUEST['idTemarioSemest'])) $idTemarioSemest = $_REQUEST['idTemarioSemest'];
    if( isset($_REQUEST['idTemaUno'])) $idTemaUno = $_REQUEST['idTemaUno'];
    if( isset($_REQUEST['idTemaDos'])) $idTemaDos = $_REQUEST['idTemaDos'];
    if( isset($_REQUEST['idTemaTres'])) $idTemaTres = $_REQUEST['idTemaTres'];
    if( isset($_REQUEST['idTemaCuatro'])) $idTemaCuatro = $_REQUEST['idTemaCuatro'];
    if( isset($_REQUEST['idTemaCinco'])) $idTemaCinco = $_REQUEST['idTemaCinco'];
    if( isset($_REQUEST['idTemaSeis'])) $idTemaSeis = $_REQUEST['idTemaSeis'];
    
    /*
    if( $idTemario        == ""  ||
        $idTemarioSemest == "" ||
        $idTemaUno      == ""  ||
        $idTemaDos      == ""  ||
        $idTemaTres     == ""  ||
        $idTemaCuatro   == ""  ||
        $idTemaCinco    == ""  ||
        $idTemaSeis     == "")
    {
        echo json_encode("vacio");
        exit();
    }else{

    }*/
    global $conn;
    $tabla      = "cur_dip_pre_sem";
    $campos     = "cur_dip_pre_sem_num=:idTemarioSemest,
    cur_dip_pre_sem_tema=:idTemaUno,
    cur_dip_pre_sem_tema1=:idTemaDos,
    cur_dip_pre_sem_tema2=:idTemaTres,
    cur_dip_pre_sem_tema3=:idTemaCuatro,
    cur_dip_pre_sem_tema4=:idTemaCinco,
    cur_dip_pre_sem_tema5=:idTemaSeis";
    $condicion  = "cur_dip_pre_sem_id=:idTemario";
    $valores = array(":idTemario"=>$idTemario, 
        ":idTemarioSemest"=>$idTemarioSemest, 
        ":idTemaUno"=>$idTemaUno ,
        ":idTemaDos"=>$idTemaDos ,
        ":idTemaTres"=>$idTemaTres,
        ":idTemaCuatro"=>$idTemaCuatro,
        ":idTemaCinco"=>$idTemaCinco, 
        ":idTemaSeis"=>$idTemaSeis
    );
    $rs = $conn->actualizar($tabla, $campos, $valores, $condicion);
    if (is_array($conn->error)) {   
    echo json_encode($conn->error[2]);
    exit();
    }
    echo json_encode($rs);
}

function actualizarInfoRazonCurso() {
    
    if( isset($_REQUEST['idRazon'])) $idRazon = $_REQUEST['idRazon'];
    if( isset($_REQUEST['txtRazonUno'])) $txtRazonUno = $_REQUEST['txtRazonUno'];
    if( isset($_REQUEST['txtRazonDos'])) $txtRazonDos = $_REQUEST['txtRazonDos'];
    if( isset($_REQUEST['txtRazonTres'])) $txtRazonTres = $_REQUEST['txtRazonTres'];
    if( isset($_REQUEST['txtRazonCuatro'])) $txtRazonCuatro = $_REQUEST['txtRazonCuatro'];
    
    
    if( $idRazon == ""      ||
        $txtRazonUno == ""  ||
        $txtRazonDos == ""  ||
        $txtRazonTres == "" ||
        $txtRazonCuatro == "")
    {
        echo json_encode("vacio");
        exit();
    }else{

    }
    global $conn;
    $tabla      = "cur_dip_pre_raz";
    $campos     = "cur_dip_pre_raz1=:txtRazonUno,
    cur_dip_pre_raz2=:txtRazonDos,
    cur_dip_pre_raz3=:txtRazonTres,
    cur_dip_pre_raz4=:txtRazonCuatro";
    $condicion  = "cur_dip_pre_raz_id=:idRazon";
    $valores = array(":idRazon"=>$idRazon, 
        ":txtRazonUno"=>$txtRazonUno ,
        ":txtRazonDos"=>$txtRazonDos ,
        ":txtRazonTres"=>$txtRazonTres,
        ":txtRazonCuatro"=>$txtRazonCuatro 
    );
    $rs = $conn->actualizar($tabla, $campos, $valores, $condicion);
    if (is_array($conn->error)) {   
    echo json_encode($conn->error[2]);
    exit();
    }
    echo json_encode($rs);
}

function actualizarInfoGenerCurso() {
    if( isset($_REQUEST['idCurso'])) $idCurso = $_REQUEST['idCurso'];
    if( isset($_REQUEST['urlCurso'])) $urlCurso = $_REQUEST['urlCurso'];
    if( isset($_REQUEST['nombrePrograma'])) $nombrePrograma = $_REQUEST['nombrePrograma'];
    if( isset($_REQUEST['txtDescipcionCurso'])) $txtDescipcionCurso = $_REQUEST['txtDescipcionCurso'];
    if( isset($_REQUEST['numeroSemestres'])) $numeroSemestres = $_REQUEST['numeroSemestres'];
    if( isset($_REQUEST['videoMicro'])) $videoMicro = $_REQUEST['videoMicro'];
    if( isset($_REQUEST['imagPortada'])) $imagPortada = $_REQUEST['imagPortada'];
    if( isset($_REQUEST['imag1Curso'])) $imag1Curso = $_REQUEST['imag1Curso'];
    if( isset($_REQUEST['imag2Curso'])) $imag2Curso = $_REQUEST['imag2Curso'];
    if( isset($_REQUEST['imag3Curso'])) $imag3Curso = $_REQUEST['imag3Curso'];
    if( isset($_REQUEST['videoTesti'])) $videoTesti = $_REQUEST['videoTesti'];
    if( isset($_REQUEST['txtTestimonioCurso'])) $txtTestimonioCurso = $_REQUEST['txtTestimonioCurso'];
    if( isset($_REQUEST['cmbCertificadoSelecto'])) $cmbCertificadoSelecto = $_REQUEST['cmbCertificadoSelecto'];
    if( isset($_REQUEST['cmbModalidadSelecto'])) $cmbModalidadSelecto = $_REQUEST['cmbModalidadSelecto'];
    if( isset($_REQUEST['cmbSedSelecto'])) $cmbSedSelecto = $_REQUEST['cmbSedSelecto'];
    if( isset($_REQUEST['cmbCurDipSelecto'])) $cmbCurDipSelecto = $_REQUEST['cmbCurDipSelecto'];
    
    
    if($idCurso == "" ||
        $nombrePrograma == "" ||
        $txtDescipcionCurso == "" ||
        $numeroSemestres == "" ||
        $videoMicro == "" ||
        $imagPortada == "" ||
        $imag1Curso == "" ||
        $imag2Curso == "" ||
        $imag3Curso == "" ||
        $videoTesti == "" ||
        $txtTestimonioCurso == "" ||
        $cmbCertificadoSelecto == "" ||
        $cmbModalidadSelecto == "" ||
        $cmbSedSelecto == "" ||
        $cmbCurDipSelecto == ""||
        $urlCurso == "")
    {
        echo json_encode("vacio");
       exit();
    }else{

    }
    
    global $conn;
    $tabla      = "curso_diplomado_presencial";
    $campos     = "cur_dip_pre_url=:urlCurso,
    cur_dip_pre_cur_dip=:cmbCurDipSelecto,
    cur_dip_pre_nom=:nombrePrograma,
    cur_dip_pre_des=:txtDescipcionCurso,
    cur_dip_pre_cer=:cmbCertificadoSelecto,
    cur_dip_pre_moda=:cmbModalidadSelecto,
    cur_dip_pre_sem=:numeroSemestres,
    cur_dip_pre_img_micro=:videoMicro,
    cur_dip_pre_img=:imag1Curso,
    cur_dip_pre_img1=:imag2Curso,
    cur_dip_pre_img2=:imag3Curso,
    cur_dip_pre_img_por=:imagPortada,
    cur_dip_pre_video=:videoTesti,
    cur_dip_pre_testi=:txtTestimonioCurso,
    cur_dip_pre_sedes=:cmbSedSelecto";
    $condicion  = "cur_dip_pre_id=:idCurso";
    $valores = array(":idCurso"=>$idCurso, 
        ":nombrePrograma"=>$nombrePrograma,
        ":txtDescipcionCurso"=>$txtDescipcionCurso,
        ":numeroSemestres"=>$numeroSemestres,
        ":videoMicro"=>$videoMicro,
        ":imagPortada"=>$imagPortada,
        ":imag1Curso"=>$imag1Curso,
        ":imag2Curso"=>$imag2Curso,
        ":imag3Curso"=>$imag3Curso,
        ":videoTesti"=>$videoTesti,
        ":txtTestimonioCurso" => $txtTestimonioCurso ,
        ":cmbCertificadoSelecto" => $cmbCertificadoSelecto,
        ":cmbModalidadSelecto" => $cmbModalidadSelecto,
        ":cmbSedSelecto" => $cmbSedSelecto,
        ":cmbCurDipSelecto" => $cmbCurDipSelecto,
        ":urlCurso" => $urlCurso
    );
    $rs = $conn->actualizar($tabla, $campos, $valores, $condicion);
    if (is_array($conn->error)) {   
    echo json_encode($conn->error[2]);
    exit();
    }
    echo json_encode($rs);
}

function getTemarioEdit() {
    global $conn;
    if( isset($_POST['idCurso'])) $idCurso = $_POST['idCurso'];
   
    $tabla     = "cur_dip_pre_sem as sem";
    $columnas  = "sem.cur_dip_pre_sem_num AS numeroSemestre, 
    sem.cur_dip_pre_sem_tema AS tema1,
    sem.cur_dip_pre_sem_tema1 AS tema2, 
    sem.cur_dip_pre_sem_tema2 AS tema3,
    sem.cur_dip_pre_sem_tema3 AS tema4,
    sem.cur_dip_pre_sem_tema4 AS tema5, 
    sem.cur_dip_pre_sem_tema5 AS tema6,
    sem.cur_dip_pre_sem_id AS idTemaSem"; 
    $condicion = "cur_dip_pre_sem_curso_id =:cursoId ORDER BY cur_dip_pre_sem_num ASC";
    $valores   = array(":cursoId" => $idCurso);
    $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    if ($rs == null) {
    echo json_encode("logCargado");
    $conn->cerrarConexion();
    }
    echo json_encode($rs);
    $conn->cerrarConexion();
}

function getRazonesEditCurso() {
    global $conn;
    if( isset($_POST['idCurso'])) $idCurso = $_POST['idCurso'];
    $tabla     = "cur_dip_pre_raz AS razon";
    $columnas  = "razon.cur_dip_pre_raz1 AS razon1,
    razon.cur_dip_pre_raz2 AS razon2,
    razon.cur_dip_pre_raz3 AS razon3,
    razon.cur_dip_pre_raz4 AS razon4,
    cur_dip_pre_raz_id AS razonId"; 
    $condicion = "razon.cur_dip_pre_raz_cur_id =:cursoId";
    $valores   = array(":cursoId" => $idCurso);
    $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    if ($rs == null) {
    echo json_encode("sinDatos");
    $conn->cerrarConexion();
    return false;
    }
    echo json_encode($rs);
    $conn->cerrarConexion();
}

function cmbSedeOciones() {
    global $conn;
    $tabla     = "sedes";
    $columnas  = "sedes.sedes_id AS value, sedes.sedes_ciudad AS name"; 
    $rs = $conn->consultar($columnas, $tabla, false);
    if (is_array($conn->error)) {   
    echo json_encode("errorCargaSistema");
    return false;
    }
    echo json_encode($rs);
}

function cmbModalidadOciones() {
    global $conn;
    $tabla     = "cur_dip_pre_mod AS moda";
    $columnas  = "moda.cur_dip_pre_mod_id AS value, moda.cur_dip_pre_mod_Text AS name"; 
    $rs = $conn->consultar($columnas, $tabla, false);
    if (is_array($conn->error)) {   
    echo json_encode("errorCargaSistema");
    return false;
    }
    echo json_encode($rs);
}

function cmbDipOPreOpciones() {
    global $conn;
    $tabla     = "cur_dip";
    $columnas  = "cur_dip.cur_dip AS value, cur_dip.cur_dip_text AS name"; 
    $rs = $conn->consultar($columnas, $tabla, false);
    if (is_array($conn->error)) {   
    echo json_encode("errorCargaSistema");
    return false;
    }
    echo json_encode($rs);
}

function cmbCertificadoOpciones() {
    global $conn;
    $tabla     = "cur_dip_pre_cer";
    $columnas  = "cur_dip_pre_cer.cur_dip_pre_cer_id AS value, cur_dip_pre_cer.cur_dip_pre_cer_text AS name"; 
    $rs = $conn->consultar($columnas, $tabla, false);
    if (is_array($conn->error)) {   
    echo json_encode("errorCargaSistema");
    return false;
    }
    echo json_encode($rs);
}


function carInfoGeneralCurso() {
    global $conn;
    if( isset($_POST['idCurso'])) $idCurso = $_POST['idCurso'];
    $tabla     = "curso_diplomado_presencial as curso
    LEFT JOIN cur_dip_mod as moda ON moda.cur_dip_mod_cur__id =curso.cur_dip_pre_id";
    $columnas  = "curso.cur_dip_pre_id AS idCursoS,
    curso.cur_dip_pre_url AS urlCurso,
    curso.cur_dip_pre_nom as nombreCurso,
    curso.cur_dip_pre_cur_dip AS dipOCurso,
    curso.cur_dip_pre_des as cursoDescripcion,
    curso.cur_dip_pre_sem as semestre,
    curso.cur_dip_pre_img as cursoImg1,
    curso.cur_dip_pre_img1 as cursoImg2,
    curso.cur_dip_pre_img2 as cursoImg3,
    curso.cur_dip_pre_img_por AS imgPortada,
    curso.cur_dip_pre_video AS videoTestCur,
    curso.cur_dip_pre_testi AS testiCurso,
    curso.cur_dip_pre_img_micro AS videoInicio,
    curso.cur_dip_pre_moda AS modalidad,
    curso.cur_dip_pre_cer AS certificado,
    curso.cur_dip_pre_sedes AS sede"; 
    $condicion = "cur_dip_pre_id = :cursoId";
    $valores   = array(":cursoId" => $idCurso);
    $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    if ($rs == null) {
    echo json_encode("logCargado");
    $conn->cerrarConexion();
    return false;
    }
    echo json_encode($rs);
    $conn->cerrarConexion();
}

function cmbCursos() {
    global $conn;
    $tabla     = "curso_diplomado_presencial";
    $columnas  = "cur_dip_pre_id AS value, cur_dip_pre_nom AS name"; 
    $rs = $conn->consultar($columnas, $tabla, false);
    if (is_array($conn->error)) {   
    echo json_encode("errorCargaSistema");
    return false;
    }
    echo json_encode($rs);
}


function checkContacto() {
    if( isset($_REQUEST['estadoCalificadorConId'])) $idContactoC = $_REQUEST['estadoCalificadorConId'];
    global $conn;
    $tabla      = "contacto";
    $campos     = "cont_estado=1";
    $condicion  = "contacto.cont_id=:idContacto";
    $valores = array(":idContacto"=>$idContactoC);
    $rs = $conn->actualizar($tabla, $campos, $valores, $condicion);
    if (is_array($conn->error)) {   
    echo json_encode("errorCargaSistema");
    return false;
    }
    echo json_encode($rs);
}

function mensajeContacto() {
    if( isset($_REQUEST['idContactoM'])) $idContactoC = $_REQUEST['idContactoM'];
    global $conn;
    $tabla     = "contacto";
    $columnas  = "contacto.cont_menesaje AS mensaje"; 
    $condicion = "contacto.cont_id=:idContactoC";
    $valores = array(":idContactoC" => $idContactoC);
    $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    if (is_array($conn->error)) {   
    echo json_encode("errorCargaSistema");
    return false;
    }
    echo json_encode($rs);
}

function contactoPersonas() {
    global $conn;
    $tabla     = "contacto";
    $columnas  = "contacto.cont_nombre AS nombreC, contacto.cont_correo AS correoC, contacto.cont_celular AS celularC,contacto.cont_id AS idContactC"; 
    $condicion = "contacto.cont_estado = :estadoContacto";
    $valores = array(":estadoContacto" => "0");
    $rs = $conn->consultarCondicion($columnas, $tabla, $condicion, $valores);
    if (is_array($conn->error)) {   
    echo json_encode("errorCargaSistema");
    return false;
    }
    echo json_encode($rs);
}

function calificarBien() {
    if( isset($_REQUEST['idProspecto'])) $idProspecto = $_REQUEST['idProspecto'];
    if( isset($_REQUEST['estadoCalificador'])) $estadoCalif = $_REQUEST['estadoCalificador'];
    if($idProspecto == "" || $estadoCalif== ""){
        echo json_encode("Vacios");
        return false;
    }
    global $conn;
    $tabla     = "prospecto";
    $campos  = "estado_prospecto=:estadoCalificador";
    $condicion = "prospecto.id_prospecto =:idProspec";
    $valores = array(":idProspec"=>$idProspecto, ":estadoCalificador"=>$estadoCalif);
    $rs = $conn->actualizar($tabla, $campos, $valores, $condicion);
    if (is_array($conn->error)) {   
    echo json_encode("errorCargaSistema");
    return false;
    }
    echo json_encode($rs);
}

function consultaProspectoAS() {
    global $conn;
    $tabla     = "prospecto LEFT JOIN curso_diplomado_presencial AS curso ON curso.cur_dip_pre_id = prospecto.programa_interes_prospecto WHERE prospecto.estado_prospecto = 0 ORDER BY prospecto.fechaingresoo ASC 
    LIMIT 10";
    $columnas  = "prospecto.id_prospecto AS idProspecto,
    prospecto.nombre_prospecto AS nombreP,
    prospecto.fechanace_prospecto AS FechaP,
    prospecto.correo_prospecto AS correoP,
    prospecto.celular_prospecto AS celularP,
    curso.cur_dip_pre_nom AS interesP,
    prospecto.fechaingresoo AS registroP"; 
    $rs = $conn->consultar($columnas, $tabla, false);
    if (is_array($conn->error)) {   
    echo json_encode("errorCargaSistema");
    return false;
    }
    echo json_encode($rs);
}

?>
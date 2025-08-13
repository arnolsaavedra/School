$(document).ready(function(){
   $('.carousel').carousel({
   autoplay: true,
   indicators: true
  
});
autoplay();
function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 4500);
}
  
  });
  var virtualOPresencial = "";
//cargar Datos curso
function cargar_info_paso1(idCurso) {
        let dataGetCurso = new FormData();
        dataGetCurso.append("opcion", "1");
        dataGetCurso.append("idCurso", idCurso);
        $.ajax({
        url: "../controller/cargar_info_curso.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataGetCurso,
        async: false,
        global: true,
        ifModified: true,
        processData: false,
        cache: true,
        beforeSend: function (objeto) {
        },
        complete: function (objeto, exito) {
            $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
        },
        success: function (result) {
            if(result === "logCargado"){
            return false;
            }
            //confirmado
             let TitleCurso = "San Pedro Claver Neiva - "+result[0]["nombreCurso"]+"";
            $("#nombreCursoTitle").html(TitleCurso);
            let portadaCurso = result[0]["imgPortada"];
            $("#imagenPortadCurso").css("background-image","url("+portadaCurso+")");
            $("#fondoCuatroRazones").css("background-image","url("+portadaCurso+")");
            $("#videoTestimonioPro").html("<iframe class='tamano-video'  src='"+result[0]['videoTestCur']+"' frameborder='0' allow='accelerometer; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>");
            $("#texttestiprogra").html("<p>"+result[0]["testiCurso"]+"</p>");
            let nombreCursoCuatroRazones = result[0]["nombreCurso"];
            $("#nombreCursoCuatroRazones").html(nombreCursoCuatroRazones);
            let TitleCursoGrande = result[0]["nombreCurso"];
            $("#nombreCursoIni").html(TitleCursoGrande);
            let tituloCurso = "<h3 class='title-h3-curse'>"+result[0]["nombreCurso"]+"</h3>";
            $("#nombreCurso").html(tituloCurso);
            let imagenesCurso = "<a class='carousel-item' href='#one!'><img src='"+result[0]["cursoImg1"]+"'></a><a class='carousel-item' href='#one!'><img src='"+result[0]["cursoImg2"]+"'></a><a class='carousel-item' href='#one!'><img src='"+result[0]["cursoImg3"]+"'></a>";
            $("#imagenCursoContent").html(imagenesCurso);
            let descripcionCurso =result[0]["cursoDescripcion"];
            $("#descripcionCursoContent").html(descripcionCurso);
           // $('head').append('<meta name="description" content="'+descripcionCurso+'" />');
            
            var link = document.createElement('meta');
              link.setAttribute('property', 'description');
              link.content = descripcionCurso;
              document.getElementsByTagName('head')[0].appendChild(link);
              
              link = document.createElement('meta');
              link.setAttribute('property', 'og:description');
              link.content = descripcionCurso;
              document.getElementsByTagName('head')[0].appendChild(link);
              
              link = document.createElement('meta');
              link.setAttribute('property', 'og:title');
              link.content = "San Pedro Claver - "+result[0]["nombreCurso"];
              document.getElementsByTagName('head')[0].appendChild(link);
              
              link = document.createElement('meta');
              link.setAttribute('name', 'keywords');
              link.content = "escuela,salud,neiva,Neiva,NEIVA,"+result[0]["nombreCurso"]+","+idCurso+"";
              document.getElementsByTagName('head')[0].appendChild(link);
              
              $('head').append("<title>"+TitleCurso+"</title>");
            
              
            //CERTIFICADO
            let certificadoCurso ="<p><i class='Small material-icons color-icon' style='vertical-align: middle;'>receipt</i> Certificado: "+result[0]["certificado"]+"</p>";
            $("#info-general-cursoContentCert").html(certificadoCurso);
            virtualOPresencial = result[0]["modaliIf"];
            diplomadoONO = result[0]["dipOCurso"];
            let semestreCurso ="";
            if(result[0]["modaliIf"] == "1"){
                semestreCurso ="<p><i class='Small material-icons color-icon' style='vertical-align: middle;'>insert_chart</i> Semestres/s: "+result[0]["semestre"]+"</p>";
            }else if(result[0]["modaliIf"] == "2"){
                semestreCurso ="<p><i class='Small material-icons color-icon' style='vertical-align: middle;'>insert_chart</i> Modulo/s: "+result[0]["semestre"]+"</p>";
            }
            let modalidad = "<p><i class='Small material-icons color-icon' style='vertical-align: middle;'>language</i> Modalidad: "+result[0]["modalidad"]+"<p>";
            let sedeCurso = "<p><i class='Small material-icons color-icon' style='vertical-align: middle;'>gps_fixed</i> Sedes: "+result[0]["sede"]+"<p>"; 
            $("#info-general-cursoContent").html(modalidad);
            $("#info-general-cursoContentSemestre").html(semestreCurso);
            $("#info-general-cursoContentSede").html(sedeCurso);
            cargar_info_paso3Semestre(result[0]["idCursoS"],virtualOPresencial,diplomadoONO);
            cargar_info_paso4Razones(result[0]["idCursoS"]);
            
            $("#curso_diplomado").removeClass("CJtext");
            $("#imagenCurso").removeClass("loadimg");
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
    });
}
function cargar_info_paso3Semestre(idCurso,virtualONO,diplomadoO) {
        let dataGetCurso = new FormData();
        dataGetCurso.append("opcion", "4");
        dataGetCurso.append("idCurso", idCurso);
        $.ajax({
        url: "../controller/cargar_info_curso.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataGetCurso,
        async: true,
        global: true,
        ifModified: false,
        processData: false,
        cache: true,
        beforeSend: function (objeto) {
        },
        complete: function (objeto, exito) {
            $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
        },
        success: function (result) {
            if(result === "logCargado"){
            return false;
            }
            //confirmado
            let semestreCurso = ""; 
          for(let contador = 0;contador < result.length;contador++){
            semestreCurso +="<section class='contenido-semestre card-panel margin-card-curse'>"+
                    "<section>"+
                        "<i class='Medium material-icons color-icon'>library_books</i>";
                        if(virtualONO == "2"){
                            semestreCurso += "<h3>Modulo "+result[contador]["numeroSemestre"]+"</h3>";
                        }else if(diplomadoO == "2"){
                            semestreCurso += "<h3>Temario "+result[contador]["numeroSemestre"]+"</h3>";
                        }else{
                            semestreCurso += "<h3>Semestre "+result[contador]["numeroSemestre"]+"</h3>";
                        }     
                    semestreCurso += "</section>"+
                    "<section style='text-align:left;'>"+
                        "<ol class='ol-contenido-semestre' style='float: inline-start;'>";
                        for(let contadorDos = 1;contadorDos < 7;contadorDos++){
                           if(result[contador]["tema"+contadorDos] == null || result[contador]["tema"+contadorDos] == ""){
                                 
                            }else{
                                
                                semestreCurso += "<li type='disc'><p class='li-contenido'>"+result[contador]["tema"+contadorDos]+"</p></li>";
                            }
                        }
                       semestreCurso += "</ol>"+
                    "</section>"+
                "</section>";
          }
            $("#semestreCurso").html(semestreCurso);
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
    });
}
function cargar_info_paso4Razones(idCurso) {
        let dataGetCurso = new FormData();
        dataGetCurso.append("opcion", "5");
        dataGetCurso.append("idCurso", idCurso);
        $.ajax({
        url: "../controller/cargar_info_curso.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataGetCurso,
        async: true,
        global: true,
        ifModified: false,
        processData: false,
        cache: true,
        beforeSend: function (objeto) {
            //dialogLoading('show');
        },
        complete: function (objeto, exito) {
            $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
        },
        success: function (result) {
            if(result === "logCargado"){
                return false;
            }
            let razonCurso = ""; 
            let icono ="";
          for(var contador = 0;contador < 4;contador++){
              if(contador === 0){
                  icono ="looks_one";
              }
              if(contador === 1){
                  icono ="looks_two";
              }
              if(contador === 2){
                  icono ="looks_3";
              }
              if(contador === 3){
                  icono ="looks_4";
              }
            razonCurso +="<div  class='contenedor-razon'>"+
                                "<p><i class='Medium material-icons four-razon'>"+icono+"</i></i></p>"+
                                "<p>"+result[0]["razon"+contador]+"</p>"+
                            "</div>";
          
            $("#razonCurso").html(razonCurso);
        }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      alert( "error" );
      return false;
    })
    .always(function() {
    });
}
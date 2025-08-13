  function carruselPrese(){
                    $('#owl-2Pr .owl-carousel').owlCarousel(
        {
            items:1,
            loop:true,
            margin:24,
            autoplay:false,
            autoplayTimeout:3500,
            autoplayHoverPause:true,
            animateOut: 'bounceInRight',
            animateIn: 'bounceOutLeft',
            nav: true,
             navText: [
    "<i class='fa fa-caret-left'></i>",
    "<i class='fa fa-caret-right'></i>"
  ],
            responsive : {
                // breakpoint from 480 up
                670 : {
                items:2,
                margin:1
                },
                1085:{
                items:2,
                margin:24
                }
            }
        }
        );
  }
  var infoCurso = "";
  var modalidadVarEstructura = "";
  var sedesEstructuraPre = "";
function cargarListaCursoPresencialFla() {
        var dataGetCursoPre1 = new FormData();
        dataGetCursoPre1.append("opcion", "6");
        $.ajax({
        url:"../controller/listaCursoPresencial.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataGetCursoPre1,
        async: false,
        global: true,
        ifModified: false,
        processData: false,
        cache: false,
        beforeSend: function (objeto) {
        },
        complete: function (objeto, exito) {
            $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
        },
        success: function (result) {
            if(result == "logCreado"){
            }else{
            for(var contador = 0; contador <result.length;contador++){
                let variable = result[contador]["idCurso"];
                cargarListaCursoPaso1(variable);
              
            }
            }
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        
    });
}
function cargarListaCursoPaso1(idCurso) {
        var dataGetCurso = new FormData();
        dataGetCurso.append("opcion", "1");
        dataGetCurso.append("idCurso", idCurso);
        $.ajax({
        url:"../controller/listaCursoPresencial.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataGetCurso,
        async: false,
        global: true,
        ifModified: false,
        processData: false,
        cache: false,
        beforeSend: function (objeto) {
        },
        complete: function (objeto, exito) {
            $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
        },
        success: function (result) {
            if(result == "logCreado"){
                
            }else{
            infoCurso = "";
            $('#loaderCursosPres').empty();
            $('#loaderCursosPres').hide();
            infoCurso = "<div class='tamanoTargetCurso efectoZoom'>"+
                "<section id='"+result[0]['nombreCurso']+"' name='"+result[0]['nombreCurso']+"'>"+
                    "<h3 class='letra-lista-cursos' >"+result[0]['nombreCurso']+"</h3>"+
                "</section>"+
                "<section style='text-align:center;'>"+
                "<section id='imagenTextoCurso'>"+
                    "<section id='imagenCurso' name='imagenCurso' class='imagen-curso-div-index'>"+
                     //"<img class='imagen-curso-div-index' src='"+result[0]['cursoImg1']+"'>"+

                     "<iframe class='imagen-curso-div-index' width='350' height='165' src='"+result[0]['cursoImg1']+"' frameborder='0' allow='accelerometer; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>"+
                    //"<iframe src='https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FSanPedroClaverSedeNeiva%2Fvideos%2F2313986438824275%2F&show_text=0&width=560' width='350' height='156' style='border:none;overflow:hidden' scrolling='no' frameborder='0' allowTransparency='true' allowFullScreen='true'></iframe>"+
                    "</section>"+
                    "<center><section id='descripcionCurso' name='descripcionCurso' class='' style='width:300px;'>"+
                    "<p id='textoDescripcionCurso' name='textoDescripcionCurso' class='txtDescripcionCurso'>"+
                        ""+result[0]['cursoDescripcion']+""+
                    "</p>"+
                    "<div class='' style='text-align:center;text-align: justify;font-size: 16px;line-height: 20px;'>"+
                    "<a href='/pre-inscripcion' target='_blank' class='waves-effect waves-light btn'><i class='material-icons right fas fa-file-signature'></i>Pre-Inscripcion</a>"+
                    "<br>"+
                    "</div>"+
                    "</section></center>"+
                "</section>"+
                "<section id='caracteristicasCurso'>"+
                    "<div class='card-panel' style='background-color:#9e9e9e;color:white;padding:5px;text-align:left;padding-top: 0;'>"+
                    "<div style='background-color:#0d883e;    border-bottom-left-radius: 50px;border-bottom-right-radius: 50px;'>"+
                    "<h6 style='text-align:center;color:white;margin-top: 0;'><b>GENERAL</b></h6>"+
                    "</div>"+
                    "<div style='padding-left: 10%;'>"+
                         "<p><i class='color-icon-cursos-index'>keyboard_arrow_right</i> Modalidad: "+result[0]['modalidad']+"</p>"+
                        "<p><i class='color-icon-cursos-index'>keyboard_arrow_right</i> Semestres: "+result[0]['semestre']+"</p>"+
                        "<p><i class='color-icon-cursos-index'>keyboard_arrow_right</i> Certificado: "+result[0]['certificado']+"</p>"+
                        "<p><i class='color-icon-cursos-index'>keyboard_arrow_right</i> Sede/s: "+result[0]['sede']+"</p>"+
                       
                        "</div>"+
                    "</div>"+
                    "<div class='' style='text-align:center;'>"+
                    "<a href='/"+result[0]['urlCurso']+"' target='_blank' class='waves-effect waves-light btn'>Más Información</a>"+
                    "<br>"+
                    "</div>"+
                "</section>"+
                "</section>"+
                "<br>"+
            "</div>";
            $('#listaCursosPresenciales').append(infoCurso);
            }
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
    });
}
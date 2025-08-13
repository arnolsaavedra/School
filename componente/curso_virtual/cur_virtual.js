  $(document).ready(function(){

  });
  
  var infoCurso = "";
  var modalidadVarEstructura = "";
  var urlcontrollerVirtu = "../controller/curso_virtual_lista.php";
  function asyncSqrtVirtual(callback) {
    setTimeout(function() {
        callback(cargarListaCursoVirtual());
    }, 0 | Math.random() * 100);
}

function carruselVirtual_2(){
        $('#owl-2Virtual_2 .owl-carousel').owlCarousel(
    {
        items:1,
        loop:true,
        margin:24,
        autoplay:true,
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

function cargarListaCursoVirtual_2() {
        var dataGetCursoVir = new FormData();
        dataGetCursoVir.append("opcion", "6");
        $.ajax({
        url:urlcontrollerVirtu,
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataGetCursoVir,
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
            for(var contador = 0; contador < result.length;contador++){
                cargarListaCursoPasoVirtual_1(result[contador]["idCurso"]);
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

function cargarListaCursoPasoVirtual_1(idCurso) {
        var dataGetCurso = new FormData();
        dataGetCurso.append("opcion", "1");
        dataGetCurso.append("idCurso", idCurso);
        $.ajax({
        url:urlcontrollerVirtu,
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
            //dialogLoading('show');
        },
        complete: function (objeto, exito) {
            $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
        },
        success: function (result) {
            if(result == "logCreado"){
              
            }else{
            infoCurso = "";
            $('#loaderCursosVir_2').empty();
            $('#loaderCursosVir_2').hide();
            infoCurso = "<div id='caracteristicaZoneTres'  class='tamanoTargetCurso'>"+
                "<section id='"+result[0]['nombreCurso']+"' name='"+result[0]['nombreCurso']+"'>"+
                    "<h3 class='letra-lista-cursos' >"+result[0]['nombreCurso']+"</h3>"+
                "</section>"+
                "<section style='text-align:center;'>"+
                "<section id='imagenTextoCurso'>"+
                    "<section id='imagenCurso' name='imagenCurso' class='imagen-curso-div-index'>"+
                      "<iframe class='imagen-curso-div-index' width='350' height='165' src='"+result[0]['cursoImg1']+"' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>"+
                     //"<img class='imagen-curso-div-index' src='"+result[0]['cursoImg1']+"'>"+
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
                        "<p><i class='fas fa-chevron-circle-right color-icon-cursos-index'></i> Modalidad: "+result[0]['modalida']+"</p>"+
                        "<p><i class='fas fa-chevron-circle-right color-icon-cursos-index'></i> Modulos: "+result[0]['semestre']+"</p>"+
                        "<p><i class='fas fa-chevron-circle-right color-icon-cursos-index'></i> Certificado: "+result[0]['certificado']+"</p>"+
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
            $('#listaCursosVirtual_2').append(infoCurso);
            }
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
    });
}

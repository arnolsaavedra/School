  $(document).ready(function(){
  

  });
  
  var urlControlador = "../controller/listaProgramas.php";
function cargarProgramas() {
        var dataGetCursoPre1 = new FormData();
        dataGetCursoPre1.append("opcion", "2");
        $.ajax({
        url:urlControlador,
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
            //confirmado
            for(var contador = 0; result.length > contador;contador++){
                let variable = result[contador]["idCurso"];
                cargarProgramas1(variable);
            }
            }

        },
     //   error: function (objeto, quepaso, otroobj) {
      ///      alert("error R" + otroobj + " " + quepaso + " " + objeto);
       // },
    })
    .fail(function() {
     // alert( "errordr" );
      return false;
    })
    .always(function() {
    });
}
function cargarProgramas1(idCurso) {
        var dataGetCurso = new FormData();
        dataGetCurso.append("opcion", "1");
        dataGetCurso.append("idCurso", idCurso);
        $.ajax({
        url:urlControlador,
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
            infoCurso = "<div class='tamanoTargetCursoDiplomado efectoZoom'>"+
            "<div id='nombrePrograma' name='nombrePrograma'>"+
                                   "<h3 class='letra-lista-cursos'>"+result[0]["nombreCurso"]+"</h3>"+
                                "</div>"+
                                "<div>"+
                                    "<iframe class='imagen-curso-div-index' src='"+result[0]["cursoImg1"]+"' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen='' width='350' height='165' frameborder='0'></iframe>"+
                               "</div>"+
                                "<div>"+
                                    "<p id='textoDescripcionCurso' name='textoDescripcionCurso' class='txtDescripcionCurso'>"+result[0]["cursoDescripcion"]+"</p>"+
                                "</div>"+
                                "<div name='BotonUrlCurso'>"+
                                    "<a href='/"+result[0]["urlCurso"]+"' target='_blank' class='waves-effect waves-light btn'>Más Información</a>"+
                                "</div>"+
            "</div>";
            $('#programasSanPedroClaver').append(infoCurso);
            }
        },
       // error: function (objeto, quepaso, otroobj) {
        ///    alert("error E" + otroobj + " " + quepaso + " " + objeto);
        //},
    })
    .fail(function() {
      return false;
    })
    .always(function() {
    });
}
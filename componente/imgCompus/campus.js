
  $(document).ready(function(){
    $('.materialboxed').materialbox();
  });

function mostrarImgCampus() {
        var dataGetCurso = new FormData();
        dataGetCurso.append("opcion", "1");
        $.ajax({
        url:"../controller/galeriaCampus.php",
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
            let contenido = "";
            for(let contador = 0;contador < result.length;contador++){
                contenido += "<img  style='display:inline-block;' class='materialboxed' data-caption='"+result[contador]["img_campus_text"]+"' width='250' src='"+result[contador]["img_campus_url"]+"'>";
            }
            $('#galeriaSanpedroClaver').append(contenido);
              $('.materialboxed').materialbox();
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

$(document).ready(function(){
   
  });
function cargarNoticias() {
        let dataGetCurso = new FormData();
        dataGetCurso.append("opcion", "1");
        $.ajax({
        url: "../controller/noticias.php",
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
            let contenido = "";
            for(let contador = 0; contador< result.length;contador++){
                contenido += "<article class='efectoZoom noticiasFormat'>"+
                        "<img src='"+result[contador]["noti_img_micro"]+"'  >"+
                        "<h2 >"+result[contador]["noti_titulo"]+"</h2>"+
                        "<p class='txtDescripcionCurso'>"+result[contador]["noti_texto"]+"</p>"+
                        "<a class='waves-effect waves-light btn-small' href='/noticias/"+result[contador]["noti_url"]+"'>Ver más</a>"+ 
                    "</article>";
            }
            $("#listadoNoticias").html(contenido);
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

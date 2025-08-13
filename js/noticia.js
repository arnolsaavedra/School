$(document).ready(function(){
   
  });
function cargarNoticia(idNoticia) {
        let dataGetCurso = new FormData();
        dataGetCurso.append("opcion", "1");
        dataGetCurso.append("idNoticia",idNoticia);
        $.ajax({
        url: "../controller/noticia.php",
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
            let tituloNoticia =result[0]["noti_titulo"]+" | San Pedro Claver Neiva";
            $("#titleNoticia").html(tituloNoticia);
            $("#nombreNoticia").html(result[0]["noti_titulo"]);

            let contenido = "";
                contenido += "<article>"+
                        "<figure style='text-align:center'>"+
                        "<img src='"+result[0]["noti_img_porta"]+"' style='width: -moz-available;' height='400px' style='background-color:red;'>"+
                        "</figure>"+
                        "<section name='tituloNoticia'><h1 style='font-family: 'sans-serif';'>"+result[0]["noti_titulo"]+"</h1></section>"+
                        "<section>"+
                        "<p style='text-align: justify;'>"+result[0]["noti_texto"]+"</p>"+
                        "</section>"+
                    "</article>";
            
            $("#noticia").html(contenido);
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

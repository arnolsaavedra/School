
function listaPrograma() {
        var dataGetCursoPre1 = new FormData();
        dataGetCursoPre1.append("opcion", "1");
        $.ajax({
        url:"../../controller/listaPrograma.php",
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
            let contenido ="";
            for(var contador = 0; result.length > contador;contador++){
              contenido += "<div>"+
                    "<a href='/"+result[contador]["urlCurso"]+"' target='_blank'>"+
                        "<article style='padding-bottom: 2%;'>"+
                            "<div style='display: table-cell;vertical-align: top;padding-right: 15px;'>"+
                                "<img src='"+result[contador]["cursoImg1"]+"' width='76' height='65' style='background-color:red;margin: 0;position: relative;overflow: hidden;'>"+
                            "</div>"+
                            "<div name='TituloProgramaNoticia' style='display: table-cell;vertical-align: middle;'>"+
                                "<h2 class='' style='text-align:left;text-transform: uppercase;font-size: 18px;line-height: 20px;font-weight: 600;letter-spacing: 0.3px;margin: -5px 0 0 0;'>"+result[contador]["nombreCurso"]+"</h2>"+
                            "</div>"+
                        "</article>"+
                    "</a>"+
                "</div>";
            }
            $("#programasLista").html(contenido);
            }

        },
     error: function (objeto, quepaso, otroobj) {
            alert("error R" + otroobj + " " + quepaso + " " + objeto);
       },
    })
    .fail(function() {
     // alert( "errordr" );
      return false;
    })
    .always(function() {
    });
}
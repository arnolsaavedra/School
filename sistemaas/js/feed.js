var URLRaiz = URLRaiz();

$(document).ready(function(){
    $('.modal').modal();
    $('input#razonCurso1').characterCounter();
  });
  
 var quesCerfitifcado = "";

$("#inicioFeed").on("click", function(){
    dlgCargando("show");

    $("#respuestaOpcion").css("display","none");
    $("#infoCursoALL").css("display","none");
    $("#getTemarioEdit").css("display","none");
    $("#getCuatroRazonesEditDiv").css("display","none");
    $("#inicioAsManual").css("display","inherit");
    dlgCargando("close");
});
 
$("#registrosButton").on("click", function(){
    $("#inicioAsManual").css("display","none");
    $("#infoCursoALL").css("display","none");
    $("#getTemarioEdit").css("display","none");
    $("#getCuatroRazonesEditDiv").css("display","none");
     registroProspectos();
});
 
$("#btnCampus").on("click", function(){
    $("#inicioAsManual").css("display","none");
    $("#infoCursoALL").css("display","none");
    $("#getTemarioEdit").css("display","none");
    $("#getCuatroRazonesEditDiv").css("display","none");
    editarGaleriaCampus(); 
});
 
$("#noticias").on("click", function(){
    $("#inicioAsManual").css("display","none");
    $("#infoCursoALL").css("display","none");
    $("#getTemarioEdit").css("display","none");
    $("#getCuatroRazonesEditDiv").css("display","none");
    noticias();
});

$("#galeria").on("click", function(){
    $("#inicioAsManual").css("display","none");
    $("#infoCursoALL").css("display","none");
    $("#getTemarioEdit").css("display","none");
    $("#getCuatroRazonesEditDiv").css("display","none");
    galeria();
});

$("#masInformacionASButton").on("click", function(){
    dlgCargando("show");
    $("#inicioAsManual").css("display","none");
    $("#infoCursoALL").css("display","none");
    $("#getTemarioEdit").css("display","none");
    $("#getCuatroRazonesEditDiv").css("display","none");
    masInformacionAS();
    dlgCargando("close");
});
$("#contactoASButton").on("click", function(){
    dlgCargando("show");
    $("#inicioAsManual").css("display","none");
    $("#infoCursoALL").css("display","none");
    $("#getTemarioEdit").css("display","none");
    $("#getCuatroRazonesEditDiv").css("display","none");
    contactoPersonaAS();
    dlgCargando("close");
});

$("#cursosAS").on("click", function(){
    dlgCargando("show");
    $("#inicioAsManual").css("display","none");
    $("#infoCursoALL").css("display","none");
    $("#getTemarioEdit").css("display","none");
    $("#getCuatroRazonesEditDiv").css("display","none");
    cmbCursos();
    cmbCertificadoJs();
    cmbModalidadJs();
    cmbSedeJs();
    cmbCurDipJs();
    dlgCargando("close");
});

$("#btnBuscarInforCurso").on("click", function(){
dlgCargando("show");
cargarInformacionCursos();
dlgCargando("close");
});


function buscarInteresProspecto(interes) {
    dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "25");
        dataSistemaAs.append("interes", interes);
        dataSistemaAs.append("fechaDesde", $("#fechaDesde").val());
        dataSistemaAs.append("fechaHasta", $("#fechaHasta").val());

        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == "errorCargaSistema"){
            }else{
                let contenido = "Debes seleccionar las fechas 'Desde' y 'Hasta' para realizar la busqueda.";
                if(result == "vacio"){
                    dlgAlert(3);
                    $("#mensajeContacC").html(contenido);
                }else{
                if(interes == "1"){
                    interes = "interesadas.";
                }else if (interes == "2"){
                    interes = "no interesadas.";
                }
                contenido = "<table>"+
                  "<div class='card-panel'>"+
                  "<h4>personas "+interes+"</h4>"+
                  "</div>"+
                    "<thead>"+
                      "<tr>"+
                          "<th>Nombre</th>"+
                          "<th>Celular</th>"+
                          "<th>Correo</th>"+
                          "<th>Interés</th>"+
                          "<th>Check</th>"+
                      "</tr>"+
                    "</thead>"+
                    "<tbody>";
                    for(contador = 0; contador < result.length;contador++){
                     contenido+="<tr>"+
                        "<td>"+result[contador]["nombre"]+"</td>"+
                        "<td>"+result[contador]["celular"]+"</td>"+
                        "<td>"+result[contador]["correo"]+"</td>"+
                        "<td>"+result[contador]["programaInteres"]+"</td>"+
                        "<td>"+result[contador]["checkeado"]+"</td>"+
                        "</tr>";
                    }
             contenido+="</tbody>"+
              "</table>";
                
               $("#mensajeContacC").html(contenido);
                }
                 dlgCargando("close");
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}


function registroProspectos() {
    dlgCargando("show");
    let contenido = "";
    contenido += "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>Fecha desde</p>"+
                    "<input id='fechaDesde' name='fechaDesde' type='date' class='validate' >"+
                "</div>"+
                "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>Fecha hasta</p>"+
                    "<input id='fechaHasta' name='fechaHasta' type='date' class='validate'>"+
                "</div>"+
                "<a id='btnBusRegisInte' href='#modal1' name='btnBusRegisInte' onclick='buscarInteresProspecto(1);' style='display:block;margin:1%;' class='waves-effect waves-light btn modal-trigger'><i class='material-icons left'>search</i>Interesados</a><hr>"+ 
                "<a id='btnBusRegisNOInte' href='#modal1' name='btnBusRegisNOInte' onclick='buscarInteresProspecto(2);' style='display:block;margin:1%;' class='waves-effect waves-light btn modal-trigger'><i class='material-icons left'>search</i>NO interesados</a><hr>"; 
           // $("#mensajeContacC").html(contenido);
              
              $("#respuestaOpcion").html(contenido);
              $("#inicioAsFeed").css("display","none");
              $("#respuestaOpcion").css("display","inherit");
                dlgCargando("close");
}

function actualizarImagenCampus(idImgenGaleria) {
    dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "24");
        dataSistemaAs.append("idImgenCampus", idImgenGaleria);
        
        dataSistemaAs.append("imgCampusUrl", $("#imgCampusUrl"+idImgenGaleria+"").val());
        dataSistemaAs.append("imgCampusText", $("#imgCampusText"+idImgenGaleria+"").val());
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == "yaExiste"){
                alert("Imágen ya existe, seleccione otra");
            }else if(result){
                dlgAlert(6);
                editarGaleriaCampus();
            }else if(result == "vacio"){
                dlgAlert(3);
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}

function agregarNoticiaAgregar(){
        dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "22");
        var other_data = $("#frmAgregarNoticia").serializeArray();
        $.each(other_data, function (key, input) {
            if(input.value == "" || input.value == null){
                dlgCargando("close");
                dlgAlert(3);
               return false;
            }else{
                dataSistemaAs.append(input.name, input.value);
            }
        
        });
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result){
                dlgAlert(6);
                document.getElementById("frmAgregarNoticia").reset();
                noticias();
            }else if(result == "vacio"){
             dlgAlert(3);
             noticias();
            }else if(result == ""){
              dlgAlert(3);  
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}

function agregarNoticia() {
    dlgCargando("show");
                let contenido ="";
                contenido +="<h4>Agregar noticia</h4><form id='frmAgregarNoticia' name='frmAgregarNoticia'><div class=''>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>url Noticia</p>"+
                    "<textarea id='notiUrlAgregar' name='notiUrlAgregar' class='materialize-textarea' style='width: 100%; height: 48px;' data-length='250' onkeyup='this.value=NumText(this.value)'></textarea>"+
                "</div>"+
                "<div class=''>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>Título Noticia</p>"+
                    "<textarea id='notiTituloAgregar' name='notiTituloAgregar' class='materialize-textarea' style='width: 100%; height: 48px;' data-length='205'></textarea>"+
                "</div>"+
                "<div class=''>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>texto Noticia</p>"+
                    "<textarea id='notiTextoAgregar' name='notiTextoAgregar' class='materialize-textarea' style='width: 100%; height: 60px;'></textarea>"+
                "</div>"+
                "<div class=''>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>Imágen portada (600x400px)</p>"+
                    "<textarea id='notiImgPortadaAgregar' name='notiImgPortadaAgregar' class='materialize-textarea' style='width: 100%; height: 48px;' data-length='250'></textarea>"+
                "</div>"+
                "<div class=''>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>Imágen presentación (350x150px)</p>"+
                    "<textarea id='notiImgMicro' name='notiImgMicro' class='materialize-textarea' style='width: 100%; height: 48px;' data-length='250'></textarea>"+
                "</div></form>"+
                "<a id='btnAgregarNoticiaAgregar' name='btnAgregarNoticiaAgregar' onclick='agregarNoticiaAgregar();' style='display:block;margin:1%;' class='waves-effect waves-light btn modal-trigger'><i class='material-icons left'>add</i>Agregar noticia</a>";
                
                
                $("#mensajeContacC").html(contenido);
                 dlgCargando("close");
}

function editarGaleriaCampus() {
    dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "23");
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == "errorCargaSistema"){
            }else{
                let contenido="<h4>Editar galería campus</h4>";
                for(let contador =0;contador<result.length;contador++){
                   contenido += "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>Url/Link Imágen</p>"+
                    "<input id='imgCampusUrl"+result[contador]["img_campus_id"]+"' name='imgCampusUrl"+result[contador]["img_campus_id"]+"' type='text' class='validate' value='"+result[contador]["img_campus_url"]+"'>"+
                "</div>"+
                "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>Texto Imágen</p>"+
                    "<input id='imgCampusText"+result[contador]["img_campus_id"]+"' name='imgCampusText"+result[contador]["img_campus_id"]+"' type='text' class='validate' value='"+result[contador]["img_campus_text"]+"'>"+
                "</div>"+
                "<a id='btnActualizarImgCampus' name='btnActualizarImgCampus' onclick='actualizarImagenCampus("+result[contador]["img_campus_id"]+");' style='display:block;margin:1%;' class='waves-effect waves-light btn modal-trigger'><i class='material-icons left'>sync</i>Actualizar</a><hr>"; 
                }
                
              
              $("#respuestaOpcion").html(contenido);
              $("#inicioAsFeed").css("display","none");
              $("#respuestaOpcion").css("display","inherit");
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}

function actualizarNoticia(noticiaId){
        dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "21");
        dataSistemaAs.append("noticiaId", noticiaId);
        var other_data = $("#frmActualizarNoticia").serializeArray();
        $.each(other_data, function (key, input) {
            if(input.value == "" || input.value == null){
                dlgCargando("close");
                dlgAlert(3);
               return false;
            }else{
                dataSistemaAs.append(input.name, input.value);
            }
        
        });
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == true){
                dlgAlert(6);
            }else if(result == "vacio"){
             dlgAlert(3);
             verMasNoticia(noticiaId);
            }else if(result == ""){
              dlgAlert(3);  
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}


function verMasNoticia(idNoticia) {
    dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "20");
        dataSistemaAs.append("noticiaId", idNoticia);
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == "errorCargaSistema"){
            }else{
                let contenido ="";
                contenido += 
                "<form id='frmActualizarNoticia' name='frmActualizarNoticia'><div class=''>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>url Noticia</p>"+
                    "<textarea id='notiUrl' name='notiUrl' class='materialize-textarea' style='width: 100%; height: 48px;' data-length='205' onkeyup='this.value=NumText(this.value)'>"+result[0]["noti_url"]+"</textarea>"+
                "</div>"+
                "<div class=''>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>Titulo Noticia</p>"+
                    "<textarea id='notiTitulo' name='notiTitulo' class='materialize-textarea' style='width: 100%; height: 48px;' data-length='205'>"+result[0]["noti_titulo"]+"</textarea>"+
                "</div>"+
                "<div class=''>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>texto Noticia</p>"+
                    "<textarea id='notiTexto' name='notiTexto' class='materialize-textarea' style='width: 100%; height: 60px;'>"+result[0]["noti_texto"]+"</textarea>"+
                "</div>"+
                "<div class=''>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>Imágen portada</p>"+
                    "<textarea id='notiImgPortada' name='notiImgPortada' class='materialize-textarea' style='width: 100%; height: 48px;' data-length='205'>"+result[0]["noti_img_porta"]+"</textarea>"+
                "</div>"+
                "<div class=''>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>Imágen presentación</p>"+
                    "<textarea id='notiImgMicro' name='notiImgMicro' class='materialize-textarea' style='width: 100%; height: 48px;' data-length='205'>"+result[0]["noti_img_micro"]+"</textarea>"+
                "</div></form>"+
                "<a id='btnModificarNoticia' name='btnModificarNoticia'  href='#modal1' onclick='actualizarNoticia("+result[0]["noti_id"]+");' style='display:block;margin:1%;' class='waves-effect waves-light btn modal-trigger'><i class='material-icons left'>sync</i>Actualizar</a>";
                
                
                $("#mensajeContacC").html(contenido);
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}

function noticias() {
    dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "19");
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == "errorCargaSistema"){
            }else{
                let tabla="";
              tabla="<h2>Noticias/Agregar noticia.</h2><table>"+
              "<div class='card-panel'>"+
              "<h4>Agregar noticia</h4>"+
              "<a id='btnAgregarNoticia' name='btnAgregarNoticia' onclick='agregarNoticia()' href='#modal1' style='display:block;margin:1%;' class='waves-effect waves-light btn modal-trigger'><i class='material-icons left'>add_a_photo</i>Agregar</a>"+
              "</div>"+
                "<thead>"+
                  "<tr>"+
                      "<th>Imágen</th>"+
                      "<th>Titulo</th>"+
                      "<th>Ver más</th>"+
                  "</tr>"+
                "</thead>"+
                "<tbody>";
                for(contador = 0; contador < result.length;contador++){
                 tabla+="<tr>"+
                    "<td><img style='width: 200px;' src='"+result[contador]["noti_img_micro"]+"'></td>"+
                    "<td>"+result[contador]["noti_titulo"]+"</td>"+
                    "<td><a id='btnAgregarNoticia' name='btnAgregarNoticia' class='modal-trigger' href='#modal1' onclick='verMasNoticia("+result[contador]["noti_id"]+")' style='display:block;margin:1%;' class='waves-effect waves-light btn'><i class='material-icons left'>search</i>Ver más</a></td>"+
                 "</tr>";
                }
             tabla+="</tbody>"+
              "</table>";
              
              $("#respuestaOpcion").html(tabla);
              $("#inicioAsFeed").css("display","none");
              $("#respuestaOpcion").css("display","inherit");
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}



function subirImagenGaleria() {
    dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "17");
        let imagenCargar = $('#imagenNew')[0].files[0];
        let nombreImagen = $("#nombreImagen").val();
        dataSistemaAs.append("nombreImg", nombreImagen);
        dataSistemaAs.append("archivoImg", imagenCargar);
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "text",
        data: dataSistemaAs,
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
            if(result == "yaExiste"){
                alert("Imágen ya existe");
            }
            if(result == "vacio"){
             dlgAlert(3);
             }else{
               alert("CORRECTO");
               galeria();
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}

function NumText(string){//solo letras y numeros
    var out = '';
    //Se añaden las letras validas
    var filtro = '-_abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890';//Caracteres validos
	
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
	     out += string.charAt(i);
    return out;
}


function galeria() {
    dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "18");
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == "errorCargaSistema"){
            }else{
                let tabla="";
              tabla="<h2>Galería de imágenes.</h2><table>"+
              "<div class='card-panel'>"+
              "<h4>Subir Imágen</h4>"+
              "<form name='frmSubirImagen'>"+
                "<div class='file-field input-field'>"+
                  "<div class='btn'>"+
                    "<span>Seleccionar imágen</span>"+
                    "<input id='imagenNew' name='imagenNew' type='file'>"+
                  "</div>"+
                  "<div class='file-path-wrapper'>"+
                    "<input class='file-path validate' type='text'>"+
                  "</div>"+
            "</div>"+
            "<div class='input-field'>"+
                "<label class='active' >Nombre imágen</label>"+
                "<input id='nombreImagen' name='nombreImagen' type='text' class='validate' onkeyup='this.value=NumText(this.value)'>"+
            "</div>"+
              "</form>"+
              "<a id='btnSubirImagen' name='btnSubirImagen' onclick='subirImagenGaleria();' style='display:block;margin:1%;' class='waves-effect waves-light btn'><i class='material-icons left'>add_a_photo</i>Subir</a>"+
              "</div>"+
                "<thead>"+
                  "<tr>"+
                      "<th>Imagen</th>"+
                      "<th>Link</th>"+
                      "<th>Registro</th>"+
                  "</tr>"+
                "</thead>"+
                "<tbody>";
                for(contador = 0; contador < result.length;contador++){
                 tabla+="<tr>"+
                    "<td><img style='width: 250px;' src='imagen/"+result[contador]["galeria_url"]+"'></td>"+
                    "<td>https://sanpedroclaver.edu.co/sistemaas/imagen/"+result[contador]["galeria_url"]+"</td>"+
                    "<td>"+result[contador]["galeria_ingreso"]+"</td>"+
                 "</tr>";
                }
             tabla+="</tbody>"+
              "</table>";
              
              $("#respuestaOpcion").html(tabla);
              $("#inicioAsFeed").css("display","none");
              $("#respuestaOpcion").css("display","inherit");
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}


function actualizarInfoTema(temarioId){
        dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "16");
        dataSistemaAs.append("idTemario", temarioId);
        
        dataSistemaAs.append("idTemarioSemest", $("#idTemarioSemest"+temarioId+"").val());
        dataSistemaAs.append("idTemaUno", $("#idTemaUno"+temarioId+"").val());
        dataSistemaAs.append("idTemaDos", $("#idTemaDos"+temarioId+"").val());
        dataSistemaAs.append("idTemaTres", $("#idTemaTres"+temarioId+"").val());
        dataSistemaAs.append("idTemaCuatro", $("#idTemaCuatro"+temarioId+"").val());
        dataSistemaAs.append("idTemaCinco", $("#idTemaCinco"+temarioId+"").val());
        dataSistemaAs.append("idTemaSeis", $("#idTemaSeis"+temarioId+"").val());
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == true){
                dlgAlert(6);
                cargarTemarioEdit();
            }else if(result == "vacio"){
             dlgAlert(3);
            }else if(result == ""){
              dlgAlert(3);  
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}

function actualizarInfoRazon(razonId){
        dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "15");
        dataSistemaAs.append("idRazon", razonId);
        var other_data = $("#frmEditRazonCurso").serializeArray();
        $.each(other_data, function (key, input) {
            
            if(input.value == "" || input.value == null){
                dlgCargando("close");
                dlgAlert(3);
                console.log("Nice");
               return false;
            }else{
                dataSistemaAs.append(input.name, input.value);
            }
        
        });
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == true){
                dlgAlert(6);
            }else if(result == "vacio"){
             dlgAlert(3);
            }else if(result == ""){
              dlgAlert(3);  
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}

function actualizarInfoGeneral(idCurso){
        dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "14");
        dataSistemaAs.append("idCurso", idCurso);
        var other_data = $("#frmEditCurso").serializeArray();
        $.each(other_data, function (key, input) {
          //  if(input.value == "" || input.value == null){
             //   dlgCargando("close");
             //   dlgAlert(mensajeCampoVacio);
             //   return false;
           // }else{
                dataSistemaAs.append(input.name, input.value);
          //  }
        
        });
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == true){
                dlgAlert(6);
            }else if(result == "vacio"){
             dlgAlert(3);
            }else if(result == ""){
              dlgAlert(3);  
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}

function cargarTemarioEdit() {
        dlgCargando("show");
        $("#getCuatroRazonesEditDiv").css("display","none");
        $("#infoCursoALL").css("display","none");
        $("#getTemarioEdit").css("display","inherit");
        let dataSistemaAs = new FormData();
        let idCurso = document.getElementById("cmbCursosSelec").value;
        dataSistemaAs.append("opcion", "13");
        dataSistemaAs.append("idCurso", idCurso);
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == "sinDatos"){
                
            }else{
             let contenido ="<table>"+
            "<thead>"+
              "<tr>"+
                  "<th>Número Semestre/Modulo</th>"+
                  "<th>Tema 1</th>"+
                  "<th>Tema 2</th>"+
                  "<th>Tema 3</th>"+
                  "<th>Tema 4</th>"+
                  "<th>Tema 5</th>"+
                  "<th>Tema 6</th>"+
                  "<th>Actualizar</th>"+
              "</tr>"+
            "</thead>"
            "<tbody>";
            for(let contador =0;contador<result.length;contador++){
              contenido +="<tr>"+
                "<td><textarea id='idTemarioSemest"+result[contador]["idTemaSem"]+"' name='idTemarioSemest"+result[contador]["idTemaSem"]+"' class='materialize-textarea' style='width: 250px; height: 48px;'>"+result[contador]["numeroSemestre"]+"</textarea></td>"+
                 "<td><textarea id='idTemaUno"+result[contador]["idTemaSem"]+"' name='idTemaUno"+result[contador]["idTemaSem"]+"' class='materialize-textarea' style='width: 222px; height: 48px;'>"+result[contador]["tema1"]+"</textarea></td>"+
                "<td><textarea id='idTemaDos"+result[contador]["idTemaSem"]+"' name='idTemaDos"+result[contador]["idTemaSem"]+"' class='materialize-textarea' style='width: 222px; height: 48px;'>"+result[contador]["tema2"]+"</textarea></td>"+
                "<td><textarea id='idTemaTres"+result[contador]["idTemaSem"]+"' name='idTemaTres"+result[contador]["idTemaSem"]+"' class='materialize-textarea' style='width: 222px; height: 48px;'>"+result[contador]["tema3"]+"</textarea></td>"+
                "<td><textarea id='idTemaCuatro"+result[contador]["idTemaSem"]+"' name='idTemaCuatro"+result[contador]["idTemaSem"]+"' class='materialize-textarea' style='width: 222px; height: 48px;'>"+result[contador]["tema4"]+"</textarea></td>"+
                "<td><textarea id='idTemaCinco"+result[contador]["idTemaSem"]+"' name='idTemaCinco"+result[contador]["idTemaSem"]+"' class='materialize-textarea' style='width: 222px; height: 48px;'>"+result[contador]["tema5"]+"</textarea></td>"+
                "<td><textarea id='idTemaSeis"+result[contador]["idTemaSem"]+"' name='idTemaSeis"+result[contador]["idTemaSem"]+"' class='materialize-textarea' style='width: 222px; height: 48px;'>"+result[contador]["tema6"]+"</textarea></form></td>"+
                "<td><a class='waves-effect waves-light btn-small' onclick='actualizarInfoTema("+result[contador]["idTemaSem"]+")'><i class='material-icons right'>sync</i>Actualizar</a></td>"+
              "</tr>";
            }
            contenido +="</tbody>"+
          "</table>";               

                      
                $("#tableTemarioEdit").html(contenido);
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}

function obtenerCuatroRazones() {
        dlgCargando("show");
        $("#getCuatroRazonesEditDiv").css("display","inherit");
        $("#infoCursoALL").css("display","none");
        $("#getTemarioEdit").css("display","none");
        let dataSistemaAs = new FormData();
        let idCurso = document.getElementById("cmbCursosSelec").value;
        dataSistemaAs.append("opcion", "12");
        dataSistemaAs.append("idCurso", idCurso);
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == "sinDatos"){
                $("#cuatroRazonesEdit").empty();
            }else{
             let listaCursos ="<div style='width:100%;display:block;' class=''>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>Razón 1</p>"+
                    "<textarea id='txtRazonUno' name='txtRazonUno' class='materialize-textarea razonesCounterCha' style='width: 100%; height: 48px;' data-length='205'>"+result[0]["razon1"]+"</textarea>"+
                "</div>"+
                "<div class=''>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>Razón 2</p>"+
                    "<textarea id='txtRazonDos' name='txtRazonDos' class='materialize-textarea razonesCounterCha' style='width: 100%; height: 48px;' data-length='205'>"+result[0]["razon2"]+"</textarea>"+
                "</div>"+
                "<div class=''>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>Razón 3</p>"+
                    "<textarea id='txtRazonTres' name='txtRazonTres' class='materialize-textarea razonesCounterCha' style='width: 100%; height: 48px;' data-length='205'>"+result[0]["razon3"]+"</textarea>"+
                "</div>"+
                
                "<div class=''>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>Razón 4</p>"+
                    "<textarea id='txtRazonCuatro' name='txtRazonCuatro' class='materialize-textarea razonesCounterCha' style='width: 100%; height: 48px;' data-length='205'>"+result[0]["razon4"]+"</textarea>"+
                "</div>";
                buttonActualizarRaz = "<a class='waves-effect waves-light btn-small' onclick='actualizarInfoRazon("+result[0]["razonId"]+")'><i class='material-icons right'>sync</i>Actualizar</a>"
                $("#buttonSetRazonCurso").html(buttonActualizarRaz);
                $("#cuatroRazonesEdit").html(listaCursos);
                $('.razonesCounterCha').characterCounter();
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}

function cmbCurDipJs() {
        dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "11");
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == "errorCargaSistema"){
            }else{
             let listaCursos ="<div class='input-field ' id='cmbSelectCurDip' name='cmbSelectCurDip'>"+
                        "<select id='cmbCurDipSelecto' name='cmbCurDipSelecto'>"+
                          "<option value='' disabled selected>Lista de opciones</option>";
                          for(contador = 0; contador<result.length;contador++){
                          listaCursos += "<option value='"+result[contador]["value"]+"'>"+result[contador]["name"]+"</option>";
                          }
                        listaCursos += "</select>"+
                        "<label>Tipo de estudio:</label>"+
                      "</div>";
                $("#cmbCurDipSeIndex").html(listaCursos);
                $('select').formSelect();
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}

function cmbSedeJs() {
        dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "10");
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == "errorCargaSistema"){
            }else{
             let listaCursos ="<div class='input-field ' id='cmbSelectsed' name='cmbSelectsed'>"+
                        "<select id='cmbSedSelecto' name='cmbSedSelecto'>"+
                          "<option value='' disabled selected>Lista de opciones</option>";
                          for(contador = 0; contador<result.length;contador++){
                          listaCursos += "<option value='"+result[contador]["value"]+"'>"+result[contador]["name"]+"</option>";
                          }
                        listaCursos += "</select>"+
                        "<label>Sede/s:</label>"+
                      "</div>";
                $("#cmbSedSeIndex").html(listaCursos);
                $('select').formSelect();
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}

function cmbModalidadJs() {
        dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "9");
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == "errorCargaSistema"){
            }else{
             let listaCursos ="<div class='input-field ' id='cmbSelectMod' name='cmbSelectMod'>"+
                        "<select id='cmbModalidadSelecto' name='cmbModalidadSelecto'>"+
                          "<option value='' disabled selected>Lista de opciones</option>";
                          for(contador = 0; contador<result.length;contador++){
                          listaCursos += "<option value='"+result[contador]["value"]+"'>"+result[contador]["name"]+"</option>";
                          }
                        listaCursos += "</select>"+
                        "<label>Modalidad:</label>"+
                      "</div>";
                $("#cmbModalidadSeIndex").html(listaCursos);
                $('select').formSelect();
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}

function cmbCertificadoJs() {
         dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "8");
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == "errorCargaSistema"){
            }else{
             let listaCursos ="<div class='input-field ' id='cmbSelectCert' name='cmbSelectCert'>"+
                        "<select id='cmbCertificadoSelecto' name='cmbCertificadoSelecto'>"+
                          "<option value='' disabled selected>Lista de opciones</option>";
                          for(contador = 0; contador<result.length;contador++){
                          listaCursos += "<option value='"+result[contador]["value"]+"'>"+result[contador]["name"]+"</option>";
                          }
                        listaCursos += "</select>"+
                        "<label>certificado</label>"+
                      "</div>";
                $("#cmbCertificadoSeIndex").html(listaCursos);
                $('select').formSelect();
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}

function cargarInformacionCursos() {
    dlgCargando("show");
    $("#getTemarioEdit").css("display","none");
    $("#getCuatroRazonesEditDiv").css("display","none");
        let dataSistemaAs = new FormData();
        let idCurso = document.getElementById("cmbCursosSelec").value;
        dataSistemaAs.append("opcion", "7");
        dataSistemaAs.append("idCurso", idCurso);
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == "errorCargaSistema"){
            }else{
                $("#frmEditCurso")[0].reset();
             let listaCursos = "<hr><h2>Curso Encontrado:</h2>"+
                  "<div>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>Url/Link Curso</p>"+
                    "<input id='urlCurso' name='urlCurso' type='text' class='validate' value='"+result[0]["urlCurso"]+"' onkeyup='this.value=NumText(this.value)'>"+
                "</div>"+
                "<div>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>Nombre programa</p>"+
                    "<input id='nombrePrograma' name='nombrePrograma' type='text' class='validate' value='"+result[0]["nombreCurso"]+"'>"+
                "</div>"+
                    
                    "<div>"+
                        "<div class='input-field'>"+
                        "<p style='margin:0;padding:0;'>Descripción</p>"+
                        "<textarea id='txtDescipcionCurso' name='txtDescipcionCurso' class='materialize-textarea' >"+result[0]["cursoDescripcion"]+"</textarea>"+
                    "</div>"+
                    
                "<div>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>Número de semestres/Temario/Módulo</p>"+
                    "<input id='numeroSemestres' name='numeroSemestres' type='number' class='validate' value='"+result[0]["semestre"]+"'>"+
                "</div>"+
                
                "<div>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>Video Inicio</p>"+
                    "<input id='videoMicro' name='videoMicro' type='text' class='validate' value='"+result[0]["videoInicio"]+"'>"+
                "</div>"+
                
                "<div>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>Imágen Portada (1280x600)</p>"+
                    "<input id='imagPortada' name='imagPortada' type='text' class='validate' value='"+result[0]["imgPortada"]+"'>"+
                "</div>"+
                
                "<div>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>Imágen Uno (1) (800x400)</p>"+
                    "<input id='imag1Curso' name='imag1Curso' type='text' class='validate' value='"+result[0]["cursoImg1"]+"'>"+
                "</div>"+
                "<div>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>Imágen Dos (2) (800x400)</p>"+
                    "<input id='imag2Curso' name='imag2Curso' type='text' class='validate' value='"+result[0]["cursoImg2"]+"'>"+
                "</div>"+
                "<div>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>Imágen Tres (3) (800x400)</p>"+
                    "<input id='imag3Curso' name='imag3Curso' type='text' class='validate' value='"+result[0]["cursoImg3"]+"'>"+
                "</div>"+
                "<div>"+
                    "<div class='input-field'>"+
                    "<p style='margin:0;padding:0;'>video testimonio</p>"+
                    "<input id='videoTesti' name='videoTesti' type='text' class='validate' value='"+result[0]["videoTestCur"]+"'>"+
                "</div>"+
                "<div>"+
                        "<div class='input-field'>"+
                        "<p style='margin:0;padding:0;'>Descripción Video</p>"+
                        "<textarea id='txtTestimonioCurso' name='txtTestimonioCurso' class='materialize-textarea' >"+result[0]["testiCurso"]+"</textarea>"+
                    "</div>"+
                
                "</div>";
                buttonActualizar = "<a class='waves-effect waves-light btn-small' onclick='actualizarInfoGeneral("+result[0]["idCursoS"]+")'><i class='material-icons right'>sync</i>Actualizar</a>"
                $("#buttonSetInfoCurso").html(buttonActualizar);
                $("#infoCurso").html(listaCursos);
                $('#cmbCertificadoSelecto').val(result[0]["certificado"]);
                $('#cmbModalidadSelecto').val(result[0]["modalidad"]);
                $('#cmbSedSelecto').val(result[0]["sede"]);
                $('#cmbCurDipSelecto').val(result[0]["dipOCurso"]);
                $('select').formSelect();
                $("#infoCursoALL").css("display","inherit");
              
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}

function cmbCursos() {
    dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "6");
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == "errorCargaSistema"){
            }else{
             let listaCursos = "<h2>Editar Cursos/Diplomados</h2>"+
             "<div class='input-field '>"+
                        "<select id='cmbCursosSelec' name='cmbCursosSelec'>"+
                          "<option value='' disabled selected>Lista de opciones</option>";
                          for(contador = 0; contador<result.length;contador++){
                          listaCursos += "<option value='"+result[contador]["value"]+"'>"+result[contador]["name"]+"</option>";
                          }
                        listaCursos += "</select>"+
                        "<label>Lista de cursos/diplomados</label>"+
                      "</div><a id='btnBuscarInforCurso' name='btnBuscarInforCurso' onclick='cargarInformacionCursos()' class='waves-effect waves-light btn'><i class='material-icons left'>search</i>General</a>"+
                      "<a id='btnBuscarCuatroRazon' name='btnBuscarCuatroRazon' onclick='obtenerCuatroRazones()' class='waves-effect waves-light btn'><i class='material-icons left'>search</i>Razón</a>"+
                      "<a id='btnBuscarTemario' name='btnBuscarTemario' onclick='cargarTemarioEdit()' class='waves-effect waves-light btn'><i class='material-icons left'>search</i>Temario</a>";
                $("#respuestaOpcion").html(listaCursos);
                $('select').formSelect();
              $("#inicioAsFeed").css("display","none");
              $("#respuestaOpcion").css("display","inherit");
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}
function registrosAS() {
        let dataSistemaAs = new FormData();
                let tabla="";
              tabla="<h2>Editar Información</h2>";

              
              $("#respuestaOpcion").html(tabla);
              $("#inicioAsFeed").css("display","none");
              $("#respuestaOpcion").css("display","inherit");
}



function preguntaCheckContacto(idContacto){
    dlgConfirm("¿Deseas seguir con esta acción?",function(dlgConfirm){
        if(dlgConfirm){
            checkContactoJs(idContacto);
        }else{
            console.log("na");
        }  
    });
}

function checkContactoJs(idContacto) {
    dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "5");
        dataSistemaAs.append("estadoCalificadorConId", idContacto);
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == "errorCargaSistema"){
            }else{
               dlgAlert(6);
               contactoPersonaAS();
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}

function traerMensajeContac(idContacto) {
    dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "4");
        dataSistemaAs.append("idContactoM", idContacto);
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == "errorCargaSistema"){
            }else{
                $("#mensajeContacC").html(result[0]["mensaje"]);
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}

function contactoPersonaAS() {
    dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "3");
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == "errorCargaSistema"){
            }else{
                let tabla="";
              tabla="<h2>Contacto.</h2><table>"+
                "<thead>"+
                  "<tr>"+
                      "<th>Nombre</th>"+
                      "<th>Correo</th>"+
                      "<th>Celular</th>"+
                      "<th>Mensaje</th>"+
                      "<th>Visto</th>"+
                  "</tr>"+
                "</thead>"+
                "<tbody>";
                for(contador = 0; contador < result.length;contador++){
                 tabla+="<tr>"+
                    "<td>"+result[contador]["nombreC"]+"</td>"+
                    "<td>"+result[contador]["correoC"]+"</td>"+
                    "<td>"+result[contador]["celularC"]+"</td>"+
                    "<td class='modal-trigger' href='#modal1' onclick='traerMensajeContac("+result[contador]["idContactC"]+")' style='background-color: #009fff85;text-align:center;'><i class='material-icons'>chat</i></td>"+
                    "<td onclick='preguntaCheckContacto("+result[contador]["idContactC"]+")' style='background-color: #50ff0085;text-align:center;'><i class='material-icons'>check</i></td>"+
                 "</tr>";
                }
             tabla+="</tbody>"+
              "</table>";
              
              $("#respuestaOpcion").html(tabla);
              $("#inicioAsFeed").css("display","none");
              $("#respuestaOpcion").css("display","inherit");
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}

function preguntaCalificar(prospectoId,estadoCalificador){
    dlgConfirm("¿Deseas seguir con esta acción?",function(dlgConfirm){
        if(dlgConfirm){
           calificarBien(prospectoId,estadoCalificador);
        }else{
            console.log("na");
        }  
    });
}

function calificarBien(prospectoId,estadoCalificador){
        dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "2");
        dataSistemaAs.append("idProspecto", prospectoId);
        dataSistemaAs.append("estadoCalificador", estadoCalificador);
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == "errorCargaSistema"){
            }else{
                dlgAlert(7);
                enviarCorreoNotificacion(prospectoId);
                masInformacionAS();
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}

function enviarCorreoNotificacion(prospectoId){
    dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "1");
        dataSistemaAs.append("nombreProspecto", $("#prospectoNombre"+prospectoId+"").val());
        dataSistemaAs.append("prospectoFechaNace", $("#prospectoFechaNace"+prospectoId+"").val());
        dataSistemaAs.append("prospectoCorreo", $("#prospectoCorreo"+prospectoId+"").val());
        dataSistemaAs.append("celularProspecto", $("#prospectoContacto"+prospectoId+"").val());
        dataSistemaAs.append("cmbProgramaInteres", $("#cmbProgramaInteres"+prospectoId+"").val());
        dataSistemaAs.append("prospectoRegistro", $("#prospectoRegistro"+prospectoId+"").val());
        $.ajax({
        url: "/sistemaas/controller/enviarCorreo.php",
        type: "POST",
        contentType: false,
        dataType: "text",
        data: dataSistemaAs,
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
            
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}

function masInformacionAS() {
    dlgCargando("show");
        let dataSistemaAs = new FormData();
        dataSistemaAs.append("opcion", "1");
        $.ajax({
        url: "/sistemaas/controller/controller_feed.php",
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataSistemaAs,
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
            if(result == "errorCargaSistema"){
            }else{
                let tabla="";
              tabla="<h2>Personas que quieren más información</h2><table>"+
                "<thead>"+
                  "<tr>"+
                      "<th>Nombre</th>"+
                      "<th>Fecha Nacimiento</th>"+
                      "<th>Correo</th>"+
                      "<th>Celular</th>"+
                      "<th>Interés</th>"+
                      "<th>Registro</th>"+
                      "<th>interesado</th>"+
                      "<th>NO interesado</th>"+
                  "</tr>"+
                "</thead>"+
                "<tbody>";
                for(contador = 0; contador < result.length;contador++){
                 tabla+="<tr>"+
                    "<td><textarea readonly='readonly'  id='prospectoNombre"+result[contador]["idProspecto"]+"' name='prospectoNombre"+result[contador]["idProspecto"]+"'>"+result[contador]["nombreP"]+"</textarea></td>"+
                    "<td><textarea readonly='readonly'  id='prospectoFechaNace"+result[contador]["idProspecto"]+"' name='prospectoFechaNace"+result[contador]["idProspecto"]+"'>"+result[contador]["FechaP"]+"</textarea></td>"+
                    "<td><textarea readonly='readonly'  id='prospectoCorreo"+result[contador]["idProspecto"]+"' name='prospectoCorreo"+result[contador]["idProspecto"]+"'>"+result[contador]["correoP"]+"</textarea></td>"+
                    "<td><textarea readonly='readonly'  id='prospectoContacto"+result[contador]["idProspecto"]+"' name='prospectoContacto"+result[contador]["idProspecto"]+"' >"+result[contador]["celularP"]+"</textarea></td>"+
                    "<td><textarea readonly='readonly'  id='cmbProgramaInteres"+result[contador]["idProspecto"]+"' name='cmbProgramaInteres"+result[contador]["idProspecto"]+"'>"+result[contador]["interesP"]+"</textarea></td>"+
                    "<td><textarea readonly='readonly'  id='prospectoRegistro"+result[contador]["idProspecto"]+"' name='prospectoRegistro"+result[contador]["idProspecto"]+"'>"+result[contador]["registroP"]+"</textarea></td>"+
                    "<td onclick='preguntaCalificar("+result[contador]["idProspecto"]+",1)' style='background-color: #50ff0085;text-align:center;'><i class='material-icons'>tag_faces</i></td>"+
                    "<td onclick='preguntaCalificar("+result[contador]["idProspecto"]+",2)' style='background-color: #ff000085;text-align:center;'><i class='material-icons'>face</i></td>"+
                 "</tr>";
                }
             tabla+="</tbody>"+
              "</table>";
              
              $("#respuestaOpcion").html(tabla);
              $("#inicioAsFeed").css("display","none");
              $("#respuestaOpcion").css("display","inherit");

              
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}

/*
 * Arnol Saavedra
 */

function URLRaiz() {
     var protocolo = window.location.protocol;
    var  host = window.location.host;
   // if (host == "larodadita.com") {
      carpetaRaiz = "/";
   // } else {
   //    carpetaRaiz = "/sinArchivo/";
  // }
   var url = protocolo + "//" + host + carpetaRaiz;
    return url;
}
function URLactual() {
    var protocolo = window.location.protocol;
	var  host = window.location;

   var url =  host /*+ carpetaRaiz*/;
    return url;
}

function deshabilitaRetroceso() {
    window.location.hash = "no-back-button";
    window.location.hash = "Again-No-back-button" //chrome
    window.onhashchange = function () {
        window.location.hash = "no-back-button";
    };
}

var table;
function esJson(json) {
    var r = false;
    try {
        JSON.parse(json);
        r = true;
    } catch (e) {
        r = false;
    }
    return r;
}

function dlgAlert(pos, error, cerrar) {
    if ($("#alert_box").length > 0) {
        return;
    }
    var titulo = "";
    var msg = [];
    msg[1] = {tipo: "success", mensaje: "Nos comunicaremos contigo lo antes posible, Gracias"};
    msg[2] = {tipo: "info", mensaje: "Verifica que los campos esten llenos correctamente."};
    msg[3] = {tipo: "info", mensaje: "Debes llenar todos los campos."};
    switch (msg[pos].tipo) {
        case "success":
            titulo = "Correcto!";
            break;
        case "info":
            titulo = "Aviso!";
            break;
        case "warning":
            titulo = "Advertencia!";
            break;
        case "error":
            titulo = "Error!";
            break;
    }
    swal(titulo, msg[pos].mensaje, msg[pos].tipo).then((value) => {
        if (typeof cerrar == "function") {
            cerrar();
        }
    });
}



function dlgConfirm(msg, respuesta) {
    if ($("#alert_box").length > 0) {
        return;
    }
    swal({
        title: "¿Estás seguro?",
        text: msg,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        respuesta(willDelete);
        console.log(respuesta(willDelete));
    });
}

function dlgCargando(str) {
    if (str == "close") {
        $("#dlgCargando").remove();
        return;
    }
    if ($("#dlgCargando").length > 0) {
        return;
    }
    $("body").after(
            '<div id="dlgCargando" style="width:  100%;height:  100%;position:  fixed;z-index: 10000;top:  0;background: rgba(1,1,1,0.3);">' +
            '                       <div class="preloader-wrapper big active center" style="position: absolute; right: 46%; left: 46%; top: 35%; z-index: 10001;">' +
            '                           <div class="spinner-layer spinner-green-only">' +
            '                               <div class="circle-clipper left">' +
            '                                   <div class="circle"></div>' +
            '                               </div>' +
            '                  <div class="gap-patch">' +
            '                     <div class="circle"></div>' +
            '                 </div>' +
            '                   <div class="circle-clipper right">' +
            '                <div class="circle"></div>' +
            '            </div>' +
            '        </div>' +
            '    </div>' +
            '</div>'
            );
}

function formato_numero(amount, decimals) {

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0) {
        return parseFloat(0).toFixed(decimals);
    }
    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
            regexp = /(\d+)(\d{3})/;

    while (regexp.test(amount_parts[0])) {
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');
    }
    return amount_parts.join('.');
}


function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}


//Metodo para hacer peticiones ajax
function peticion(url, parametros, type, dataType, success, error, async) {
    if (typeof async === "undefined") {
        async = true;
    }
    $.ajax({
        url: url,
        type: type,
        contentType: false,
        dataType: dataType,
        data: parametros,
        async: async,
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
        success: function (datos) {
            success(datos);
        },
        error: function (objeto, quepaso, otroobj) {
            error(objeto, quepaso, otroobj);
        },
    });
}



//Metodo para configurar una tabla con datatable
function confTabla(tabla, search) {
    table = $(tabla).DataTable({
        "oLanguage": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        "paging": true,
        "ordering": false,
        "info": true,
        "searching": true,
        "pagingType": "full_numbers"
                //"order": [
                // [0, 'desc'],
                //[1, 'asc']
                //]
    });
    //table.order([1, 'asc']).draw();
    $(search).keyup(function () {
        table.search(this.value).draw();
    });
}

function sizeIconos(obj) {
    var file = obj.files[0];
    if (file) {
        var fileSize = file.size;
        fileSize = (Math.round(file.size / 1024)).toString();
        return fileSize;
    }
    return 0;
}


function cargarCombo(ele, url, parametro) {

    var parametros = new FormData();
    if (typeof parametro !== "undefined") {
        parametros.append("id", parametro);
    }
    peticion(url, parametros, "POST", "JSON", function (result) {
        var option = '<option value="" disabled selected >Seleccione</option>';
        $.each(result, function (k, v) {
            option += '<option value="' + v.value + '">' + v.label + '</option>';
        });
        $(ele).html(option);
        $(ele).material_select();


    }, function (er, err, errr) {

    }, false);
}




function enviarEmail(email, nombre, mensage, asunto, plantilla, valor, callback, error) {
    //enviarEmail(orlando,puentes53@gmail.con,Orlando Puentes A,buenas tardes,Prueba,1)
    var parametros = new FormData();
    parametros.append("email", email);
    parametros.append("nom", nombre);
    parametros.append("msg", mensage);
    parametros.append("asu", asunto);
    parametros.append("pla", plantilla);
    parametros.append("val", valor);
    parametros.append("accion", "envioCorreoHtml");

    peticion(URL_ACTUAL + "util/email/envio.php", parametros, "POST", "text", function (datos) {
        if (datos == 1) {
            if (typeof callback === "function") {
                callback();
            }
        } else {
            if (typeof error === "function") {
                error(datos);
            }
        }
    }, function (objeto, quepaso, otroobj) {
        if (typeof error === "function") {
            error(otroobj);
        }
    });
}



function validarSelect(selects) {
    $(".errorSelect").remove();
    selects = selects.replace(" ", "");
    selects = selects.split(",");
    var respuesta = true;
    $.each(selects, function (k, v) {
        try {
            if ($(v).val().length <= 0) {
                $(v).parents(".select-wrapper").siblings("label").after('<span class="error errorSelect">Este campo es obligatorio.</span>');
                respuesta = false;
            }
        } catch (e) {
            $(v).parents(".select-wrapper").siblings("label").after('<span class="error errorSelect">Este campo es obligatorio.</span>');
            respuesta = false;
        }
    });
    return respuesta;
}
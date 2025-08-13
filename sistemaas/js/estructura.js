//Funcion para insertar Datos
  
function structAgregara(urlController,idControllerCase,nombreFrm,mensajeCampoVacio,mensajeCondicionUno,manesajeCondicionDos,manesajeCondicionTres) {
        dlgCargando("show");
        var dataFrmAgregar = new FormData();
        var urlController = urlController;
        dataFrmAgregar.append("v0", idControllerCase);
        var other_data = $(nombreFrm).serializeArray();
        $.each(other_data, function (key, input) {
          //  if(input.value == "" || input.value == null){
             //   dlgCargando("close");
             //   dlgAlert(mensajeCampoVacio);
             //   return false;
           // }else{
                dataFrmAgregar.append(input.name, input.value);
          //  }
        });
        $.ajax({
        url: urlController,
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataFrmAgregar,
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
            if(result == "vacio"){
                dlgAlert(3);
            }else if(result == "letrasNo"){
                dlgAlert(mensajeCondicionUno);
            }else if(result == "error"){
                dlgAlert(manesajeCondicionDos);
            }else {
            dlgAlert(manesajeCondicionTres);
            nombreFrm = nombreFrm.substr(1);
            document.getElementById(nombreFrm).reset(); 
            dataFrmAgregar = "";
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error STRUC" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
        dlgCargando("close");
      alert( "error" );
      return false;
    })
    .always(function() {
        dlgCargando("close");
    });
}
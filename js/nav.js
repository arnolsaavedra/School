 $(document).ready(function(){
   setTimeout(cargarProgMenu(),1000);
   cargarDivMenu();
   cargarCurVirMenu();
       $('.sidenav').sidenav();
     $(".dropdown-trigger").dropdown();
  });

  var urlControllerNavjs ="../controller/cargar_pro_nav.php";
  
  function cargarProgMenu() {
        var dataGetCurso = new FormData();
        dataGetCurso.append("opcion", "1");
        $.ajax({
        url:urlControllerNavjs,
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
            if(result == "logCargado"){
            }else{
            //confirmado
            let curso = ""; 
          for(let contador = 0;contador < result.length;contador++){
              curso +="<li class='divider'></li> <li><a class='nombreEstudio' href='/"+result[contador]["url"]+"'>"+result[contador]["nombre"]+"</a></li>";
          }
            $(".listaProgNav").html(curso);
        }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error BARRA 1" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {
    });
}

  function cargarDivMenu() {
        var dataGetCurso = new FormData();
        dataGetCurso.append("opcion", "2");
        $.ajax({
        url:urlControllerNavjs,
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
            if(result =="logCargado"){

            }else{
            //confirmado
            let curso = ""; 
          for(let contador = 0;contador < result.length;contador++){
              curso +="<li class='divider'></li> <li><a class='nombreEstudio' href='/"+result[contador]["url"]+"'>"+result[contador]["nombre"]+"</a></li>";
          }
            $(".listaDipNav").html(curso);
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error  BARRA 2" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {

    });
}
  function cargarCurVirMenu() {
      //  dlgCargando("show");
        var dataGetCurso = new FormData();
        dataGetCurso.append("opcion", "3");
        $.ajax({
        url:urlControllerNavjs,
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
            if(result =="logCargado"){
 
            }else{
            //confirmado
            var curso = ""; 
          for(let contador = 0;contador < result.length;contador++){
              curso +="<li class='divider'></li> <li><a class='nombreEstudio' href='/"+result[contador]["urlCursoVir"]+"'>"+result[contador]["nombreCursoVir"]+"</a></li>";
          }
            $(".listaCurVirNav").html(curso);
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error  BARRA 3" + otroobj + " " + quepaso + " " + objeto);
        },
    })
    .fail(function() {
      return false;
    })
    .always(function() {

    });
}
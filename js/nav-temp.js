 $(document).ready(function(){
   cargarProgMenu();
   cargarDivMenu();
   cargarCurVirMenu();
       $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown();

  });
  var urlControllerNavjs ="../controller/cargar_pro_nav.php";
  var tamañoPantalla = "";
  
  function cargarProgMenu() {
        let dataGetCurso = new FormData();
        dataGetCurso.append("opcion", "1");
        $.ajax({
        url:urlControllerNavjs,
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataGetCurso,
        async: true,
        global: true,
        ifModified: false,
        processData: false,
        cache: true,
        beforeSend: function (objeto) {
            //dialogLoading('show');
        },
        complete: function (objeto, exito) {
            $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
        },
        success: function (result) {
            if(result === "logCargado"){
            }
            //confirmado
            let curso = ""; 
          for(let contador = 0;contador < result.length;contador++){
              curso +="<li class='divider'></li> <li><a href='/"+result[contador]["url"]+"'>"+result[contador]["nombre"]+"</a></li>";
          }
            $("#listaProgNav"+tamanoPantalla+"").html(curso);

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

  function cargarDivMenu() {
        var dataGetCurso = new FormData();
        dataGetCurso.append("opcion", "2");
        $.ajax({
        url:urlControllerNavjs,
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataGetCurso,
        async: true,
        global: true,
        ifModified: false,
        processData: false,
        cache: true,
        beforeSend: function (objeto) {
            //dialogLoading('show');
        },
        complete: function (objeto, exito) {
            $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
        },
        success: function (result) {
            if(result === "logCargado"){

            }
            //confirmado
            let curso = ""; 
          for(let contador = 0;contador < result.length;contador++){
              curso +="<li class='divider'></li> <li><a href='/"+result[contador]["url"]+"'>"+result[contador]["nombre"]+"</a></li>";
          }
            $("#listaDipNav"+tamanoPantalla+"").html(curso);
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
  function cargarCurVirMenu() {
      //  dlgCargando("show");
        let dataGetCurso = new FormData();
        dataGetCurso.append("opcion", "3");
        $.ajax({
        url:urlControllerNavjs,
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: dataGetCurso,
        async: true,
        global: true,
        ifModified: false,
        processData: false,
        cache: true,
        beforeSend: function (objeto) {
            //dialogLoading('show');
        },
        complete: function (objeto, exito) {
            $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
        },
        success: function (result) {
            if(result === "logCargado"){
 
            }
            //confirmado
            let curso = ""; 
          for(let contador = 0;contador < result.length;contador++){
              curso +="<li class='divider'></li> <li><a href='/"+result[contador]["urlCursoVir"]+"'>"+result[contador]["nombreCursoVir"]+"</a></li>";
          }
            $("#listaCurVirNav"+tamanoPantalla+"").html(curso);
       
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
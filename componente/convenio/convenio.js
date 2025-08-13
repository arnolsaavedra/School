  function carruselConvenio(){
                    $('#CarruselConvenioJs .owl-carousel').owlCarousel(
        {
            items:1,
            loop:true,
            margin:12,
            autoplay:true,
            autoplayTimeout:3500,
            autoplayHoverPause:true,
            animateOut: 'bounceInRight',
            animateIn: 'bounceOutLeft',
            nav: true,
             navText: [
    "<i class='fa fa-caret-left'></i>",
    "<i class='fa fa-caret-right'></i>"
  ],
            responsive : {
                // breakpoint from 480 up
                480 : {
                items:3,
                margin:1
                },
                670 : {
                items:4,
                margin:1
                },
                1085:{
                items:6,
                margin:24
                }
            }
        }
        );
  }
  var urlControladorC = "../controller/convenio.php";
  
function cargarImgConvenio() {
        var dataGetCurso = new FormData();
        dataGetCurso.append("opcion", "1");
        $.ajax({
        url:urlControladorC,
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
            //confirmado
            //cargarListaCursoPaso2Modalidad(idCurso);
           // cargarListaCursoPaso2sed(idCurso);
            infoCurso = "";
            $('#loaderConvenios').empty();
            $('#loaderConvenios').hide();
            for(let contador = 0; contador < result.length;contador++){
            infoCurso += "<div class='efectoZoom'>"+
                "<figure style='display-inline:block;' '>"+
                "<img width='150' height='96'  src='"+result[contador]['urlImgConvenio']+"' >"+
                    //"<img alt='"+result[0]['nombreConvenio']+"' src='"+result[0]['urlImgConvenio']+"' >"+
                "</figure>"+
            "</div>";
            }
            $('#listaConvenios').append(infoCurso);
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
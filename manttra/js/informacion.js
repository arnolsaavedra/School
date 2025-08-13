var URLRaiz = URLRaiz();

$("#btnQuieroMasInformacion").on("click", function(){
    frmNosotrosTeLLamamos();
});

function frmNosotrosTeLLamamos() {
        dlgCargando("show");
        var agTar = new FormData();
        var urlController = URLRaiz+"manttra/rsc/controllerinformacion.php";
        agTar.append("v0", "1");
        var other_data = $("#frmNosotrosTeLLamamos").serializeArray();
        $.each(other_data, function (key, input) {
        agTar.append(input.name, input.value);
        });
        $.ajax({
        url: urlController,
        type: "POST",
        contentType: false,
        dataType: "JSON",
        data: agTar,
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
            if(result == "letrasNo"){
                dlgAlert(2);
            }else {
            dlgAlert(1);
            document.getElementById("frmNosotrosTeLLamamos").reset(); 
            agTar = "";
            }
        },
        error: function (objeto, quepaso, otroobj) {
            alert("error" + otroobj + " " + quepaso + " " + objeto);
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
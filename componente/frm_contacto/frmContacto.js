var URLRaiz = URLRaiz();

$("#btnFrmContacto").on("click", function(){
    let urlController = URLRaiz+"componente/frm_contacto/controllerContacto.php";
    let idControllerCase = "1";
    let nombreFrm = "#frmContacto";
    let mensajeCampoVacio = "3";
    let mensajeCondicionUno = "2";
    let manesajeCondicionDos = "4";
    let manesajeCondicionTres = "1";
    structAgregara(urlController,idControllerCase,nombreFrm,mensajeCampoVacio,mensajeCondicionUno,manesajeCondicionDos,manesajeCondicionTres);
  
});


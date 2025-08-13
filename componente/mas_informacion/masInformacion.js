var URLRaiz = URLRaiz();

$("#btnAgregarInformacionProspecto").on("click", function(){
    let urlController = URLRaiz+"componente/mas_informacion/controllerInformacion.php";
    let idControllerCase = "1";
    let nombreFrm = "#frmMasInformacion";
    let mensajeCampoVacio = "3";
    let mensajeCondicionUno = "2";
    let manesajeCondicionDos = "4";
    let manesajeCondicionTres = "1";
    structAgregara(urlController,idControllerCase,nombreFrm,mensajeCampoVacio,mensajeCondicionUno,manesajeCondicionDos,manesajeCondicionTres);
  
});


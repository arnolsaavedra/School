var URLRaiz = URLRaiz();
$("#btnEntrar").on("click", function(){
    let urlController = URLRaiz+"/sistemaas/controller/controller_login.php";
    let idControllerCase = "1";
    let nombreFrm = "#frmIniciarAS";
    let mensajeCampoVacio = "3";
    let mensajeCondicionUno = "2";
    let manesajeCondicionDos = "4";
    let manesajeCondicionTres = "1";
    structAgregara(urlController,idControllerCase,nombreFrm,mensajeCampoVacio,mensajeCondicionUno,manesajeCondicionDos,manesajeCondicionTres);
  
});

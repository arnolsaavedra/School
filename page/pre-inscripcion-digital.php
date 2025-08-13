<?php
include_once '../controller/DBManejador.php';
include_once '../controller/cargarCmb.php';

$conn = new DBManejador();
if (is_array($conn->error)) {
    echo $conn->error[2];
    exit();
}

$combos = new TraerCombo($conn);
$cursosYDiplomados = $combos->cmbCursosCMB();

?>
    <HTML>
        <HEAD>
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-139394669-1"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());
            
              gtag('config', 'UA-139394669-1');
            </script>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="Expires" content="0" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta name="robots" content="index, follow"> 
            <link href="../materialize/css/materializeicon.css" rel="stylesheet">
            <link href="../materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
            <title>Pre-Inscipción | San Pedro Claver Neiva</title>
        </HEAD> 
        <BODY>
            
            <?php
            include_once '../nav.php';
            ?>
            <div class="background-title-page" style="background-image: url(https://sanpedroclaver.edu.co/sistemaas/imagen/enfermeria-portada.png);">
                <div style="margin-right: 2%;" >
                 <h2 class="title-curse">Pre-Inscipción</h2>
                </div>
            </div>

            <div id="curso_diplomado" name="curso_diplomado" class="card-panel contenedorTarget contenedor-info-curse CJtext" style="    margin-bottom: 0;" >
                <div class="contactoStructura contactoEstructuraContet"  style="width: 100%;">
                    <div class="card-panel" style="background-color:rgba(255, 255, 255, 0.7);padding-top: 0;border-width: 1px;border-style: solid;border-color: black;border-radius: 30px">
                        <div style="background-color:#0d883e;    border-bottom-left-radius: 50px;
                        border-bottom-right-radius: 50px;">
                        <h2 style="text-align:center;color:white;margin-top: 0;"><b>Pre-Inscipción</b></h2>
                        </div>
                        <section style="text-align: center;background-color: #8d949e;border-radius: 10px;border-width: 1px;border-style: solid;border-color: black;;">
                        <div class="">
                    <?php include_once '../componente/mas_informacion/masInformacion.php' ?>
                    </div>
                        </section>
                    </div>
                </div>
                
            </div>
            
        </BODY>
        <?php include_once '../footer.php' ?>
        <script src="../js/jquery-3.3.1.js"></script>
        <script src="../js/jquery.validate.js"></script>
        <script src="../js/sweetalert.min.js" type="text/javascript"></script>
        <script src="../js/additional-methods.js" type="text/javascript"></script>
        <script src="../materialize/js/materialize.js" type="text/javascript"></script>
        <script src="../js/nav.js" type="text/javascript"></script>
        <script src="../js/util.js"></script>
        <script  src="../js/estructura.js"></script>
        <script   src="../componente/mas_informacion/masInformacion.js"></script>
        <script src="../js/deleteefect.js" type="text/javascript"></script>
        <script type="text/javascript">
                $(window).on("load" ,function(){
            
                $("#imgQ10").attr("src", "https://sanpedroclaver.edu.co/imagen/Logo_Q10_Soluciones.png");
                $("#imgMinEducion").attr("src", "https://sanpedroclaver.edu.co/imagen/minEducacion-300x80.png");
               
                $("#iconoFb").attr("src", "https://sanpedroclaver.edu.co/imagen/iconofb.png");
                $("#iconoWs").attr("src", "https://sanpedroclaver.edu.co/imagen/iconows.png");
                $("#iconoIn").attr("src", "https://sanpedroclaver.edu.co/imagen/iconoin.png");
                });
        </script>

    </HTML> 


    


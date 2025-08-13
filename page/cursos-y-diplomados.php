<?php
$nombreCurso="POLITICA DE PRIVACIDAD";


date_default_timezone_set('America/Bogota');
ini_set("display_errors", '1');
session_start();
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
            <link href="../fontawesome/css/all.min.css" rel="stylesheet">
            <title>Cursos Y Diplomados | San Pedro Claver Neiva</title>
        </HEAD> 
        <BODY>
            
            <?php
            include_once '../nav.php';
            ?>
            <div class="background-title-page" style="background-image: url(../imagen/cursosydiplomados.jpg);">
                <div style="margin-right: 2%;" >
                 <h2 class="title-curse">Cursos Y Diplomados</h2>
                </div>
            </div>

            <div id="curso_diplomado" name="curso_diplomado" class="card-panel contenedorTarget contenedor-info-curse CJtext" style="    margin-bottom: 0;" >
                <div class="contactoStructura contactoEstructuraContet"  style="width: 100%;">
                    <div class="card-panel" style="background-color:rgba(255, 255, 255, 0.7);padding-top: 0;border-width: 1px;border-style: solid;border-color: black;border-radius: 30px">
                        <div style="background-color:#0d883e;    border-bottom-left-radius: 50px;
    border-bottom-right-radius: 50px;">
    <h3 style="text-align:center;color:white;margin-top: 0;"><b>Cursos Y Diplomados</b></h3>
    </div>
                        <section>
                        <div style="width:100%;text-align:center;" >
                            <section id="cursoydiplomado" name="cursoydiplomado">
                               
                            </section>
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
        <script src="../js/cursosydiplimados.js" type="text/javascript"></script>
        <script src="../js/deleteefect.js" type="text/javascript"></script>
        <script type="text/javascript">
                $(window).on("load" ,function(){
                    cargarCursosDiplomados();
                $("#iconoFb").attr("src", "https://sanpedroclaver.edu.co/imagen/iconofb.png");
                $("#iconoWs").attr("src", "https://sanpedroclaver.edu.co/imagen/iconows.png");
                $("#iconoIn").attr("src", "https://sanpedroclaver.edu.co/imagen/iconoin.png");
                });
        </script>

    </HTML> 


    


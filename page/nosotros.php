<?php

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
            
            <title>Nosotros | San Pedro Claver Neiva</title>
        </HEAD> 
        <BODY>
            
            <?php
            include_once '../nav.php';
            ?>
            <div class="background-title-curse" style="background-image: url(../imagen/nosotrosFondo.jpg);">
                <div style="margin-right: 2%;" >
                 <h2 class="title-curse">Nosotros</h2>
                </div>
            </div>
            <div id="curso_diplomado" name="curso_diplomado" class="card-panel contenedorTarget contenedor-info-curse CJtext" style="    margin-bottom: 0;" > 
                <div class="card-panel estructura-nosotros">
                    <section id="nombreSeccion" name="nombreSeccion">
                        <h3 class='title-h3-nosotros'>Nosotros</h3>
                    </section>
                
                <section class="info-general-Seccion" id="informacionGeneralCurso" name="informacionGeneralCurso">
                    <p class="content-nosotros">
                     La ESCUELA DE SALUD “SAN PEDRO CLAVER”, es una institución de educación para el trabajo y el desarrollo humano tal como lo expresa la Ley 1064 de 2006 (antes educación no formal), con más de quince años de experiencias, creada bajo las normas que regulan el servicio público educativo en Colombia en especial la modalidad de la educación para el trabajo y el desarrollo humano (antes educación no formal), Ley 115 de 1994 y su Decreto Reglamentario 4904 de 2009, el cual regula la organización, creación y funcionamiento de las instituciones y programas.
                     </p>
                </section>
                <br>
                
                </div>
                
                <div class=" card-panel  estructura-nosotros">
                    <section id="nombreSeccion" name="nombreSeccion">
                        <h3 class='title-h3-nosotros'>Misión</h3>
                    </section>
                
                <section class="info-general-Seccion" id="informacionGeneralCurso" name="informacionGeneralCurso">
                    <p class="content-nosotros">
                     Formar para el trabajo y desarrollo humano en competencias laborales respaldados en la trayectoria nacional y experiencia en la labor educativa con un equipo multidisciplinario, convenios interinstitucionales, instalaciones amplias y confortables, y tecnología que garantizan la formación integral de nuestros estudiantes con una alta dosis de calidad humana para el mundo productivo.
                     </p>
                </section>
                <br>
                
                </div>
                
                <div class=" card-panel  estructura-nosotros">
                    <section id="nombreSeccion" name="nombreSeccion">
                        <h3 class='title-h3-nosotros'>Visión</h3>
                    </section>
                
                <section class="info-general-Seccion" id="informacionGeneralCurso" name="informacionGeneralCurso">
                    <p class="content-nosotros">
                     Ampliar nuestra oferta educativa en programas de formación para el trabajo y el desarrollo humano y buscar la transición hacia la educación superior.<br>
                     La Escuela de Salud San Pedro Claver está comprometida en impartir formación por competencias laborales de manera integral con un equipo de docentes idóneos infraestructura y tecnologías apropiadas que garantizan la satisfacción de los estudiantes y las demandas del sector del sector productivo con procesos en mejora continúa.
                     </p>
                </section>
                <br>
                </div>
                
                <div>
                    <section id="nombreSeccion" name="nombreSeccion">
                        <h3 class='title-h3-nosotros'>Manual de Convivencia</h3>
                    </section>
                <section class="info-general-Seccion" id="informacionGeneralCurso" name="informacionGeneralCurso">
                    <center>
                        <a href="https://sanpedroclaver.edu.co/archivo/Manual.pdf" target="_blank" class="waves-effect waves-light btn-large"><i class="fas fa-book material-icons right"></i>Ver Manual</a>
                    </center>
                </section>
                <br>
                </div>
            </div>
            
        </BODY>
        <?php include_once '../footer.php' ?>
        <script src="../js/jquery-3.3.1.js"></script>
        <script src="../js/jquery.validate.js"></script>
        <script src="../js/sweetalert.min.js" type="text/javascript"></script>
        <script src="../js/additional-methods.js" type="text/javascript"></script>
        <script src="../js/util.js" type="text/javascript"></script>
        <script src="../materialize/js/materialize.js" type="text/javascript"></script>
        <script src="../js/nav.js" type="text/javascript"></script>
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


    


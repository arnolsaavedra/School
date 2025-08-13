<?php
$nombreCurso="Contacto";
$nombreCursoAbreviado="Cocina";
$informacionCurso="";
//informacion general
$Modalidad="";
$Certificado="";
$Semestres="";
$Sedes="";
//Semestres
$semestreUno="";
$semestreDos="";
$semestreTres="";
//Cuestro razones
$razonUno ="";
$razonDos ="";
$razonTres ="";
$razonCuatro ="";
//Testimonio
$urlVideoTestimonio="";
$txtTestimonio="";

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
            <link href="../materialize/css/materializeicon.css" type="text/css" rel="stylesheet" media="screen,projection"/>
            <link href="../materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
            <link href="../materialize/fontawesome/css/all.min.css" rel="stylesheet">
            
            <title><?php echo $nombreCurso ?> | San Pedro Claver</title>
        </HEAD> 
        <BODY>
            
            <?php
            include_once '../nav.php';
            ?>
            <div class="background-title-page" style="background-image: url(../imagen/imagencursos/fondoContacto.jpg);">
                <div style="margin-right: 2%;">
                 <h2 class="title-curse"><?php echo $nombreCurso ?></h2>
                </div>
            </div>

            <div id="curso_diplomado" name="curso_diplomado" class="card-panel contenedorTarget contenedor-info-curse CJtext" style="    margin-bottom: 0;" >
                <div class="contactoEstructuraContet cominicate-nosotros" >
                    <div class="card-panel comunicate-card ex1">
                        <h3 class='title-h3-nosotros ' style="font-style: italic;">COMUNICATE CON NOSOTROS</h3>
                            <hr>
                            <a href="tel:0388717312" target="_blank" class="letra-contacto"><i class="fas fa-phone-alt"></i> </a>


                            <a href="https://web.whatsapp.com/send?phone=+573163961376&amp;text=¡Hola! Quiero más información" target="_blank" class="letra-contacto"><i class="fab fa-whatsapp"></i></i> </a>


                            <a href="https://www.facebook.com/SanPedroClaverSedeNeiva/" target="_blank" class="letra-contacto"><i class="fab fa-facebook-f"></i> </a>


                            <a href="https://goo.gl/maps/Vs4Q7KS7zNECGXZ6A" target="_blank" class="letra-contacto"><i class="fas fa-map-marker-alt"></i> </a>

                    </div>
                </div>
                
            <div class="card-panel contactoEstructuraContet frmContactocss">
            <?php include_once '../componente/frm_contacto/frmContacto.php' ?>
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
        <script src="../js/estructura.js" type="text/javascript"></script>
        <script src="../componente/frm_contacto/frmContacto.js"></script>
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


    


<!DOCTYPE html>
<?php

?>
    <HTML>
        <HEAD>
            <script>
              var link = document.createElement('meta');
              link.setAttribute('property', 'og:url');
              link.content = document.location;
              document.getElementsByTagName('head')[0].appendChild(link);
              
              link = document.createElement('meta');
              link.setAttribute('rel', 'canonical');
              link.content = document.location;
              document.getElementsByTagName('head')[0].appendChild(link);
            </script>
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-139394669-1"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());
            
              gtag('config', 'UA-139394669-1');
            </script>
            <title id="nombreCursoTitle"></title>
            <meta name='expires' content='never'>
            
            <meta http-equiv="Pragma" content="no-cache" />
            <meta name="robots" content="index, follow">
            <link rel="shortcut icon" href="favicon.ico">
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta name='language' content='spanish'>
            <meta name="author" content="San Pedro Claver Escuela de Salud">
            <meta name="document-classification" content="Escuela de salud san pedro claver neiva, tecnicos y cursos virtuales dirigidos a la salud">
            
           
            <meta property="og:locale" content="es_ES" />
            <meta property="og:type" content="website" />
             <meta property="og:site_name" content="San Pedro Claver" />
            
            <meta name="og:image" property="og:image" content="https://sanpedroclaver.edu.co/imagen/imgfooter.png"> 
            <meta name="og:image:alt" property="og:image:alt" content="Logo San Pedro Claver-Escuela de salud">
            
            <meta property="og:type" content="website">
            <meta property="og:description" content="Educacion Tecnica Laboral con calidad certificada" />
            <link href="../materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
            <link href="../materialize/css/materializeicon.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        </HEAD> 
        <BODY>
            
            <?php
            include_once '../nav.php';
            ?>
            <div id="imagenPortadCurso" name="imagenPortadCurso" class="background-title-curse">
                <div style="margin-right: 2%;">
                 <h2 class="title-curse" id="nombreCursoIni"></h2>
                </div>
            </div>
            <div id="curso_diplomado" name="curso_diplomado" class="contenedor-info-curse CJtext">
                
                <div>
                <section id="nombreCurso" name="nombreCurso">
                </section>
                
      
                <section id="imagenCurso" name="imagenCurso" class="imagen-curso-div loadimg">
                  <div id="imagenCursoContent" name="imagenCursoContent" class="carousel carousel-slider">
                 </div>
                </section>
                
                <section class="info-general-curso" id="informacionGeneralCurso" name="informacionGeneralCurso">
                    <div class="card-panel">
                        <div>
                            <h3 class="h3-inf-general">Información general</h3>
                        </div>
                        <p  id="info-general-cursoContent" name="info-general-cursoContent"></p>
                        <p  id="info-general-cursoContentSede" name="info-general-cursoContentSede"> </p>
                        <p  id="info-general-cursoContentCert" name="info-general-cursoContentCert"></p>
                        <p  id="info-general-cursoContentSemestre" name="info-general-cursoContentSemestre"></p>
                        

                    </div>
                    <div class="" style="text-align:center;">
                        <hr>
                    <h3 class="h3-inf-general ">Quiero mi Pre-Inscripcion!</h3>
                    <a href="/pre-inscripcion"><button class="waves-effect waves-light btn  pulse"><i class="material-icons right fas fa-file-signature "></i>Pre-Inscripcion</button></a>
                    <br>
                    </div>
                </section>
                <br>
            <section id="descripcionCurso" name="descripcionCurso" class="row" style="">
                <section><h3>Descripción del curso</h3></section>
                <p id="descripcionCursoContent" name="descripcionCursoContent"style="text-align: justify;">
                 </p>
            </section>
            </div>
            <hr>
            <section class="contenidoPrograma-div" id="contenidoPrograma" name="contenidoPrograma" style="text-align:center;">
                <section>
                    <h3>Contenido del programa</h3>
                </section>
                <section id="semestreCurso" name="semestreCurso">
                    <section class="contenido-semestre card-panel margin-card-curse">
                        <section>
                            <i class="fas fa-star color-icon long-icon-se"></i>
                            <h3>Semestre</h3>
                        </section>
                        <section style="text-align:left;">
                            <ol class="ol-contenido-semestre">  
                                <li type="disc"><p class="li-contenido">Consulta médica especializada</p></li>
                                <li type="disc"><p class="li-contenido">Apoyo diagnóstico</p></li>
                                <li type="disc"><p class="li-contenido">Exámenes especializados</p></li>
                                <li type="disc"><p class="li-contenido">Consulta domiciliaria</p></li>
                                <li type="disc"><p class="li-contenido">Servicio de ambulancia</p></li>
                                <li type="disc"><p class="li-contenido">Hospitalización, atención de urgencias y todas las atenciones hospitalarias</p></li>
                            </ol>
                        </section>
                    </section>
                </section>
                
            </section>
            <section id="razonesCurso" name="razonesCurso">
                <div id="fondoCuatroRazones" class="background-title-curse" >
                    <div class="maring-img-cuatrorazones">
                        <div class="titulo-4-razon">
                         <h2 class="cuatro-razones"><font style="font-size:200%;">4</font><br><font class="cuatro-razones">razones</font><br><font style="font-size:50%;">para estudiar</font><br><font style="" id="nombreCursoCuatroRazones"></font></h2>
                        </div>
                        <div class="contenedor-cuatrorazones">
                            <div name="razonCurso" id="razonCurso">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
                        <section id="testimonioCurso" name="testimonioCurso" style="text-align:center;">
                <section>
                    <h2 style="font-family: 'sans-serif';color: white;background-color: black;" >TESTIMONIOS</h2>
                </section>
                <div class="contenedor-testim">
                    <section id="videoTestimonioPro" class="contenedor-video">
                     </section>
                    <section id="texttestiprogra" class="txt-testimonio">
                    </section>
                </div>
                
            </section>
            
            </div>
        </BODY>
        <?php include_once '../footer.php' ?>
        <script src="../js/jquery-3.3.1.js"></script>
        <script src="../js/jquery.validate.js"></script>
        <script src="../js/sweetalert.min.js" type="text/javascript"></script>
        <script src="../js/additional-methods.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="../js/nav.js" type="text/javascript"></script>
        <script src="../js/cargar_inf_prog.js" type="text/javascript"></script>
        <script>
        cargar_info_paso1("<?php echo $_GET["nombrecurso"]; ?>");
        </script>
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


    


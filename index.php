<?php
include_once 'controller/DBManejador.php';
include_once 'controller/cargarCmb.php';
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
        <meta http-equiv="Cache-Control" content="no-cache" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <meta name="robots" content="index, follow">
        <meta name='language' content='spanish'>
        <meta name="author" content="Escuela de Salud San Pedro Claver">
        <meta name="keywords" content="escuela,salud,neiva,Neiva,NEIVA">
        <link rel="shortcut icon" href="favicon.ico">
        <meta name="description" content="San Pedro Claver, Escuela de Salud es una es una institución de educación para el trabajo y el desarrollo humano tal como lo expresa la Ley 1064 de 2006 con más de veinte años de experiencia. Nuestra Institución toma la educación como un proceso de formación permanente, personal, cultural y social que se fundamenta en una concepción integral de la persona humana, de su dignidad, de sus derechos y sus deberes.Nos distinguimos por combinar los procesos educacionales con eventos de carácter cultural y social para todos los estudiantes de nuestra institución. Hemos sido condecorados por el Congreso Nacional de la República en el grado de Comendador por 20 años de servicio a la educación en el país."/>
        <link rel="canonical" href="https://sanpedroclaver.edu.co/" />
        <meta property="og:locale" content="es_ES" />
        <meta property="og:type" content="website" />
        <meta name="og:title" property="og:title" content="San Pedro Claver-Escuela de salud"> 
        <meta name="og:url" property="og:url" content="https://sanpedroclaver.edu.co/"> 
        <meta property="og:description" content="San Pedro Claver, Escuela de Salud es una es una institución de educación para el trabajo y el desarrollo humano tal como lo expresa la Ley 1064 de 2006 con más de veinte años de experiencia. Nuestra Institución toma la educación como un proceso de formación permanente, personal, cultural y social que se fundamenta en una concepción integral de la persona humana, de su dignidad, de sus derechos y sus deberes.Nos distinguimos por combinar los procesos educacionales con eventos de carácter cultural y social para todos los estudiantes de nuestra institución. Hemos sido condecorados por el Congreso Nacional de la República en el grado de Comendador por 20 años de servicio a la educación en el país." />
        <meta property="og:site_name" content="San Pedro Claver" />
        
        <meta name="og:image" property="og:image" content="https://sanpedroclaver.edu.co/imagen/imgfooter.png"> 
        <meta name="og:image:alt" property="og:image:alt" content="Logo San Pedro Claver-Escuela de salud">
        
        <meta itemprop="addressLocality" content="Altico/Neiva">
        <meta itemprop="addressRegion" content="Huila/Neiva">
        <meta itemprop="addressCountry" content="Colombia">
        <meta itemprop="name" content="San Pedro Claver Escuela de Salud">
        <meta itemprop="image" content="https://sanpedroclaver.edu.co/imagen/imgfooter.png">
        <meta itemprop="telephone" content="3163961376,(8)717312">
        <meta itemprop="email" content="administracionweb@sanpedroclaver.edu.co">
        <span itemprop="openingHoursSpecification" itemscope itemtype="http://schema.org/OpeningHoursSpecification">
        
            <link href="materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" href="materialize/OwlCarousel/dist/assets/owl.carousel.min.css">
            <link rel="stylesheet" href="materialize/css/animate.css">
            <title>San Pedro Claver Neiva</title>
        </HEAD> 
        <BODY>
        <span id="cargandoLo" name="cargandoLo" style="background-color:white;text-align: center;z-index: 1000;top: 0;left: 0;position: fixed;width: 100%;display: block;margin: 0;height: 100%;transition:2s;">
        <div style="margin-top: 50vh;">
          <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-green-only">
              <div class="circle-clipper left">
                <div class="circle"></div>
              </div><div class="gap-patch">
                <div class="circle"></div>
              </div><div class="circle-clipper right">
                <div class="circle"></div>
              </div>
            </div>
          </div>
        <h4 style="color:black !important; ">Estamos preparando todo para tí.</h4>
        </div>
        </span>
        <div id="contenidoBody" style="opacity:0;transition:1;">
            <?php
            include_once 'nav.php';
            ?>
            <header class="header content"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <div class="header-video">
                    <img style="width: 100%;" id="videoindexF" src="" >
                </div>
                <div class="header-overlay"></div>
                <div class="header-content" style="width: 100%;">
                    <div class="tester mensajeIndex">
                        <div>
                            <p style="text-align:left;"><font id="colorLetraMensaje" style="font-size: 70px;font-weight: bold;margin: 0;line-height: 1;text-align:left;">Siempre</font> <font style="font-size: 50px;margin: 0;line-height: 1;text-align:left;">parece</font><br>
                            <font style="font-size: 40px;margin: 0;line-height: 1;text-align:left;">imposible</font> <font id="colorLetraMensaje" style="font-size:60px;font-weight: bold;margin: 0;line-height: 1;text-align:left;">hasta</font><br>
                            <font style="font-size: 40px;margin: 0;line-height: 0;text-align:left;">que el</font> <font id="colorLetraMensaje" style="font-size:70px;font-weight: bold;margin: 0;line-height: 1;text-align:left;">conocimiento</font><br>
                            <font id="colorLetraMensaje" style="font-size: 70px;font-weight: bold;margin: 0;line-height: 1;text-align:left;">te enseña</font>  <font style="font-size:40px;margin: 0;line-height: 1;text-align:left;">cómo</font>
                            <font id="colorLetraMensaje" style="font-size: 100px;font-weight: bold;margin: 0;line-height: 1;text-align:left;">HACERLO</font>
                            </p>
                        </div>
                    </div>
                    <div class="tester">
                    <?php include_once 'componente/mas_informacion/masInformacion.php' ?>
                    </div>
                </div>
            </header>
            <div style="background: #265238;width:100%;text-align:center;">
                <div style="transform: translate(0px, 0px);">
                <a href="/nosotros">
                <div  id="caracteristicaZone" class="index-carecteristicas">
                    <div  style="background-image: url(https://sanpedroclaver.edu.co/imagen/caracteristicas1.png);" class="caracteristicasImagen">
                    <i class="material-icons" >home</i>
                    <h2>Nuestra Institución</h2>
                  
                    </div> 
                </div>
                </a>
                <a href="/programas">
                <div id="caracteristicaZone" class="index-carecteristicas">
                    <div style="text-align:center;background-image: url(https://sanpedroclaver.edu.co/imagen/caracteristicas2.png);" class="caracteristicasImagen">
                    <i class="material-icons">grade</i>
                    <h2>Programas</h2>
                    </div> 
                </div>
                </a>
                <a href="/cursos-y-diplomados">
                <div id="caracteristicaZone" class="index-carecteristicas">
                    <div style="text-align:center;background-image: url(https://sanpedroclaver.edu.co/imagen/caracteristicas1.png);" class="caracteristicasImagen">
                    <i class="material-icons">school</i>
                    <h2>Cursos y Diplomados</h2>
                    </div> 
                </div>
                </a>
                <a  href="/cursos-virtuales" ><div id="caracteristicaZone" class="index-carecteristicas">
                    <div style="background-image: url(https://sanpedroclaver.edu.co/imagen/caracteristicas2.png);" class="caracteristicasImagen">
                    <i class="material-icons">personal_video</i>
                    <h2>Cursos Virtuales</h2>
                    </div> 
                </div></a>
                <a href="/noticias">
                <div id="caracteristicaZone"class="index-carecteristicas">
                    <div style="background-image: url(https://sanpedroclaver.edu.co/imagen/caracteristicas1.png);" class="caracteristicasImagen">
                    <i class="material-icons">notifications_none</i>
                    <h2 >Noticia y Eventos</h2>
                    </div>
                </div>
                </a>
                </div>
            </div>

            <div>
                <?php include_once './componente/curso_diplomado_presenciales/curso_diplomado_presenciales.php' ?>
            </div>
            <div>
                <?php include_once './componente/tres-informacion/tres-informacion.php' ?>
            </div>
            <div>
                <?php include_once './componente/curso_diplomado_virtuales/curso_diplomado_virtuales.php' ?>
            </div>
            <div>
                <?php include_once './componente/imgCompus/campus.php' ?>
            </div>
            <div>
                <?php include_once './componente/curso_virtual/curso_virtuales.php' ?>
            </div>
            <div>
                <?php include_once './componente/testimonio/testimonio.php' ?>
            </div>
            <div>
                <?php include_once './componente/convenio/convenio.php' ?>
            </div>
            </div>
        </BODY>
      <?php include_once './footer.php' ?> 
     
        <script src="js/jquery-3.3.1.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/sweetalert.min.js" type="text/javascript"></script>
        <script src="materialize/js/materialize.min.js"></script>
        <script src="js/additional-methods.min.js" type="text/javascript"></script>
        
        <script src="js/util.js"></script>
        <script src="js/nav.js"></script>
        <script src="js/estructura.js"></script>
        
        <script src="componente/mas_informacion/masInformacion.js"></script>
        <script src="componente/curso_diplomado_presenciales/cur_dip_presencial.js"></script>
        <script src="componente/curso_diplomado_virtuales/cur_dip_virtual.js"></script> 
        <script src="componente/convenio/convenio.js"></script> 
        <script src="componente/curso_virtual/cur_virtual.js"></script> 
        <script src="componente/imgCompus/campus.js"></script> 
     
             <script type="text/javascript">
                $(window).on("load" ,function(){
                 
               $("#contenidoBody").css("opacity","1");
                $("#cargandoLo").css("display","none");
                 $("#videoindexF").attr("src", "imagen/imgFondo.jpg");
                cargarListaCursoPresencialFla();
                carruselPrese();
                
                cargarListaCursoVirtual();
                carruselVirtual();
                
                cargarListaCursoVirtual_2();
                carruselVirtual_2();
                
                mostrarImgCampus();
                
                cargarImgConvenio();
                carruselConvenio();
                
                $("#imgQ10").attr("src", "https://sanpedroclaver.edu.co/imagen/Logo_Q10_Soluciones.png");
                $("#imgMinEducion").attr("src", "https://sanpedroclaver.edu.co/imagen/minEducacion-300x80.png");
                
                $("#iconoFb").attr("src", "https://sanpedroclaver.edu.co/imagen/iconofb.png");
                $("#iconoWs").attr("src", "https://sanpedroclaver.edu.co/imagen/iconows.png");
                $("#iconoIn").attr("src", "https://sanpedroclaver.edu.co/imagen/iconoin.png");
                });
               
            </script>
        <script   src="materialize/OwlCarousel/dist/owl.carousel.js"></script>
    </HTML> 


    


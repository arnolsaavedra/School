<?php

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
            <link rel="stylesheet" href="../materialize/OwlCarousel/dist/assets/owl.carousel.min.css">
            <link rel="stylesheet" href="../materialize/css/animate.css">
            <link href="../materialize/fontawesome/css/all.min.css" rel="stylesheet">
            <title id="titleNoticia">| San Pedro Claver Neiva</title>
        </HEAD> 
        <BODY>
            
            <?php
            include_once '../nav.php';
            ?>
            <div class="background-title-curse" style="background-image: url(../imagen/nosotrosFondo.jpg);">
                <div style="margin-right: 2%;" >
                 <h2 class="title-curse" id="nombreNoticia">Titulo Noticia</h2>
                </div>
            </div>
            <div id="curso_diplomado" name="curso_diplomado" class="CJtext" style="text-align:center;margin:4%;" > 
            
            <section id="noticia" name="noticia" style="text-align: left;width: 60%;height: 1280px;display: inline-block;">
                
            </section>
            
            <section name="informacionDerecha" style="float: right;width: 30%;text-align: left;">
                <section class="card-panel" id="nuestraComunidad" style="padding-top: 0;">
                    <div style="background-color:#0d883e;    border-bottom-left-radius: 50px;border-bottom-right-radius: 50px;">
                        <h2 style="font-size:24px;text-align:center;color:white;margin-top: 0;"><b>Nuestra Comunidad</b></h2>
                        </div>
                    <div style="text-align: center;">
                        <div class="ex1" style="font-size:50px;">
                        <a style="color:#005aa0;" href="https://www.facebook.com/SanPedroClaverSedeNeiva/" target="_blank"><i  class="fab fa-facebook-square"></i></a>
                        <a style="color:#ff2691;" style="margin:2%;" href="https://www.instagram.com/sanpedroclaver/" target="_blank"><i style="#ff2691" class="fab fa-instagram"></i></a>
                        <a style="color:#090;" href="https://web.whatsapp.com/send?phone=+573163961376&amp;text=¡Hola! Quiero más información" target="_blank"><i style="#090" class="fab fa-whatsapp-square"></i></a>

                        </div>
                    </div>
                </section>
                <section id="nuestraComunidad">
                    <h2 style="font-size:24px;font-family: 'sans-serif';">Programas</h2>
                    <hr>
                    <div style="text-align: center;">
                        <?php include_once '../componente/listadoPrograma/listadoPrograma.php' ?>
                    </div>
                </section>
                <section id="frameFacebook">
                    <h2 style="font-size:24px;font-family: 'sans-serif';">Facebook</h2>
                    <hr>
                    <div style="text-align: center;">
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FSanPedroClaverSedeNeiva%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe></div>
                </section>
            </section>
             <div>
                <?php include_once '../componente/convenio/convenio.php' ?>
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
        <script  src="../componente/listadoPrograma/listadoPrograma.js"></script>
        <script  src="../componente/convenio/convenio.js"></script>
        <script  src="../js/noticia.js"></script>
                         <script type="text/javascript">
                $(window).on("load" ,function(){
                
                cargarNoticia("<?php echo $_GET["nombrenoticia"]; ?>");    
                    
                listaPrograma();    
                cargarImgConvenio();
                carruselConvenio();
                
                $("#imgQ10").attr("src", "https://sanpedroclaver.edu.co/imagen/Logo_Q10_Soluciones.png");
                $("#imgMinEducion").attr("src", "https://sanpedroclaver.edu.co/imagen/minEducacion-300x80.png");
                
                $("#iconoFb").attr("src", "https://sanpedroclaver.edu.co/imagen/iconofb.png");
                $("#iconoWs").attr("src", "https://sanpedroclaver.edu.co/imagen/iconows.png");
                $("#iconoIn").attr("src", "https://sanpedroclaver.edu.co/imagen/iconoin.png");
                });
                
            </script>
    <script   src="../materialize/OwlCarousel/dist/owl.carousel.js"></script>

        
        
    </HTML> 


    


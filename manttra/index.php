 <?php
date_default_timezone_set('America/Bogota');
ini_set("display_errors", '1');
session_start();
include_once 'util/util.php';
include_once 'rsc/session.php';
$util = new Util();
$session= new session();
$urlBase = $util->traerurlbase();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="Expires" content="0" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta name="description" content="Conoce nuestros Programas como lo son Auxiliar en Enfermería, Auxiliar en Salud Oral, Cocina y Administración de Restaurantes, Auxiliar en Servicios Farmacéuticos, Auxiliar en Servicios Farmacéuticos, Cosmetología y Estética Integral"> 
        <meta name="og:title" property="og:title" content="San Pedro Claver-Escuela de salud"> 
        <meta name="og:url" property="og:url" content="https://sanpedroclaver.edu.co/"> 
        <meta name="og:type" property="og:type" content="website"> 
        <meta name="og:image" property="og:image" content="https://sanpedroclaver.edu.co/manttra/imagenes/AlgunosDenuestrosTecnicos3.png"> 
        <meta name="og:description" property="og:description" content="Conoce nuestros Programas como lo son Auxiliar en Enfermería, Auxiliar en Salud Oral, Cocina y Administración de Restaurantes, Auxiliar en Servicios Farmacéuticos, Auxiliar en Servicios Farmacéuticos, Cosmetología y Estética Integral"> 
        <meta name="og:image:alt" property="og:image:alt" content="Programas como lo son Auxiliar en Enfermería, Auxiliar en Salud Oral, Cocina y Administración de Restaurantes, Auxiliar en Servicios Farmacéuticos, Auxiliar en Servicios Farmacéuticos, Cosmetología y Estética Integral"> 
        <meta name="og:title" property="og:title" content="	San Pedro Claver-Escuela de salud"> 
        <meta name="robots" content="noindex, follow"> 
        
<meta itemprop="addressLocality" content="Altico/Neiva">
<meta itemprop="addressRegion" content="Huila/Neiva">
<meta itemprop="addressCountry" content="Colombia">
<meta itemprop="name" content="San Pedro Claver">
<meta itemprop="image" content="https://sanpedroclaver.edu.co/manttra/imagenes/ESSCLogoHorizontal.png">
<meta itemprop="telephone" content="8717312">
<meta itemprop="email" content="informacion@sanpedroclaver.edu.co">
<span itemprop="openingHoursSpecification" itemscope itemtype="http://schema.org/OpeningHoursSpecification">
<meta itemprop="name" content="Todos los días">

        <title>INICIO -San Pedro Claver</title>

        <!-- CSS  -->
      
     
        <link href="<?php echo $urlBase; ?>manttra/css/material_icons.css" rel="stylesheet">
        <link href="<?php echo $urlBase; ?>manttra/css/fontawesome/css/all.min.css" rel="stylesheet">
        <link href="<?php echo $urlBase; ?>manttra/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>



    </head>
    <body class="white" style="padding-right: 0px;" >
      <?php
           include_once 'nav.php';
            ?>
            <div class="contenedorresponsive" >
              <div style="max-width: 100%;" >
        <header class="headerIndex">
            
      <div class="card-panel indexContenedorObj">
        

</div>
        <section class="card-panel indexContenedorObj" >
          
            <h5 style="text-align:center;"><b>Nosotros te llamamos</b></h5>
            <hr>
            <h6 style="color:black;text-align:center;">Puedes llenar los campos y nos pondremos en contacto contigo <br> para brindarte más información</h6>
            <br>
            <form id="frmNosotrosTeLLamamos" name="frmNosotrosTeLLamamos">
		<div style="width:60%;"  class="input-field">
		    <i class="prefix fas fa-user-alt"></i>
            <input id="prospectoNombre" name="prospectoNombre" type="text" class="validate waves-white btn transparent inputRecolector">
            <label for="prospectoNombre" style="font-size: 18px !important;color: black;" >Tu Nombre</label>
            </div>
            
            <div  style="margin-left:10%;width:60%;" class="input-field">
                <i class="prefix fas fa-envelope"></i>
            <input id="prospectoCorreo" name="prospectoCorreo" type="text" class="validate waves-white btn transparent inputRecolector">
            <label for="prospectoCorreo" style="font-size: 18px !important;color: black;" >Correo</label>
            </div>
            <div  style="margin-left:20%;width:60%;" class="input-field">
                <i class="prefix fas fa-hashtag"></i>
            <input id="prospectoCelular" name="prospectoCelular" type="text" class="validate waves-white btn transparent inputRecolector">
            <label for="prospectoCelular" style="font-size: 18px !important;color: black;" >Celular</label>
            </div>
            </form>
    <center>
  <button  class="btn waves-effect waves-light"  type="button" id="btnQuieroMasInformacion" name="btnQuieroMasInformacion">Quiero Información
    <i class="material-icons right fas fa-paper-plane"></i>
  </button>
  </center>
        
        </section>
        </header>
</div>   

    <div style="text-align:center;">
        <h1 class="indexNuestrosProgramas" style="text-align:center;"><b>ALGUNOS DE NUESTROS PROGRAMAS</b></h1>
        <div class="nuestrosProgramas" style="float:left;">
           
          <img style="width: 100%;height:600px" alt="Programas como lo son Auxiliar en Enfermería, Auxiliar en Salud Oral, Cocina y Administración de Restaurantes, Auxiliar en Servicios Farmacéuticos, Auxiliar en Servicios Farmacéuticos, Cosmetología y Estética Integral" src="<?php echo $urlBase;?>manttra/imagenes/AlgunosDenuestrosTecnicos3.png">
         
        </div>
        
        <div class="nuestrosProgramas">   
        <h3 itemprop="bestRating" class="txtIndexCapacidades" >Nuestra escuela cuenta con las mejores instalaciones, laboratorios y espacios de formación para que nuestros estudiantes puedan vivir una experiencia completa en su proceso de aprendizaje.</h3>
        <hr>
        <a href="https://web.whatsapp.com/send?phone=+573163961376&text=¡Hola! Quiero más información" target="_blank"><button  class="waves-effect waves-light btn-large"  type="submit" name="action">Visitar Sitio WEB
        <i class="material-icons right fas fa-binoculars"></i>
        </button></a>
        </div>
    </div>

    <div style="text-align: center;">
        <div  style="background-image: url(<?php echo $urlBase;?>manttra/imagenes/fondo2SanPedroclaver.jpg); height:215px; width:100%; background-size:cover;background-position: 50% 46%; background-color:rgba(0, 0, 0, 0.5);;background-blend-mode:soft-light;">
            <h3 class="txtIndexCapacidades" style="color:white;padding-top: 3%;padding-bottom: 4%;" >Nuestra institución ha sido condecorada por el Congreso Nacional de la república en el grado de Comendador por 20 años de servicio a la educación en el país.
            </h3>
        </div>
    </div>
 </div>
</body>
        <footer >
              <div style="text-align: center;">
        <div  style="background-image: url(<?php echo $urlBase;?>manttra/imagenes/footersanpedroclaver.jpg); width:100%; background-size:cover;background-position: 50% 46%; background-color:rgba(0, 0, 0, 0.5);;background-blend-mode:soft-light;">
            <div class="ex1" style="font-size:50px;" >
                <a href="https://www.facebook.com/SanPedroClaverSedeNeiva/" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com/sanpedroclaver/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://web.whatsapp.com/send?phone=+573163961376&text=¡Hola! Quiero más información" target="_blank"><i class="fab fa-whatsapp"></i></a>
            </div>
            <div class="ex2" style="font-size:24px;color:white;" >
                <a href="https://goo.gl/maps/SUhdreUX33BjY1Ex8" target="_blank" style="color:white;"><i class="fas fa-street-view"></i>Calle 6 # 12-36 Altico Neiva-Huila</a>
                <i class="fas fa-phone-alt"></i>8717312
            </div>
                <center>
                </center>
                <div style="padding-top: 30px;">
                  <p class="pie_01" style="text-align: center;color:white;">Copyright © 2019 Arnol Saavedra - Todos los derechos reservados.</p>
                   <hr width="50px" style="border-color: rgb(226, 226, 226);margin-top:20px;" >
                
            </div>
        </div>
    </div>
     
    </footer>
    
    
       <script src="<?php echo $urlBase; ?>manttra/js/jquery-3.3.1.js"></script>
       <script src="<?php echo $urlBase; ?>manttra/js/jquery.validate.js"></script>
       <script src="<?php echo $urlBase; ?>manttra/js/sweetalert.min.js" type="text/javascript"></script>
       <script src="<?php echo $urlBase; ?>manttra/js/materialize.js"></script>
       <script src="<?php echo $urlBase; ?>manttra/js/additional-methods.js" type="text/javascript"></script>
       <script src="<?php echo $urlBase; ?>manttra/js/util.js"></script>
       <script src="<?php echo $urlBase; ?>manttra/js/nav.js"></script>
       <script src="<?php echo $urlBase; ?>manttra/js//informacion.js"></script>

</html>

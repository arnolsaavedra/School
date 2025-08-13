<?php
$iconoDropdown = "<i class='material-icons right'>arrow_drop_down</i>";


?>
            <link href="materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
            <link href="materialize/css/materializeicon.css" type="text/css" rel="stylesheet" media="screen,projection"/>
            <link href="fontawesome/css/all.min.css" rel="stylesheet">
            <link rel="stylesheet" href="materialize/OwlCarousel/dist/assets/owl.carousel.min.css">
            <link rel="stylesheet" href="materialize/css/animate.css">

<ul id="navNosotros" class="dropdown-content">
  <li><a href="https://www.q10academico.com/preinscripcion?aplentId=f0902d61-b442-4b70-a031-cd0bfeb0f4cb" target="_blank">Prescripción</a></li>
  <li><a href="https://www.q10academico.com/login?ReturnUrl=%2F&aplentId=f0902d61-b442-4b70-a031-cd0bfeb0f4cb" target="_blank">MI USUARIO</a></li>
  <li class="divider"></li>
  <li><a href="/politica-de-privacidad">POLÍTICA DE PRIVACIDAD</a></li>
  <li class="divider"></li>
  <li><a href="/nosotros">Nosotros</a></li>
  <li class="divider"></li>
  <li><a href="https://sanpedroclaver.edu.co/contacto" target="_blank">Contacto</a></li>
  
</ul>

<ul id="navProgramas" class="dropdown-content">
 <div id="listaProgNav">
  </div>
</ul>
<ul id="navDiplomadosPC" class="dropdown-content">
  <div id="listaDipNav">
  </div>
</ul>
<ul id="navEducacionVirtual" class="dropdown-content">
  <li><a href="#!">Inscripciones cursos virtuales</a></li>
  <div id="listaCurVirNav">
      
  </div>
</ul>
  <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo center menu-fixed"><img class="logo-nav" src="<?php echo "https://".$_SERVER['SERVER_NAME'] ?>/imagen/ESSC-Logo-Vertical.png" ></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons fas fa-bars"></i></a>
    <div class="left-nava">
      <ul id="nav-mobile" style="" class="left hide-on-med-and-down">
        <li><a href="/" >INICIO</a></li>
        <li><a href="#2" class="dropdown-trigger" data-target="navProgramas">PROGRAMAS <?php echo $iconoDropdown ?></a></li>
        <li><a href="#3" class="dropdown-trigger" data-target="navEducacionVirtual">EDUCACION VIRTUAL <?php echo $iconoDropdown ?></a></li>
      </ul>
    </div>
    <div class="right-nava">
      <ul id="nav-mobile" style="" class="right hide-on-med-and-down">
          <li><a href="#7" class="dropdown-trigger" data-target="navDiplomadosPC">DIPLOMADOS <?php echo $iconoDropdown ?></a></li>
        <li><a href="#4" class="dropdown-trigger " data-target="navNosotros">NOSOTROS <?php echo $iconoDropdown ?></a></li>
        <li><a href="https://www.q10academico.com/login?ReturnUrl=%2F&aplentId=f0902d61-b442-4b70-a031-cd0bfeb0f4cb" target="_blank">MI USUARIO</a></li>
       <li><a href="/contacto" target="_blank">CONTACTO</a></li> 
      </ul>
    </div>
    </div>
  </nav>
  
    <!-- MOVIL -->
  <ul id="navNosotrosMOBIL" class="dropdown-content">
  <li><a href="https://www.q10academico.com/preinscripcion?aplentId=f0902d61-b442-4b70-a031-cd0bfeb0f4cb" target="_blank">Prescripción</a></li>
  <li><a href="https://www.q10academico.com/login?ReturnUrl=%2F&aplentId=f0902d61-b442-4b70-a031-cd0bfeb0f4cb" target="_blank">MI USUARIO</a></li>
  <li class="divider"></li>
  <li><a href="/politica-de-privacidad">POLÍTICA DE PRIVACIDAD</a></li>
  <li class="divider"></li>
  <li><a href="/nosotros">Nosotros</a></li>
  <li class="divider"></li>
  <li><a href="https://sanpedroclaver.edu.co/contacto" target="_blank">Contacto</a></li>
  
</ul>

<ul id="navProgramasMOBIL" class="dropdown-content">
 <div id="listaProgNav">
  </div>
</ul>
<ul id="navDiplomadosPCMOBIL" class="dropdown-content">
  <div id="listaDipNav">
  </div>
</ul>
<ul id="navEducacionVirtualMOBIL" class="dropdown-content">
  <li><a href="#!">Inscripciones cursos virtuales</a></li>
  <div id="listaCurVirNav">
      
  </div>
</ul>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="/" >INICIO</a></li>
    <li><a href="#2" class="dropdown-trigger" data-target="navProgramasMOBIL">PROGRAMAS <?php echo $iconoDropdown ?></a></li>
    <li><a href="#3" class="dropdown-trigger" data-target="navEducacionVirtualMOBIL">EDUCACION VIRTUAL <?php echo $iconoDropdown ?></a></li>
    <li><a href="#7" class="dropdown-trigger" data-target="navDiplomadosPCMOBIL">DIPLOMADOS <?php echo $iconoDropdown ?></a></li>
    <li><a href="#4" class="dropdown-trigger " data-target="navNosotrosMOBIL">NOSOTROS <?php echo $iconoDropdown ?></a></li>
    <li><a href="/contacto" target="_blank">CONTACTO</a></li> 
  </ul>
  
          <script src="js/jquery-3.3.1.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/sweetalert.min.js" type="text/javascript"></script>
        <script src="materialize/js/materialize.js"></script>
        <script src="js/additional-methods.js" type="text/javascript"></script>
        
                    <script type="text/javascript">
                $(window).on("load" ,function(){
               $("#cargando").css("display","none");
               $("#cargado").css("opacity","1");
               $("#contenidoBody").css("opacity","1");
                $("#cargandoLo").css("display","none");
                });
            </script>
        <script src="js/util.js"></script>
        <script src="js/nav-temp.js"></script>

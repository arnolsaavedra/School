<?php
$iconoDropdown = "<i class='material-icons right'>arrow_drop_down</i>";
?>
<ul id="navNosotros" class="dropdown-content">
  <li><a href="/requisitos" target="_blank">Prescripción</a></li>
  <li><a href="https://www.q10academico.com/login?ReturnUrl=%2F&aplentId=f0902d61-b442-4b70-a031-cd0bfeb0f4cb" target="_blank">MI USUARIO</a></li>
  <li class="divider"></li>
  <li><a href="/politica-de-privacidad">POLÍTICA DE PRIVACIDAD</a></li>
  <li class="divider"></li>
  <li><a href="/nosotros">Nosotros</a></li>
  <li class="divider"></li>
  <li><a href="/contacto" target="_blank">Contacto</a></li>
  
</ul>

<ul id="navProgramas" class="dropdown-content">
 <div class="listaProgNav">
  </div>
</ul>
<ul id="navDiplomadosPC" class="dropdown-content">
  <div class="listaDipNav">
  </div>
</ul>
<ul id="navEducacionVirtual" class="dropdown-content">
  <li><a href="#!">Inscripciones cursos virtuales</a></li>
  <div class="listaCurVirNav">
      
  </div>
</ul>
  <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo center"><img class="logo-nav" src="<?php echo "https://".$_SERVER['SERVER_NAME'] ?>/imagen/logosanpedroclaverneiva.png" ></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
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
       <li><a href="/contacto" target="_blank">CONTACTO</a></li> 
      </ul>
    </div>
    </div>
  </nav>
  
    <!-- MOVIL -->
  <ul id="navNosotrosMOBIL" class="dropdown-content">
  <li class="divider"></li>
  <li><a href="/requisitos" target="_blank">Prescripción</a></li>
  <li class="divider"></li>
  <li><a href="https://www.q10academico.com/login?ReturnUrl=%2F&aplentId=f0902d61-b442-4b70-a031-cd0bfeb0f4cb" target="_blank">MI USUARIO</a></li>
  <li class="divider"></li>
  <li><a href="/politica-de-privacidad">POLÍTICA DE PRIVACIDAD</a></li>
  <li class="divider"></li>
  <li><a href="/nosotros">Nosotros</a></li>
  <li class="divider"></li>
  <li><a href="https://sanpedroclaver.edu.co/contacto" target="_blank">Contacto</a></li>
</ul>
<ul id="navProgramasMOBIL" class="dropdown-content">
 <div class="listaProgNav">
  </div>
</ul>
<ul id="navDiplomadosPCMOBIL" class="dropdown-content">
  <div class="listaDipNav">
  </div>
</ul>
<ul id="navEducacionVirtualMOBIL" class="dropdown-content">
  <li><a href="#!">Inscripciones cursos virtuales</a></li>
  <div class="listaCurVirNav">
  </div>
</ul>
  <ul class="sidenav" id="mobile-demo">
    <li><a href="/" >INICIO</a></li>
    <li><a href="#2" class="dropdown-trigger" data-target="navProgramasMOBIL">PROGRAMAS <?php echo $iconoDropdown ?></a></li>
    <li><a href="#3" class="dropdown-trigger" data-target="navEducacionVirtualMOBIL">EDUCACION VIRTUAL <?php echo $iconoDropdown ?></a></li>
    <li><a href="#7" class="dropdown-trigger" data-target="navDiplomadosPCMOBIL">DIPLOMADOS <?php echo $iconoDropdown ?></a></li>
    <li><a href="#4" class="dropdown-trigger " data-target="navNosotrosMOBIL">NOSOTROS <?php echo $iconoDropdown ?></a></li>
    <li><a href="https://www.q10academico.com/login?ReturnUrl=%2F&aplentId=f0902d61-b442-4b70-a031-cd0bfeb0f4cb" target="_blank">MI USUARIO</a></li>
  </ul>
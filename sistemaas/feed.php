<?php
session_start();

if (isset($_SESSION['user_id'])) {
  
 }else{
     header('Location: /as');
 }

?>
    <html>
        <HEAD>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="Expires" content="0" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta name="robots" content="noindex, follow"> <!-- PENDIENTE ACOMODAR EL NO INDEX -->
        <link href="css/materialize/css/materializeicon.css" rel="stylesheet">
        <link href="css/materialize/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
            <title>AS | San Pedro Claver</title>
        </HEAD> 
        <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
             <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo"><img style="width: 300px;margin-left:2%;" src="<?php echo "https://".$_SERVER['SERVER_NAME'] ?>/imagen/imgfooter.png"></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="#">Usuario: Administrador</a></li>
        <li><a href="<?php session_destroy(); ?>">Salir</a></li>
      </ul>
    </div>
  </nav>
        </header>
        <body >
            <div class="card-panel" style="text-align:center;">
            <p style="color:green;float: right;font-weight: bold;">Basic</p>
            <h1 style="font-family: initial;font-weight: bold;">AS Escuela San Pedro Claver - Neiva</h1>
            </div>
            <div style="margin:1%;">
                <div class="card-panel" style="width:30%;display:inline-table;">
                    <a id="inicioFeed" name="inicioFeed" style="display:block;margin:1%;" class="waves-effect waves-light btn"><i class="material-icons left">home</i>Inicio</a>
                    <a id="masInformacionASButton" name="masInformacionASButton" style="display:block;margin:1%;" class="waves-effect waves-light btn"><i class="material-icons left">info</i>Quieren más información</a>
                    <a id="contactoASButton" name="contactoASButton" style="display:block;margin:1%;" class="waves-effect waves-light btn"><i class="material-icons left">contact_mail</i>Contacto</a>
                    <a id="registrosButton" name="registrosButton" style="display:block;margin:1%;" class="waves-effect waves-light btn"><i class="material-icons left">history</i>Registros</a>
                    <a id="cursosAS" name="cursosAS" style="display:block;margin:1%;" class="waves-effect waves-light btn"><i class="material-icons left">library_books</i>Cursos</a>
                    <a id="noticias" name="noticias" style="display:block;margin:1%;" class="waves-effect waves-light btn"><i class="material-icons left">fiber_new</i>Noticias</a>
                    <a id="btnCampus" name="btnCampus" style="display:block;margin:1%;" class="waves-effect waves-light btn"><i class="material-icons left">fiber_new</i>Campus</a>
                    <a id="galeria" name="galeria" style="display:block;margin:1%;" class="waves-effect waves-light btn"><i class="material-icons left">add_a_photo</i>Subir imágenes</a>
                    <a disabled style="display:block;margin:1%;" class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Whatsapp</a>
                    <a disabled style="display:block;margin:1%;" class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Contabilidad</a>
                    <a disabled style="display:block;margin:1%;" class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>progreso</a>
                </div>
                <div class="card-panel" style="width:69%;display:inline-table;">
                    <div id="inicioAsFeed" name="inicioAsFeed">
                    </div>
                    <div id="respuestaOpcion" name="respuestaOpcion" style="display:none;width:100%;display:block;'">
                        
                    </div>
                    <div id="inicioAsManual" name="inicioAsManual" style="width:100%;">
                        <p>Este es el sistema AS integrado para San Pedro Claver Escuela De Salud Neiva.</p>
                        <section style="text-align:center;">
                            <p>Uso general de la plataforma</p>
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/Hn-B_3nBmSk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <p>Obtener el link/Url de los videos Facebook/YouTube </p>
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/hQB-E2mvfzo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </section>
                    </div>
                    <div id="infoCursoALL" name="infoCursoALL" style="display:none;width:100%;'">
                        <form id="frmEditCurso" name="frmEditCurso">
                            <div id="infoCurso" name="infoCurso" >
                            
                            </div>
                            <div id='cmbCertificadoSeIndex' name='cmbCertificadoSeIndex'>
                            </div>
                            <div id='cmbModalidadSeIndex' name='cmbModalidadSeIndex'> 
                            </div>
                            <div id='cmbSedSeIndex' name='cmbSedSeIndex'> 
                            </div>
                            <div id='cmbCurDipSeIndex' name='cmbCurDipSeIndex'> 
                            </div>
                            <div id="buttonSetInfoCurso" name="buttonSetInfoCurso"></div>
                        </form>
                    </div>
                    <div id="getTemarioEdit" name="getTemarioEdit" style="display:none;">
                   
                            <div id="tableTemarioEdit" name="tableTemarioEdit">
                                
                            </div>
                     
                    </div>
                    <div id="getCuatroRazonesEditDiv" name="getCuatroRazonesEditDiv" style="display:none;width:100%;display:block;'">
                        <form id="frmEditRazonCurso" name="frmEditRazonCurso">
                        <div id='cuatroRazonesEdit' name='cuatroRazonesEdit'> 
                        </div>
                        <div id="buttonSetRazonCurso" name="buttonSetRazonCurso"></div>
                        </form>
                    </div>
                    </div>
                </div>

                <div id="modal1" class="modal">
                    <div class="modal-content">
                    <p id="mensajeContacC"></p>
                    </div>
                    <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                    </div>
                </div>

            </div>

            
        </body>
        <script src="js/jquery-3.3.1.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/sweetalert.min.js" type="text/javascript"></script>
        <script src="js/additional-methods.min.js" type="text/javascript"></script>
        <script src="js/estructuraas.js"></script>
        <script src="css/materialize/js/materialize.min.js"></script>
        <script src="js/util.js"></script>
        <script src="js/feed.js"></script>
        </html>
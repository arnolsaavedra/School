<?php
session_start();

 if (isset($_SESSION['user_id'])) {
  header('Location: /sistemaas/feed.php');
  }

?>
    <html>
        <HEAD>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="Expires" content="0" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta name="robots" content="noindex, follow"> <!-- PENDIENTE ACOMODAR EL NO INDEX -->
        <link href="../materialize/css/material_icons.css" rel="stylesheet">
        <link href="../materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="../fontawesome/css/all.min.css" rel="stylesheet">
            <title>AS | San Pedro Claver</title>
        </HEAD> 
        <body >
            <video id="video" loop autoplay preload muted style=" position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: auto;
            z-index: -10;
            visibility: visible;
            background-size: cover;
            background-position: center;
            background-color: #2E2E2E;
            background-blend-mode: soft-light;">
            <source src="../../manttra/imagenes/videoInstalaciones.mp4" type="video/mp4"/>
            </video>
            <div class="card-panel" style="width:50%;margin:10%;background: #FFFFFFD4;">
                <form id="frmIniciarAS" name="frmIniciarAS">
                    <h2 style="font-style: oblique;">Bienvenido</h2>
                      <div class="row">
                        <div class="input-field">
                          <input  id="userLogin" name="userLogin" type="text" class="validate">
                          <label class="active" for="userLogin">Usuario</label>
                        </div>
                        <div class="input-field">
                          <input  id="passwordLogin" name="passwordLogin" type="password" class="validate">
                          <label class="active" for="passwordLogin">Contraseña</label>
                        </div>
                      </div>
                    <button  class="btn waves-effect waves-light"  type="button" id="btnEntrar" name="btnEntrar">Entrar
                    <i class="material-icons right fas fa-sign-in-alt"></i>
                    </button>
                </form>
            </div>
            
        </body>
        <script src="https://sanpedroclaver.edu.co/sistemaas/js/jquery-3.3.1.js"></script>
        <script src="https://sanpedroclaver.edu.co/sistemaas/js/jquery.validate.min.js"></script>
        <script src="https://sanpedroclaver.edu.co/sistemaas/js/sweetalert.min.js" type="text/javascript"></script>
        <script src="https://sanpedroclaver.edu.co/sistemaas/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="https://sanpedroclaver.edu.co/sistemaas/js/estructuraas.js"></script>
        <script src="https://sanpedroclaver.edu.co/sistemaas/js/util.js"></script>
        <script src="https://sanpedroclaver.edu.co/sistemaas/js/login.js"></script>
        </html>
<?php
?>
<div style="background-color:#0d883e;    border-bottom-left-radius: 50px;
    border-bottom-right-radius: 50px;">
    <h5 style="text-align:center;color:white;margin-top: 0;"><b>ENVIANOS UN MENSAJE</b></h5>
    </div>
<section class="" style="" >

    <br>
    <form id="frmContacto" name="frmContacto">
        <center>
            
            <div style="width:80%;"  class="input-field input-masinformacion">
            <label id="lblFrmMasInformacion">Nombre</label>
            <input id="frmContactoNombre" name="frmContactoNombre" type="text" class="validate waves-white transparent inputRecolector" placeholder="Nombre">
            </div>
            <div  style="width:80%;" class="input-field input-masinformacion">
            <label id="lblFrmMasInformacion">Correo</label>
            <input id="frmContactoCorreo" name="frmContactoCorreo" type="email" class="validate waves-white transparent inputRecolector" placeholder="correo">
            </div>
            <div  style="width:80%;" class="input-field input-masinformacion">
            <label id="lblFrmMasInformacion">Celular</label>
            <input id="frmContactoCelular" name="frmContactoCelular" type="number"  class="validate waves-white transparent inputRecolector" placeholder="Celular">
            </div>
            
            <div  style="width:80%;" class="input-field input-masinformacion">
            <label id="lblFrmMasInformacion">Mensaje</label>
            <textarea id="frmContactoMensaje" name="frmContactoMensaje" class="materialize-textarea validate " placeholder="Mensaje"></textarea>
            
            </div>


        </center>
    </form>
    <center>
        <button  class="btn waves-effect waves-light"  type="button" id="btnFrmContacto" name="btnFrmContacto">Enviar
        <i class="material-icons right fas fa-paper-plane"></i>
        </button>
    </center>
</section>
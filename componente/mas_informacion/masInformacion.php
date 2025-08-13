<?php



?>
<section class="" >
    <h5 style="text-align:center;color:white;"><b>Nosotros te llamamos</b></h5>
    <hr>
    <h6 style="color:white;text-align:center;">Puedes llenar los campos y nos pondremos en contacto contigo <br> para brindarte más Información<h6>
    <br>
    <form id="frmMasInformacion" name="frmMasInformacion">
        <center>
            <div style="width:80%;"  class="input-field input-masinformacion">
            <label id="lblFrmMasInformacion">Nombre</label>
            <input id="prospectoNombre" name="prospectoNombre" type="text" class="validate waves-white transparent inputRecolector" placeholder="">
            </div>
            
            <div style="width:80%;" class="input-field input-masinformacion">
            <label id="lblFrmMasInformacion">Fecha de nacimiento</label>
            <input  id="fechaNaceDia" name="fechaNaceDia" type="date" class="validate waves-white transparent inputRecolector" placeholder="Fecha de Nacimiento">
            </div>
            
            <div  style="width:80%;" class="input-field input-masinformacion">
            <label id="lblFrmMasInformacion">Correo</label>
            <input id="prospectoCorreo" name="prospectoCorreo" type="email" class="validate waves-white transparent inputRecolector" placeholder="correo">
            </div>
            <div  style="width:80%;" class="input-field input-masinformacion">
            <label id="lblFrmMasInformacion">Celular</label>
            <input id="prospectoCelular" name="prospectoCelular" type="number"  class="validate waves-white transparent inputRecolector" placeholder="Celular">
            </div>
            
             <div style="width:80%;" class="input-field">
                <select class="browser-default input-masinformacion" id="prospectoInteresCurso" name="prospectoInteresCurso" required >
                <option value="0" disabled selected>Programa de interés</option>
                <?php foreach($cursosYDiplomados as $respuesta) { ?>
                <option value="<?php echo $respuesta->value; ?>"><?php echo $respuesta->name; ?></option>
                <?php } ?>  
                </select>
            </div>
   
        </center>
    </form>
    <center>
        <button  class="btn waves-effect waves-light"  type="button" id="btnAgregarInformacionProspecto" name="btnAgregarInformacionProspecto">Quiero Información
        <i class="material-icons right fas fa-paper-plane"></i>
        </button>
    </center>
</section>
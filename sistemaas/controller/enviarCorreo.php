 <?php


if( isset($_POST['opcion'])) $opcion  = $_POST['opcion'];

switch($opcion){
    
    case 1: checkInteres();break;
    
}
function checkInteres() {
    $colorBarra = "#0d883e";
    $logo ="https://sanpedroclaver.edu.co/imagen/imgfooter.png";
    
    if( isset($_POST['nombreProspecto'])) $nombreProspecto  = $_POST['nombreProspecto'];
    if( isset($_POST['prospectoCorreo'])) $correoProspecto  = $_POST['prospectoCorreo'];
    if( isset($_POST['celularProspecto'])) $celularProspecto  = $_POST['celularProspecto'];
    if( isset($_POST['cmbProgramaInteres'])) $ProgramaInteres  = $_POST['cmbProgramaInteres'];
    if( isset($_POST['prospectoRegistro'])) $DiaIngreoDatos  = $_POST['prospectoRegistro'];

    $correoDistinatario = "angela.perez@sanpedroclaver.edu.co,administracionweb@sanpedroclaver.edu.co,pilarlopezro@yahoo.es";
    
    $asunto = "Check Realizado";
    
    //recibe 
    $to4 = $correoDistinatario;
    //remitente del correo
    $from4 = 'tic@sanpedroclaver.edu.co';
    
    $fromName4 = 'TIC San Pedro Claver Escuela de Salud';
    //Asunto del email
    $subject4 = $asunto; 
     
    //Contenido del Email
    $htmlContent4 = '<!DOCTYPE html>
                    <html>
                        <body style="background-color: #ededed;font-family:Helvetica;">
                            <table style="width:100%;vertical-align: middle;">
                                <tr><td colspan="3" style="height:75px;text-align: center;background-color: #ffffff;border-bottom: 3px solid #ddd;"><a href="https://sanpedroclaver.edu.co" target="_blank"><img src="' .$logo. '" width="200" height="60"></a></td></tr>
                                <tr><td style="width:10%"></td>
                                    <td style="padding:15px 0">
                                            <p style="text-align:center;color:#000000">se ha realizado un Check, Prospecto</p>
                                            <p style="text-align:left;color:#000000">Datos Prospecto:<br>
                                                Check por: administrador<br>
                                                <br>
                                                Nombre: '.$nombreProspecto.'<br>
                                                Correo: '.$correoProspecto.'<br>
                                                Contacto: '.$celularProspecto.'<br>
                                                Programa de interes: '.$ProgramaInteres.'<br>
                                                Ingreso a base de datos de prospectos: '.$DiaIngreoDatos.'<br>
                                                </p>
                                            <p style="text-align:center;color:#000000">En caso de tener algún problema puedes escribirnos al correo tic@sanpedroclaver.edu.co</p>   
                                    </td>
                                    <td style="width:10%"></td>
                                </tr>
                                <tr><td colspan="3" style="height:15px;text-align: left;background-color:'.$colorBarra.';"><p style="padding:0 15px">Tomamos la educación como un proceso de formación permanente, personal, cultural y social que se fundamenta en una concepción integral de la persona humana, de su dignidad, de sus derechos y sus deberes -  <a href="https://sanpedroclaver.edu.co" target="_blank">San Pedro Claver Escuela de Salud</a></p></td></tr>
                            </table>
                        </body>
                    </html>';
    //Encabezado para información del remitente
    $headers4 = "De: $fromName4"." <".$from4.">";
     
    //Limite Email
    $semi_rand4 = md5(time()); 
    $mime_boundary4 = "==Multipart_Boundary_x{$semi_rand4}x"; 
     
    //Encabezados para archivo adjunto 
    $headers4 .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary4}\""; 
     
    //límite multiparte
    $message4 = "--{$mime_boundary4}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
    "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent4 . "\n\n"; 
     
    $message4 .= "--{$mime_boundary4}--";
    $returnpath4 = "-f" . $from4;
     
    //Enviar EMail
    $mail4 = @mail($to4, $subject4, $message4, $headers4, $returnpath4); 
     
    //Estado de envío de correo electrónico
    echo $mail4?"<h1>enviado.</h1>":"<h1>error.</h1>";
}

function correoSinArchivo() {
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "test@globalredlatinoamerica.com";
    $to = "juegoss894@gmail.com";
    $subject = "Checking PHP mail";
    $message = "PHP mail works just fine";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "The email message was sent.";
}
?>
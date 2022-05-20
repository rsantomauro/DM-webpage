<?php
//Importamos las variables del formulario de contacto

@$Nombre = htmlspecialchars($_POST['Nombre']);
@$Motivo = htmlspecialchars($_POST['Motivo']);
@$Ciudad = htmlspecialchars($_POST['Ciudad']);
@$Correo = htmlspecialchars($_POST['Correo']);
@$Mensaje = htmlspecialchars($_POST['Mensaje']);

//Preparamos el mensaje de contacto
$cabeceras = "From: $Correo\n" //La persona que envia el correo
 . "Reply-To: $Correo\n";
$asunto = "From: DeMolay Uruguay $Motivo\n"; //asunto aparecera en la bandeja del servidor de correo
$email_to = "cc02montevideo@gmail.com"; //cambiar por tu email
$contenido = "$Nombre ha enviado un mensaje desde el sitio web www.disimpor.com.ve\n"
. "\n"
. "Nombre: $Nombre\n"
. "Motivo: $Motivo\n"
. "Ciudad: $Ciudad\n"
. "Correo: $Correo\n"
. "Mensaje: $Mensaje\n"
. "\n";
//Enviamos el mensaje y comprobamos el resultado
if (@mail($email_to, $asunto ,$contenido ,$cabeceras )) {

//Si el mensaje se envía muestra una confirmación
echo '<div class="modal fade" id="respuesta2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <strong>Su mensaje ha sido enviado correctamente.</strong>
    </div>
  </div>
</div>';
}else{
//Si el mensaje no se envía muestra el mensaje de error
echo '<div class="modal fade" id="respuesta2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <strong>ERROR. Intente mas tarde.</strong>
    </div>
  </div>
</div>';
}

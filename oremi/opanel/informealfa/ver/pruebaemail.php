<?php
/* ====================================================================================================================================== */
/*   AttachDoctoOnMail */
require("class.phpmailer.php");
require("class.smtp.php");
/* ====================================================================================================================================== */

$mail = new PHPMailer();
$mail->Host = "localhost";
$mail->IsSMTP();
$mail->From = "ljvillalobos@gmail.com";
$mail->FromName = "Luis Jimenez Villalobos";
$mail->Subject = "OREMI Coquimbo";
$mail->AddAddress("ljimenez@gorecoquimbo.cl");
/*
NO HAY DOCUMENTOS ATACHADOS
if ($varname != "") {
	$mail->AddAttachment($vartemp, $varname);
}
*/

/*
$body = "<strong>Mensaje</strong><br><br>".$_POST['mensaje']."<br>";
$body.= "<i>Enviado por Buzon Ciudadano GORE Coquimbo</i>";
*/
$body = "Estimad@

El email que usted recibe, es por una consulta que realizó a través de nuestro sitio web www.gorecoquimbo.cl, cuyo mensaje fue:

-------------------------
MENSAJE DE PRUEBA
-------------------------


Este email fue escrito el ". date('d-m-Y') ."


Esperando poder haber contribuido con su requerimiento, atentamente le saluda

Administrador
";
$mail->Body = $body;
$mail->IsHTML(true);
//$mail->Send();
if($mail->Send()) { echo "enviado"; } else { echo "no enviado"; }
/* ====================================================================================================================================== */
/* AttachDoctoOnMail */

?>
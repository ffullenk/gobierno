<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> 
<html>
<head><title>prueba de envio de email</title>
</head>
<body>
<form name="enviaemail" id="enviaemail" method="post">
<table border="0" cellpadding="0" cellspacing="0" width="740">
    <tr>
      <th colspan="2">Formulario Envio Correo Electronico a Traves de HTML</th>
	</tr>
	<tr><td>De:</td><td><input type="text" name="nombre_email_de" id="nombre_email_de" size="50" maxlength="50"></td></tr>
	<tr><td>Email:</td><td><input type="text" name="email_de" id="email_de" size="50" maxlength="50"></td></tr>
	<tr><td>A:</td><td><input type="text" name="nombre_email_a" id="nombre_email_a" size="50" maxlength="50"></td></tr>
	<tr><td>Email:</td><td><input type="text" name="email_a" id="email_a" size="50" maxlength="50"></td></tr>
	<tr><td colspan="2"><textarea name="email_asunto" rows="7" cols="20"></textarea></td></tr>
	<tr><td colspan="2"><input type="submit" name="enviaemail" id="enviaemail" value=" Enviar Email "></td></tr>
</table>
</form>

</body>
</html>

<?php
if($_POST["enviaemail"]) {  
echo "espere mientras se envia su email... ";


$nombre_email_de = $_POST["nombre_email_de"];
	$email_de = $_POST["email_de"];
	$nombre_email_a = $_POST["nombre_email_a"];
	$email_a = $_POST["email_a"];
	$email_asunto = $_POST["email_asunto"];

	ini_set("sendmail_from", $email_de);
	
     $email_contacto = $email_de;	
		$destinatario = $email_a;
	    //para el envío en formato HTML 
	   
        $headers = "";
	    $headers = "MIME-Version: 1.0\r\n"; 
	    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
	    
	    //dirección del remitente 
	    $headers .= "From: $email_contacto\r\n"; 
        //dirección de respuesta, si queremos que sea distinta que la del remitente 
	    $headers .= "Reply-To: $email_contacto\r\n"; 

		$asunto = acentos_inverso($email_asunto);
	  
	    
	   if(cms_mail($destinatario,$asunto,$cuerpo,$headers,$email_de)) {
	      echo "mail enviado con exito";
	   } else {
	      echo "error .... email no pudo ser enviado";
	   }





}

/*
    $nombre_email_de = $_POST["nombre_email_de"];
	$email_de = $_POST["email_de"];
	$nombre_email_a = $_POST["nombre_email_a"];
	$email_a = $_POST["email_a"];
	$email_asunto = $_POST["email_asunto"];
	
	
	
	$asunto  = 'EL Señor(a), '.$nombre_email_de.', te recomienda que visites www.gorecoquimbo.cl';
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$cabeceras .= 'From: Gobierno Regional de Coquimbo <'.$email_de.'>' . "\r\n" .
   'Reply-To: '.$email_de.'' . "\r\n" .
   'X-Mailer: PHP/' . phpversion();
     
mail($email_a, $asunto, $mensaje, $cabeceras);
*/



function cms_mail($destinatario,$asunto,$cuerpo,$headers,$email_de){
  $phpmailer_conf = 1;	
  if($phpmailer_conf==1){
     require("class.phpmailer.php");

     $remitente =$email_de;
     $firma_web = "ONEMI Coquimbo";

     $mail=new PHPMailer();
     $mail->Host="192.168.33.40";
//$mail->Host="192.168.33.40";
     $mail->From="$remitente";
     $mail->Subject="$asunto";
     $mail->AddAddress("$destinatario","d");
     $body  = "$cuerpo
		       $firma_web";
     $mail->Body = $body;
     $mail->AltBody = "$asunto";

     $mail->Send();
  }else{
     mail($destinatario,$asunto,$cuerpo,$headers);
  }
}

function acentos_inverso($texto)

{

 $texto = str_replace("&aacute;","á",$texto);

 $texto = str_replace("&eacute;","é",$texto);

 $texto = str_replace("&iacute;","í",$texto);

 $texto = str_replace("&oacute;","ó",$texto);

 $texto = str_replace("&uacute;","ú",$texto);

 $texto = str_replace("&ntilde;","ñ",$texto);

 

 return $texto;
}

?>
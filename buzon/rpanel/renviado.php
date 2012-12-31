<?php
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

  umask(0);
  include('../bd/conecta.php');
  $link = Conexion();
  $legal_require_php = "bzrrevalidate";
  global $global_qk;
  $global_qk=0;


require('detect.php');
  global $c;

if($loginCorrecto ) {  
	/*se incluyen los archivos*/
	@include("../lib/grbz-sesion.php");
	@include("../lib/bc_lib.php");
	@include("../lib/global.php");
	@include("../lib/recordset.php");
	@include("rfunciones.php");
	@include("../lib/bc_correo.php");

?>
<html>
<head>
<title>Panel de Respuestas - Buzón Ciudadano :: Gobierno Regional de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="estilos/rpanel.css" rel="stylesheet" type="text/css">
</head>

<body style="margin:0px 0px;padding:0px;">
<table width="722" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="1">&nbsp;</td>
    <td width="720">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
		  	<?php
				CabeceraRPagina();
				LineaComando();
			?>
		  </td>
        </tr>
        <tr>
           <td height="25"><table width="720" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="160" valign="top">
					    <!-- Menu Principal -->
						<?php MenuRPagina(); ?>
						<!-- Menu Principal -->
					  </td>
                      <td width="560" valign="top">
					    <!-- Seccion Central -->
					  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="textoRuta"><?php Ruta("E");?></td>
                          </tr>
						  <tr><td height="15"></td></tr>
                          <tr>
                            <td>
							<!-- Parte  Central de la Pagina-->
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr class="texto-tablas">
									<td bgcolor="#FFFFFF">
<?php
	$rMensaje		= $_POST["cMensaje"];
	$rIdMensaje		= $_POST["id"];
	$rResponsable	= $_POST["global_qk"];
	$maxTam			= $_POST["maxTam"];

	/*     Luego de recibir las variables, cerciorarse si Viene un Documento Adjunto y checar el Peso de Este.     */
	$varname = $_FILES['archivo']['name'];
	$vartemp = $_FILES['archivo']['tmp_name'];
	$varsize = $_FILES['archivo']['size'];
	
	if( ($varname != "") && ($varsize > $maxTam) ) {
		$KB=$maxTam/1000;
		echo "<p>el taman&ntilde; del archivo debe ser mayor que  0 KB. y menor que ".$KB." KB. <br> Revise su archivo, e intente nuevamente. ".$tamFile."  ". $MaxTam ."</p>";
		return false;
	}


	
	$rFecha		= date("Y-m-d H:i:s");
	$rRespuesta	= "S";
	$rsSaveMens =new Recordset($SERVER, $DB, $USER, $PASSWORD);

	$rsSaveMens->FieldByInsert( "COD_BITC" , "'$rIdMensaje'" );
	$rsSaveMens->FieldByInsert( "COD_FUNCIONARIO" , "'$rResponsable'" );
	$rsSaveMens->FieldByInsert( "RESPUESTA" , "'$rMensaje'" );
	$rsSaveMens->FieldByInsert( "FECHA" , "'$rFecha'" );
	$error = $rsSaveMens->execInsert( "BITACORA_R" , 1);
	
	/*El registro fue agregado corecctamente*/
    if ($error == true )
	{
		/*  Rescato el nombre y email de la persona que responde */
		$rsQResponde = new Recordset($SERVER , $DB , $USER , $PASSWORD);
		$query = "SELECT concat( NOMBRES, \" \", APPAT, \" \", APMAT ), EMAIL 
					FROM FUNCIONARIO 
					WHERE COD_FUNCIONARIO = '". $global_qk ."';";
		$rsQResponde->Open($query);
		while($rsQResponde->moveNext())
		{
			$qNombre	= $rsQResponde->FieldByNumber(0);
			$qEmail		= $rsQResponde->FieldByNumber(1);
		} 
		/* Actualizo la Tabla de Bitacora de Mensajes Recibidos y marco Respuesta a "S" */
		$rsActualiza =new Recordset($SERVER, $DB, $USER, $PASSWORD);
		$rsActualiza->FieldByUpdate( "RESPUESTA" , "'$rRespuesta'" ); 
		$rsActualiza->WhereByUpdate( "COD_BITC" , "$rIdMensaje" );
		$error = $rsActualiza->execUpdate( "BITACORA_C" , 1);
		/*El registro fue modificado corecctamente*/
        if ($error == true )
		{
			/* 
			Como fue actualizado correctamente, ahora debemos enviar la respuesta al usuario
			Ademas, debemos señalarles a los otros responsables de este tema, que el email 
			fue respondido.
			 */
			
			/* Obtengo los datos del usuario que habia consultado a traves de la web */
			$rsQPregunta = new Recordset($SERVER , $DB , $USER , $PASSWORD);
			$query = "SELECT concat( NOMBRES, \" \", PATERNO, \" \", MATERNO ), EMAIL, MENSAJE, COD_TEMA 
						FROM BITACORA_C AS B, PERSONA AS P  
							WHERE B.COD_PERS = P.COD_PERS AND 
							B.COD_BITC = '". $rIdMensaje ."';";
			$rsQPregunta->Open($query);
			while($rsQPregunta->moveNext())
			{
				$mNombre	= $rsQPregunta->FieldByNumber(0);
				$mEmail		= $rsQPregunta->FieldByNumber(1);
				$mMensaje	= $rsQPregunta->FieldByNumber(2);
				$mCodTema	= $rsQPregunta->FieldByNumber(3);
			}
			
			/*  Obtengo quienes son los responsables para este tema */
			$rsTemas = new Recordset($SERVER , $DB , $USER , $PASSWORD);
			$queryTemas = "SELECT Q.COD_TEMA, F.COD_FUNCIONARIO, F.EMAIL 
						FROM FUNCIONARIO AS F, QRESPONDE AS Q 
							WHERE Q.COD_FUNCIONARIO = F.COD_FUNCIONARIO AND 
							Q.COD_TEMA = '" . $mCodTema . "';";
			$rsTemas->Open($queryTemas);
			$email_responsable = array();
			while($rsTemas->moveNext()) {
				/* Existe un email ingresado para este user. */
				$email_responsable[]	= $rsTemas->FieldByNumber(2);
			} 

			$mail =new correo();
			$emailEmisor="webmaster@gorecoquimbo.cl";			
			$asunto = "Buzón Ciudadano :: GORE-COQUIMBO";
			$mail->setEmisor("Buzón Ciudadano :: GORE-COQUIMBO",$emailEmisor);
			$Mensaje_A_Responsables = "Estimados Funcionarios,
Mediante la presente, informamos a ustedes que el email recepcionado a través de nuestro sitio web www.gorecoquimbo.cl
por parte del usuario " . $mNombre .", cuyo email es " . $mEmail . " preguntando por:



" . html_entity_decode($mMensaje) . "	




--------------------------------------------------------------
Fue Respondido por: ". $qEmail .", ". $qNombre ."

Quien le respondió lo siguiente:



". $rMensaje ."





--------------------------------------------------------------
Este email fue escrito el ". convertir_fecha($rFecha) ."

Atte.,
Administrador
Buzón Ciudadano :: Gobierno Regional de Coquimbo
";

			for($i=0; $i<count($email_responsable);$i++) {
				$mail->putCorreo($email_responsable[$i], $asunto, $Mensaje_A_Responsables);
			 }	
			 $mail->sendCorreo();
/* ============================================================================================================================ */
/*                Para arriba, es un mensaje que se le envia a todos aquellos funcionarios que pertenecen al tema actual que se esta respondiendo                  */
/* ============================================================================================================================ */
/*   foreach($email_responsable as $email_a) { $mail->putCorreo($email_a, "Buzón Ciudadano :: Gobierno Regional de Coquimbo",$Mensaje_A_Responsables); $mail->sendCorreo(); }   */



/* ====================================================================================================================================== */
/*   AttachDoctoOnMail */
/*
require("class.phpmailer.php");
require("class.smtp.php");
*/
/* ====================================================================================================================================== */
/*
$mail = new PHPMailer();
$mail->Host = "192.168.33.10";
$mail->IsSMTP();
$mail->From = $qEmail;
$mail->FromName = $qNombre;
$mail->Subject = "Buzon Ciudadano GORE-COQUIMBO";
$mail->AddAddress($mEmail);
if ($varname != "") {
	$mail->AddAttachment($vartemp, $varname);
}
*/

/*
$body = "<strong>Mensaje</strong><br><br>".$_POST['mensaje']."<br>";
$body.= "<i>Enviado por Buzon Ciudadano GORE Coquimbo</i>";
*/

/*
$body = "Estimad@
". $mNombre ."

El email que usted recibe, es por una consulta que realizó a través de nuestro sitio web www.gorecoquimbo.cl, cuyo mensaje fue:



". $mMensaje ."





--------------------------------------------------------------
Ante su consulta, podemos responderle lo siguiente:



". $rMensaje ."





--------------------------------------------------------------
Este email fue escrito el ". convertir_fecha($rFecha) ."


Esperando poder haber contribuido con su requerimiento, atentamente le saluda


Administrador
Buzón Ciudadano :: Gobierno Regional de Coquimbo
";
$mail->Body = $body;
$mail->IsHTML(true);
$mail->Send();
*/

/* ====================================================================================================================================== */
/* AttachDoctoOnMail */



$mail_A_Usuario = new correo();
$mail_A_Usuario->setEmisor("Buzon Ciudadano GORE-COQUIMBO",$emailEmisor);
$Mensaje_A_Usuario = "Estimad@
". $mNombre ."
El email que usted recibe, es por una consulta que realizó a través de nuestro sitio web www.gorecoquimbo.cl, cuyo mensaje fue:
". $mMensaje ."
--------------------------------------------------------------
Ante su consulta, podemos responderle lo siguiente:
". $rMensaje ."
--------------------------------------------------------------
Este email fue escrito el ". convertir_fecha($rFecha) ."
Esperando haber contribuido con su requerimiento, atentamente le saluda
Administrador
Buzón Ciudadano :: Gobierno Regional de Coquimbo
";
$mail_A_Usuario->putCorreo($mEmail, "Buzón Ciudadano Gobierno Regional de Coquimbo",$Mensaje_A_Usuario);
$mail_A_Usuario->sendCorreo();



			$nTrans = 1;			
        } /* FIN IF: El registro fue modificado corecctamente*/
		else { $nTrans = 2;}
    } 	/* FIN IF: El registro fue agregado corecctamente*/
	else { $nTrans = 3;
	}
	
	echo "
		<table width=\"550\ border=\"0\" align=\"center\">
		<tr><td height=\"5\"></td></tr>
		<tr>
			<td class=\"informa\">";
	switch($nTrans) {
		case "1":
			echo "<p><img src=\"../imagenes/ic_ok.jpg\" >&nbsp
				Su respuesta fue enviada en forma satisfactoria. 
				Al cabo de unos minutos, deberá recibir un email 
				confirmando la respuesta que acaba de dar.";
			break;
		case "2":
			echo "<p><img src=\"../imagenes/ic_error.jpg\" >&nbsp
			Ocurrió un error al momento de enviar el email. 
			Por favor contáctese con el Departamento de Informática.";
			break;
		case "3":
			echo "<p><img src=\"../imagenes/ic_error.jpg\" >&nbsp
				Ocurrió un error al momento de grabar su respuesta. <br /> <br />
				Compruebe lo siguiente:<br />
				1.- Recuerde que esta permitido responder una única vez un email.<br />
				2.- Si por alguna casualidad, usted recargó la página, este es el motivo de este mensaje.<br /> <br />
				Si no es ninguno de los casos mencionados, Por favor, contáctese con el Departamento de Informática.
			";
			break;
	}
echo "<div align=\"center\">";?>
	<form action="rpreg_r.php" method="post" id="FMuestra">
		<input type="submit" value=" Ir a Preguntas Respondidas " class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'">
	</form><?php
echo "</div>
	</td>
	</tr>
	<tr><td height=\"5\"></td></tr>											
</table>";?>

									</td>
								</tr>
								</table>
							<!-- Parte  Central de la Pagina-->
							</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                        </table>
					    <!-- Seccion Central -->
					  </td>
                    </tr>
                  </table></td>
              </tr>
        <tr>
          <td><?php PieRPagina();?></td>
        </tr>
      </table></td>
    <td width="1">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
} else {
	// No logeado
	header("Location: index.php");
}
?>

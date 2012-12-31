<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><head>
<title>Buzon Ciudadano :: Gobierno Regional de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="bz_contacto.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
function comprobar_email($email){ 
    $mail_correcto = 0; 
    //compruebo unas cosas primeras 
    if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){ 
       if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) { 
          //miro si tiene caracter . 
          if (substr_count($email,".")>= 1){ 
             //obtengo la terminacion del dominio 
             $term_dom = substr(strrchr ($email, '.'),1); 
             //compruebo que la terminación del dominio sea correcta 
             if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){ 
                //compruebo que lo de antes del dominio sea correcto 
                $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1); 
                $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1); 
                if ($caracter_ult != "@" && $caracter_ult != "."){ 
                   $mail_correcto = 1; 
                } 
             } 
          } 
       } 
    } 
    if ($mail_correcto) 
       return 1; 
    else 
       return 0; 
}
	/*se incluyen los archivos*/
	@include("../lib/grbz-sesion.php");
	@include("../lib/bc_lib.php");
	@include("../lib/bc_correo.php");
	@include("../lib/global.php");
	@include("../lib/recordset.php");
	/* Chequeamos si el usuario ya ha consultado anteriormente 
		Por lo tanto, podriamos tener como un elemento a consignar:
		
		El email para ambos casos (nacional, extranjero)
		El rut en caso de ser Nacional
	*/
	$nacion				= $_POST["nacion"];
	$rut				= $_POST["rut"];
	$nombres			= $_POST["nombres"];
	$paterno	= $_POST["paterno"];
	$materno	= $_POST["materno"];
	$email				= $_POST["email"];
	$direccion		= $_POST["direccion"];
	$edad		= $_POST["edad"];
	$genero		= $_POST["genero"];
	$educacion		= $_POST["educacion"];
	$lstRegion		= $_POST["lstRegion"];
	$lstProvincia	= $_POST["lstProvincia"];
	$lstComuna		= $_POST["lstComuna"];
	$otropais			= $_POST["otropais"];
	
	$tipo_consulta		= $_POST["tipo"];
	$tema_consulta		= $_POST["tema"];
	$mensaje			= $_POST["mensaje"];
	
	$CodPersona		= 0;
	$contador_error = 0;
	if($nacion == '0' && $otropais=='') { $errores[$contador_error++] = "Si es Extranjero, identifique su pais.."; }
	if($nacion == '1' && $rut=='') { $errores[$contador_error++] = "Debe Especificar el rut."; }
	if($nombres=='') { $errores[$contador_error++] = "Debe Especificar su Nombre."; }
	if($paterno=='') { $errores[$contador_error++] = "Debe Especificar su Apellido Paterno."; }
	if($materno=='') { $errores[$contador_error++] = "Debe Especificar su Apellido Materno."; }
	if($direccion=='') { $errores[$contador_error++] = "Debe Especificar su Dirección."; }
	if($edad=='0') { $errores[$contador_error++] = "Debe Señalar el rango de su edad."; }
	if($educacion=='0') { $errores[$contador_error++] = "Debe Señalar el rango de su Nivel de Educación."; }
	if($nacion == '1' && $lstRegion=='-99') { $errores[$contador_error++] = "Debe Especificar Región."; }
	if($nacion == '1' && $lstProvincia=='-99') { $errores[$contador_error++] = "Debe Especificar Provincia."; }
	if($nacion == '1' && $lstComuna=='-99') { $errores[$contador_error++] = "Debe Especificar Comuna."; }
	if(comprobar_email($email) == 0) { $errores[$contador_error++] = "Debe Especificar Email valido."; }

if($contador_error>0) { 
		echo "Ingreso invalido de datos, los errores son los siguientes: ";  
		echo "\t\t<ul>\n";	
		for($i=0; $i<$contador_error; $i++)
		{
			echo "\t\t\t<li>",$errores[$i]."</li>\n";
		}
		echo "\t\t</ul>";
		echo "\n\n";
		echo('
			<div align="center"><input class="formbutton" name="atras" type="button" value="Volver" onClick="javascript:history.back();"></div>
			');
} else {
	
	
	
	$rsTabla =new Recordset($SERVER , $DB , $USER , $PASSWORD);
	$query = "SELECT COD_PERS 
				FROM PERSONA 
				WHERE EMAIL = '" . $email . "';";

	$rsTabla->Open($query);
	if($rsTabla->RecordCount()>0)
	{
		/* Existe un email ingresado para este user. */
		$rsTabla->moveNext();
		$CodPersona	= $rsTabla->fieldByName("COD_PERS");
	} else {
		/* El email no ha sido hallado en la TABLA, se registra un nuevo USUARIO		
			Tener presente si es NACIONAL o EXTRANJERO 
			Si en NACIONAL --> Rut, Region, Provincia y Comuna
		*/

		$rsNewPersona =new Recordset($SERVER, $DB, $USER, $PASSWORD);

		$rsNewPersona->FieldByInsert( "NOMBRES" , "'$nombres'" );
		$rsNewPersona->FieldByInsert( "PATERNO" , "'$paterno'" );
		$rsNewPersona->FieldByInsert( "MATERNO" , "'$materno'" );
		$rsNewPersona->FieldByInsert( "EMAIL" , "'$email'" );
		$rsNewPersona->FieldByInsert( "DIRECCION" , "'$direccion'" ); 		
		$rsNewPersona->FieldByInsert( "EDAD" , "'$edad'" );
		$rsNewPersona->FieldByInsert( "GENERO" , "'$genero'" );
		$rsNewPersona->FieldByInsert( "EDUCACION" , "'$educacion'" );

		if($nacion == "1") {
			/* Es CHILENO*/
			$rsNewPersona->FieldByInsert( "RUT" , "'$rut'" );
			$rsNewPersona->FieldByInsert( "REGION" , "'$lstRegion'" );	
			$rsNewPersona->FieldByInsert( "PROVINCIA" , "'$lstProvincia'" );
			$rsNewPersona->FieldByInsert( "COMUNA" , "'$lstComuna'" );
		} else {
			$rsNewPersona->FieldByInsert( "OTROPAIS" , "'$otropais'" );
		}
			
		$error = $rsNewPersona->execInsert( "PERSONA" , 1);
					
		/*El registro fue agregado corecctamente*/
		if ($error == true ) {
			/* Buscamos al usuario ingresado para crear su correlacion en y de acuerdo a */
			$rsBscUs = new Recordset($SERVER , $DB , $USER , $PASSWORD);
			$query = "SELECT COD_PERS 
						FROM PERSONA 
						WHERE EMAIL = '" . $email . "';";
			$rsBscUs->Open($query);
			if($rsBscUs->RecordCount()>0)
			{
				$rsBscUs->moveNext();
				$CodPersona	= $rsBscUs->fieldByName("COD_PERS");
			} 		
		}
	} //END IF RecordCount
	
	// Tenemos el ID del usuario
	

	// Conocemos TIPO y TEMA para la consulta
	$rsCTipo = new Recordset($SERVER , $DB , $USER , $PASSWORD);
	$sqlCTipo = "SELECT TIPO FROM TIPO WHERE COD_TIPO='".$tipo_consulta."'";
	$rsCTipo->Open($sqlCTipo);
	while($rsCTipo->moveNext()) {
		$cTipo = $rsCTipo->fieldByNumber(0);
	}
	
	$rsCTema = new Recordset($SERVER , $DB , $USER , $PASSWORD);
	$sqlCTema = "SELECT TEMA FROM TEMAS WHERE COD_TEMA='".$tema_consulta."'";
	$rsCTema->Open($sqlCTema);
	while($rsCTema->moveNext()) {
		$cTema = $rsCTema->fieldByNumber(0);
	}
	

	$FechaMensaje	= date("Y-m-d H:i:s");
	$TiempoMens		= time() . "-" . rand(1,9999);
	$Respuesta		= "N";
	$rsSaveMens =new Recordset($SERVER, $DB, $USER, $PASSWORD);

	$rsSaveMens->FieldByInsert( "COD_PERS" , "'$CodPersona'" );
	$rsSaveMens->FieldByInsert( "COD_TIPO" , "'$tipo_consulta'" );
	$rsSaveMens->FieldByInsert( "COD_TEMA" , "'$tema_consulta'" );
	$rsSaveMens->FieldByInsert( "MENSAJE" , "'$mensaje'" );
	$rsSaveMens->FieldByInsert( "FECHA" , "'$FechaMensaje'" );
	$rsSaveMens->FieldByInsert( "RESPUESTA" , "'$Respuesta'" );
	$rsSaveMens->FieldByInsert( "TMP_BITC" , "'$TiempoMens'" );
	$error = $rsSaveMens->execInsert( "BITACORA_C" , 1);
					
	/*El registro fue agregado corecctamente*/
	if ($error == true ) {
		/* Debemos Reenviar el mensaje a los responsables*/		
		$rsTemas = new Recordset($SERVER , $DB , $USER , $PASSWORD);
		$query = "SELECT COD_TEMA, F.COD_FUNCIONARIO, EMAIL 
				FROM FUNCIONARIO AS F, QRESPONDE AS Q 
				WHERE Q.COD_FUNCIONARIO = F.COD_FUNCIONARIO AND 
					COD_TEMA = '" . $tema_consulta . "';";
		$rsTemas->Open($query);
		$email_responsable = array();
		while($rsTemas->moveNext())
		{
			/* Existe un email ingresado para este user. */
			$email_responsable[]	= $rsTemas->fieldByName("EMAIL");
		} 
			$Enlace_A_Responder = "http://www.gorecoquimbo.gob.cl/buzon/rpanel/index.php?CodTran=" . $TiempoMens;
			$emailEmisor="webmaster@gorecoquimbo.cl";
			$asunto="Buzón Ciudadano :: ";
			
			$mail = new correo();
			$mail->setEmisor("Buzón Ciudadano",$emailEmisor);
			$Mensaje_A_Responsables = " 
Se ha recibido una consulta, clasificada como:

Tipo: ". $cTipo ."
Tema: ". $cTema ."
			
del usuario " . $nombres ." ". $paterno . " ". $materno ."
email " . $correo_e . "
			
El contenido del mensaje es:

------------------------------

" . $mensaje . "

------------------------------

Para responder este email, acceda a
			
". $Enlace_A_Responder ."
						
Recuerde que existe un plazo de 48 horas para responder al usuario.
			
Gracias por su tiempo y disposición,
			
Administrador
Buzón Ciudadano :: Gobierno Regional de Coquimbo";

			for($i=0; $i<count($email_responsable);$i++) {
				$mail->putCorreo($email_responsable[$i], "'".$asunto."'", $Mensaje_A_Responsables);
			 }	
			 $mail->sendCorreo();


/*			foreach($email_responsable as $email_a) {			
				$mail->putCorreo($email_a, "'".$asunto." ". $email_a."'",$Mensaje_A_Responsables);
			}
			$mail->sendCorreo(); */
			
			
			/* Debemos Informar al usuario quien consulta, que en un plazo no mayor a 48 horas
				le debiesen responder. */
			
			$mail_A_Usuario = new correo();
			$mail_A_Usuario->setEmisor("Buzón Ciudadano :: GORE-COQUIMBO",$emailEmisor);
			$Mensaje_A_Usuario = "

			Estimad@
			
			". $nombres ." ". $paterno . " ". $materno ."
			
			Agredecemos el hecho de contactarse con nosotros y le informamos que
			en un plazo no superior a 48 horas, recibirá respuesta a su consulta.
			
			
			Atte.,
			Administrador
			Buzón Ciudadano :: Gobierno Regional de Coquimbo
			";
			$mail_A_Usuario->putCorreo($correo_e, "Buzón Ciudadano :: Gobierno Regional de Coquimbo",$Mensaje_A_Usuario);
			$mail_A_Usuario->sendCorreo();

			echo "
<table cellspacing='0' cellpadding='0' border='0' align='center'>
<tr>
	<td class='bz_fnd_grs'>
		<p class='bz_cabecera'><strong>Buzón Ciudadano :: Gobierno Regional de Coquimbo</strong></p>
		<p class='bz_texto'>Gracias por contactarse con nosotros. Un email se ha enviado hasta su cuenta.</p>
	</td>
<tr>
<tr><td height='15' class='bz_texto'></td></tr>
<tr><td class='bz_texto' align='center'><a href='javascript:window.close()'>Cerrar Ventana</a></td></tr>
</table>			
			";
	}
}
?>
</body>
</html>

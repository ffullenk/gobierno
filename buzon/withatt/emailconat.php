<?php
umask(0);
function subirArchivo($nombreFile, $tmpFile, $tamFile, $maxTam, $ruta)
{   
	$msg="";
	if($nombreFile)
	{	//chequero el tamaño del archivo
			//echo "tam: ".$tamFile." <br> max:".$maxTam; 
			if( ($tamFile > $maxTam)||($tamFile==0))
			{	$KB=$maxTam/1000;
				echo "El tamaño del archivo debe ser mayor que 0 KB. y menor a ".$KB." KB. <br> Revise su archivo e  intente nuevamente.<br> - Se recomienda comprimir el archivo.";
				return false;
			}
			if(is_uploaded_file($tmpFile))
			{	$fotoFile = $ruta.$nombreFile;
				$error=move_uploaded_file($tmpFile, $fotoFile);
				if($error==false)
				{	echo "No se ha podido subir el archivo...<br>Puede deberse a las siguientes causas:<br> &nbsp;- No tiene permisos en el servidor para subir archivos <br>&nbsp;- Se ha perdido la conexión a internet...";
				 	return false;
				}else
				{	 return true;
				}
			}// fin de is_uploaded_file	
	} else {	//$msg="Archivo no seleccionado";			
			return false;
	}
}	

$msg = "";
if ($_POST['action'] == "send") {
	$name_pict =$HTTP_POST_FILES['archivo']['name'];		
	$tmpn_pict =$HTTP_POST_FILES['archivo']['tmp_name'];
	$tama_pict =($HTTP_POST_FILES['archivo']['size'])/1024;
	// en KB	
	$size_pict =$HTTP_POST_FILES['archivo']['size'];
	// en KB
	//	trunco decimales
	$tmp=(int)($tama_pict*100.0);
	$tama_pict=$tmp/100.0;
	//	debo obtener tipo documento.
	$ext=substr($name_pict,-4);
	// Ante la eventualidad que se repitan los nombres de documentos, asignamos nombres aleatorios
	$nombre_pict = "p".time()."-".rand(1,9999).$ext; 
	// Ruta donde residiran los documentos es:
	$ruta_pict = "adjunta/";
	// Especificamos el tamaño maximo a subir, que será de:
	$maxTam_pict=1000000; // 2Mb
	$msg = subirArchivo($nombre_pict, $tmpn_pict, $size_pict, $maxTam_pict, $ruta_pict);
	// si el archivo subio, actualizo el reg.
	if($msg==false) {
		echo "<p>error</p>"; $tAdjFoto = 0; 
	}
	
	$msg = "Mensaje enviado correctamente";
	include("mail_attachment.php");
	mail_attachment($_POST['quienenvia'], $_POST['aquienenvia'], "Desde Buzon Ciudadano GORE Coquimbo", $_POST['cMensaje'], $ruta_pict.$nombre_pict);
}
?>
<html>
<head><title>Prueba de Envio de Email con Documento Adjunto</title>
</head>
<body>
<?php if ($msg != "") { ?><span class="conf"><?php echo $msg; ?></span><br><?php } ?>
<form action="" method="post" name="FRespEmail" id="formlist"  enctype="multipart/form-data">
De: <input type="text" name="quienenvia" size="50" maxlength="50"><br>
Para:<input type="text" name="aquienenvia" size="50" maxlength="50"><br>
Mensaje:<textarea name="cMensaje" rows="6" cols="50"></textarea><br>
Adjuntar:<input type="file" name="archivo"  size="32"><br>


<input type="submit" name="responde" value=" Enviar Respuesta " class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
<input type="hidden" name="action" value="send" />

</form>
</body>
</html>
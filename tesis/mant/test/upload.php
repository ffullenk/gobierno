<?php 
$status = "";
if ($_POST["action"] == "upload") {
	// obtenemos los datos del archivo 
	$tamano = $_FILES["archivo"]['size'];
	$tipo = $_FILES["archivo"]['type'];
	$archivo = $_FILES["archivo"]['name'];
	$prefijo = substr(md5(uniqid(rand())),0,6);
	
	if ($archivo != "") {
		// guardamos el archivo a la carpeta files
		$destino =  "files/".$prefijo."_".$archivo;
		if (copy($_FILES['archivo']['tmp_name'],$destino)) {
			$status = "Archivo subido: <b>".$archivo."</b>";
		} else {
			$status = "Error al subir el archivo";
		}
	} else {
		$status = "Error al subir archivo";
	}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PHP upload - unijimpe</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="413" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="413" height="40" class="titulo">PHP upload - unijimpe </td>
  </tr>
  <tr>
    <td class="text">Por favor seleccione el archivo a subir:</td>
  </tr>
  <tr>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    <td class="text">
      <input name="archivo" type="file" class="casilla" id="archivo" size="35" />
      <input name="enviar" type="submit" class="boton" id="enviar" value="Upload File" />
	  <input name="action" type="hidden" value="upload" />	  </td>
	</form>
  </tr>
  <tr>
    <td class="text" style="color:#990000"><?php echo $status; ?></td>
  </tr>
  <tr>
    <td height="30" class="subtitulo">Listado de Archivos Subidos </td>
  </tr>
  <tr>
    <td class="infsub">
	<?php 
	if ($gestor = opendir('files')) {
		echo "<ul>";
	    while (false !== ($arch = readdir($gestor))) {
		   if ($arch != "." && $arch != "..") {
			   echo "<li><a href=\"files/".$arch."\" class=\"linkli\">".$arch."</a></li>\n";
		   }
	    }
	    closedir($gestor);
		echo "</ul>";
	}
	?>	</td>
  </tr>
</table>
</body>
</html>

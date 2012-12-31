<?php

function quitar($mensaje)
{
	$mensaje = str_replace("<","&lt;",$mensaje);
	$mensaje = str_replace(">","&gt;",$mensaje);
	$mensaje = str_replace("\'","&#39;",$mensaje);
	$mensaje = str_replace('\"',"&quot;",$mensaje);
	$mensaje = str_replace("\\\\","&#92",$mensaje);
	return $mensaje;
}

function ip ()   {
  /* del tipo text */
  if (isset($_SERVER['X_FORWARDED_FOR'])) {
      $ip = $_SERVER['X_FORWARDED_FOR'];
  } else {
      $ip = $_SERVER['REMOTE_ADDR'];
  }       
  return $ip;
}


/***********************************************************************************************
   * Nombre Funcion  :  vinculo
   * F. de Creacion  :  28 de Noviembre del 2003
   * Par. Entrada    :  $url : direccion
   *                    $target : destino
   *                    $title : titulo
   *                    $text : texto del hipervinculo
   *                    $class : clase del hipervinculo
   * Retorno         :  
  ***********************************************************************************************/  
   function vinculo($url, $target, $title, $text,$class="", $accion="")
   {
    if ($class=="" )
	   {
	    echo "<a href=\"".$url."\" onClick=\"".$accion."\" target=\"".$target."\" title=\"".$title."\" onMouseOver=\"window.status='".$title."';return true\" onMouseOut=\"window.status='';return true\">".$text."</a>\n"; 
	   }
	else 
	   {
		echo "<a href=\"".$url."\" onClick=\"".$accion."\" class=\"".$class."\" target=\"".$target."\" title=\"".$title."\" onMouseOver=\"window.status='".$title."';return true\" onMouseOut=\"window.status='';return true\">".$text."</a>\n";       	
	   }
   }


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
		
		}// fin nombreFile
		//en el formulario HTML de origen debe ir el campo oculto: <input type="hidden" name="MAX_FILE_SIZE" value="200000">
		//setea $foto_size a 0 si el archivo > 200 K.
		else 
		{	//$msg="Archivo no seleccionado";			
			return false;
		}
}
?>
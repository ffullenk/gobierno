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


?>
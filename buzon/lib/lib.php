<?php
if (defined(__lib__ ) == false )
   define(__lib__ , "__lib__");
else
   return;
  @include("config.php");

  /***********************************************************************************************
   * Nombre Archivo	 : lib.php
   * Descripción	 : Archivo que contiene las principales funciones que seran utilizadas 
   *                   en el sistema
   * F. Creacion	 : 2 de Noviembre de 2005
   * Autor 			 : 
   ***********************************************************************************************/
  /***********************************************************************************************
   * Listado de funciones en el Archivo
	   * 1.- vinculo($url, $target, $title, $text, $class="")
	   * 2.- strVinculo($url, $target, $title, $text, $class="")
	   * 3.- formatoFecha( $fecha )
	   * 4.- encabezadoDePagina($title,$urlCSS,$funcionesjs=false)
	   * 5.- formatoFecha( $fecha )
	   * 6.- validarRut( $rut , $digito )
	   * 7.- pieDePagina($user, $pass)
	   * 8.- vinculoImagen($url, $target, $title, $text, $rutaImagen,$class="") 
	   * 9.- encabezado($title,$urlCSS,$funcionesjs=false)
	   *10.- pieSimple()
	   *11.- direccionar($url)
	   *12.- trAnimado($colorFondo,$colorIn,$colorOut)
	   *13.- trAnimadoClick($colorFondo,$colorIn,$colorOut,$formulario)
	   *14.- calcularPorcentaje($total,$muestra)
   ***********************************************************************************************/
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
     /***********************************************************************************************
   * Nombre Funcion  :  strVinculo
   * F. de Creacion  :  11 de marzo del 2004
   * Par. Entrada    :  $url : direccion
   *                    $target : destino
   *                    $title : titulo
   *                    $text : texto del hipervinculo
   *                    $class : clase del hipervinculo
   * Retorno         :  
  ***********************************************************************************************/  
   function strVinculo($url, $target, $title, $text,$class="", $accion="")
   {
    if ($class=="" )
	   {
	    return "<a href=\"".$url."\" onClick=\"".$accion."\" target=\"".$target."\" title=\"".$title."\" onMouseOver=\"window.status='".$title."';return true\" onMouseOut=\"window.status='';return true\">".$text."</a>\n"; 
	   }
	else 
	   {
		return "<a href=\"".$url."\" onClick=\"".$accion."\" class=\"".$class."\" target=\"".$target."\" title=\"".$title."\" onMouseOver=\"window.status='".$title."';return true\" onMouseOut=\"window.status='';return true\">".$text."</a>\n";       	
	   }
   }
   function strVinculoAyuda($url, $target, $title, $text, $class="", $numeroCapa)
   {
    if ($class=="" )
	   {
	    return "<a href=\"".$url."\" target=\"".$target."\" title=\"".$title."\" onMouseOver=\"ver_ayuda('".$numeroCapa."');\" onMouseOut=\"ocultar_ayuda('".$numeroCapa."');\">".$text."</a>\n"; 
	   }
	else 
	   {
		return "<a href=\"".$url."\" target=\"".$target."\" class=\"".$class."\" title=\"".$title."\" onMouseOver=\"ver_ayuda('".$numeroCapa."');\" onMouseOut=\"ocultar_ayuda('".$numeroCapa."');\">".$text."</a>\n"; 	   }
   }
   
	/***********************************************************************
    * Nombre Funcion  :  formatoFecha
    * F. de Creacion  :  17 de Septiembre del 2003
    * Par. Entrada    :
    *    $fecha       :  Variable que mantiene el texto con la fecha en formato aaaa-mm-dd 
    * Retorno         :  fecha en el formato dd/mm/aaaa
    * Descripcion     :  Esta funcion ordena el texto de la fecha del formato aaaa-mm-dd a dd/mm/aaaa
    ************************************************************************/
   function formatoFecha( $fecha )
   {
    $fecha_valida = $fecha[8].$fecha[9]."/".$fecha[5].$fecha[6]."/".$fecha[0].$fecha[1].$fecha[2].$fecha[3];
	return $fecha_valida;  
   }
    /***********************************************************************
    * Nombre Funcion  :  validarRut();
    * F. de Creacion  :  29 de Junio del 2004
    * Par. Entrada    :
    *    $rut         :  Variable que contiene el rut a verificar, si su digito verificador
    *    $digito      :  Variable que mantiene el digito verificador del rut
    * Retorno         :  Retorna True si el rut que se entrego como parametro corresponde a
    *                    un rut valido, retorna false si el rut es invalido
    * Descripcion     :  Esta funcion realiza la verificacion del rut entregado como parametro
    *                    a traves de la formula utilizada para verificar el rut
    ************************************************************************/
   function validarRut( $rut , $digito )
   {
      echo "Este es el digito:" . $digito;
	  $acumulador = 0 ;
      $contador = 2 ;
      for( $i = 0 ; $i < strlen($rut) ; $i++)
      {
         $digitoMultiplicar  =$rut[strlen($rut) - $i  -1];
         $acumulador+= $digitoMultiplicar * $contador;
         $contador++;
         if( $contador == 8)
            $contador = 2;
      }

      $verificador = 11 - ($acumulador%11) ;

      if(($digito == "k") ||($digito=="K"))
         $digito = 10;
      if( $digito == $verificador)
         return true;
      else
         return false;
   }

/***********************************************************************
* Nombre Funcion  :  pieDePagina
* F. de Creacion  :  01 de Diciembre del 2003
* Descripcion     :  Pone el pie de pagina con los respectivos hipervinculoas
*                    a las diferentes areas del sitio
************************************************************************/
function pieDePagina($user, $pass)
{
		vinculo(Home,"_self","Pagina de Inicio","Home&nbsp;&nbsp; ","navegacion");
		vinculo(Transacciones,"principal","Opiniones"," Opiniones&nbsp;&nbsp; ","navegacion");
		vinculo(Institucion,"principal","Instituciones públicas","  Instituci&oacute;nes&nbsp;&nbsp; ","navegacion");
		vinculo(Ranking,"principal","Ranking de servicios","  Ranking&nbsp;&nbsp; ","navegacion");
		vinculo(Noticias,"principal","Seleccion de noticias","  Noticias&nbsp;&nbsp; ", "navegacion");
		vinculo(Encuestas,"principal","Encuestas on line","  Encuestas&nbsp;&nbsp; ", "navegacion");
		if ($user=="" and $pass=="")
		  {
			vinculo(Registro,"principal","Pagina de registro en el sistema","  Registro&nbsp;&nbsp;","navegacion");			   
			vinculo(MapaSitio,"principal","Ver mapa del sitio","   Mapa sitio", "navegacion");

		  }	
		else
		  {
			vinculo(Foros,"principal","Listado de foros","  Foros&nbsp;&nbsp; ","navegacion");
			vinculo(PerfilUsuario,"principal","Perfil de usuario","  Pefil de usuario&nbsp;&nbsp; ","navegacion");
			vinculo(MapaSitio,"principal","Ver mapa del sitio","   Mapa sitio&nbsp;&nbsp;", "navegacion");
			vinculo(CerrarSession,"principal","Cerrar sesion","  Cerrar sesion","navegacion");
		  }			
}
/***********************************************************************
* Nombre Funcion  :  menu
* F. de Creacion  :  29 de octubre del 2004
* Descripcion     :  escribe un menu con hipervinculos cuando no funciona el real
************************************************************************/
function menu($user, $pass)
{
  echo "<span class=\"espaciado\">&nbsp;";
		vinculo(Home,"_self","Pagina de Inicio","Home","menu");
		echo" <br />&nbsp;";
		vinculo(Transacciones,"principal","Opiniones","Opiniones","menu");
		if ($user!="" and $pass!="")
		  {
		   echo" <br/>&nbsp;&nbsp;";
		   vinculo("transacciones/agregar_transaccion/paso1.php","principal","Agregar una nueva opinión","Nueva Opinión","menu");			   
		  }
		echo" <br/>&nbsp;";
		vinculo(Institucion,"principal","Instituciones públicas","Instituciones","menu");
		echo" <br/>&nbsp;";
		vinculo(Ranking,"principal","Ranking de servicios","Ranking","menu");
		echo" <br/>&nbsp;";
		vinculo(Politicas,"principal","Politicas de Uso y Privacidad","Politicas","menu");
		echo" <br/>&nbsp;";
		vinculo(Noticias,"principal","Seleccion de noticias","Noticias", "menu");
		echo" <br/>&nbsp;";
		vinculo(Encuestas,"principal","Encuestas on line","Encuestas", "menu");
		if ($user=="" and $pass=="")
		  {
		echo" <br/>&nbsp;";
			vinculo(Registro,"principal","Pagina de registro en el sistema","Registro","menu");			   
		echo" <br/>&nbsp;";
			vinculo(MapaSitio,"principal","Ver mapa del sitio","Mapa sitio", "menu");
		  }	
		else
		  {
		echo" <br/>&nbsp;";
			vinculo(Foros,"principal","Listado de foros","Foros","menu");			
		echo" <br/>&nbsp;";
			vinculo(PerfilUsuario,"principal","Perfil de usuario","Pefil de usuario","menu");
		echo" <br/>&nbsp;";
			vinculo(MapaSitio,"principal","Ver mapa del sitio","Mapa sitio", "menu");
		echo" <br/>&nbsp;";
			vinculo(CerrarSession,"principal","Cerrar sesion","Cerrar sesion","menu");
		  }			
  echo "</span>";		  
}

  /***********************************************************************************************
   * Nombre Funcion  :  vinculoImagen
   * F. de Creacion  :  29 de Noviembre del 2003
   * Par. Entrada    :  $url : direccion
   *                    $target : destino
   *                    $title : titulo
   *                    $text : texto del hipervinculo
   *					$rutaImagen :ruta del icono
   *                    $class : clase del hipervinculo
   * Retorno         :  
  ***********************************************************************************************/  
   function vinculoImagen($url, $target, $title, $text, $rutaImagen,$class="")
   {
    if ($class=="" )
	   {
	    echo "<a href=\"".$url."\" target=\"".$target."\" title=\"".$title."\" onMouseOver=\"window.status='".$title."';return true\" onMouseOut=\"window.status='';return true\">				
			  <img src=\"".$rutaImagen."\" hspace=\"4\" vspace=\"1\" border=\"0\" align=\"absmiddle\">".$text."</a>"; 
	   }
	else 
	   {
		echo "<a href=\"".$url."\" class=\"".$class."\" target=\"".$target."\" title=\"".$title."\" onMouseOver=\"window.status='".$title."';return true\" onMouseOut=\"window.status='';return true\">
			  <img src=\"".$rutaImagen."\"  hspace=\"4\" vspace=\"1\" border=\"0\" align=\"absmiddle\">".$text."</a>"; 
	   }
   }
  /***********************************************************************************************
   * Nombre Funcion  :  strvinculoImagen
   * F. de Creacion  :  19 de agosto del 2004
   * Par. Entrada    :  $url : direccion
   *                    $target : destino
   *                    $title : titulo
   *                    $text : texto del hipervinculo
   *					$rutaImagen :ruta del icono
   *                    $class : clase del hipervinculo
   * Retorno         :  
  ***********************************************************************************************/  
   function strvinculoImagen($url, $target, $title, $text, $rutaImagen,$class="")
   {
    if ($class=="" )
	   {
	    return "<a href=\"".$url."\" target=\"".$target."\" title=\"".$title."\" onMouseOver=\"window.status='".$title."';return true\" onMouseOut=\"window.status='';return true\">				
			  <img src=\"".$rutaImagen."\" hspace=\"4\" vspace=\"1\" border=\"0\" align=\"absmiddle\">".$text."</a>"; 
	   }
	else 
	   {
		return "<a href=\"".$url."\" class=\"".$class."\" target=\"".$target."\" title=\"".$title."\" onMouseOver=\"window.status='".$title."';return true\" onMouseOut=\"window.status='';return true\">
			  <img src=\"".$rutaImagen."\"  hspace=\"4\" vspace=\"1\" border=\"0\" align=\"absmiddle\">".$text."</a>"; 
	   }
   }
   
    /***********************************************************************************************
   * Nombre Funcion  :  encabezado
   * F. de Creacion  :  01 de Noviembre del 2003
   * Par. Entrada    :  $title  	  : titulo de la pagina
   *                    $urlCSS       : ruta donde se encuentra el CSS
   *                    $funcionesjs  : si desea o no disponer de las funciones javascript
   * Retorno         :  
  ***********************************************************************************************/  
   function encabezado($title,$urlCSS,$titulo,$funcionesjs=false,$clase="")
   {
   ?>
	   <html>
	<!---------------------------------------------------------------------------------------->
		<head>
   <?php		
		echo "\t<title>".$title."</title>\n";			
		echo "\t<link href=\"".$urlCSS."\" rel=\"stylesheet\" type=\"text/css\">\n";		
		if ($funcionesjs==true)
		   {
			echo "\t<script language=\"JavaScript\" src=\"../javas/imprimir.js\"></script>\n";
			echo "\t<script language=\"JavaScript\" src=\"../javas/funciones.js\"></script>\n";
		   }	
	?>	 
			<meta http-equiv="description" name="Sitio Aplicacion de Crm en el PRYME">
			<meta name="keywords" content="Servicio Publico, Clientes, Fidelidad, Reclamo, Encuenta, Ranking, Felicitaciones">
			<meta name="autor" content="Tesistas CRM">
			</head>
	<!---------------------------------------------------------------------------------------->
		<body  topmargin="0" bottommargin="0">
  			<?php 
			    if ($clase!="")
				   echo "<p class=\"$clase\">&nbsp;".$titulo."</p>";
				else   
				   echo "<p>&nbsp;".$titulo."</p>";				
		     ?>		   
	<!---------------------Aqui va la tabla con la cabecera de la pagina----------------------->
<?php
}

/***********************************************************************
* Nombre Funcion  :  pieSimple
* F. de Creacion  :  01 de Diciembre del 2003
* Descripcion     :  Pone el pie de pagina
************************************************************************/
function pieSimple()
{
?>      
	</body>
	<!---------------------------------------------------------------------------------------->
	</html>
<?php
}
/***********************************************************************
* Nombre Funcion  :  direccionar
* F. de Creacion  :  21 de Diciembre del 2003
* Descripcion     :  Refresca la pagina he envia a otra
************************************************************************/
function direccionar($url)
{
	echo "<html>\n<head>\n<title>Validar Usuario</title>" . 
		 "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1; url='".$url."'\">" .
		 "\n</head>\n<body></body></html>";
	die();
}
/***********************************************************************
* Nombre Funcion  :  trAnimado
* F. de Creacion  :  21 de Diciembre del 2003
* Descripcion     :  hace pasar una capa a travez de una tabla
************************************************************************/
function trAnimado($colorFondo,$colorIn,$colorOut,$class="")
{
	echo "<tr class=\"".$class."\" aling=\"center\" onmouseover=\"setPointer(this, 2, 'over', '".$colorFondo."', '".$colorIn."', '".$colorOut."');\"". 
          "onmouseout=\"setPointer(this, 2, 'out', '".$colorFondo."', '".$colorIn."', '".$colorOut."');\"".
          "onmousedown=\"setPointer(this, 3, 'click','".$colorFondo."', '".$colorIn."', '".$colorOut."');\">";
}
/***********************************************************************
* Nombre Funcion  :  trAnimadoClick
* F. de Creacion  :  21 de Diciembre del 2003
* Descripcion     :  hace pasar una capa a travez de una tabla, y envia el codigo 
*                    a el archivo de accion de la formula necesita el archivo funciones.js
************************************************************************/
function trAnimadoClick($colorFondo,$colorIn,$colorOut,$formulario,$class="")
{
	echo "<tr aling=\"center\" class=\"".$class."\" ".
	      "onclick=\"submit();\"". 
	      "onmouseover=\"setPointer(this, 2, 'over', '".$colorFondo."', '".$colorIn."', '".$colorOut."');\"". 
          "onmouseout=\"setPointer(this, 2, 'out', '".$colorFondo."', '".$colorIn."', '".$colorOut."');\"".
          "onmousedown=\"setPointer(this, 3, 'click','".$colorFondo."', '".$colorIn."', '".$colorOut."');\">";
}
/***********************************************************************
* Nombre Funcion  :  calcularPorcentaje
* F. de Creacion  :  17 de Enero del 2004
* Descripcion     :  Calcule el procentaje dependiendo del total y la muestra
************************************************************************/
function calcularPorcentaje($total,$muestra)
{
   if ($muestra>0 and $total>0)
      { 
       return number_format(($muestra * 100) / $total, 0,  "," , "."); 
	  }
	else return 0;	 
}

/*************************************************************************************
* Nombre Funcion  :  fechaEscalar
* F. de Creacion  :  19 de marzo del 2004
* Descripcion     :  transaforma la fecha y la hora en un numero escalar que representa minutos
* Nota            :  La fecha deben estar en el formato dd/mm/aaaa
*                    La hora debe estar en formato hh:mm
**************************************************************************************/
function fechaMinutos($fecha, $hora)
{
  /*fragmentacion en dia, mes, anho de la fecha 1*/
  $diaFecha  = substr($fecha,0,2); //12/04/2004
  $mesFecha  = substr($fecha,3,2);
  $anhoFecha = substr($fecha,8,2);

  /*fragmentacion de hora y minutos a minuros*/
  $horaHora  = substr($hora,0,2); 
  $minutoHora= substr($hora,3,2);

  $diaMeses[0] = 0;
  $diaMeses[1] = 31;
  if($anhoFecha%4==0)
    {
	  $diaMeses[2] = 59;
	  //agrega un dia 
	  $diaBisiesto = 0;	 
	  $diaAnho = 365;
	}
  else
    {
	  $diaMeses[2] = 60;
	  $diaBisiesto = 1;
	  $diaAnho = 366;
	}	  

  $diaMeses[3] = 89 + $diaBisiesto;
  $diaMeses[4] = 120 + $diaBisiesto;
  $diaMeses[5] = 150 + $diaBisiesto;
  $diaMeses[6] = 181 + $diaBisiesto;
  $diaMeses[7] = 212 + $diaBisiesto;
  $diaMeses[8] = 242 + $diaBisiesto;
  $diaMeses[9] = 273 + $diaBisiesto;
  $diaMeses[10] = 303 + $diaBisiesto;
  $diaMeses[11] = 334 + $diaBisiesto;
  
  //contiene la suma de minutos del dia
  $minutosDia = $minutoHora + $horaHora * 60;

  //ahora sumamos los minutos del dia
  $minutosDia = $minutosDia + ($diaMeses[$mesFecha+1] + $diaFecha) * 1440;

  //ahora le sumamos lo minutos del año
  $minutosDia = $minutosDia + $anhoFecha * $diaAnho * 1440;

  return $minutosDia;
}


/* function subirFoto($nombreFile, $tmpFile, $tamFile, $maxTam, $ruta)
función que permite subir una foto al servidor
Argumentos:
$nombreFile	:variable con del 'nombre' del archivo.
$tmpFile	:Nombre del archivo temporal que se utiliza para almacenar en el servidor.
$tamFile	:Tamaño en bytes del archivo.
$ruta	 	:directorio de destino desde donde se ubica el archivo que llama a esta función.
$maxTam   	:restricción de tamaño maximo del archivo

Notas:
en el formulario debe cumplir con lo sigte
<form action="PaginaQueGuardaLosDatos.php" method="post">
	<input type="hidden" name="MAX_FILE_SIZE" value="1000">
	Archivo a enviar: 
	<input name="userfile" type="file">
	<input type="submit" value="Send File">
</form>
El Input oculto MAX_FILE_SIZE debe encontrarse antes del input de tipo file para indicar 
el tamaño maximo del archivo que se puede enviar.
No todos los browser soportan este mecanismo, por lo tanto la verificación del tamaño
no se puede obviar en el script php.

Ejemplo de llamada:
		$nombreFile1=$HTTP_POST_FILES['logo_institucion']['name'];		
		$tamFile1=$HTTP_POST_FILES['logo_institucion']['size'];
		$tmpFile1=$HTTP_POST_FILES['logo_institucion']['tmp_name'];
		$ruta="../../imagenes/logos_servicios/";
		$maxTam=3000; // 3 kb
		
		$msg = subirFoto($nombreFile1, $tmpFile1, $tamFile1, $maxTam, $ruta);
		
		echo $msg;

							-- * --
*/
function subirFoto($nombreFile, $tmpFile, $tamFile, $maxTam, $ruta)
{   
	$msg="";
	if($nombreFile)
		{	//chequero el tamaño del archivo
			if( $tamFile > $maxTam)
			{	$KB=$maxTam/1000;
				echo "El tamaño del archivo debe ser menor a ".$KB." KB en formato gif o jpg.";
				return false;
			}	
			//chequeo el tipo de archivo:
			$ext=substr($nombreFile,-4);
			//strcasecmp considera  .jpg <> .JPG			
			if( (strcasecmp($ext,".jpg")==0) || (strcasecmp($ext,".gif")==0) )
			{	//gravo la foto:				
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
			} // fin de if jpg o gif
			//Mensaje de error: extensión no válida
			else
			{	 echo $nombreFile." es un tipo de archivo no válido, use .jpg o .gif";			
				 return  false;
			}			
		}// fin nombreFile
		//en el formulario HTML de origen debe ir el campo oculto: <input type="hidden" name="MAX_FILE_SIZE" value="200000">
		//setea $foto_size a 0 si el archivo > 200 K.
		else 
		{	//$msg="Archivo no seleccionado";			
			return false;
		}
}// fin de subirFoto()


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
}// fin de subirFoto()

//Esta función analiza o HTTP_USER_AGENT que se lle pasa como parámetro
//Devolve unha matriz onde o primeiro índice é o navegador, o segundo 
//a versión e o terceiro o sistema operativo
function detectar($HUA) {
	
	//Pasamos a minúsculas o HUA, para non ter problemas á hora de buscar cadeas
	$HUA=strtolower($HUA);

	//Declaramos as variables navegador, version, sistema
	$navegador="Desconocido";
	$version="Desconocido";
	$sistema="Desconocido";

	//Proceso de búsqueda:
	//1. navegador
	//	a. Versión
	//2. sistema Operativo
	//(Búsquedas non sensibles a maiúsculas)

	//DETECCIÓN DO navegador
	//~~~~~~~~~~~~~~~~~~~~~~

	//Detección de Opera
	//Exemplo: Opera/6.05 (Windows XP; U)  [es-ES]
	if (stristr($HUA,"opera")) {
		//Buscouse a cadea 'Opera'. Se se atopa, defínese a variable navegador
		$navegador="Opera";
		//Buscamos a versión buscando a posición de 'Opera' e operando dende ahí
		//Está entre o '/' ou ' ' despóis de 'Opera' e o seguinte espacio
		//Mide 4 caracteres (forma: x.xx)
		//NOTA: Na versión 7.0 (e na 6.0, supoño) só se mostra 7.0, non 7.00
		$K=strpos($HUA, "opera");
		//Sumamoslle 6 e lemos 5 dende ahí
		$version=substr($HUA,$K+6,5);
	}

	//Detección de AWeb (Amiga)
	//Exemplo: Amiga-AWeb/3.4
	elseif (stristr($HUA,"aweb")) {
		$navegador="AWeb";
		$sistema="Amiga OS";
	}

	
	//Detección de Microsoft Internet Explorer
	//Exemplo: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)
	elseif (stristr($HUA, "msie")) {
		//Buscouse a cadea 'MSIE'. Se se atopa, defínese a variable navegador
		$navegador="Internet Explorer";
		//Buscamos a versión buscando a posición de 'MSIE' e operando dende ahí
		//Está entre o espacio despóis de 'MSIE' e o seguinte punto e coma
		//Buscamos 'MSIE' e cortamos dende ahí
		$K=strpos($HUA, "msie");
		$temp=substr($HUA,$K);
		//Buscamos o primeiro punto e coma de esa nova cadea
		$P=strpos($temp, chr(59));
		//Lemos dende 5 ata $P-5
		$version=substr($temp,5,$P-5);
		
		//Detección de AOL (usa o motor de MSIE)

		if (stristr($HUA,"aol")) {
			//Buscamos AOL e cortamos dende ahí
			$K=strpos($HUA, "aol");
			$temp=substr($HUA,$K);
			//Buscamos o primeiro punto e coma de esa nova cadea
			$P=strpos($temp, chr(59));
			//Lemos dende 4 ata $P-4
			$navegador.=" (AOL ".substr($temp,4,$P-4).")";
		}			
		//Detección de MSN (usa o motor de MSIE)
		elseif (stristr($HUA,"msn")) {
			//Buscamos MSN e cortamos dende ahí
			$K=strpos($HUA, "msn");
			$temp=substr($HUA,$K);
			//Buscamos o primeiro punto e coma de esa nova cadea
			$P=strpos($temp, chr(59));
			//Lemos dende 4 ata $P-4
			$navegador.=" (MSN ".substr($temp,4,$P-4).")";
		}			
	}
	
	//Detección de Mozilla
	//Exemplo: Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4b) Gecko/20030503 Mozilla Firebird/0.6
	elseif (stristr($HUA,"mozilla") && ! (stristr($HUA,"opera") || stristr($HUA,"msie"))) {
		//Buscouse a cadea 'Mozilla'. Se se atopa, defínese a variable navegador
		//(Se se atopa, e non atopando 'Opera' nin 'MSIE')
		$navegador="Mozilla";

		//Buscamos a revisión buscando a posición de 'rv' e operando dende ahí
		//Está entre o 'rv:' e o paréntese final
		//Buscamos 'rv:'
		if (stristr($HUA,"rv:")) {
			$K=strpos($HUA, "rv:");
			//Dende ahí, buscamos o paréntese ')'
			$P=strrpos($HUA, chr(41))-$K;
			//Lemos dende o final de 'rv:' ata ')'
			$version=substr($HUA,$K+3,$P-3);
		}
		
		//Mozilla/5.0
		elseif (stristr($HUA,"mozilla/5.0")) {
			$version="5.0";
		}
		
		//Detección de vellos Netscape Navigator
		//A version estará entre o '/' e o espacio anterior ó paréntese
		//Exemlo: Mozilla/3.04 (Win16; I)
		//Buscamos o '/'
		else  {
			$navegador="Netscape Navigator";
			$K=strpos($HUA,"/");
			//Buscamos o primeiro espacio
			$P=strpos($HUA," ");
			//Lemos dende o principio ata $P-7 (Mozilla/)
			$version=substr($HUA,$K+1, $P-7);
			//Buscamos a cadea 'C-CCK-MCD' (aparece en Mozilla 4.7 baixo Mac OS 8/9)
			if (stristr($HUA,"c-cck-mcd")) {
				//Se está, eliminámola (cambiámola por nada)
				$version=str_replace("c-cck-mcd","",$version);
			}
			//Buscamos a cadea 'SC-SGI' (aparece en Mozilla 3.0 baixo IRIX)
			if (stristr($HUA,"sc-sgi")) {
				//Se está, eliminámola (cambiámola por nada)
				$version=str_replace("sc-sgi","",$version);
			}
			if(stristr($HUA,"gold")) {
				$version=str_replace("gold"," Gold",$version);
				$version=str_replace("Gold"," Gold",$version);
			}
		}		
		
		//Detección de derivados do Mozilla (Phoenix, Firebird, Konkeror, Safari...)
		
		//Detección de Phoenix
		//Exemplo: Mozilla/5.0 (Windows; U; Win98; es-AR; rv:1.3a) Gecko/20021207 Phoenix/0.5
		if (stristr($HUA,"phoenix")) {
			$navegador="Phoenix";
			//Busca 'Phoenix' e le dende ahí ata o final
			$K=strrpos($HUA,"phoenix");
			$version=substr($HUA,$K+8);
			//Cambia o '/' por un espacio
			$version=str_replace("/"," ",$version);
		}

		//Detección de Netscape(>6.0)
		//Exemplo: Mozilla/5.0 (Windows; U; Windows NT 5.0; es-ES; rv:1.0.1) Gecko/20020823 Netscape/7.0
		elseif (stristr($HUA,"netscape")) {
			$navegador="Netscape";
			//Busca 'Netscape' e le dende ahí ata o final
			$K=strrpos($HUA,"netscape");
			$version=substr($HUA,$K+9);
			//Cambia o '/' por un espacio
			$version=str_replace("/"," ",$version);
		}

		//Detección de Firebird
		//Exemplo: Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4b) Gecko/20030503 Mozilla Firebird/0.6 
		elseif (stristr($HUA,"firebird")) {
			$navegador="Firebird";
			//Busca 'Firebird' e le dende ahí ata o final
			$K=strrpos($HUA,"firebird");
			$version=substr($HUA,$K+9);
			//Cambia o '/' por un espacio
			$version=str_replace("/"," ",$version);
		}
		
		//Detección de Chimera
		//Exemplo: Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en-US; rv:1.0.1) Gecko/20021104 Chimera/0.6
		elseif (stristr($HUA,"Chimera")) {
			$navegador="Chimera";
			//Busca 'Firebird' e le dende ahí ata o final
			$K=strrpos($HUA,"chimera");
			$version=substr($HUA,$K+7);
			//Cambia o '/' por un espacio
			$version=str_replace("/"," ",$version);
			$sistema="Mac OS X";
		}

		//Detección de Camino
		//Exemplo: Mozilla/5.0 (Macintosh; U; PPC Mac OS X Mach-O; en-US; rv:1.0.1) Gecko/20030306 Camino/0.7
		elseif (stristr($HUA,"Camino")) {
			$navegador="Camino";
			//Busca 'Firebird' e le dende ahí ata o final
			$K=strrpos($HUA,"camino");
			$version=substr($HUA,$K+6);
			//Cambia o '/' por un espacio
			$version=str_replace("/"," ",$version);
			$version=str_replace("+","",$version);
			$sistema="Mac OS X";
		}

		//Detección de Safari
		//Exemplo: Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en) AppleWebKit/48 (like Gecko) safari/48 
		//Busca 'Safari' e le dende ahí ata o final
		elseif (stristr($HUA,"safari")) {
			$navegador="Safari";
			$K=strrpos($HUA,"safari");
			$version="1.0 Build ".substr($HUA,$K+7);

		}
		
		//Detección de Konqueror
		//Exemplo: Mozilla/5.0 (compatible; Konqueror/3; Linux; , es_ES.UTF-8, es_ES, es, en)
		elseif (stristr($HUA,"konqueror")) {
			$navegador="Konqueror";
			//Buscamos 'Konqueror' e cortamos dende ahí
			$K=strpos($HUA, "konqueror");
			$temp=substr($HUA,$K);
			//Buscamos o primeiro punto e coma de esa nova cadea
			$P=strpos($temp, chr(59));
			//Lemos dende 5 ata $P-5
			$version=substr($temp,10,$P-10);
		}
		
		//Detección de Galeon
		//Exemplo: Mozilla/5.0 Galeon/1.2.5 (X11; Linux i686; U;) Gecko/20020623				
		elseif (stristr($HUA,"galeon")) {
			$navegador="Galeon";
			//Buscamos 'Galeon' e cortamos dende ahí
			$K=strpos($HUA, "galeon");
			$temp=substr($HUA,$K);
			//Buscamos o primeiro punto e coma de esa nova cadea
			$P=strpos($temp, chr(32));
			//Lemos dende 7 ata $P-7
			$version=substr($temp,7,$P-7);
		}
		//Detección de MultiZilla
		//Exemplo: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.3b; MultiZilla v1.1.33 (b)) Gecko/20030108
		elseif (stristr($HUA,"MultiZilla")) {
			$navegador="MultiZilla";
			//Buscamos 'MultiZilla' e cortamos dende ahí
			$K=strpos($HUA,"multizilla");
			$temp=substr($HUA,$K);
			//Buscamos a v e cortamos dende ahí
			$K=strpos($temp,"v");
			$temp=substr($temp,$K+1);
			$P=strpos($temp," ");
			$version=substr($temp,0,$P);
		}
		
		//Detección de NetPositive
		//Exemplo: Mozilla/3.0 (compatible; NetPositive/2.2)
		elseif (stristr($HUA,"netpositive") || stristr($HUA,"zonesurf")) {
			$navegador="NetPositive";
			//Buscamos 'Netpositive' e cortamos dende ahí
			$K=strpos($HUA, "netpositive");
			$temp=substr($HUA,$K);
			//Buscamos o ultimo parentese desa nova cadea
			$P=strrpos($temp, chr(41));
			//Lemos dende 12 ata $P-12
			$version=substr($temp,12,$P-12);
			//Xa que este navegador é o que ven por defecto en BeOS
			//e non aparece 'BeOS' no HUA, definimo-lo sistema operativo
			$sistema="BeOS";
		}
		//Detección de Voyager (QNX)
		//Exemplo: Mozilla/3.04 (compatible;QNX Voyager 2.03B ;Photon)
		elseif (stristr($HUA,"qnx voyager")) {
			$navegador="Voyager";
			//Buscamos 'QNX Voyager' e cortamos dende ahí
			$K=strpos($HUA, "qnx voyager");
			$temp=substr($HUA,$K);
			//Buscamos o ultimo parentese desa nova cadea
			$P=strpos($temp, chr(59));
			//Lemos dende 12 ata $P-12
			$version=substr($temp,12,$P-12);
		}
	}
	
	//Detección de outros navegadores
	//Detección de Lynx
	elseif (stristr($HUA,"lynx") || stristr($HUA,"links")) {
		$navegador="Lynx";
		//Exemplo Lynx: Lynx/2.8.4rel.1 libwww-FM/2.14 SSL-MM/1.4.1 OpenSSL/0.9.6c
		if (stristr($HUA,"lynx")) {
			//Buscamos o primeiro espacio
			$P=strpos($HUA," ");
			//Lemos dende o principio ata $P-5
			$version=substr($HUA,5, $P-5);
		}
		//Exemplo Links: Links (0.97; Unix; 80x24)
		elseif (stristr($HUA,"0.")) {
			//Buscamos o primeiro punto e coma
			$P=strpos($HUA,chr(59));
			//Lemos dende o principio ata $P-7
			$version=substr($HUA,7, $P-7);
		}	
			
	}
	
	//Detección de Arachne
	elseif (stristr($HUA,"arachne")) {
		$navegador="Arachne";
	}
	
	//Detección de Bots e Spiders
	//Detección de Googlebot
	//Exemplo: Googlebot/2.1 (+http://www.googlebot.com/bot.html)
	elseif (stristr($HUA,"googlebot")) {
		$navegador="Googlebot";
	}
	//Infomine
	elseif(stristr($HUA,"infomine")) {
		$navegador="Infomine";
	}
	//Archive.org Spider
	elseif(stristr($HUA,"ia_archiver")) {
		$navegador="Archive.org Spider";
	}
	//MSN Bot
	elseif(stristr($HUA,"msnbot")) {
		$navegador="MSN Bot";
	}


	//Detección de outras cousas	
	//W3C Validator
	elseif(stristr($HUA,"validator") && stristr($HUA,"w3c")) {
		$navegador="W3C Validator";
	}

	//DETECCIÓN DO sistema OPERATIVO
	//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	//Detección de MS-Dos
	if (stristr($HUA,"dos")) {
		$sistema="MS-DOS";
	}

	//Detección de Amiga
	if (stristr($HUA,"amiga")) {
		$sistema="Amiga OS";
	}


	//Detección de Windows
	if (stristr($HUA,"windows 3.1") || (stristr($HUA,"win16")) || (stristr($HUA,"win95") && stristr($HUA,"16bit"))) {
		$sistema="Windows 3.1/3.11";
	}
	elseif (stristr($HUA,"nt 3.51") || (stristr($HUA,"nt3.51"))) {
		$sistema="Windows nt 3.51";
	}
	elseif (stristr($HUA,"windows 95") || (stristr($HUA,"win95"))) {
		$sistema="Windows 95";	
	}
	elseif (stristr($HUA,"windows me") || (stristr($HUA,"win") && stristr($HUA,"4.90"))) {
		$sistema="Windows Millenium Edition";	
	}
	elseif (stristr($HUA,"windows 98") || (stristr($HUA,"win98")) || (stristr($HUA,"win") && stristr($HUA,"3.95"))) {
		$sistema="Windows 98";	
	}
	elseif (stristr($HUA,"nt 5.0") || stristr($HUA,"windows 2000")) {
		$sistema="Windows 2000";	
	}
	elseif (stristr($HUA,"nt 5.1") || stristr($HUA,"windows xp")) {
		$sistema="Windows XP";	
	}
	elseif (stristr($HUA,"nt 5.2")) {
		$sistema="Windows Server 2003";	
	}
	elseif (stristr($HUA,"windows CE")) {
		$sistema="Windows Pocket PC";	
	}
	elseif (stristr($HUA,"nt 4") || stristr($HUA,"nt4") || stristr($HUA,"winnt") || stristr($HUA,"windows nt")) {
		$sistema="Windows NT 4.0";	
	}
	elseif (stristr($HUA,"windows")) {
		$sistema="Windows";
	}

	//Detección de Mac OS
	if (stristr($HUA,"mac os x")) {
		$sistema="Mac OS X";	
	}
	elseif (stristr($HUA,"68k")) {
		$sistema="Mac 68K";
	}

	elseif (stristr($HUA,"mac_powerpc") || stristr($HUA,"ppc") || stristr($HUA,"macintosh")) {
		$sistema="Mac OS 8/9";
	}

	//Detección de sistemas baseados en Unix (Linux, Solaris, HP-UX, BeOS, QNX...)
	if (stristr($HUA,"linux")) {
		$sistema="Linux";	
	}
	elseif (stristr($HUA,"freebsd")) {
		$sistema="FreeBSD";	
	}
	elseif (stristr($HUA,"openbsd")) {
		$sistema="OpenBSD";	
	}
	elseif (stristr($HUA,"netbsd")) {
		$sistema="NetBSD";	
	}
	elseif (stristr($HUA,"beos")) {
		$sistema="BeOS";	
	}
	elseif (stristr($HUA,"sunos") || stristr($HUA,"solaris")) {
		$sistema="Sun Solaris";	
		//Busca a versión. Forma: SunOS 5.6 sun4u (sun4m)
		//Buscamos 'SunOS' e cortamos dende ahí o final + 1 (para salta-lo espacio)
		$K=strpos($HUA, "sunos");
		$temp=substr($HUA,$K+6);
		//Buscamos o primeiro espacio de esa nova cadea
		$P=strpos($temp, chr(32));
		//Lemos dende 0 ata $P
		$temp=substr($temp,0,$P);
		//Se non hai versión, deixase como Sun Solaris
		if ($temp=="sun4u;" || $temp=="sun4m;") {
			$temp="";
		}
		$sistema.=" ".$temp;
	}	
	elseif (stristr($HUA,"qnx") || stristr($HUA,"photon")) {
		$sistema="QNX";	
	}
	elseif (stristr($HUA,"hp-ux")) {
		$sistema="HP-UX";	
	}
	elseif (stristr($HUA,"irix")) {
		$sistema="SGI IRIX";	
	}
	elseif (stristr($HUA,"aix") || stristr($HUA,"ibm")) {
		$sistema="IBM AIX";	
	}
	elseif (stristr($HUA,"os/2") && stristr($HUA,"warp")) {
		$sistema="OS/2 Warp";	
	}
	elseif (stristr($HUA,"os/2")) {
		$sistema="OS/2";	
	}
	elseif (stristr($HUA,"HURD") || (stristr($HUA,"GNU") && stristr($HUA,"HURD"))) {
		$sistema="Unix (GNU Hurd)";
	}

	//Para outros Unix
	elseif (stristr($HUA,"unix") || stristr($HUA,"x11")) {
		$sistema="Unix";	
	}

	//ÚLTIMOS DETALLES

	//Elimina os caracteres raros ó final
	$version=str_replace(")","",$version);
	$version=str_replace(";)","",$version);
	$version=str_replace("+","",$version);
	$version=str_replace("c-sgi [","",$version);
	$version=str_replace("c-ja","",$version);
	$version=str_replace("c-cern","",$version);
	$version=str_replace("_strs","",$version);
	$version=str_replace(" [","",$version);
	
	//Cousas ilóxicas
	if($sistema==="Linux" && $navegador==="Internet Explorer") {
		$navegador="Mozilla";
		$version="Descoñecida";
	}

	//De non estar definidas as variables, ponas como Descoñecid@
	if($sistema===false || $sistema==="") {
		$sistema=false;
	}
	if($version===false || $version==="") {
		$version=false;
	}
	if($navegador===false || $navegador==="") {
		$navegador=false;
	}
	return $navegador;
}
/**
Verifica que el usuario tiene permisos para ingresar al panel de configuracion
@brief fecha de creacion 03 de noviembre del 2004
@autor Enzo Lepe
@param $directiva-contien la contraseña del administrador
@param $user-contiene el usuario de la sesión o la variable enviada en el formulario
@param $pass-contiene el password del usuario 
@return true-si es valido, false en caso contrario
*/
function verificaConfiguracion($directiva, $user, $pass)
{ 
  $valor = crypt($pass,$user);
  if(strcmp(trim($valor),trim($directiva))==0)
    {
	 return true;
	}
  else
    {
	 return false;
	}	
}
?>

<?php

function limpiar_acentos($s) 
{ 
		$s = ereg_replace("[áàâãª]","a",$s); 
		$s = ereg_replace("[ÁÀÂÃ]","A",$s); 
		$s = ereg_replace("[ÍÌÎ]","I",$s); 
		$s = ereg_replace("[íìî]","i",$s); 
		$s = ereg_replace("[éèê]","e",$s); 
		$s = ereg_replace("[ÉÈÊ]","E",$s); 
		$s = ereg_replace("[óòôõº]","o",$s); 
		$s = ereg_replace("[ÓÒÔÕ]","O",$s); 
		$s = ereg_replace("[úùû]","u",$s); 
		$s = ereg_replace("[ÚÙÛ]","U",$s); 
		$s = str_replace("ç","c",$s); 
		$s = str_replace("Ç","C",$s); 
		$s = str_replace("ñ","n",$s); 
		$s = str_replace("Ñ","N",$s); 
		
		return $s; 
} 

function ajustatexto($cadena)
{
	if (strlen($cadena)>100)
	{
		$i=0;
		while (substr($cadena,80-$i,1)!=" ")
		{
			$i++;
		}
		$cadena=substr($cadena,0,80-$i);
	    $cadena.="...";
	}
	return $cadena;
}

function ajustatexto_titular_secundaria($cadena)
{
	if (strlen($cadena)>90)
	{
		$i=0;
		while (substr($cadena,90-$i,1)!=" ")
		{
			$i++;
		}
		$cadena=substr($cadena,0,90-$i);
	    $cadena.="...";
	}
	return $cadena;
}

function ajustatexto_noticias_secundarias($cadena)
{
	if (strlen($cadena)>120)
	{
		$i=0;
		while (substr($cadena,120-$i,1)!=" ")
		{
			$i++;
		}
		$cadena=substr($cadena,0,120-$i);
	    $cadena.="...";
	}
	return $cadena;
}

function ajustatexto_noticias_breves($cadena)
{
	if (strlen($cadena)>50)
	{
		$i=0;
		while (substr($cadena,50-$i,1)!=" ")
		{
			$i++;
		}
		$cadena=substr($cadena,0,50-$i);
	    $cadena.="...";
	}
	return $cadena;
}

function ajustatexto_noticias_principal($cadena)
{
	if (strlen($cadena)>250)
	{
		$i=0;
		while (substr($cadena,250-$i,1)!=" ")
		{
			$i++;
		}
		$cadena=substr($cadena,0,250-$i);
	    $cadena.="...";
	}
	return $cadena;
}


function fecha_hoy()
{
	$dia=date("d");
	$mes=date("m");
	$ano=date("Y");
	switch ($mes)
	{
		case 1:
			$mes="Enero";
			break;
		case 2:
			$mes="Febrero";
			break;
		case 3:
			$mes="Marzo";
			break;
		case 4:
			$mes="Abril";
			break;
		case 5:
			$mes="Mayo";
			break;
		case 6:
			$mes="Junio";
			break;
		case 7:
			$mes="Julio";
			break;
		case 8:
			$mes="Agosto";
			break;
		case 9:
			$mes="Septiembre";
			break;
		case 10:
			$mes="Octubre";
			break;
		case 11:
			$mes="Noviembre";
			break;
		case 12:
			$mes="Diciembre";
			break;
	}
	$fecha=$dia." de ".$mes." de ".$ano;
	echo "$fecha";
}

function fecha_hoy_mas_dia()
{
	$dia=date("d");
	$mes=date("m");
	$ano=date("Y");
	$nombre_dia=date("w");
	switch ($mes)
	{
		case 1:
			$mes="Enero";
			break;
		case 2:
			$mes="Febrero";
			break;
		case 3:
			$mes="Marzo";
			break;
		case 4:
			$mes="Abril";
			break;
		case 5:
			$mes="Mayo";
			break;
		case 6:
			$mes="Junio";
			break;
		case 7:
			$mes="Julio";
			break;
		case 8:
			$mes="Agosto";
			break;
		case 9:
			$mes="Septiembre";
			break;
		case 10:
			$mes="Octubre";
			break;
		case 11:
			$mes="Noviembre";
			break;
		case 12:
			$mes="Diciembre";
			break;
	}
	switch ($nombre_dia)
	{
		case 0:
			$nombre_dia="Domingo";
			break;
		case 1:
			$nombre_dia="Lunes";
			break;
		case 2:
			$nombre_dia="Martes";
			break;
		case 3:
			$nombre_dia="Miercoles";
			break;
		case 4:
			$nombre_dia="Jueves";
			break;
		case 5:
			$nombre_dia="Viernes";
			break;
		case 6:
			$nombre_dia="Sabado";
			break;
	}
	$fecha=$nombre_dia." ".$dia.", de ".$mes." de ".$ano;
	echo "$fecha";
}

function cambiar_mes($mes)
{
	switch ($mes)
	{
		case 1:
			$mes="Enero";
			break;
		case 2:
			$mes="Febrero";
			break;
		case 3:
			$mes="Marzo";
			break;
		case 4:
			$mes="Abril";
			break;
		case 5:
			$mes="Mayo";
			break;
		case 6:
			$mes="Junio";
			break;
		case 7:
			$mes="Julio";
			break;
		case 8:
			$mes="Agosto";
			break;
		case 9:
			$mes="Septiembre";
			break;
		case 10:
			$mes="Octubre";
			break;
		case 11:
			$mes="Noviembre";
			break;
		case 12:
			$mes="Diciembre";
			break;
	}
	return($mes);
}

function entrega_fecha($fecha)
{
	$ano=strtok($fecha,"-");
	$mes=strtok("-");
	$dia=strtok("-");
	$mes=cambiar_mes($mes);
	$fecha=$dia." de ".$mes." de ".$ano;
	echo "$fecha";
}

function entrega_fecha2($fecha)
{
	$ano=strtok($fecha,"-");
	$mes=strtok("-");
	$dia=strtok("-");
	$mes=cambiar_mes($mes);
	$fecha=$dia." de ".$mes." de ".$ano;
	return ($fecha);
}

function entrega_hora($hora)
{
	$hora=substr($hora,0,5);	
	echo "$hora";
}

function entrega_dia_espanol($dia)
{
	switch ($dia)
	{
		case "Sunday":
			$dia="Domingo";
			break;
		case "Monday":
			$dia="Lunes";
			break;
		case "Tuesday":
			$dia="Martes";
			break;
		case "Wednesday":
			$dia="Miercoles";
			break;
		case "Thursday":
			$dia="Jueves";
			break;
		case "Friday":
			$dia="Viernes";
			break;
		case "Saturday":
			$dia="Sabado";
			break;
	}
	return($dia);
}

function fecha_formato_espanol($fecha)
{
	$ano=substr($fecha,0,4);
	$mes=substr($fecha,5,2);
	$dia=substr($fecha,8,2);
	$fecha="$dia/$mes/$ano";
	return($fecha);
}

function fecha_formato_espanol_gore($fecha)
{
	$ano=substr($fecha,0,4);
	$mes=substr($fecha,5,2);
	$dia=substr($fecha,8,2);
	$fecha="$dia/$mes/$ano";
	return($fecha);
}

function fecha_formato_base($fecha)
{
	$ano=substr($fecha,6,4);
	$mes=substr($fecha,3,2);
	$dia=substr($fecha,0,2);
	$fecha="$ano/$mes/$dia";
	return($fecha);
}

function fecha_formato_espanol_hora($fecha)
{
	$ano=substr($fecha,0,4);
	$mes=substr($fecha,5,2);
	$dia=substr($fecha,8,2);
	$hora=substr($fecha,10);
	$fecha="$dia/$mes/$ano $hora";
	return($fecha);
}

function resultado_dos_fechas($fecha1,$fecha2)
{
	$ano1=substr($fecha1,0,4);
	$mes1=substr($fecha1,5,2);
	$dia1=substr($fecha1,8,2);
	$ano2=substr($fecha2,0,4);
	$mes2=substr($fecha2,5,2);
	$dia2=substr($fecha2,8,2);

	if ($fecha1 == $fecha2)
	{
		$mes1=cambiar_mes($mes1);
		$fecha1=$dia1." de ".$mes1." de ".$ano1;
		return($fecha1);
	}
	if (($mes1 == mes2)&&($ano1 == ano2))
	{
		$mes1=cambiar_mes($mes1);
		$fecha1=$dia1." al ".$dia2." de ".$mes1." de ".$ano1;
		return($fecha1);
	}
	if ($ano1 == $ano2)
	{
		$mes1=cambiar_mes($mes1);
		$mes2=cambiar_mes($mes2);
		$fecha1=$dia1." de ".$mes1." al ".$dia2." de ".$mes2." de ".$ano1;
		return($fecha1);
	}
	else
	{
		$mes1=cambiar_mes($mes1);
		$mes2=cambiar_mes($mes2);
		$fecha1=$dia1." de ".$mes1." de ".$ano1." al ".$dia2." de ".$mes2." de ".$ano2;
		return($fecha1);
	}
}
function fsalida_sql($cad2){
            $uno=substr($cad2, 0, 2);
            $dos=substr($cad2, 3, 2);
            $tres=substr($cad2, 6, 4);
            $cad = ($tres."-".$dos."-".$uno);
            return $cad;
}
function fver_sql($cad2){
            $uno=substr($cad2, 0, 4);
            $dos=substr($cad2, 5, 2);
            $tres=substr($cad2, 8, 2);
            $cad = ($tres."-".$dos."-".$uno);
            return $cad;
}

function rss()
{
    $fecha=date("D").", ".date('d')." ".date("F")." ".date("Y")." ".date("G:i:s O"); 
	return $fecha;
}

function convertir_rss($fecha)
{
    $ano=substr($fecha,0,4);
	$mes=substr($fecha,5,2);
	$dia=substr($fecha,8,2);

	$fecha=date("D", strtotime($fecha)).", ".$dia." ".date("F", strtotime($fecha))." ".$ano." ".date("G:i:s O"); 
	
	return $fecha;
}

function hora()
{
    $hora=date("G:i:s"); 
	return $hora;
}

function clean($mensaje) {
	$nopermitidos = array("'",'\\','<','>',"\"");
	$mensaje = str_replace($nopermitidos, "", $mensaje);
	return $mensaje; 
}

function limitar($text,$numb) {
$text = html_entity_decode($text, ENT_QUOTES);
if (strlen($text) > $numb) {
$text = substr($text, 0, $numb);
$text = substr($text,0,strrpos($text," "));
    if ((substr($text, -1)) == ".") {
        $text = substr($text,0,(strrpos($text,".")));
    }
$etc = "...";
$text = $text.$etc;
}
$text = htmlentities($text, ENT_QUOTES);
return $text;
}

function getIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function ultimo_acceso($fecha) {
$fecha_partes = explode(' ',$fecha);
$fecha = explode('-',$fecha_partes[0]);
echo $fecha[2].'/'.$fecha[1].'/'.$fecha[0].' a las '.$fecha_partes[1];
}

function encrypt($string, $key) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
}

function decrypt($string, $key) {
   $result = '';
   $string = base64_decode($string);
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   return $result;
}

function nicetime($date){
   if(empty($date)){
      return "Fecha no especificada";
   }
   $periods    = array("segundo", "minuto", "hora", "d&iacute;a", "semana", "mese", "a&ntilde;o", "d&eacute;cada");
   $lengths    = array("60","60","24","7","4.35","12","10");

   $now            = time();
   if(is_int($date)){
      $unix_date   = $date;
   }else{
      $unix_date   = strtotime($date);
   }

   if(empty($unix_date)) {
      return "Fecha incorrecta";
   }
   if($now > $unix_date) {
      $difference  = $now - $unix_date;
      $tense       = "Hace ";
   }else{
      $difference  = $unix_date - $now;
      $tense       = "Dentro de ";
   }
   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
      $difference /= $lengths[$j];
   }
   $difference = round($difference);
   if($difference != 1) {
      $periods[$j].= "s";
   }
   return "{$tense} $difference $periods[$j] ";
}

function distanceOfTimeInWords($fromTime, $toTime = 0, $showLessThanAMinute = false) {
    $distanceInSeconds = round(abs($toTime - $fromTime));
    $distanceInMinutes = round($distanceInSeconds / 60);
       
        if ( $distanceInMinutes <= 1 ) {
            if ( !$showLessThanAMinute ) {
                return ($distanceInMinutes == 0) ? 'menos de 1 minuto' : '1 minuto';
            } else {
                if ( $distanceInSeconds < 5 ) {
                    return 'menos de 5 segundos';
                }
                if ( $distanceInSeconds < 10 ) {
                    return 'menos de 10 segundos';
                }
                if ( $distanceInSeconds < 20 ) {
                    return 'menos de 20 segundos';
                }
                if ( $distanceInSeconds < 40 ) {
                    return 'medio minuto atras';
                }
                if ( $distanceInSeconds < 60 ) {
                    return 'menos de 1 minuto';
                }
               
                return '1 minuto';
            }
        }
        if ( $distanceInMinutes < 45 ) {
            return $distanceInMinutes . ' minutos';
        }
        if ( $distanceInMinutes < 90 ) {
            return 'cerca de 1 hora';
        }
        if ( $distanceInMinutes < 1440 ) {
            return 'cerca ' . round(floatval($distanceInMinutes) / 60.0) . ' horas';
        }
        if ( $distanceInMinutes < 2880 ) {
            return '1 dia';
        }
        if ( $distanceInMinutes < 43200 ) {
            return 'cerca ' . round(floatval($distanceInMinutes) / 1440) . ' dias';
        }
        if ( $distanceInMinutes < 86400 ) {
            return 'cerca de 1 mes';
        }
        if ( $distanceInMinutes < 525600 ) {
            return round(floatval($distanceInMinutes) / 43200) . ' meses';
        }
        if ( $distanceInMinutes < 1051199 ) {
            return 'cerca de 1 año';
        }
       
        return 'mas de ' . round(floatval($distanceInMinutes) / 525600) . ' años';
}

function verificaNombre($string) {
$dirname=trim($string);
if (!ereg("^[a-zA-Z0-9[:space:]]*$",$dirname) or (strlen($dirname<1) or (strlen($dirname)>30))) { return false; } else { return true; }
}

function highlightWords($text, $words)
{
        foreach ($words as $word)
        {
                $word = preg_quote($word);
                $text = preg_replace("/\b($word)\b/i", '<span class="highlight_word">\1</span>', $text);
        }
        return $text;
}

function fechaDMA($AMD) { return substr($amd, 8, 2)."-".substr($amd, 5, 2)."-".substr($amd, 0, 4);  }
function fechaAMD($DMA) { return substr($dma, 7, 4)."-".substr($dma, 4, 2)."-".substr($dma, 1, 2);  }

function getDia( $timestamp = 0 ){
	$timestamp = $timestamp == 0 ? time() : $timestamp;
	$dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sábado');
	return $dias[date("w", $timestamp)];
}

function getMes( $timestamp = 0 ){
	$timestamp = $timestamp == 0 ? time() : $timestamp;
	$meses = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
	return $meses[date("n", $timestamp)];
}

function FechaFormateada($FechaStamp)
{ 
  $ano = date('Y',$FechaStamp);
  $mes = date('n',$FechaStamp);
  $dia = date('d',$FechaStamp);
  $diasemana = date('w',$FechaStamp);

  $diassemanaN= array("Domingo","Lunes","Martes","Miércoles",
                      "Jueves","Viernes","Sábado"); $mesesN=array(1=>"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio",
                 "Agosto","Septiembre","Octubre","Noviembre","Diciembre");
  return $diassemanaN[$diasemana].", $dia de ". $mesesN[$mes] ." de $ano";
}

function fechaEspanol($fecha) {
$ingles = array("January","February","March","April","May","June","July","August","September","October","November","December");
$espanol = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
return str_replace($ingles,$espanol,$fecha);
}

//FUNCION PARA CAMBIAR FECHA
function cambiar_fecha($fecha, $formato){
$H="00"; $i="00"; $s="00"; $F=""; $M=""; $num_mes=0;
$Meses = array("","Enero","Febrero","Marzo","Abril","Mayo", "Junio","Julio",
"Agosto","Septiembre","Octubre","Noviembre","Dicie mbre");
$meses = array("","Ene","Feb","Mar","Abr","May","Jun","Jul" ,"Ago","Sep","Oct","Nov","Dic");
//Fecha recibida en ingles con hora
if(ereg( "([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $fecha, $mifecha)){
$num_mes=$mifecha[2]; settype($num_mes, "integer");
$d=$mifecha[3]; $m=$mifecha[2]; $F=$Meses[$num_mes]; $M=$meses[$num_mes]; $Y=$mifecha[1];
$H=$mifecha[4]; $i=$mifecha[5]; $s=$mifecha[6];
}
//Fecha recibida en español con hora
elseif(ereg( "([0-9]{1,2})-([0-9]{1,2})-([0-9]{4}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $fecha, $mifecha)){
$num_mes=$mifecha[2]; settype($num_mes, "integer");
$d=$mifecha[1]; $m=$mifecha[2]; $F=$Meses[$num_mes]; $M=$meses[$num_mes]; $Y=$mifecha[3];
$H=$mifecha[4]; $i=$mifecha[5]; $s=$mifecha[6];
}
//Fecha recibida en ingles sin hora
elseif(ereg( "([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha)){
$num_mes=$mifecha[2]; settype($num_mes, "integer");
$d=$mifecha[3]; $m=$mifecha[2]; $F=$Meses[$num_mes]; $M=$meses[$num_mes]; $Y=$mifecha[1];
}
//Fecha recibida en español sin hora
elseif(ereg( "([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})", $fecha, $mifecha)){
$num_mes=$mifecha[2]; settype($num_mes, "integer");
$d=$mifecha[1]; $m=$mifecha[2]; $F=$Meses[$num_mes]; $M=$meses[$num_mes]; $Y=$mifecha[3];
}
// Variable [y] ultimas dos cifras del año
$y = substr($Y, 2);
$formato = ereg_replace( "d", $d, $formato ); // [d] días
$formato = ereg_replace( "m", $m, $formato ); // [m] mes con numeros
$formato = ereg_replace( "Y", $Y, $formato ); // [Y] año de 4 cifras
$formato = ereg_replace( "y", $y, $formato ); // [y] año de 2 cifras
$formato = ereg_replace( "H", $H, $formato ); // [H] hora de 0 a 23
$formato = ereg_replace( "i", $i, $formato ); // [i] minutos de 0 a 59
$formato = ereg_replace( "s", $s, $formato ); // [s] segundos de 0 a 59
// Tienen que ir al final porque llevan texto para no ser reemplazado
$formato = ereg_replace( "M", $M, $formato ); // [M] mes con 3 letras
$formato = ereg_replace( "F", $F, $formato ); // [F] mes con letras completo
return $formato;
}

//FUNCION IMRRIMIR FECHA
function imprimir_fecha($dato){
$fecha = cambiar_fecha($dato, "Y-m-d");
$hoy = date("Y-m-d");
$ayer_aprox = mktime(0,0,0,date("m") ,date("d")-1,date("Y"));
$ayer = date("Y-m-d", $ayer_aprox);
if($fecha == $hoy){ $fecha = "Hoy: ".cambiar_fecha($dato, "H:i");}
elseif($fecha == $ayer){ $fecha = "Ayer: ".cambiar_fecha($dato, "H:i");}
else{$fecha = cambiar_fecha($dato, "d-m-Y H:i");}
return $fecha;
}

//FUNCION CUMPLEAÑOS
function cumpleano($dato){
$mes = array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
$fecha = split("[/.-]", $dato);
$d = $fecha[2];
$m = $fecha[1];
$y = $fecha[0];
for($i=1; $i <=12; $i++)
{
if($i == $m){ $mes=$mes[$i]; }
}
if(date("m") < $m){ $anio = date("Y");}
else{
$anio_aprox = mktime(0, 0, 0,date("m"), date("d"), date("Y")+1);
$anio = date("Y", $anio_aprox);}
return $cumpleano = $d." de ".$mes." de ".$anio;
}

//FUNCION EDAD
function edad($dato){
$edad = date('Y-m-d') - $dato;
return $edad;
}

function extension($filename){
    return substr(strrchr($filename, '.'), 1);
}

function toHtml($buff){
	//return @htmlspecialchars((string)$buff, ENT_QUOTES);
	return htmlentities((string)$buff, ENT_NOQUOTES, 'UTF-8');
	return utf8_decode((string)$buff);
	
}



?>

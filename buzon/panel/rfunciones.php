<?php

function CabeceraRPagina() {
global $global_qk; ?>
<!-- Portada: Cabecera  -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td><img src="../imagenes/fnd_cab_rpanel.jpg"></td></tr>
</table>
<!-- Portada: Cabecera  -->
<?php
}


function LineaComando() {
global $global_qk; ?>
<!-- Portada: Linea Comando  -->
<table width="98%" border="0" cellspacing="0" cellpadding="0">
	<tr><td height="5"></td></tr>
	<tr><td>
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr valign="top">
				<td width="65%" class="texto-contenido"><a href="home.php">Portada</a></td>
				<td width="20%" class="texto-contenido"><img src="../imagenes/ic_sesion.png" width="15" height="15">&nbsp;<?php echo ConoceNick($global_qk);?></td>
				<td width="15%"class="texto-contenido">
					<form action="bc_logout.php" id="FMuestra" method="post">
					<input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
					<input type="submit" value=" Cerrar Sesión " class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
					</form>
				</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr><td height="5"></td></tr>
</table>
<!-- Portada: Linea Comando  -->
<?php
}


function MenuRPagina($nTipo) { 
global $global_qk; ?>
<table width="98%" border="0" cellspacing="1" cellpadding="1">
	<tr><td height="25"></td></tr>
	<?php if($nTipo == 1) { ?>
		<tr><td class="menuCabecera">M&oacute;dulo Administrador</td></tr>
		<tr><td class="menuNormal" onMouseOver="this.className='menuHover'" onMouseOut="this.className='menuNormal'"><a href="bz_us01.php">Usuario Administrador</a></td></tr>
		<tr><td class="menuNormal" onMouseOver="this.className='menuHover'" onMouseOut="this.className='menuNormal'"><a href="bz_us02.php">Usuario Responde Emails</a></td></tr>
		<tr><td class="menuNormal" onMouseOver="this.className='menuHover'" onMouseOut="this.className='menuNormal'"><a href="bz_tm01.php">Temas</a></td></tr>
		<tr><td class="menuNormal" onMouseOver="this.className='menuHover'" onMouseOut="this.className='menuNormal'"><a href="bz_tc01.php">Tipo Consultas</a></td></tr>
		<tr><td class="menuEspacio" height="15">&nbsp;</td></tr>
	<?php } 
	
	if(( $nTipo == 1) || ($nTipo == 2) || ($nTipo == 3) ) { ?>
		<tr><td class="menuCabecera">Consultas</td></tr>
		<tr><td class="menuNormal" onMouseOver="this.className='menuHover'" onMouseOut="this.className='menuNormal'"><a href="bz_est01.php">Total Preguntas por Tipo y Tema, Respondidas y No Respondidas</a></td></tr>
		<tr><td class="menuNormal" onMouseOver="this.className='menuHover'" onMouseOut="this.className='menuNormal'"><a href="bz_est02.php">Total Hombres y Mujeres Registrados en el Sitio</a></td></tr>
		<tr><td class="menuNormal" onMouseOver="this.className='menuHover'" onMouseOut="this.className='menuNormal'"><a href="bz_est03.php">Total Preguntas, Preguntas Respondidas y Preguntas Sin Responder Registrados en el Sitio</a></td></tr>
		<tr><td class="menuNormal" onMouseOver="this.className='menuHover'" onMouseOut="this.className='menuNormal'"><a href="bz_est04.php">Total Consultas por G&eacute;nero Registradas en el Sistema</a></td></tr>		
		<tr><td class="menuNormal" onMouseOver="this.className='menuHover'" onMouseOut="this.className='menuNormal'"><a href="bz_est05.php">Indicador Consultas Recibidas y Respondidas en un Rango de Fechas</a></td></tr>		
		<tr><td class="menuNormal" onMouseOver="this.className='menuHover'" onMouseOut="this.className='menuNormal'"><a href="bz_est06.php">Indicador Promedio de D&iacute;as en Responder</a></td></tr>
		<tr><td class="menuNormal" onMouseOver="this.className='menuHover'" onMouseOut="this.className='menuNormal'"><a href="bz_est07.php">Indicador Cuantas Preguntas se Respondieron en a lo menos m&aacute;s de cuatro d&iacute;as</a></td></tr>
        <tr>
          <td class="menuNormal" onMouseOver="this.className='menuHover'" onMouseOut="this.className='menuNormal'"><a href="/buzon/panel/calendar/index.php">Consulta por fecha Realizada por Usuario - Respondida por funcionario</a></td>
        </tr>
        <tr>
          <td class="menuNormal" onMouseOver="this.className='menuHover'" onMouseOut="this.className='menuNormal'"><a href="/buzon/panel/php-excel/mysql.php">Consulta Realizada por Temas asociadas a Funcionarios</a></td>
        </tr>
		<tr><td height="25"></td></tr>
<?php } ?>
</table>
<?php 
}

function Ruta( $Nivel ) {
global $global_qk;
	echo "Portada > ";
	switch ($Nivel) {
			case "H": 
				echo "Inicio";
				break;
			case "U":
				echo "Módulo Administrador > Usuario Administrador";
				break;
			case "UR":
				echo "Módulo Administrador > Usuario Responsable Responder Emails";
				break;
			case "U1":
				echo "Módulo Administrador > Usuario Administrador > Agregar Administrador";
				break;
			case "U2":
				echo "Módulo Administrador > Usuario Responsable Responder Emails > Agregar Usuario Responsable";
				break;
			case "M1":
				echo "Módulo Administrador > Usuario Administrador > Actualizar Datos";
				break;
			case "M2":
				echo "Módulo Administrador > Usuario Responsable Responder Emails > Actualizar Datos";
				break;
			case "E1":
				echo "Módulo Administrador > Usuario Administrador > Eliminar Datos";
				break;
			case "E2":
				echo "Módulo Administrador > Usuario Responsable Responder Emails > Eliminar Datos";
				break;
			case "T":
				echo "Módulo Administrador > Temas";
				break;
			case "TA":
				echo "Módulo Administrador > Temas > Agregar Tema";
				break;
			case "TM":
				echo "Módulo Administrador > Temas > Actualizar Tema";
				break;
			case "C":
				echo "Módulo Administrador > Tipo de Consultas";
				break;
			case "CA":
				echo "Módulo Administrador > Tipo de Consultas > Agregar Tipo de Consulta";
				break;
			case "CM":
				echo "Módulo Administrador > Tipo de Consultas > Actualizar Tipo de Consulta";
				break;
			case "G":
				echo "Módulo Administrador > Estad&iacute;sticas";
				break;
	}
}


function PieRpagina() {
global $global_qk; ?>
<!-- Portada: Linea Comando  -->
<table width="98%" border="0" cellspacing="0" cellpadding="0">
	<tr><td height="45" class="piePagina"><strong>www.gorecoquimbo.gob.cl</strong>: Departamento de Informatica del Servicio Administrativo del Gobierno Regional de Coquimbo<br />
											
	</td></tr>
</table>
<!-- Portada: Linea Comando  -->
<?php
}


function ListaMensaje($vForm,$fila) {
global $global_qk;
extract($fila);
?>
<table width="550" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#ffffff">
  <tr class="texto-tablas"> 
    <td width="97">Fecha</td>
    <td colspan="4"><strong><?=$fecha?></strong></td>
  </tr>
  <tr class="texto-tablas"> 
    <td>Tipo Consulta</td>
    <td class="texto-contenido" colspan="2"><strong><?=$tipo?></strong></td>
    <td class="texto-tablas" width="95">Tema</td>
    <td class="texto-contenido" width="179"><strong><?=$tema?></strong></td>
  </tr>
  <tr class="texto-tablas"> 
    <td>Usuario</td>
    <td colspan="4"><strong><?=$nombre?></strong></td>
  </tr>
  <tr class="texto-tablas"> 
    <td colspan="5">Mensaje</td>
  </tr>
  <tr class="texto-tablas"> 
    <td colspan="5">
		<div id="veMensaje">
			<strong><?=$mensaje?></strong>
		</div>
	</td>
  </tr>
  <tr> 
    <td colspan="5" align="right">
	<?php if($vForm == "R") {?>
	<form action="../rpanel/rresponder.php" method="post" id="formlist">
		<input type="hidden" name="id" value="<?=$id?>">
		<input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
		<input type="submit" value="Responder" class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
	</form><?php } ?>&nbsp;&nbsp;
	</td>
  </tr>
</table>
<?php
}


function VeMensaje($fila) {
global $global_qk;
extract($fila);
?>
<table width="550" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#ffffff">
  <tr class="texto-tablas"> 
    <td width="97">Fecha</td>
    <td colspan="4"><strong><?=$fecha?></strong></td>
  </tr>
  <tr class="texto-tablas"> 
    <td>Funcionario</td>
    <td colspan="4"><strong><?=$funcionario?></strong></td>
  </tr>
  <tr class="texto-tablas"> 
    <td colspan="5">Respuesta</td>
  </tr>
  <tr class="texto-tablas"> 
    <td colspan="5">
		<div id="veMensaje">
			<strong><?=$respuesta?></strong>
		</div>
	</td>
  </tr>
</table>
<?php
}


function convertir_fecha($fecha_datetime){
global $global_qk;
//Esta función convierte la fecha del formato DATETIME de SQL a formato DD-MM-YYYY HH:mm:ss
	$fecha = split("-",$fecha_datetime);
	$hora = split(":",$fecha[2]);
	$fecha_hora = split(" ",$hora[0]);
	
	$fecha_convertida = $fecha_hora[0].'-'.$fecha[1].'-'.$fecha[0].' '.$fecha_hora[1].':'.$hora[1].':'.$hora[2];
	return $fecha_convertida;
}

function convertir_fecha2($fecha_datetime){
global $global_qk;
//Esta función convierte la fecha del formato DATETIME de SQL a formato DD-MM-YYYY HH:mm:ss
	$fecha = split("-",$fecha_datetime);
	$hora = split(":",$fecha[2]);
	$fecha_hora = split(" ",$hora[0]);
	
	$fecha_convertida = $fecha_hora[0].'/'.$fecha[1].'/'.$fecha[0];
	return $fecha_convertida;
}

function convertir_fecha4($fecha_datetime){
global $global_qk;
//Esta función convierte la fecha del formato DATETIME de SQL a formato DD-MM-YYYY HH:mm:ss
	$fecha = split("-",$fecha_datetime);
	$hora = split(":",$fecha[2]);
	$fecha_hora = split(" ",$hora[0]);
	
	$fecha_convertida = $fecha[0].'/'.$fecha_hora[0].'/'.$fecha[1];
	return $fecha_convertida;
}


function convertir_fecha3($fecha_datetime){
global $global_qk;
//Esta función convierte la fecha del formato DATETIME de SQL a formato DD-MM-YYYY HH:mm:ss
	$fecha = split("-",$fecha_datetime);
	$hora = split(":",$fecha[2]);
	$fecha_hora = split(" ",$hora[0]);
	
	$fecha_convertida = $fecha_hora[1].':'.$hora[1].':'.$hora[2];
	return $fecha_convertida;
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
?>

<?php

function CabeceraRPagina() {
global $global_qk; ?>
<!-- Portada: Cabecera  -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td><img src="../imagenes/fnd_cab_rpanel.jpg" width="720" height="65"></td></tr>
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
				<td width="65%" class="texto-contenido"><a href="rhome.php">Portada</a></td>
				<td width="20%" class="texto-contenido"><img src="../imagenes/ic_sesion.png" width="15" height="15">&nbsp;<?php echo ConoceNick($global_qk);?></td>
				<td width="15%"class="texto-contenido">
					<form action="logout.php" id="FMuestra" method="post">
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


function MenuRPagina() { 
global $global_qk; ?>
<table width="98%" border="0" cellspacing="1" cellpadding="1">
	<tr><td height="25"></td></tr>
	<tr><td class="menuCabecera">Preguntas Llegadas</td></tr>
	<tr><td class="menuNormal" onMouseOver="this.className='menuHover'" onMouseOut="this.className='menuNormal'"><a href="rpreg_sr.php">Sin Responder</a></td></tr>
	<tr><td class="menuNormal" onMouseOver="this.className='menuHover'" onMouseOut="this.className='menuNormal'"><a href="rpreg_r.php">Respondidas</a></td></tr>
	<tr><td class="menuEspacio" height="15">&nbsp;</td></tr>
	<!--<tr><td class="menuCabecera">Consultas</td></tr>
	<tr><td class="menuNormal" onMouseOver="this.className='menuHover'" onMouseOut="this.className='menuNormal'"><a href="">Listar Todas</a></td></tr>-->
	<tr><td height="25"></td></tr>

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
			case "R":
				echo "Preguntas Llegadas > Responder";
				break;
			case "E":
				echo "Preguntas Llegadas > Respondido";
				break;
			case "S":
				echo "Preguntas Llegadas > Sin Responder";
				break;
			case "V":
				echo "Preguntas Llegadas > Ver Respuesta";
				break;
	}
}


function PieRpagina() {
global $global_qk; ?>
<!-- Portada: Linea Comando  -->
<table width="98%" border="0" cellspacing="0" cellpadding="0">
	<tr><td height="45" class="piePagina"><strong>www.gorecoquimbo.gob.cl</strong>: Departamento de Informatica del Servicio Administrativo del Gobierno Regional de Coquimbo<br />
											:: Dise&ntilde;ado por Luis Jim&eacute;nez Villalobos ::
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
  <tr> 
    <td width="97"  class="texto-tablas">Fecha</td>
    <td colspan="4" class="texto-contenido"><strong><?=$fecha?></strong></td>
  </tr>
  <tr> 
    <td class="texto-tablas">Tipo Consulta</td>
    <td width="149" class="texto-contenido"><strong><?=$tipo?></strong></td>
    <td width="24" class="texto-contenido">&nbsp;</td>
    <td width="95" class="texto-tablas">Tema</td>
    <td width="179" class="texto-contenido"><strong><?=$tema?></strong></td>
  </tr>
  <tr> 
    <td class="texto-tablas">Usuario</td>
    <td colspan="4" class="texto-contenido"><strong><?=$nombre?></strong></td>
  </tr>
  <tr class="texto-contenido"> 
    <td colspan="5"><strong>Mensaje</strong></td>
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
	<form action="rresponder.php" method="post" name="FRespEmail" id="formlist">
		<input type="hidden" name="id" value="<?=$id?>">
		<input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
		<input type="submit" name="responde" value=" Responder " class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
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
  <tr> 
    <td width="97" class="texto-tablas">Fecha</td>
    <td colspan="4" class="texto-contenido"><strong><?=$fecha?></strong></td>
  </tr>
  <tr> 
    <td class="texto-tablas">Funcionario</td>
    <td colspan="4" class="texto-contenido"><strong><?=$funcionario?></strong></td>
  </tr>
  <tr class="texto-contenido"> 
    <td colspan="5"><strong>Respuesta</strong></td>
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
?>

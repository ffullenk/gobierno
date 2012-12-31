

<html lang="es">
<head>
<title>Buzon Ciudadano :: Gobierno Regional de Coquimbo</title>
<link href="estilos/estilos.css" rel="stylesheet" type="text/css">
<script type="text/javascript" language="javascript" src="../js/valida.js"></script>
<script type="text/javascript" language="javascript" src="../js/encuesta.js"></script>
  </head> 

<body onLoad="document.formulario.email.focus();">			
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<form name="formulario" target="_parent" title="Control de acceso" action="login.php" method="post" onSubmit="return validarEmail();" >							  			  
			  <table width="40%" border="0" align="center" cellpadding="1" cellspacing="1" bordercolor="#003399">
				<tr bordercolor="#FFFFFF"> 
				  <td colspan="4" align="center"><img src="../imagenes/pnl_encuesta.jpg" width="350" height="100"></td>
				</tr>
				<tr bordercolor="#FFFFFF"> 
				  <td colspan="4">&nbsp;</td>
				</tr>
				<tr bordercolor="#FFFFFF" class="texto-contenido">
				  <td width="25%" align="left">&nbsp;</td>
				  <td width="25%" align="left" class="formlabel">Usuario</td>
				  <td width="25%" align="center">
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

$id=quitar($_GET["id"]);

include('../bd/conecta.php');
$link = Conexion();
$res=mysql_query("SELECT NOMBRES, PATERNO, MATERNO FROM PERSONA WHERE COD_PERS=\"$id\" ") or die(mysql_error());
  
if( $user_obj = mysql_fetch_object($res) ) {
echo $user_obj->NOMBRES . " " . $user_obj->PATERNO . " " . $user_obj->MATERNO;
}

mysql_free_result($res); unset($user_obj);
mysql_close($link);
				  ?>
				  </td>
				  <td width="25%" align="center">&nbsp;</td>
				</tr>
				<tr bordercolor="#FFFFFF" class="texto-contenido"> 
				  <td>&nbsp;</td>
				  <td class="formlabel">Email</td>
				  <td align="center">
				  		<input name="email" type="text" class="formtextfield" title="Ingrese su correo electronico." size="10" maxlength="50" /> 
				  </td>
				  <td>&nbsp;</td>
				</tr>
				<tr bordercolor="#FFFFFF"> 
				  <td colspan="4" align="center">&nbsp;</td>
				</tr>
				<tr bordercolor="#FFFFFF">
				  <td align="center">&nbsp;</td>
				  <td align="center">
				  		<input type="submit" name="volver" title="Ingresar"  value="Ingresar"  class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'"/>
				  </td>
				  <td align="center">
				  		<input type="reset" name="volver2" title="Borrar formulario"  value="  Borrar  "   class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'"/> 
				  </td>
				  <td align="center">&nbsp;</td>
				</tr>
			  </table>
				</form>
			<table width="40%" border="0" align="center" cellpadding="1" cellspacing="1" bordercolor="#003399">
				<tr bordercolor="#FFFFFF"><td class="texto-contenido">Es importante que usted digite la cuenta de correo electr&oacute;nico co nla cual desarrollo la consulta al Buz&oacute;n Ciudadano de Gobierno Regional de Coquimbo.</td></tr>
			</table>
		  </body>	  
		</html>
		
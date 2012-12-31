<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Oficina Regional de Emergencias Regi&oacute;n de Coquimbo</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" media="all" />
<style type="text/css">
<!--
body {
	background-color: #0099CC;
}
-->
</style></head>

<body>
<table width="760" border="0" align="center" cellpadding="0" cellspacing="1" background="imagenes/io/fndsup.jpg">
  <tr  >
    <td width="300" ><img src="imagenes/io/oremi.gif" alt="OREMI" width="300" height="70" longdesc="Oficina Regional de Emergencias" /></td>
    <td width="300">&nbsp;</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td><img src="imagenes/io/inicio.gif" alt="Inicio" width="15" height="15" border="0" align="absmiddle" longdesc="P&aacute;gina de Inicio OREMI" />&nbsp;<a href="index.php" class="petitmenu">Inicio OREMI</a></td>
      </tr>
      <tr>
        <td><img src="imagenes/io/email.gif" alt="email" width="15" height="15" border="0" align="absmiddle" longdesc="Contacto OREMI" />&nbsp;<a href="mailto:oremiiv@gorecoquimbo.cl" class="petitmenu">Contacto OREMI</a></td>
      </tr>
    </table></td>
  </tr>
</table>
<table border="0" width="760" align="center" bgcolor="#FFFFFF">
  <tr>
    <td colspan="3">Oficina Regional de Emergencias Regi&oacute;n de Coquimbo</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
<table width="760" border="0" align="center" cellpadding="0" cellspacing="1" class="lineafondo">
  <tr bgcolor="#FFFFFF">
    <td><table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr valign="top">
        <td>
		  <table width="100%" border="0" cellspacing="1" cellpadding="3">
          <tr>
		    <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="3">
			    <tr><td class="resumen">Resumen de Eventos </td></tr>
				<tr><td align="right"><a href="index.php"><img src="imagenes/io/volver.jpg" alt="Atr&aacute;s" width="75" height="24" border="0" longdesc="Volver Atrás" /></a>&nbsp;</td>
				</tr>
<!--	<tr><td height="15">&nbsp;</td></tr>
		<tr><td>&nbsp;</td></tr> -->
				<?php 
				// Buscamos los Eventos que el Encargado Regional ha creado
				
				/*
					Parametros globales: 
										Region del Encargado =>
				*/

@include("lib/config.php");
@include("lib/global.php");
@include("lib/recordset.php");
@include("lib/oremi.php");
@include("utiles/utiles.php");
define("_RegAdm_",4);
				
				$rsInf = new Recordset($SERVER, $DB, $USER, $PASSWORD);
				$sqlInf = "SELECT INFORMATIVO_ID, MATERIA, FECHA, NROINFORME, RESUMEN 
								FROM INFORMATIVO 
								WHERE INFORMATIVO_ID=\"".$id."\" ";
				$rsInf->Open($sqlInf);
				$nroInf=$rsInf->RecordCount();
				if($nroInf>0) {
					$i=0;
					if($rsInf->moveNext()) {
						$fecha = split("-", $rsInf->FieldByNumber(2) );
						$fecha = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0]; ?>
						<tr ><td><table border="0" cellpadding="5" cellspacing="1" class="fndsubtitulos">
				                  <tr bgcolor="#bec9d1"><td><strong>Nro.Informe:</strong>&nbsp;<?php echo $rsInf->FieldByNumber(3)?></td>
				                  <td><strong>Fecha:</strong>&nbsp;<?php echo $fecha;?></td>
				                  </tr>
				                  <tr><td colspan="2"><strong>Materia:</strong><br />
								  <?php echo $rsInf->FieldByNumber(1);?>
								  </td>
				                  </tr>
				                </table>
						</td></tr>
						<tr><td height="15">&nbsp;</td></tr>
						<tr><td>
							<table border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#bec9d1">
							<tr class="fndsubtitulos"><td><?php echo nl2br($rsInf->FieldByNumber(4));?></td></tr>
							</table>
						</td></tr>

<?php					}
				}
				
				?>

				</table>
				</td>
		</tr>
        </table></td>
        </tr>
      <tr><td>&nbsp;</td></tr>
      <tr><td>&nbsp;</td></tr>
      <?php pieInforme();?>

    </table></td>
  </tr>
  <tr><td></td></tr>
</table>
</body>
</html>

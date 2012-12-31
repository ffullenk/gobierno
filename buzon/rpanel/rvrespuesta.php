<?php
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

  umask(0);
  include('../bd/conecta.php');
  $link = Conexion();
  $legal_require_php = "bzrrevalidate";
  global $global_qk;
  $global_qk=0;


require('detect.php');
  global $c;

if($loginCorrecto ) {  
	/*se incluyen los archivos*/
	@include("../lib/grbz-sesion.php");
	@include("../lib/bc_lib.php");
	@include("../lib/global.php");
	@include("../lib/recordset.php");
	include("rfunciones.php");
?>
<html>
<head>
<title>Panel de Respuestas - Buzón Ciudadano :: Gobierno Regional de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="estilos/rpanel.css" rel="stylesheet" type="text/css">
</head>

<body onLoad="document.formlist.cMensaje.focus();">
<table width="722" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="1">&nbsp;</td>
    <td width="720">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
		  	<?php
				CabeceraRPagina();
				LineaComando();
			?>
		  </td>
        </tr>
        <tr>
           <td height="25"><table width="720" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="160" valign="top">
					    <!-- Menu Principal -->
						<?php MenuRPagina(); ?>
						<!-- Menu Principal -->
					  </td>
                      <td width="560" valign="top">
					    <!-- Seccion Central -->
					  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="textoRuta"><?php Ruta("V");?></td>
                          </tr>
						  <tr><td height="15"></td></tr>
                          <tr>
                            <td>
							<!-- Parte  Central de la Pagina-->
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
<?php									$rsTicket = new Recordset($SERVER , $DB , $USER , $PASSWORD);
										$query = "SELECT COD_BITR, concat( NOMBRES,  ' ', APPAT,  ' ', APMAT ) , EMAIL, RESPUESTA, DATE_FORMAT( FECHA,  '%d/%m/%Y %H:%i:%s'  )  AS enviado 
													FROM BITACORA_R AS BR, FUNCIONARIO AS F 
													WHERE BR.COD_FUNCIONARIO = F.COD_FUNCIONARIO AND 
													BR.COD_BITC = '". $id ."' ;";

										$rsTicket->Open($query);
										while($rsTicket->moveNext())
										{ 
											$fila["id"]				= $rsTicket->FieldByNumber(0);
											$fila["funcionario"]	= $rsTicket->FieldByNumber(1);
											$fila["email"]			= $rsTicket->FieldByNumber(2);
											$fila["respuesta"]		= nl2br($rsTicket->FieldByNumber(3));
											$fila["fecha"]			= $rsTicket->FieldByNumber(4);
											VeMensaje($fila);
										} ?>
									</td>
								</tr>
								<tr>
									<td align="right">
									<form action="javascript:window.history.back()" method="post" id="formlist">
										<input type="submit" value=" Volver Atrás " class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
									</form>
									</td>
								</tr>
								</table>
							<!-- Parte  Central de la Pagina-->
							</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                        </table>
					    <!-- Seccion Central -->
					  </td>
                    </tr>
                  </table></td>
              </tr>
        <tr>
          <td><?php PieRPagina();?></td>
        </tr>
      </table></td>
    <td width="1">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
} else {
	// No logeado
	header("Location: index.php");
}
?>

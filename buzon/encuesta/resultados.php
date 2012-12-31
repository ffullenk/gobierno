<?php
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

  umask(0);
  include('../bd/conecta.php');
  $link = Conexion();

?>
<html>
<head>
<title>Buz&oacute;n Ciudadano :: Gobierno Regional de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="estilos/estilos.css" rel="stylesheet" type="text/css">
</head>

<body style="margin:0px 0px;padding:0px;background-color:#3d3d3d;">
<table width="722" border="0" align="center" cellpadding="0" cellspacing="0" style="margin:5px; padding:5px; background-color:#fff;">
  <tr> 
    <td width="1" bgcolor="#497f27">&nbsp;</td>
    <td width="720">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
		  </td>
        </tr>
        <tr>
           <td height="25">
		   <table width="720" border="0" cellspacing="0" cellpadding="0">
           <tr>
              <td width="160" valign="top">&nbsp;</td>
              <td width="560" valign="top">
					    <!-- Seccion Central -->
					  	<table width="98%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="textoRuta"></td>
                          </tr>
						  <tr><td height="15"></td></tr>
                          <tr>
                            <td>
							<!-- Parte  Central de la Pagina-->
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
									<div id="maincol" >
<h1>Encuesta de Satisfacci&oacute;n: Buz&oacute;n Ciudadano Gobierno Regional de Coquimbo</h1>


<p class="texto-contenido">Muestra resultados de acuerdo a la ponderaci&oacute;n realizada por los usuarios del Buz&oacute;n Ciudadano.</p>



<style type="text/css">
<!--
.tiempo {
	font-size: 7.5pt;
	color: #666666;
	border:5px solid #3d3d3d;
	background-color:#f2f2f2;
	padding:15px;
	margin:5px;
	font-family:Verdana, Arial;
}

.facilidad {
	font-size: 7.5pt;
	color: #666666;
	border:5px solid #3d3d3d;
	background-color:#f2f2f2;
	padding:15px;
	margin:5px;
	font-family:Verdana, Arial;
}

.relacion {
	font-size: 7.5pt;
	color: #666666;
	border:5px solid #3d3d3d;
	background-color:#f2f2f2;
	padding:15px;
	margin:5px;
	font-family:Verdana, Arial;
}

.respuesta {
	font-size: 7.5pt;
	color: #666666;
	border:5px solid #3d3d3d;
	background-color:#f2f2f2;
	padding:15px;
	margin:5px;
	font-family:Verdana, Arial;
}

.claridad {
	font-size: 7.5pt;
	color: #666666;
	border:5px solid #3d3d3d;
	background-color:#f2f2f2;
	padding:15px;
	margin:5px;
	font-family:Verdana, Arial;
}

.utilidad {
	font-size: 7.5pt;
	color: #666666;
	border:5px solid #3d3d3d;
	background-color:#f2f2f2;
	padding:15px;
	margin:5px;
	font-family:Verdana, Arial;
}

.diseno {
	font-size: 7.5pt;
	color: #666666;
	border:5px solid #3d3d3d;
	background-color:#f2f2f2;
	padding:15px;
	margin:5px;
	font-family:Verdana, Arial;
}
-->
</style>

<?php
$res=mysql_query("SELECT sum( 1  ) AS Encuestados,
SUM(  IF ( TIEMPO =  \"1\", 1, 0 ) ) AS TPO_UNO,
SUM(  IF ( TIEMPO =  \"2\", 1, 0 ) ) AS TPO_DOS,
SUM(  IF ( TIEMPO =  \"3\", 1, 0 ) ) AS TPO_TRES,
SUM(  IF ( TIEMPO =  \"4\", 1, 0 ) ) AS TPO_CUATRO,
SUM(  IF ( TIEMPO =  \"5\", 1, 0 ) ) AS TPO_CINCO,
SUM(  IF ( TIEMPO =  \"6\", 1, 0 ) ) AS TPO_SEIS,

SUM(  IF ( FACILIDAD =  \"1\", 1, 0 ) ) AS FCL_UNO,
SUM(  IF ( FACILIDAD =  \"2\", 1, 0 ) ) AS FCL_DOS,
SUM(  IF ( FACILIDAD =  \"3\", 1, 0 ) ) AS FCL_TRES,
SUM(  IF ( FACILIDAD =  \"4\", 1, 0 ) ) AS FCL_CUATRO,
SUM(  IF ( FACILIDAD =  \"5\", 1, 0 ) ) AS FCL_CINCO,
SUM(  IF ( FACILIDAD =  \"6\", 1, 0 ) ) AS FCL_SEIS,

SUM(  IF ( RELACION =  \"1\", 1, 0 ) ) AS RLC_UNO,
SUM(  IF ( RELACION =  \"2\", 1, 0 ) ) AS RLC_DOS,
SUM(  IF ( RELACION =  \"3\", 1, 0 ) ) AS RLC_TRES,
SUM(  IF ( RELACION =  \"4\", 1, 0 ) ) AS RLC_CUATRO,
SUM(  IF ( RELACION =  \"5\", 1, 0 ) ) AS RLC_CINCO,
SUM(  IF ( RELACION =  \"6\", 1, 0 ) ) AS RLC_SEIS,

SUM(  IF ( RESPUESTA =  \"1\", 1, 0 ) ) AS RSP_UNO,
SUM(  IF ( RESPUESTA =  \"2\", 1, 0 ) ) AS RSP_DOS,
SUM(  IF ( RESPUESTA =  \"3\", 1, 0 ) ) AS RSP_TRES,
SUM(  IF ( RESPUESTA =  \"4\", 1, 0 ) ) AS RSP_CUATRO,
SUM(  IF ( RESPUESTA =  \"5\", 1, 0 ) ) AS RSP_CINCO,
SUM(  IF ( RESPUESTA =  \"6\", 1, 0 ) ) AS RSP_SEIS,

SUM(  IF ( CLARIDAD =  \"1\", 1, 0 ) ) AS CLR_UNO,
SUM(  IF ( CLARIDAD =  \"2\", 1, 0 ) ) AS CLR_DOS,
SUM(  IF ( CLARIDAD =  \"3\", 1, 0 ) ) AS CLR_TRES,
SUM(  IF ( CLARIDAD =  \"4\", 1, 0 ) ) AS CLR_CUATRO,
SUM(  IF ( CLARIDAD =  \"5\", 1, 0 ) ) AS CLR_CINCO,
SUM(  IF ( CLARIDAD =  \"6\", 1, 0 ) ) AS CLR_SEIS,

SUM(  IF ( UTILIDAD =  \"1\", 1, 0 ) ) AS UTL_UNO,
SUM(  IF ( UTILIDAD =  \"2\", 1, 0 ) ) AS UTL_DOS,
SUM(  IF ( UTILIDAD =  \"3\", 1, 0 ) ) AS UTL_TRES,
SUM(  IF ( UTILIDAD =  \"4\", 1, 0 ) ) AS UTL_CUATRO,
SUM(  IF ( UTILIDAD =  \"5\", 1, 0 ) ) AS UTL_CINCO,
SUM(  IF ( UTILIDAD =  \"6\", 1, 0 ) ) AS UTL_SEIS,

SUM(  IF ( DISENO =  \"1\", 1, 0 ) ) AS DSN_UNO,
SUM(  IF ( DISENO =  \"2\", 1, 0 ) ) AS DSN_DOS,
SUM(  IF ( DISENO =  \"3\", 1, 0 ) ) AS DSN_TRES,
SUM(  IF ( DISENO =  \"4\", 1, 0 ) ) AS DSN_CUATRO,
SUM(  IF ( DISENO =  \"5\", 1, 0 ) ) AS DSN_CINCO,
SUM(  IF ( DISENO =  \"6\", 1, 0 ) ) AS DSN_SEIS 
FROM ENCUESTADOS") or die(mysql_error());
  
while( $user_obj = mysql_fetch_object($res) ) {
echo "<span class=\"texto-contenido\"><strong>Total Encuestas: " . $user_obj->Encuestados . "</strong><br />";

echo "
<div class=\"tiempo\">
  <strong>1. Tiempo de carga de la p&aacute;gina</strong>: &nbsp;
  <div >Puntuaci&oacute;n:&nbsp; <br />

<table border=\"0\" cellspacing=\"2\" cellpadding=\"3\" class=\"tiempo\" >
<tr><td>Nota</td><td>Valoraci&oacute;n</td></tr>
<tr><td>1</td><td>".$user_obj->TPO_UNO."</td></tr>
<tr><td>2</td><td>".$user_obj->TPO_DOS."</td></tr>
<tr><td>3</td><td>".$user_obj->TPO_TRES."</td></tr>
<tr><td>4</td><td>".$user_obj->TPO_CUATRO."</td></tr>
<tr><td>5</td><td>".$user_obj->TPO_CINCO."</td></tr>
<tr><td>6</td><td>".$user_obj->TPO_SEIS."</td></tr>
</table>		
	</div>
</div>
	
<div class=\"facilidad\">
   <strong>2. Facilidad de acceso al Buz&oacute;n Ciudadano:</strong> &nbsp;
	<div>Puntuaci&oacute;n:&nbsp; <br />
	
<table border=\"0\" cellspacing=\"2\" cellpadding=\"3\" class=\"tiempo\" >
<tr><td>Nota</td><td>Valoraci&oacute;n</td></tr>
<tr><td>1</td><td>".$user_obj->FCL_UNO."</td></tr>
<tr><td>2</td><td>".$user_obj->FCL_DOS."</td></tr>
<tr><td>3</td><td>".$user_obj->FCL_TRES."</td></tr>
<tr><td>4</td><td>".$user_obj->FCL_CUATRO."</td></tr>
<tr><td>5</td><td>".$user_obj->FCL_CINCO."</td></tr>
<tr><td>6</td><td>".$user_obj->FCL_SEIS."</td></tr>
</table>
</div>
</div>
	
<div class=\"relacion\">
	<strong>3. En relaci&oacute;n a su consulta, reclamo o sugerencia:</strong> &nbsp;
	<div>Puntuaci&oacute;n:&nbsp; <br />
	
<table border=\"0\" cellspacing=\"2\" cellpadding=\"3\" class=\"tiempo\" >
<tr><td>Nota</td><td>Valoraci&oacute;n</td></tr>
<tr><td>1</td><td>".$user_obj->RLC_UNO."</td></tr>
<tr><td>2</td><td>".$user_obj->RLC_DOS."</td></tr>
<tr><td>3</td><td>".$user_obj->RLC_TRES."</td></tr>
<tr><td>4</td><td>".$user_obj->RLC_CUATRO."</td></tr>
<tr><td>5</td><td>".$user_obj->RLC_CINCO."</td></tr>
<tr><td>6</td><td>".$user_obj->RLC_SEIS."</td></tr>
</table>
	</div>
</div>

	
<div class=\"respuesta\">
  <strong>4. Tiempo de respuesta:</strong> &nbsp;
  <div>Puntuaci&oacute;n:&nbsp;<br />
  
<table border=\"0\" cellspacing=\"2\" cellpadding=\"3\" class=\"tiempo\" >
<tr><td>Nota</td><td>Valoraci&oacute;n</td></tr>
<tr><td>1</td><td>".$user_obj->RSP_UNO."</td></tr>
<tr><td>2</td><td>".$user_obj->RSP_DOS."</td></tr>
<tr><td>3</td><td>".$user_obj->RSP_TRES."</td></tr>
<tr><td>4</td><td>".$user_obj->RSP_CUATRO."</td></tr>
<tr><td>5</td><td>".$user_obj->RSP_CINCO."</td></tr>
<tr><td>6</td><td>".$user_obj->RSP_SEIS."</td></tr>
</table>
  
</div>
</div>

<div class=\"claridad\">
  <strong>5. Claridad de la Respuesta:</strong> 
  <div>Puntuaci&oacute;n:&nbsp; <br />

<table border=\"0\" cellspacing=\"2\" cellpadding=\"3\" class=\"tiempo\" >
<tr><td>Nota</td><td>Valoraci&oacute;n</td></tr>
<tr><td>1</td><td>".$user_obj->CLR_UNO."</td></tr>
<tr><td>2</td><td>".$user_obj->CLR_DOS."</td></tr>
<tr><td>3</td><td>".$user_obj->CLR_TRES."</td></tr>
<tr><td>4</td><td>".$user_obj->CLR_CUATRO."</td></tr>
<tr><td>5</td><td>".$user_obj->CLR_CINCO."</td></tr>
<tr><td>6</td><td>".$user_obj->CLR_SEIS."</td></tr>
</table>
  
  </div>
</div>

<div class=\"utilidad\">
  <strong>6. Utilidad de la respuesta:</strong>
  <div>Puntuaci&oacute;n:&nbsp; <br />

<table border=\"0\" cellspacing=\"2\" cellpadding=\"3\" class=\"tiempo\" >
<tr><td>Nota</td><td>Valoraci&oacute;n</td></tr>
<tr><td>1</td><td>".$user_obj->UTL_UNO."</td></tr>
<tr><td>2</td><td>".$user_obj->UTL_DOS."</td></tr>
<tr><td>3</td><td>".$user_obj->UTL_TRES."</td></tr>
<tr><td>4</td><td>".$user_obj->UTL_CUATRO."</td></tr>
<tr><td>5</td><td>".$user_obj->UTL_CINCO."</td></tr>
<tr><td>6</td><td>".$user_obj->UTL_SEIS."</td></tr>
</table>
  
  </div>
</div>

<div class=\"diseno\">
  <strong>7. Dise&ntilde;o y formato del buz&oacute;n:</strong>
  <div>Puntuaci&oacute;n:&nbsp;<br />

<table border=\"0\" cellspacing=\"2\" cellpadding=\"3\" class=\"tiempo\" >
<tr><td>Nota</td><td>Valoraci&oacute;n</td></tr>
<tr><td>1</td><td>".$user_obj->DSN_UNO."</td></tr>
<tr><td>2</td><td>".$user_obj->DSN_DOS."</td></tr>
<tr><td>3</td><td>".$user_obj->DSN_TRES."</td></tr>
<tr><td>4</td><td>".$user_obj->DSN_CUATRO."</td></tr>
<tr><td>5</td><td>".$user_obj->DSN_CINCO."</td></tr>
<tr><td>6</td><td>".$user_obj->DSN_SEIS."</td></tr>
</table>

  </div>
</div>
";

}

mysql_free_result($res); unset($user_obj);
mysql_close($link);

?>
									</div>
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
          <td></td>
        </tr>
      </table></td>
    <td width="1">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

  umask(0);
  include('../bd/conecta.php');
  $link = Conexion();
  $legal_require_php = "slkad98n32f";
  global $global_qk;
  $global_qk=0;
  require('detecta.php');


if($loginCorrecto ) {  
	@include("../lib/grbz-sesion.php");
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
           <td height="25"><table width="720" border="0" cellspacing="0" cellpadding="0">
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

<p class="texto-contenido">El Gobierno Regional de Coquimbo, desea conocer su percepci&oacute;n como usuario del Buz&oacute;n Ciudadano, disponible a trav&eacute;s de su p&aacute;gina web <strong>www.gorecoquimbo.cl</strong>, esto con el pr&oacute;posito que responda a los intereses informqativos de sus consultores, por lo que agradeceremos que nos ayude respondiendo a esta encuesta.</p>

<p class="texto-contenido">En los casos de valorar un aspecto tenga presente que la escala es de <strong>1</strong> a <strong>6</strong>, considerando <strong>6</strong> lo m&aacute;s satisfactorio y <strong>1</strong> lo menos.</p>

<p class="texto-contenido">Gracias por su colaboraci&oacute;n</p>

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
echo "
<form action=\"manda.php\" action=\"post\" name=\"formlist\" id=\"formlist\">

	<div class=\"tiempo\"><strong>1. Tiempo de carga de la p&aacute;gina</strong>: &nbsp;
	<div >
		Puntuaci&oacute;n:&nbsp;
		<select name=\"tiempo\" size=\"1\">
			<option value=\"1\">1</option>
			<option value=\"2\">2</option>
			<option value=\"3\">3</option>
			<option value=\"4\">4</option>
			<option value=\"5\" selected>5</option>
			<option value=\"6\">6</option>
		</select>
	</div>
	</div>
	
	<div class=\"facilidad\"><strong>2. Facilidad de acceso al Buz&oacute;n Ciudadano:</strong> &nbsp;
	<div>
	Puntuaci&oacute;n:&nbsp; <select name=\"facilidad\" size=\"1\">
	<option value=\"1\">1</option>
	<option value=\"2\">2</option>
	<option value=\"3\">3</option>
	<option value=\"4\">4</option>
	<option value=\"5\" selected>5</option>
	<option value=\"6\">6</option>
	</select>
	</div>
	</div>
	
	<div class=\"relacion\"><strong>3. En relaci&oacute;n a su consulta, reclamo o sugerencia:</strong> &nbsp;
	<div>
	<span style=\"text-align:right;\">Puntuaci&oacute;n:&nbsp; <select name=\"relacion\" size=\"1\">
	<option value=\"1\">1</option>
	<option value=\"2\">2</option>
	<option value=\"3\">3</option>
	<option value=\"4\">4</option>
	<option value=\"5\" selected>5</option>
	<option value=\"6\">6</option>
	</select></span>
	</div>
	</div>
	
	<div class=\"respuesta\"><strong>4. Tiempo de respuesta:</strong> &nbsp;
	<div>
	Puntuaci&oacute;n:&nbsp; <select name=\"respuesta\" size=\"1\">
	<option value=\"1\">1</option>
	<option value=\"2\">2</option>
	<option value=\"3\">3</option>
	<option value=\"4\">4</option>
	<option value=\"5\" selected>5</option>
	<option value=\"6\">6</option>
	</select>
	</div>
	</div>

	<div class=\"claridad\"><strong>5. Claridad de la Respuesta:</strong> 
	<div>
	Puntuaci&oacute;n:&nbsp; <select name=\"claridad\" size=\"1\">
	<option value=\"1\">1</option>
	<option value=\"2\">2</option>
	<option value=\"3\">3</option>
	<option value=\"4\">4</option>
	<option value=\"5\" selected>5</option>
	<option value=\"6\">6</option>
	</select>
	</div>
	</div>

	<div class=\"utilidad\"><strong>6. Utilidad de la respuesta:</strong>
	<div>
	Puntuaci&oacute;n:&nbsp; <select name=\"utilidad\" size=\"1\">
	<option value=\"1\">1</option>
	<option value=\"2\">2</option>
	<option value=\"3\">3</option>
	<option value=\"4\">4</option>
	<option value=\"5\" selected>5</option>
	<option value=\"6\">6</option>
	</select>
	</div>
	</div>

<div class=\"diseno\"><strong>7. Dise&ntilde;o y formato del buz&oacute;n:</strong>
<div>
	Puntuaci&oacute;n:&nbsp; <select name=\"diseno\" size=\"1\">
	<option value=\"1\">1</option>
	<option value=\"2\">2</option>
	<option value=\"3\">3</option>
	<option value=\"4\">4</option>
	<option value=\"5\" selected>5</option>
	<option value=\"6\">6</option>
	</select>
</div>
</div>

<div align=\"center\"><input type=\"submit\" class=\"btn\" name=\"emite\" value=\"Enviar Encuesta \" /></div>
</form>
";
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
<?php // FIN LoginCorrecto True
} else{
  // No se encuentra logeado el usuario
  header("Location: index.php");
} ?>
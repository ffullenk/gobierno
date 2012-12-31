<?php echo "<?xml version=\"1.0\"?".">"; ?>
<?php
include("cpanel/incluir/seteaConf.php");
include("cpanel/incluir/seteaBD.php");
include("cpanel/incluir/encripta.php");
$link = conectar(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>::. ONEMI COQUIMBO .::</title>
<meta http-equiv="Content-Type" content="text/html"/>
<script language="javascript" type="text/javascript">
	function setFocus() {
		document.loginForm.usrname.select();
		document.loginForm.usrname.focus();
	}
</script>
<script language="javaScript" type="text/javascript" src="cpanel/javas/jsforms.js"></script>
<link href="hojas/estilo.css" rel="stylesheet" type="text/css" />
</head>
<body onload="setFocus();">

<table width="960" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto;border: 1px solid #1D5785;">
   <tr valign="middle" align="center">
      <td style="background-color:#003867;" width="100"><img src="imagenes/logo_web.png" border="0" width="58" height="60" /></td>
	  <td style="background-color:#003867;"><img src="imagenes/titulo_web.png" border="0" width="500" height="70" align="middle" /></td>
   </tr> 
   <tr><td height="35"></td></tr>
   <tr>
      <td colspan="2" align="center">
	     
		 <form action="index2.php" method="post" name="loginForm">
	     <table border="0" cellspacing="0" cellpadding="0" id="TablaForm">
		 <tr><td colspan="2" align="center"><H2>INGRESO DE USUARIOS</H2></td></tr>
		 <tr><td colspan="2" height="15"></td></tr>
		 
		 <tr>
		    <td><label for="" class="inputlabel">Cuenta</label> &nbsp;</td>
			<td><input name="usrname" id="usrname" type="text" class="inputbox" size="15"   /></td>
		 </tr>
		 <tr>
		    <td><label for="" class="inputlabel">Contrase&ntilde;a</label> &nbsp;</td>
			<td><input name="pass" id="pass" type="password" class="inputbox" size="15" /></td>
		 </tr>
		 <tr>
		    <td><label for="" class="inputlabel">Ejercicio</label></td>
			<td>
			   <select name="ejercicio" id="ejercicio" size="1"  class="selectbox" >
				<option value="-">Seleccione Ejercicio...</option>
							   <?php
							      $qEjercicio = "SELECT IDEJERCICIO, NOMBREEJERCICIO FROM tb_ejercicios WHERE ESTADOEJERCICIO=\"A\"";
								  $rEjercicio = mysql_query($qEjercicio);
								  
								  while($ptrE=mysql_fetch_array($rEjercicio))
								  {
								     echo "<option value=\"".$ptrE['IDEJERCICIO']."\">".$ptrE['NOMBREEJERCICIO']."</option>";
								  }
							   ?>	 
			   </select>
			</td>
		 </tr>
		 <tr><td colspan="2" height="35"></td></tr>
		 <tr><td colspan="2"><input type="submit" name="submit" class="button" value="Ingresar" /></td></tr>
		 </table>
		 </form>
	  </td>
   </tr>
   <tr><td height="25"></td></tr>
</table>
</body>
</html>
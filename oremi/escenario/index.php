<?php echo "<?xml version=\"1.0\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <title>Proteger Coquimbo - JICA </title>
   <meta http-equiv="Content-Type" content="text/html"/>
<script language="javascript" type="text/javascript">
	function setFocus() {
		document.loginForm.usrname.select();
		document.loginForm.usrname.focus();
	}
</script>
<link href="estilos/escenario_login.css" rel="stylesheet" type="text/css" />
</head>
<body onload="setFocus();">
<div id="wrapper">
    <div id="header">
       <div id="mambo"><img src="images/header_text.gif" alt="Login"/></div>
  </div>
    <div id="ctr" align="center">
	   <div class="login">
          <div class="login-form">
		  <script language="javaScript" type="text/javascript" src="javas/jsforms.js"></script>
            <form action="index2.php" method="post" name="loginForm" id="loginForm">
			 <div class="form-block">
	        	<div class="inputlabel">Rut</div>
		    	<div> Ej: 12345678-K<br/><input name="usrname" type="text" class="inputbox" size="15"  onchange="Valida_Rut(this); return false" /></div>
	        	<div class="inputlabel">Contrase&ntilde;a</div>
		    	<div><input name="pass" type="password" class="inputbox" size="15" /></div>
	        	<div align="left">
	        	  <input type="submit" name="submit" class="button" value="Login" />
	        	</div>
			 </div>
			</form>			
    	 </div>
         <div class="login-text">
           <p><img src="images/atencion.gif" align="absmiddle"  /></p>
		   <p><b>Acceso Restringido</b></p>
           
			<p>Acceso autorizado para personal del Gobierno Regional de Coquimbo.</p>
			<p>Ingrese su nombre de usuario y contrase&ntilde;a para ingresar a este m&oacute;dulo.</p>
         </div>
		 <div class="clr"></div>
	</div>
   </div>
   <div id="break"></div>
   <noscript>Javascript Debe estar Habilitado para ver este sitio</noscript>
   <div class="footer" align="center">
      <div align="center">
      </div>
   </div>
</div>
</body>
</html>
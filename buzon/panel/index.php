<script language="JavaScript" type="text/javascript">
  function validar()
     {
	   if(ingreso.cuenta.value=="")
	     {
		   alert("Debe ingresar un nombre de usuario");
		   limpiarCuenta();		   
		 }
		else if(ingreso.passwo.value=="")
		 {
		   alert("Debe ingresar una contraseña");
		   limpiarpasswo();
		 }
		else ingreso.submit(); 		  
	 }
	
  function limpiarCuenta()
     {
	    ingreso.cuenta.value="";
		ingreso.cuenta.focus();
	 }
	 	 
  function limpiarpasswo()
     {
	    ingreso.passwo.value="";
		if(ingreso.cuenta.value=="")
		  {
			ingreso.cuenta.focus();
		  }
		else ingreso.passwo.focus();  	
	 }	 
	 
  function validarRetorno(valor)  
     {
	  if(valor==1)
	    {
	      alert("Ha ingresado un nombre de usuario o contraseña no validos")
		  limpiarUsuario();
		  limpiarContrasenia();
		 } 
	 }	 
  	 
     
</script>

		<html lang="es">
		   <head>
			 <title>Buzon Ciudadano :: Gobierno Regional de Coquimbo</title>

		   
<link href="css/rpanel.css" rel="stylesheet" type="text/css">
</head> 
		   <body onLoad="document.ingreso.cuenta.focus();">			
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<form name="ingreso" id="FMuestra" target="_parent" title="Control de acceso" action="login.php" method="post">							  			  
			  <table width="40%" border="0" align="center" cellpadding="1" cellspacing="1" bordercolor="#003399">
				<tr bordercolor="#FFFFFF"> 
				  <td colspan="4" align="center"><img src="../imagenes/rbuzon.jpg" width="350" height="100"></td>
				</tr>
				<tr bordercolor="#FFFFFF"> 
				  <td colspan="4">&nbsp;</td>
				</tr>
				<tr bordercolor="#FFFFFF" class="texto-contenido"> 
				  <td width="25%" align="left">&nbsp; </td>
				  <td width="25%" align="left" class="formlabel">Usuario</td>
				  <td width="25%" align="center"> <input name="cuenta" type="text" class="formtextfield" title="Ingrese su nombre de usuario." size="10" maxlength="25"/> 
				  </td>
				  <td width="25%" align="center">&nbsp;</td>
				</tr>
				<tr bordercolor="#FFFFFF" class="texto-contenido"> 
				  <td>&nbsp;</td>
				  <td class="formlabel">Contrase&ntilde;a</td>
				  <td align="center"> <input name="passwo" type="password" class="formtextfield" title="Ingrese su contraseña." size="10" maxlength="25"/> 
				  </td>
				  <td>&nbsp;</td>
				</tr>
				<tr bordercolor="#FFFFFF"> 
				  <td colspan="4" align="center">&nbsp;</td>
				</tr>
				<tr bordercolor="#FFFFFF"> 
				  <td align="center">&nbsp; </td>
				  <td align="center"> <input type="button" name="volver" title="Ingresar"  value="Ingresar"  onClick="javascript:validar();"   class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'"/> 
				  </td>
				  <td align="center"> <input type="reset" name="volver2" title="Borrar formulario"  value="  Borrar  "   class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'"/> 
				  </td>
				  <td align="center">&nbsp;</td>
				</tr>
			  </table>
				</form> 
		  </body>	  
		</html>
		
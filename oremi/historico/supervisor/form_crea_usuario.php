<?php
include("../incluir/seteaConf.php");
include("../incluir/pantalla.php");
oremiCab();
oremiLogeo();
oremiMenu(8);
oremiCentralTop();
oremiRutaTop();
?>
<div id="principal">
    <h1>Usuarios Registrados</h1>
	<p>Acciones: &nbsp; <a href="form_crea_usuario.php">Agregar [+]</a></p>
	<script language="javaScript" type="text/javascript" src="../javas/jsforms.js"></script>
	<form action="form_graba_usuario.php" name="usuario" id="usuario" method="post" onSubmit="chequea_form_ususario(); return false">
	   <table cellspacing="2" cellpadding="1" width="95%" align="center" style="border:1px solid #ffffff;">
	      <tr><th colspan="2">Formulario Crear Usuarios Operadores del Sistema</th></tr>
	      <tr><td align="right">Nombre:</td><td><input type="text" class="inputform" name="nombre" id="nombre"></td></tr>
		  <tr><td align="right">Email:</td><td><input type="text" class="inputform" name="email" id="email"></td></tr>
		  <tr><td align="right">R.u.t.:</td><td><input type="text" class="inputform" name="rut" id="rut" onchange="Valida_Rut(this); return false"> Ej: 12345678-K</td></tr>
		  <tr><td align="right">Clave:</td><td><input type="password" class="inputform" name="clave" id="clave"></td></tr>
		  <tr><td align="right">Reingrese Clave:</td><td><input type="password" class="inputform" name="reclave" id="reclave" ></td></tr>
		  <tr>
		     <td align="right">Tipo de Usuario:</td>
			 <td>
			    <select name="tipo" size="1">
				   <option value="-">Seleccione tipo de usuario..</option>
				   <option value="A">Administrador</option>
				   <option value="O">Operador</option>
				</select>
		      </td>
		   </tr>
		  <tr>
		     <td align="right">Estado de la Cuenta del Usuario:</td>
			 <td>
			    <select name="estado" size="1">
				   <option value="-">Seleccione estado de la cuenta..</option>
				   <option value="A">Activada</option>
				   <option value="D">Desactivada</option>
				</select>
		      </td>
		   </tr>
		   <tr><td colspan="2" align="center"><input type="submit" class="inputsubmit" value="Crear Cuenta Usuario" name="bcrea"></td></tr>
	   </table>
	</form>
<div>
<?php
oremiCentralPie();
oremiPie();
?>

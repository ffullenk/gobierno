<?php
 session_start();
 
 $userBackEnd = $_SESSION['userBackEnd'];
 $passBackEnd = $_SESSION['passBackEnd'];
 
 include("../incluir/seteaConf.php");
 include("../incluir/seteaBD.php");
 include("../incluir/encripta.php");
 $link = conectar();
 include("../incluir/seteaScr.php");
 include("../incluir/funciones.php");

 if(estaActivo($userBackEnd, $passBackEnd)) {
   oremiCab();
   oremiMenu(esUsuario($userBackEnd, $passBackEnd), 4);
   oremiColDer( esUsuario($userBackEnd, $passBackEnd), 4 );
?>
	<div id="colTwo">
		<div class="bg2">
			<h2><em>Mantenedor</em>: Usuarios del Sistema</h2>
			<p>Usuarios habilidatos para operar el Sistema.</p>
		
		    <h3>Formulario Agregar Usuarios Registrados para Operar el Sistema</h3>
		    <div class="bg1">
			    <p align="right"><a href="form_agregar_usuario.php" title="Agregar Usuarios del Sistema">Agregar Usuario</a></p>
				<script language="javaScript" type="text/javascript" src="../javas/jsforms.js"></script>
				<form action="form_grabar_usuario.php" method="post" name="usuario" id="usuario" onSubmit="chequea_form_ususario(); return false">
				<table border="0" cellspacing="2" cellpadding="3" width="90%" align="center" id="listaTabla">
                   <tr><th colspan="2">Formulario Crear Usuarios Operadores del Sistema</th></tr>
	               <tr><td align="right">Nombre:</td><td><input type="text" class="inputform" name="nombre" id="nombre"></td></tr>
		           <tr><td align="right">Email:</td><td><input type="text" class="inputform" name="email" id="email" onChange="validarEmail(this.form.email.value);"></td></tr>
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
							<option value="G">Publico en General</option>
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
		    </div>
		</div>

<?php
oremiPie();
} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";}
?>
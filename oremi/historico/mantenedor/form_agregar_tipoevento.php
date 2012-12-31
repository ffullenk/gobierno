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
			<h2><em>Mantenedor</em>: Tipo de Evento</h2>
			<p>Tipo de Evento.</p>
		
		    <h3>Formulario Agregar Registro de Tipo de Evento</h3>
		    <div class="bg1">
			    <p align="right"><a href="form_agregar_tipoevento.php" title="Agregar Registro de Otra Infraestructura">Agregar Registro de Tipos de Evento</a></p>
				<script language="javaScript" type="text/javascript" src="../javas/jsforms.js"></script>
				<form action="form_grabar_tipoevento.php" method="post" name="tipoevento" id="tipoevento" onSubmit="chequea_form_tipoevento(); return false">
				<table border="0" cellspacing="2" cellpadding="3" width="90%" align="center" id="listaTabla">
                   <tr><th colspan="2">Formulario Crear Registro de Tipos de Evento</th></tr>
	               <tr><td align="right">Nombre Tipo de Evento:</td><td><input type="text" class="inputform" name="tipoeventonombre" id="tipoeventonombre"></td></tr>
		           <tr>
		              <td align="right">Estado del Registro de Tipo de Evento:</td>
			          <td>
			             <select name="estado" size="1">
				            <option value="-">Seleccione estado de la cuenta..</option>
				            <option value="A">Activada</option>
				            <option value="D">Desactivada</option>
				         </select>
		              </td>
		           </tr>
		           <tr><td colspan="2" align="center"><input type="submit" class="inputsubmit" value="Crear Registro" name="bcrea"></td></tr>
				</table>
				</form>
		    </div>
		</div>

<?php
oremiPie();
} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";}
?>
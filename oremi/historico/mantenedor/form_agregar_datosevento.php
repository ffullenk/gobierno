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
			<h2><em>Mantenedor</em>: Datos del Tipo de Evento</h2>
			<p>Datos del Tipo de Evento.</p>
		
		    <h3>Formulario Agregar Registro de Datos del Tipo de Evento</h3>
		    <div class="bg1">
			    <p align="right"><a href="form_agregar_datosevento.php" title="Agregar Registro de Otra Infraestructura">Agregar Registro de Tipos de Evento</a></p>
				<script language="javaScript" type="text/javascript" src="../javas/jsforms.js"></script>
				<form action="form_grabar_datosevento.php" method="post" name="datosevento" id="datosevento" onSubmit="chequea_form_datosevento(); return false">
				<table border="0" cellspacing="2" cellpadding="3" width="90%" align="center" id="listaTabla">
                   <tr><th colspan="2">Formulario Crear Registro de Datos del Tipo de Evento</th></tr>
	               <tr><td align="right">Tipo de Evento:</td>
				       <td>
					      <?php
						    $qTipoEvento = "SELECT tpevento_id, tpevento FROM orm_tipoevento WHERE estado=\"A\"";
                            $rsTipoEvento = mysql_query($qTipoEvento);
							if(mysql_num_rows($rsTipoEvento) > 0 )
							{
							   echo "<select name=\"tipoevento\" id=\"tipoevento\" size=\"1\">
							            <option value=\"-\">Seleccione Tipo de Evento...</option>";
							   while($pTE = mysql_fetch_array($rsTipoEvento))
							   {
							      echo "<option value=\"".$pTE['tpevento_id']."\">".$pTE['tpevento']."</option>";
							   }
							   echo "</select>";
							}
						  ?>
					   </td>
				   </tr>
		           <tr><td align="right">Caract&eacute;ristica del Atributo:</td><td><input type="text" class="inputform" name="atributo" id="atributo"></td></tr>
				   <tr><td align="right">Tipo Unidad del Atributo:</td>
				       <td>
					      <?php
						    $qTipoUnidad = "SELECT tpunidad_id, tpunidad FROM orm_tipounidad WHERE estado=\"A\"";
                            $rsTipoUnidad = mysql_query($qTipoUnidad);
							if(mysql_num_rows($rsTipoUnidad) > 0 )
							{
							   echo "<select name=\"tipounidad\" id=\"tipounidad\" size=\"1\">
							            <option value=\"-\">Seleccione Tipo de Unidad...</option>";
							   while($pTU = mysql_fetch_array($rsTipoUnidad))
							   {
							      echo "<option value=\"".$pTU['tpunidad_id']."\">".$pTU['tpunidad']."</option>";
							   }
							   echo "</select>";
							}
						  ?>
					   </td>
				   </tr>
				   
				   <tr>
		              <td align="right">Estado del Registro de Datos del Tipo de Evento:</td>
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
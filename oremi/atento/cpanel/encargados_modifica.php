<?php
session_start();
 
 $userBackEnd = $_SESSION['userBackEnd'];
 $passBackEnd = $_SESSION['passBackEnd'];
 
 include("incluir/seteaConf.php");
 include("incluir/seteaBD.php");
 include("incluir/encripta.php");
 $link = conectar();
 include("incluir/seteaSCR.php");
 include("incluir/funciones.php");

 if(estaActivo($userBackEnd, $passBackEnd)) {
   
   TopPantalla();
   Menu();
?>
<!-- Lado Principal -->
		<td width="">
		   <table width="" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" >
		     <tr><th> m&oacute;dulo USUARIOS</th></tr>
			 <tr>
			    <td>
						<?php 
			   $id = $_GET['id'];
			   $buscaReg = "SELECT IDENCARGADO, IDCARGO, IDREGION,IDPROVINCIA,IDCOMUNA,IDCOBERTURA, TIPOCUENTA, NOMBRE, CUENTA, CLAVE, ESTADOENCARGADO FROM tb_encargados WHERE IDENCARGADO=\"$id\"";
               $query = mysql_query($buscaReg);
               if($query)
               {
                  $puntero = mysql_fetch_array($query);
                  $encargado_nombre = $puntero['NOMBRE'];
			      $encargado_cargo = $puntero['IDCARGO'];
				  $encargado_region = $puntero['IDREGION'];
			      $encargado_provincia = $puntero['IDPROVINCIA'];
			      $encargado_comuna = $puntero['IDCOMUNA'];
			      $encargado_cobertura = $puntero['IDCOBERTURA'];
			      $encargado_tipo = $puntero['TIPOCUENTA'];
			      $encargado_cuenta = $puntero['CUENTA'];
			      $encargado_clave = $puntero['CLAVE'];
			      $estado = $puntero['ESTADOENCARGADO'];
			  
			      $encpass = encrypt($encargado_clave,1);
			   }
			?>
				  <script language="javaScript" type="text/javascript" src="<?php echo _ntbkPathJAVAS_;?>jsforms.js"></script>
                  <script type="text/javascript" src="<?php echo _ntbkPathJAVAS_;?>paisciudad.js"></script>
				  <form action="encargados_actualizar.php" method="post" name="encargados" id="encargados" onSubmit="chequea_form_encargados(); return false">
                   <input type="hidden" name="id" value="<?php echo $id;?>" />
				   <input type="hidden" name="provincias" value="<?php echo $zona_provincia;?>" />
				   <input type="hidden" name="comunas" value="<?php echo $zona_comuna;?>" />
				   
				  <table width="" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff">
				      <tr><th colspan="2"> FORMULARIO ACTUALIZAR DETALLE ENCARGADOS</th></tr>
					  <tr>
					     <td>Nombre Colaborador:</td>
					     <td><input type="text" name="encargado_nombre" id="encargado_nombre" size="50" maxlength="50" value="<?php echo $encargado_nombre;?>" /></td>
					  </tr>
					  <tr>
		              <td align="right">Cargo:</td>
			          <td>
			             <select name="encargado_cargo" id="encargado_cargo" size="1">
						 <?php
						   $qCargo = "SELECT IDCARGO, CARGO FROM  tb_cargo WHERE ESTADOCARGO=\"A\"";
						   $rCargo = mysql_query($qCargo);
						   if(mysql_num_rows($rCargo) > 0 ) {
						      echo "<option value=\"-\">Seleccione Cargo...</option>";
						      while($pC = mysql_fetch_array($rCargo))
							  {
							    if($encargado_cargo==$pC['IDCARGO']) {
								  echo "<option value=\"".$pC['IDCARGO']."\" selected>".$pC['CARGO']."</option>";
								} else {
							      echo "<option value=\"".$pC['IDCARGO']."\">".$pC['CARGO']."</option>";
								}
                              }
						   }
						 ?>
						 </select>
		              </td>
		           </tr>
				   <tr>
					  <td>Regi&oacute;n:</td>
					     <td>
							<?php
							$qRegion = "SELECT idregion, region FROM region WHERE estadoregion=\"A\"";
                 $rsRegion = mysql_query($qRegion);
				 if(mysql_num_rows($rsRegion) > 0 )
				 {
					echo "<select name=\"regiones\" id=\"regiones\" size=\"1\" onChange=\"pc_cargaContenido(this.id)\">
					<option value=\"-\">Seleccione Region...</option>";
					while($pReg = mysql_fetch_array($rsRegion))
					{  
						if($encargado_region==$pReg['idregion']) {
						   echo "<option value=\"".$pReg['idregion']."\" selected>".htmlentities(mb_substr($pReg['region'],0,30))."</option>";
						} else {
						   echo "<option value=\"".$pReg['idregion']."\">".htmlentities(mb_substr($pReg['region'],0,30))."</option>";
						}
					}
					echo "</select>";
				 }
							?>
						 </td>
					  </tr>
					  <tr>
					    <td>Provincia:</td>
						<td><div><select disabled="disabled" name="provincias" id="provincias" ><option value="0"><?php echo NombreProvincia($encargado_provincia);?></option></select></div></td>
					  </tr>
					  <tr>
					    <td>Comuna:</td>
						<td><div><select disabled="disabled" name="comunas" id="comunas" ><option value="0"><?php echo NombreComuna($encargado_comuna);?></option></select></div></td>
					  </tr>
					  
				   <tr>
		              <td align="right">Cobertura:</td>
			          <td>
			             <select name="encargado_cobertura" size="1">
						 <?php
						   $qCobertura = "SELECT IDCOBERTURA, COBERTURA FROM  tb_cobertura WHERE ESTADOCOBERTURA=\"A\"";
						   $rCobertura = mysql_query($qCobertura);
						   if(mysql_num_rows($rCargo) > 0 ) {
						      echo "<option value=\"-\">Seleccione Cobertura...</option>";
						      while($pC = mysql_fetch_array($rCobertura))
							  {
							    if($encargado_cobertura==$pC['IDCOBERTURA']) {
							       echo "<option value=\"".$pC['IDCOBERTURA']."\" selected>".$pC['COBERTURA']."</option>";
								} else {
								   echo "<option value=\"".$pC['IDCOBERTURA']."\">".$pC['COBERTURA']."</option>";
								}
                              }
						   }
						 ?>
						 </select>
		              </td>
		           </tr>
				   <tr>
		              <td align="right">Tipo Cuenta:</td>
			          <td>
			             <select name="encargado_tipo" size="1">
				            <option value="-">Seleccione Tipo de Cuenta..</option>
				            <option value="S" <?php if($encargado_tipo=="S") { echo "selected";}?>>Administrador</option>
				            <option value="C" <?php if($encargado_tipo=="C") { echo "selected";}?>>Colaborador</option>
				         </select>
		              </td>
		           </tr>
				   
				   <tr>
					  <td>Nombre Cuenta:</td>
					  <td><input type="text" name="encargado_cuenta" id="encargado_cuenta" size="36" maxlength="16" value="<?php echo $encargado_cuenta;?>" /></td>
				   </tr>
				   
				   <tr>
					  <td>Contrase&ntilde;a:</td>
					  <td><input type="password" name="encargado_clave" id="encargado_clave" size="36" maxlength="36" value="<?php echo $encpass;?>" /></td>
				   </tr>
				   
				   <tr>
					  <td>Repita Contrase&ntilde;a:</td>
					  <td><input type="password" name="encargado_claveR" id="encargado_claveR" size="36" maxlength="36" value="<?php echo $encpass;?>" /></td>
				   </tr>				   
				   
					  <tr>
		              <td align="right">Estado del Cargo:</td>
			          <td>
			             <select name="estado" size="1">
				            <option value="-">Seleccione estado..</option>
				            <option value="A" <?php if($estado=="A") { echo "selected";}?>>Activada</option>
				            <option value="D" <?php if($estado=="D") { echo "selected";}?>>Desactivada</option>
				         </select>
		              </td>
		           </tr>
					  <tr><td colspan="2"><input type="submit" name="modificaencargado" value=" ACTUALIZAR DETALLE ENCARGADO   " /></td></tr>
				   </table>
				   </form>
				</td>
			 </tr>
		   </table>
		</td>
<?php
PiePantalla();
} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='index.php';</script>\n";}
?>

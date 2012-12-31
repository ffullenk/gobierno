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
		     <tr><th> m&oacute;dulo ZONAS - SUBZONAS</th></tr>
			 <tr>
			    <td>
				<?php 
			   $id = $_GET['id'];
			   $buscaReg = "SELECT IDZONAEJERCICIO,IDREGION,IDPROVINCIA,IDCOMUNA,NOMBREZONA, FECHACREACION, IDENCARGADO, IDEJERCICIO, IDCOLABORADOR,ESTADOZONA FROM tb_zonaejercicio WHERE IDZONAEJERCICIO=\"$id\"";
               $query = mysql_query($buscaReg);
               if($query)
               {
                  $puntero = mysql_fetch_array($query);
                  $zona_codigo = $puntero['IDZONAEJERCICIO'];
				  $zona_nombre = $puntero['NOMBREZONA'];
				  $zona_fecha = convertir_fecha($puntero['FECHACREACION']);
			      $zona_region = $puntero['IDREGION'];
			      $zona_provincia = $puntero['IDPROVINCIA'];
			      $zona_comuna = $puntero['IDCOMUNA'];
				  $zona_encargado = $puntero['IDENCARGADO'];
				  $zona_ejercicio = $puntero['IDEJERCICIO'];
				  $zona_colaborador = $puntero['IDCOLABORADOR'];
			      $estado = $puntero['ESTADOZONA'];		  
			   }
			?>
				  <script language="javaScript" type="text/javascript" src="<?php echo _ntbkPathJAVAS_;?>jsforms.js"></script>
                  <script type="text/javascript" src="<?php echo _ntbkPathJAVAS_;?>paisciudad.js"></script>
				  <form action="zona_actualizar.php" method="post" name="zona" id="zona" onSubmit="chequea_form_zona(); return false">
                   <input type="hidden" name="id" value="<?php echo $id;?>" />
				   <input type="hidden" name="provincias" value="<?php echo $zona_provincia;?>" />
				   <input type="hidden" name="comunas" value="<?php echo $zona_comuna;?>" />
				   
				  <table width="" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff">
				      <tr><th colspan="2"> FORMULARIO ACTUALIZAR DETALLE ZONA</th></tr>
					  
					  <tr>
					     <td>Asignaci&oacute;n de Nombre de Zona:</td>
					     <td><input type="text" name="zona_nombre" id="zona_nombre" size="50" maxlength="50" value="<?php echo $zona_nombre;?>" /></td>
					  </tr>
					  <tr>
					     <td>Asigna a Ejercicio:</td>
					     <td>
							<select name="zona_ejercicio" id="zona_ejercicio" size="1">
							   <option value="-">Seleccione Ejercicio...</option>
							   <?php
							      $qEjercicio = "SELECT IDEJERCICIO, NOMBREEJERCICIO FROM tb_ejercicios WHERE ESTADOEJERCICIO=\"A\"";
								  $rEjercicio = mysql_query($qEjercicio);
								  
								  while($ptrE=mysql_fetch_array($rEjercicio))
								  {
								     if($zona_ejercicio==$ptrE['IDEJERCICIO']) {
									      echo "<option value=\"".$ptrE['IDEJERCICIO']."\" selected>".$ptrE['NOMBREEJERCICIO']."</option>";
									 } else {
									      echo "<option value=\"".$ptrE['IDEJERCICIO']."\">".$ptrE['NOMBREEJERCICIO']."</option>";
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
						if($zona_region==$pReg['idregion']) {
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
						<td><div><select disabled="disabled" name="provincias" id="provincias" ><option value="0"><?php echo NombreProvincia($zona_provincia);?></option></select></div></td>
					  </tr>
					  <tr>
					    <td>Comuna:</td>
						<td><div><select disabled="disabled" name="comunas" id="comunas" ><option value="0"><?php echo NombreComuna($zona_comuna);?></option></select></div></td>
					  </tr>
					
					  <tr>
					     <td>Encargado de Zona:</td>
						 <td>
						    <select name="zona_encargado" id="zona_encargado" size="1" >
							   <?php
							   $qEncargado = "SELECT IDENCARGADO, NOMBRE FROM  tb_encargados WHERE ESTADOENCARGADO=\"A\"";
						       $rEncargado = mysql_query($qEncargado);
						       if(mysql_num_rows($rEncargado) > 0 ) {
						           echo "<option value=\"-\">Seleccione Encargado...</option>";
						           while($pE = mysql_fetch_array($rEncargado))
							       {
							          if($zona_encargado==$pE['IDENCARGADO']) {
									     echo "<option value=\"".$pE['IDENCARGADO']."\" selected>".$pE['NOMBRE']."</option>";
									  } else {
									     echo "<option value=\"".$pE['IDENCARGADO']."\">".$pE['NOMBRE']."</option>";
									  }
                                   }
						       }
							   ?>
							</select>
						 </td>
					  </tr>
					  <tr>
					     <td>Colaborador:</td>
						 <td>
						    <select name="zona_colaborador" id="zona_colaborador" size="1" >
							   <?php
							   $qColaborador = "SELECT IDCOLABORADOR, COLABORADOR FROM  tb_colaboradores WHERE ESTADOCOLABORADOR=\"A\"";
						       $rColaborador = mysql_query($qColaborador);
						       if(mysql_num_rows($rColaborador) > 0 ) {
						           echo "<option value=\"-\">Seleccione Colaborador...</option>";
						           while($pC = mysql_fetch_array($rColaborador))
							       {
							          if($zona_colaborador==$pC['IDCOLABORADOR']) {
									     echo "<option value=\"".$pC['IDCOLABORADOR']."\" selected>".$pC['COLABORADOR']."</option>";
									  } else {
									     echo "<option value=\"".$pC['IDCOLABORADOR']."\">".$pC['COLABORADOR']."</option>";
									  }
                                   }
						       }
							   ?>
							</select>
						 </td>
					  </tr>
					  
					  <tr>
		              <td align="right">Estado de la Zona:</td>
			          <td>
			             <select name="estado" size="1">
				            <option value="-">Seleccione estado..</option>
				            <option value="A" <?php if($estado=="A") { echo "selected";} ?>>Activada</option>
				            <option value="D" <?php if($estado=="D") { echo "selected";} ?>>Desactivada</option>
				         </select>
		              </td>
		           </tr>
					  <tr><td colspan="2"><input type="submit" name="modificazona" value=" ACTUALIZAR DETALLE ZONA EJERCICIO " /></td></tr>
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

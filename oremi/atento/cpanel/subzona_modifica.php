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
			   $buscaReg = "SELECT IDSUBZONAEJERCICIO, SZ.IDZONAEJERCICIO, IDEJERCICIO, NOMBRESUBZONA, SZ.FECHACREACION, ESTADOSUBZONA FROM tb_subzonaejercicio AS SZ, tb_zonaejercicio AS Z WHERE SZ.IDZONAEJERCICIO=Z.IDZONAEJERCICIO AND IDSUBZONAEJERCICIO=\"$id\"";
               $query = mysql_query($buscaReg);
               if($query)
               {
                  $puntero = mysql_fetch_array($query);
                  $subzona_codigo = $puntero['IDSUBZONAEJERCICIO'];
				  $subzona_nombre = $puntero['NOMBRESUBZONA'];
				  $ejercicio = $puntero['IDEJERCICIO'];
				  $zonas = $puntero['IDZONAEJERCICIO'];
				  $subzona_fecha = convertir_fecha($puntero['FECHACREACION']);
			      $estado = $puntero['ESTADOSUBZONA'];	  
			   }
			?>
				  <script language="javaScript" type="text/javascript" src="<?php echo _ntbkPathJAVAS_;?>jsforms.js"></script>
                  <script type="text/javascript" src="<?php echo _ntbkPathJAVAS_;?>zonassub.js"></script>
				  <form action="subzona_actualizar.php" method="post" name="subzona" id="subzona" onSubmit="chequea_form_subzona(); return false">
                   <input type="hidden" name="id" value="<?php echo $id;?>" />
				   <input type="hidden" name="ejercicio" value="<?php echo $ejercicio;?>" />
				   <input type="hidden" name="zonas" value="<?php echo $zonas;?>" />
				   
				  <table width="" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff">
				      <tr><th colspan="2"> FORMULARIO ACTUALIZAR DETALLE SUBZONA</th></tr>
					  
					  <tr>
					     <td>Asignaci&oacute;n de Nombre de SubZona:</td>
					     <td><input type="text" name="subzona_nombre" id="subzona_nombre" size="50" maxlength="50" value="<?php echo $subzona_nombre;?>" /></td>
					  </tr>
					  <tr>
					     <td>Asigna a Ejercicio:</td>
					     <td>
							<?php
							$qEjercicio = "SELECT IDEJERCICIO, NOMBREEJERCICIO FROM tb_ejercicios WHERE ESTADOEJERCICIO=\"A\"";
                            $rsEjercicio = mysql_query($qEjercicio);
				            if(mysql_num_rows($rsEjercicio) > 0 )
				            {
					           echo "<select name=\"ejercicio\" id=\"ejercicio\" size=\"1\" onChange=\"pc_cargaContenido(this.id)\">
					           <option value=\"-\">Seleccione Ejercicio...</option>";
					           while($pE = mysql_fetch_array($rsEjercicio))
					           {  
						           if($ejercicio==$pE['IDEJERCICIO']) { 
								      echo "<option value=\"".$pE['IDEJERCICIO']."\" selected>".htmlentities($pE['NOMBREEJERCICIO'])."</option>";
								   } else { 
								        echo "<option value=\"".$pE['IDEJERCICIO']."\">".htmlentities($pE['NOMBREEJERCICIO'])."</option>";
								   }
					           }
					           echo "</select>";
				            }
							?>
						 </td>
					  </tr>
					  <tr>
					    <td>Asigna a Zona:</td>
						<td><div><select disabled="disabled" name="zonas" id="zonas" ><option value="0"><?php echo NombreZona($zonas);?></option></select></div></td>
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
					  <tr><td colspan="2"><input type="submit" name="modificasubzona" value=" ACTUALIZAR DETALLE SUBZONA " /></td></tr>
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

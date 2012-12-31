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
				  <script language="javaScript" type="text/javascript" src="<?php echo _ntbkPathJAVAS_;?>jsforms.js"></script>
				  <script language="javaScript" type="text/javascript" src="<?php echo _ntbkPathJAVAS_;?>fecha.js"></script>
                  <script language="javaScript" type="text/javascript" src="<?php echo _ntbkPathJAVAS_;?>calendar1.js"></script>
                  <script type="text/javascript" src="<?php echo _ntbkPathJAVAS_;?>zonassub.js"></script>
				  <form action="subzona_grabar.php" method="post" name="subzona" id="subzona" enctype="multipart/form-data" onSubmit="chequea_form_subzona(); return false">

				  <table width="" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff">
				      <tr><th colspan="2"> FORMULARIO CREACION SUBZONAS</th></tr>
					  <tr>
					     <td>Asignaci&oacute;n de Nombre de SubZona:</td>
					     <td><input type="text" name="subzona_nombre" id="subzona_nombre" size="50" maxlength="50" /></td>
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
						           echo "<option value=\"".$pE['IDEJERCICIO']."\">".htmlentities($pE['NOMBREEJERCICIO'])."</option>";
					           }
					           echo "</select>";
				            }
							?>
						 </td>
					  </tr>
					  <tr>
					    <td>Asigna a Zona:</td>
						<td><div><select disabled="disabled" name="zonas" id="zonas" ><option value="0">Asignar a Zona...</option></select></div></td>
					  </tr>
	
					  <tr>
		              <td align="right">Estado de la SubZona:</td>
			          <td>
			             <select name="estado" size="1">
				            <option value="-">Seleccione estado..</option>
				            <option value="A">Activada</option>
				            <option value="D">Desactivada</option>
				         </select>
		              </td>
		           </tr>
					  <tr><td colspan="2"><input type="submit" name="creazona" value="CREAR ZONA" /></td></tr>
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

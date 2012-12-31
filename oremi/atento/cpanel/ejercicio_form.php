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
		     <tr><th> m&oacute;dulo EJERCICIO</th></tr>
			 <tr>
			    <td>
				  <script language="javaScript" type="text/javascript" src="<?php echo _ntbkPathJAVAS_;?>jsforms.js"></script>
				  <script language="javaScript" type="text/javascript" src="<?php echo _ntbkPathJAVAS_;?>fecha.js"></script>
                  <script language="javaScript" type="text/javascript" src="<?php echo _ntbkPathJAVAS_;?>calendar1.js"></script>
                  <form action="ejercicio_grabar.php" method="post" name="ejercicio" id="ejercicio" onSubmit="chequea_form_ejercicio(); return false">

				  <table width="" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff">
				      <tr><th colspan="2"> FORMULARIO CREACION DETALLE EJERCICIO</th></tr>
					  <tr>
					     <td>Asignaci&oacute;n de Nombre Para Ejercicio:</td>
					     <td><input type="text" name="ejercicio_nombre" id="ejercicio_nombre" size="50" maxlength="50" /></td>
					  </tr>
					  <tr>
					     <td>Fecha de Realizaci&oacute;n:</td>
						 <td><input type="text" name="fecha" size="10" maxlength="10" onChange="return ValidaFecha2(this.value);" /> &nbsp; <a href="javascript:cal1.popup();" ><img src="imagenes/cal.gif" width="20" height="21" border="0" title="Fecha Creacion" /></a> (dd-mm-aaa)</td>
					  </tr>
<script language="JavaScript">
<!-- //
var cal1 = new calendar1(document.forms['ejercicio'].elements['fecha']);
cal1.year_scroll=true;
cal1.time_comp=false;
//-->
</script>
					  
					  <tr>
					     <td>Hora Inicio:</td>
						 <td><input type="text" name="ejercicio_horainicio" id="ejercicio_horainicio" size="7" maxlength="5" /> &nbsp; (hh:mm)</td>
					  </tr>
					  <tr>
					     <td>Hora T&eacute;rmino:</td>
						 <td><input type="text" name="ejercicio_horatermino" id="ejercicio_horatermino" size="7" maxlength="5" /> &nbsp; (hh:mm)</td>
					  </tr>
					  <tr>
					     <td>Asignci&oacute;n de Cobertura:</td>
						 <td>
						    <select name="ejercicio_cobertura" id="ejercicio_cobertura" size="1" >
							   <?php
							   $qCobertura = "SELECT IDCOBERTURA, COBERTURA FROM  tb_cobertura WHERE ESTADOCOBERTURA=\"A\"";
						       $rCobertura = mysql_query($qCobertura);
						       if(mysql_num_rows($rCobertura) > 0 ) {
						           echo "<option value=\"-\">Seleccione Cobertura...</option>";
						           while($pC = mysql_fetch_array($rCobertura))
							       {
							          echo "<option value=\"".$pC['IDCOBERTURA']."\">".$pC['COBERTURA']."</option>";
                                   }
						       }
							   ?>
							</select>
						 </td>
					  </tr>
					  <tr>
					     <td>Organizador:</td>
						 <td>
						    <select name="ejercicio_organizador" id="ejercicio_organizador" size="1" >
						 <?php
							$qOrganizador = "SELECT IDORGANIZADOR, ORGANIZADOR FROM  tb_organizador WHERE ESTADOORGANIZADOR=\"A\"";
						    $rOrganizador = mysql_query($qOrganizador);
						    if(mysql_num_rows($rOrganizador) > 0 ) {
						      echo "<option value=\"-\">Seleccione Organizador...</option>";
						      while($pC = mysql_fetch_array($rOrganizador))
							  {
							    echo "<option value=\"".$pC['IDORGANIZADOR']."\">".$pC['ORGANIZADOR']."</option>";
                              }
						    }
						 ?>
						 </select>
						 </td>
					  </tr>
					  <tr>
		              <td align="right">Estado del Ejercicio:</td>
			          <td>
			             <select name="estado" size="1">
				            <option value="-">Seleccione estado..</option>
				            <option value="A">Activada</option>
				            <option value="D">Desactivada</option>
				         </select>
		              </td>
		           </tr>
					  <tr><td colspan="2"><input type="submit" name="creaejercicio" value=" CREAR EJERCICIO   " /></td></tr>
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

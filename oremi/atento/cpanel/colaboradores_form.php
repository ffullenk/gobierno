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
				  <script language="javaScript" type="text/javascript" src="<?php echo _ntbkPathJAVAS_;?>jsforms.js"></script>
                  <form action="colaboradores_grabar.php" method="post" name="colaboradores" id="colaboradores" onSubmit="chequea_form_colaboradores(); return false">

				  <table width="" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff">
				      <tr><th colspan="2"> FORMULARIO CREACION COLABORADORES</th></tr>
					  <tr>
					     <td>Nombre Colaborador:</td>
					     <td><input type="text" name="colaborador_nombre" id="colaborador_nombre" size="50" maxlength="50" /></td>
					  </tr>
					  
					  <tr>
		              <td align="right">Cargo:</td>
			          <td>
			             <select name="colaborador_cargo" size="1">
						 <?php
						   $qCargo = "SELECT IDCARGO, CARGO FROM  tb_cargo WHERE ESTADOCARGO=\"A\"";
						   $rCargo = mysql_query($qCargo);
						   if(mysql_num_rows($rCargo) > 0 ) {
						      echo "<option value=\"-\">Seleccione Cargo...</option>";
						      while($pC = mysql_fetch_array($rCargo))
							  {
							    echo "<option value=\"".$pC['IDCARGO']."\">".$pC['CARGO']."</option>";
                              }
						   }
						 ?>
						 </select>
		              </td>
		           </tr>
				   
					  <tr>
		              <td align="right">Estado del Cuenta:</td>
			          <td>
			             <select name="estado" size="1">
				            <option value="-">Seleccione estado..</option>
				            <option value="A">Activada</option>
				            <option value="D">Desactivada</option>
				         </select>
		              </td>
		           </tr>
					  <tr><td colspan="2"><input type="submit" name="creacolaborador" value=" CREAR COLABORADOR   " /></td></tr>
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

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
			   $buscaReg = "SELECT IDCOLABORADOR, COLABORADOR, IDCARGO, ESTADOCOLABORADOR FROM tb_colaboradores WHERE IDCOLABORADOR=\"$id\"";
               $query = mysql_query($buscaReg);
               if($query)
               {
                  $puntero = mysql_fetch_array($query);
                  $colaborador_nombre = $puntero['COLABORADOR'];
				  $colaborador_cargo = $puntero['IDCARGO'];
				  $estado = $puntero['ESTADOCOLABORADOR'];
			   }
			?>
				  <script language="javaScript" type="text/javascript" src="<?php echo _ntbkPathJAVAS_;?>jsforms.js"></script>
                  <form action="colaboradores_actualizar.php" method="post" name="colaboradores" id="colaboradores" onSubmit="chequea_form_colaboradores(); return false">
                   <input type="hidden" name="id" value="<?php echo $id;?>" />
				  <table width="" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff">
				      <tr><th colspan="2"> FORMULARIO ACTUALIZAR COLABORADORES</th></tr>
					  <tr>
					     <td>Nombre Colaborador:</td>
					     <td><input type="text" name="colaborador_nombre" id="colaborador_nombre" size="50" maxlength="50" value="<?php echo $colaborador_nombre;?>" /></td>
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
							    if($colaborador_cargo==$pC['IDCARGO']) {
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
		              <td align="right">Estado del Cargo:</td>
			          <td>
			             <select name="estado" size="1">
				            <option value="-">Seleccione estado..</option>
				            <option value="A" <?php if($estado=="A") { echo "selected";}?>>Activada</option>
				            <option value="D" <?php if($estado=="D") { echo "selected";}?>>Desactivada</option>
				         </select>
		              </td>
		           </tr>
					  <tr><td colspan="2"><input type="submit" name="modificacolaborador" value=" ACTUALIZAR COLABORADOR   " /></td></tr>
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

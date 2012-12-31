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
			   $buscaReg = "SELECT IDCARGO, CARGO, ESTADOCARGO FROM tb_cargo WHERE IDCARGO=\"$id\"";
               $query = mysql_query($buscaReg);
               if($query)
               {
                  $puntero = mysql_fetch_array($query);
                  $cargo = $puntero['CARGO'];
				  $estado = $puntero['ESTADOCARGO'];
			   }
			?>
				  <script language="javaScript" type="text/javascript" src="<?php echo _ntbkPathJAVAS_;?>jsforms.js"></script>
                  <form action="cargos_actualizar.php" method="post" name="cargos" id="cargos" onSubmit="chequea_form_cargos(); return false">
                   <input type="hidden" name="id" value="<?php echo $id;?>" />
				  <table width="" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff">
				      <tr><th colspan="2"> FORMULARIO ACTUALIZAR CARGO</th></tr>
					  <tr>
					     <td>Asignaci&oacute;n de Cargo:</td>
					     <td><input type="text" name="cargo" id="cargo" size="50" maxlength="50" value="<?php echo $cargo;?>" /></td>
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
					  <tr><td colspan="2"><input type="submit" name="modificacargo" value=" ACTUALIZAR CARGO   " /></td></tr>
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

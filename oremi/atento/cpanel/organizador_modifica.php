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
						<?php 
			   $id = $_GET['id'];
			   $buscaReg = "SELECT IDORGANIZADOR, ORGANIZADOR, ESTADOORGANIZADOR FROM tb_organizador WHERE IDORGANIZADOR=\"$id\"";
               $query = mysql_query($buscaReg);
               if($query)
               {
                  $puntero = mysql_fetch_array($query);
                  $organizador = $puntero['ORGANIZADOR'];
				  $estado = $puntero['ESTADOORGANIZADOR'];
			   }
			?>
				  <script language="javaScript" type="text/javascript" src="<?php echo _ntbkPathJAVAS_;?>jsforms.js"></script>
                  <form action="organizador_actualizar.php" method="post" name="organizador" id="organizador" onSubmit="chequea_form_organizador(); return false">
                   <input type="hidden" name="id" value="<?php echo $id;?>" />
				  <table width="" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff">
				      <tr><th colspan="2"> FORMULARIO CREACION COBERTURA</th></tr>
					  <tr>
					     <td>Asignaci&oacute;n de Organizador:</td>
					     <td><input type="text" name="organizador" id="organizador" size="50" maxlength="50" value="<?php echo $organizador;?>" /></td>
					  </tr>
					  <tr>
		              <td align="right">Estado del Organizador:</td>
			          <td>
			             <select name="estado" size="1">
				            <option value="-">Seleccione estado..</option>
				            <option value="A" <?php if($estado=="A") { echo "selected";}?>>Activada</option>
				            <option value="D" <?php if($estado=="D") { echo "selected";}?>>Desactivada</option>
				         </select>
		              </td>
		           </tr>
					  <tr><td colspan="2"><input type="submit" name="modificacobertura" value=" ACTUALIZAR COBERTURA   " /></td></tr>
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

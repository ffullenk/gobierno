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
			<h2><em>Mantenedor</em>: Otra Infraestructura</h2>
			<p>Otra Infraestructura.</p>
		    <?php 
			   $id = $HTTP_GET_VARS['id'];
			   $buscaReg = "SELECT otrainfra, estado FROM orm_otrainfra WHERE otrainfra_id=\"$id\"";
               $query = mysql_query($buscaReg);
               if($query)
               {
                  $puntero = mysql_fetch_array($query);
                  $nombre = $puntero['otrainfra'];
                  $estado = $puntero['estado'];
			   }
			?>
		    <h3>Formulario Modificar Registro de Otra Infraestructura</h3>
		    <div class="bg1">
			    <p align="right"><a href="form_agregar_infraotra.php" title="Agregar Registro de Otra Infraestructura">Agregar Registro de Otra Infraestructura</a></p>
				<script language="javaScript" type="text/javascript" src="../javas/jsforms.js"></script>
				<form action="form_actualizar_infraotra.php" method="post" name="infraotra" id="infraotra" onSubmit="chequea_form_infraotra(); return false">
				<input type="hidden" name="id" value="<?=$id?>">
				<table border="0" cellspacing="2" cellpadding="3" width="90%" align="center" id="listaTabla">
                   <tr><th colspan="2">Formulario Modificar Registro de Otra Infraestructura</th></tr>
	               <tr><td align="right">Nombre Infraestructura:</td><td><input type="text" class="inputform" value="<?=$nombre?>" name="nombre" id="nombre"></td></tr>
		           <tr>
		              <td align="right">Estado del Registro de Otra Infraestructura:</td>
			          <td>
			             <select name="estado" size="1">
				            <option value="-">Seleccione estado de la cuenta..</option>
				            <option value="A" <?php if($estado=="A") { echo "selected";}?>>Activada</option>
				            <option value="D" <?php if($estado=="D") { echo "selected";}?>>Desactivada</option>
				         </select>
		              </td>
		           </tr>
		           <tr><td colspan="2" align="center"><input type="submit" class="inputsubmit" value="Modificar Registro" name="bcrea"></td></tr>
				</table>
				</form>
		    </div>
		</div>

<?php
oremiPie();
} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";}
?>
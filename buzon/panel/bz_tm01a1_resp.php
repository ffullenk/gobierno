<?php
  /*header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

  umask(0);*/
  include('../bd/conecta.php');
  $link = Conexion();
  $legal_require_php = "bcrevalidate";
  global $global_qk;
  $global_qk=0;
  require('bc_detect.php');
  global $c;

if($loginCorrecto ) {  
	/*se incluyen los archivos*/
	@include("../lib/grbz-sesion.php");
	@include("../lib/bc_lib.php");
	@include("../lib/bc_correo.php");
	@include("../lib/global.php");
	@include("../lib/recordset.php");

?>
<html>
<head>
<title>Buzon Ciudadano :: Gobierno Regional de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/buzon.css" type="text/css" />
</head>

<body leftmargin="0" marginwidth="0" topmargin="0">
<table width="750" border="0" align="center" >
  <tr>
    <td><?php echo Cabecera();?></td>
  </tr>
</table>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellpadding="1" cellspacing="2">
        <tr>
          <td width="150" bgcolor="#CCCCCC">
            <?php 
			echo "Sesion " . ConoceNick($global_qk) .  "<br />";
			menu(TipoFuncionario($global_qk),$global_qk);?>
          </td>
          <td width="600" valign="top">
<div id="content"> 
              <h2 id="recent"><a href="bz_us01.php">Inicio</a> &raquo;&nbsp;M&oacute;dulo 
                Usuario Administrador</h2>
        <h1>&nbsp;</h1>
        <div style="border-bottom:1px dashed #CDD5A3;" align="right"> 
          <form id="formlist" name="f_agrega" method="post" action="bz_tm01a.php">
            <input type="submit" value="Agregar"class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
          </form>
        </div>
        <div id="agregaADM"> 
          <?php
				$nombre_tema   	= $_POST["nombre_tema"];
				$resp_email		= $_POST["resp_email"];

				$contador_error = 0;
				if($nombre_tema == '') { $errores[$contador_error++] = "Tema no debe ser vacío."; }
				if(count($resp_email) == 0 ) { $errores[$contador_error++] = "Debe Seleccionar Responsables para este Tema"; }

				if($contador_error>0) { 
					echo "Ingreso invalido de datos, los errores son los siguientes: ";  
					echo "\t\t<ul>\n";	
					for($i=0; $i<$contador_error; $i++)
					{
						echo "\t\t\t<li>",$errores[$i]."</li>\n";
					}
					echo "\t\t</ul>";
					echo "\n\n";
					echo('
						<div align="center"><input class="formbutton" name="atras" type="button" value="Volver" onClick="javascript:history.back();"></div>
					');
					/*$p->escribePie();		  */
					/*die();	*/
				} else {
					$rsTabla =new Recordset($SERVER, $DB, $USER, $PASSWORD);
					$rsTabla->FieldByInsert( "TEMA" , "'$nombre_tema'" ); 
					$error = $rsTabla->execInsert( "TEMAS" , 1);
					if ($error == true ) {
						/* Una vez ingresado el valor en TEMAS, accedemos a chequear cual es el ID del TEMA.
							y en conjunto con el ID del FUNCIONARIO, los añadimos en la TABLA RESPONDEEMAIL
						*/
						$rsBscTema = new Recordset($SERVER , $DB , $USER , $PASSWORD);
						$query = "SELECT COD_TEMA FROM TEMAS WHERE TEMA = '".$nombre_tema."';";
			
						$rsBscTema->Open($query);
						while($rsBscTema->moveNext())
				       {
							$cod_tema	= $rsBscTema->fieldByName("COD_TEMA");
					   }
						 
							/* Entonces, debemos crear la isntancia de asociar el tema con los emails
								seleccionados. */
								foreach($resp_email as $email){
									$rsAsoc =new Recordset($SERVER, $DB, $USER, $PASSWORD);
									$rsAsoc->FieldByInsert( "COD_FUNCIONARIO" , "'$email'" ); 
									$rsAsoc->FieldByInsert( "COD_TEMA" , "'$cod_tema'" ); 
									$error = $rsAsoc->execInsert( "QRESPONDE" , 1);
									if ($error == false ) {
											echo " ?Occurió un problema interno y no se ha podido almacenar la información.";
									}
								}
								echo "<p class='headerTitulo'> El Registro de Tema se ha ingresado en la Base de Datos en forma satisfactoriamente. </p>"; ?>
          <div align='center'> 
            <form action="home.php" target="_parent">
              <input class='formbutton' name='atras' type='submit' value=' Aceptar ' >
            </form>
          </div>
          <?php			} else {
						echo"<p  class='titulo_titulo'><img src='../imagenes/icosesionoff.gif' >&nbsp; Error al Registrar Tema.</p><br> ";
						echo"<p  class='headerTitulo'> Puede deberse a las siguientes causas:</p><br> ";
						echo"<table border='0' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' align='center'>";
						echo"<tr><td  class='cuerpo_descripcion'> <img src='../imagenes/awtema.gif' >&nbsp; El Tema ya está registrado.</td></tr> ";
						echo"<tr><td  class='cuerpo_descripcion'> <img src='../imagenes/awtema.gif' >&nbsp; Se ha perdido la conexión.</td></tr> ";
						echo"</table>";
						echo"<p>&nbsp;</p><p  class='main'> Revise sus datos y vuelva a intentar.</p> ";				
						echo "<div align='center'><input class='formbutton' name='atras' type='button' value='Volver' onClick='javascript:history.back();'></div>";
					} // ENDIF ERROR
				} 
				// ENDIF CONTADOR

		?>
        </div>
        <br />
        <div style="border-bottom:1px dashed #CDD5A3;">&nbsp;</div>
        <br />
      </div>		  
		  </td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#999999">
<?php echo PiePagina();?></td>
  </tr>
</table>
</body>
</html>
<?php // FIN LoginCorrecto True
} else{
  // No se encuentra logeado el usuario
  header("Location: index.php");
} ?>

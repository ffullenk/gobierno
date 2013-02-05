<?php
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

  umask(0);
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
<script language="JavaScript" src="../js/valida.js"></script>
<script language="JavaScript" src="../js/funciones.js"></script>
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
        <h1>Agregar Usuario Administrador</h1>
        <div style="border-bottom:1px dashed #CDD5A3;" align="right"> 
          <form id="formlist" name="f_agrega" method="post" action="bz_us01a.php">
            <?php echo "<input name=\"TiUs\" type=\"hidden\" value=\"1\"/>";?> 
            <input type="submit" value="Agregar"class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
          </form>
        </div>
        <div id="agregaADM">
          <?php
				$rut_persona         		= $_POST["rut_persona"];
				$nombres_persona     		= $_POST["nombres_persona"];
				$paterno_persona     		= $_POST["paterno_persona"];	  
				$materno_persona     		= $_POST["materno_persona"];	  
				$email_persona				= $_POST["email_persona"]; 
				$user_persona				= $_POST["user_persona"]; 
				$password_persona    		= $_POST["password_persona"];
				$confirmarpassword_persona	= $_POST["confirmarpassword_persona"]; 
				$tipo_funcionario 			= $_POST["TiUs"];

				$contador_error = 0;
				if($rut_persona == '') { $errores[$contador_error++] = "RUT no debe ser vacio."; }
				if($nombres_persona == '') { $errores[$contador_error++] = "Nombres no deben ser vacios."; }
				if($paterno_persona == '') { $errores[$contador_error++] = "Apellido Paterno no debe ser vacio.";}
				if($email_persona == '') { $errores[$contador_error++] = "Email no debe se vacio.";}
				if($user_persona == '') { $errores[$contador_error++] = "Debe ingresar un nombre de usuario distinto de vacio.";}
				if($password_persona == ''|| $confirmarpassword_persona=='') { $errores[$contador_error++] = "Debe ingresar un password distinto de vacio.";}
				if($password_persona != $confirmarpassword_persona) { $errores[$contador_error++] = "Debe confirmar su password.";}

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

					$password = crypt($password_persona,$user_persona);
					$rsTabla->FieldByInsert( "RUT" , "'$rut_persona'" ); 
					$rsTabla->FieldByInsert( "NOMBRES" , "'$nombres_persona'" ); 
					$rsTabla->FieldByInsert( "APPAT" , "'$paterno_persona'" ); 
					$rsTabla->FieldByInsert( "APMAT" , "'$materno_persona'" ); 
					$rsTabla->FieldByInsert( "EMAIL" , "'$email_persona'" ); 
					$rsTabla->FieldByInsert( "USER_FUNCIONARIO" , "'$user_persona'" );	
					$rsTabla->FieldByInsert( "PASS_FUNCIONARIO" , "'$password'" );
					$rsTabla->FieldByInsert( "TIPO_FUNCIONARIO" , "'$tipo_funcionario'" );
					$error = $rsTabla->execInsert( "FUNCIONARIO" , 1);
					
					/*El registro fue modificado corecctamente*/
					if ($error == true ) {
						echo "<p class='headerTitulo'> El Registro de usuario se ha realizado con �xito. </p>";
						echo "<p class='main'> El nombre de usuario y contrase�a ser�n enviado a su email.</p>";
		
						echo"<table border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' align='center'>
							<tr><td>
								<table>
									<tr><td class='formtitulo' colspan='2' align='center' >Registro de Usuario</td></tr>
									<tr><td class='formlabel'>Rut:</td><td class='formlabel'>".$_POST['rut_persona']."</td></tr>
									<tr><td class='formlabel'>Nombres:</td><td class='formlabel'>".$_POST['nombres_persona']."</td></tr>
									<tr><td class='formlabel'>Apellido Paterno:</td><td class='formlabel'>".$_POST['paterno_persona']."</td></tr>
									<tr><td class='formlabel'>Apellido Materno:</td><td class='formlabel'>".$_POST['materno_persona']."</td></tr>
									<tr><td class='formlabel'>Email:</td><td class='formlabel'> ".$_POST['email_persona']."</td></tr>
									<tr><td class='formlabel'>Nombre de Usuario:</td><td class='formlabel'> ".$_POST['user_persona']."</td></tr>
									<tr><td class='formlabel'>Contrase�a:</td><td class='formlabel'> ".$_POST['password_persona']."</td></tr>
								</table>
							</td></tr>";
		
							// Creamos un objeto correo y enviamos el mail a el destinatario.
							//$mail = new correo($email, $tupla["email_persona"], $asunto, $texto);

							$mensaje = "El equipo de desarrollo de Buz�n Ciudadano :: Gobierno Regional de Coquimbo \n";
							$mensaje.=" le da la bienvenida y le recuerda que como Usuario Administrador, usted podr� tener acceso a ";
							
							if($tipo_funcionario == 1 ) { 
								$mensaje.= "todos los m�dulos de administraci�n. \n\n"; }
							elseif($tipo_funcionario == 2 ) { $mensaje.= " responder los emails de acuerdo a la tem�tica y al m�dulo de consultas. \n\n"; }
							else { $mensaje.= " el m�dulo de consultas. \n\n";}
							
							$mensaje.= "Su nombre de usuario es:".$user_persona." \n";
							$mensaje.= "y su password es:".$password_persona."\n\n";
							$mensaje.=" Le saluda \n\n\n";
							$mensaje.=" Administrador Buz�n Ciudadano \n";

							$name="Buz�n Ciudadano :: Gobierno Regional de Coquimbo";
							$emailEmisor="ljimenez@gorecoquimbo.cl";			
							$asunto="Notificaci�n de Registro";
							
							$mail = new correo();
							$mail->setEmisor($name, $emailEmisor);
							$mail->putCorreo($email_persona, $asunto, $mensaje);
							$mail->sendCorreo();							
					echo"</table>"; 
					
					?>
          <div align='center'> 
            <form action="bc_us0<?php echo $TiUs;?>.php" target="_parent">
              <input class='formbutton' name='atras' type='submit' value='Volver Inicio' >
            </form>
          </div>
          <?php 	
					} else {
						echo"<p  class='titulo_titulo'><img src='../imagenes/icosesionoff.gif' >&nbsp; Error al Registrar al Usuario.</p><br> ";
						echo"<p  class='headerTitulo'> Puede deberse a las siguientes causas:</p><br> ";
						echo"<table border='0' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' align='center'>";
						echo"<tr><td  class='cuerpo_descripcion'> <img src='../imagenes/awtema.gif' >&nbsp; El Rut ya est� registrado.</td></tr> ";
						echo"<tr><td  class='cuerpo_descripcion'> <img src='../imagenes/awtema.gif' >&nbsp; El email ya existe.</td></tr> ";		
						echo"<tr><td  class='cuerpo_descripcion'> <img src='../imagenes/awtema.gif' >&nbsp; El nombre de usuario ya existe.</td></tr> ";		
						echo"<tr><td  class='cuerpo_descripcion'> <img src='../imagenes/awtema.gif' >&nbsp; Se ha perdido la conexi�n.</td></tr> ";
						echo"</table>";
						echo"<p>&nbsp;</p><p  class='main'> Revise sus datos y vuelva a intentar.</p> ";				
						echo "<div align='center'><input class='formbutton' name='atras' type='button' value='Volver' onClick='javascript:history.back();'></div>";
					} // ENDIF ERROR
					/*$p->escribePie();*/
				} // ENDIF CONTADOR
		?>
        </div>
        <br />
        <div style="border-bottom:1px dashed #CDD5A3;">&nbsp;</div>
        <br />
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
<?php echo PiePagina();?>
</td>
  </tr>
</table>
</body>
</html>
<?php // FIN LoginCorrecto True
} else{
  // No se encuentra logeado el usuario
  header("Location: index.php");
} ?>

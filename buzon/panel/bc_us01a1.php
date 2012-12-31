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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd" >
<html>
<head>
<title>Buzon Ciudadano :: Gobierno Regional de Coquimbo</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="css/buzon.css" type="text/css" />
<script language="JavaScript" src="../js/valida.js"></script>
<script language="JavaScript" src="../js/funciones.js"></script>
</head>
<body>
<div id="pagewidth" >
  	
  <div id="header" > Cabecera </div>
	<div id="wrapper" class="clearfix" > 
    	
    <div id="maincol" > 
      <!--  EMPIEZA: Listar Usuarios Administradores -->
      <div id="content"> 
        <h2 id="recent"><a href="bc_us01.php">Inicio</a> &raquo;&nbsp;M&oacute;dulo 
          Usuario Administrador</h2>
        <h1>Agregar Usuario Administrador</h1>
        <div style="border-bottom:1px dashed #CDD5A3;" align="right"> 
          <form id="formlist" name="f_agrega" method="post" action="bc_us01a.php">
            <input type="hidden" name="addtabla" value="<?php echo $Agrega;?>">
            <input type="hidden" name="mod" value="a">
            <input type="hidden" name="c" value="<?php echo $c;?>">
            <input type="submit" value="Agregar"class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
          </form>
        </div>
        <br />
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
						echo "<p class='headerTitulo'> El Registro de usuario se ha realizado con éxito. </p>";
						echo "<p class='main'> El nombre de usuario y contraseña serán enviado a su email.</p>";
		
						echo"<table border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' align='center'>
							<tr><td>
								<table>
									<tr><td class='formtitulo' colspan='2' align='center' >Registro de Usuario</td></tr>
									<tr><td class='formlabel'>Rut:</td><td class='formlabel'>".$HTTP_POST_VARS['rut_persona']."</td></tr>
									<tr><td class='formlabel'>Nombres:</td><td class='formlabel'>".$HTTP_POST_VARS['nombres_persona']."</td></tr>
									<tr><td class='formlabel'>Apellido Paterno:</td><td class='formlabel'>".$HTTP_POST_VARS['paterno_persona']."</td></tr>
									<tr><td class='formlabel'>Apellido Materno:</td><td class='formlabel'>".$HTTP_POST_VARS['materno_persona']."</td></tr>
									<tr><td class='formlabel'>Email:</td><td class='formlabel'> ".$HTTP_POST_VARS['email_persona']."</td></tr>
									<tr><td class='formlabel'>Nombre de Usuario:</td><td class='formlabel'> ".$HTTP_POST_VARS['user_persona']."</td></tr>
									<tr><td class='formlabel'>Contraseña:</td><td class='formlabel'> ".$HTTP_POST_VARS['password_persona']."</td></tr>
								</table>
							</td></tr>";
		
							// Creamos un objeto correo y enviamos el mail a el destinatario.
							//$mail = new correo($email, $tupla["email_persona"], $asunto, $texto);

							$mensaje = "El equipo de desarrollo de Buzón Ciudadano :: Gobierno Regional de Coquimbo \n";
							$mensaje.=" le da la bienvenida y le recuerda que como Usuario Administrador, usted podrá tener acceso a ";
							
							if($tipo_funcionario == 1 ) { 
								$mensaje.= "todos los módulos de administración. \n\n"; }
							elseif($tipo_funcionario == 2 ) { $mensaje.= " responder los emails de acuerdo a la temática y al módulo de consultas. \n\n"; }
							else { $mensaje.= " el módulo de consultas. \n\n";}
							
							$mensaje.= "Su nombre de usuario es:".$user_persona." \n";
							$mensaje.= "y su password es:".$password_persona."\n\n";
							$mensaje.=" Le saluda \n\n\n";
							$mensaje.=" Administrador Buzón Ciudadano \n";

							$name="Buzón Ciudadano :: Gobierno Regional de Coquimbo";
							$emailEmisor="webmaster@gorecoquimbo.cl";			
							$asunto="Notificación de Registro";
							
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
						echo"<tr><td  class='cuerpo_descripcion'> <img src='../imagenes/awtema.gif' >&nbsp; El Rut ya está registrado.</td></tr> ";
						echo"<tr><td  class='cuerpo_descripcion'> <img src='../imagenes/awtema.gif' >&nbsp; El email ya existe.</td></tr> ";		
						echo"<tr><td  class='cuerpo_descripcion'> <img src='../imagenes/awtema.gif' >&nbsp; El nombre de usuario ya existe.</td></tr> ";		
						echo"<tr><td  class='cuerpo_descripcion'> <img src='../imagenes/awtema.gif' >&nbsp; Se ha perdido la conexión.</td></tr> ";
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
      <!-- end #content -->
      <!--  FINALIZA: Listar Usuarios Administradores -->
    </div>
    	
    <div id="leftcol" > 
      <?php 
			echo "Sesion " . ConoceNick($global_qk) .  "<br />";
			menu(TipoFuncionario($global_qk),$global_qk);?>
    </div>
	</div>
	<div id="footer" >
		www.gorecoquimbo.gob.cl Servicio Administrativo Gobierno Regional de Coquimbo, Departamento de Informatica &copy; 2005 
	</div>
</div>
</body>

</html>
<?php // FIN LoginCorrecto True
} else{
  // No se encuentra logeado el usuario
  header("Location: index.php");
} ?>

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

				$contador_error = 0;
				if($rut_persona == '') { $errores[$contador_error++] = "RUT no debe ser vacio."; }
				if($nombres_persona == '') { $errores[$contador_error++] = "Nombres no deben ser vacios."; }
				if($paterno_persona == '') { $errores[$contador_error++] = "Apellido Paterno no debe ser vacio.";}
				if($email_persona == '') { $errores[$contador_error++] = "Email no debe se vacio.";}
				if($user_persona == '') { $errores[$contador_error++] = "Debe ingresar un nombre de usuario distinto de vacio.";}
				if($password_persona == ''|| $confirmarpassword_persona=='') { $errores[$contador_error++] = "Debe ingresar un password distinto de vacio.";}
				if($password_persona != $confirmarpassword_persona) { $errores[$contador_error++] = "Debe confirmar su password.";}

				if($contador_error>0) { 
					echo "Actualización invalida de datos, los errores son los siguientes: ";  
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
					$rsTabla->FieldByUpdate( "RUT" , "'$rut_persona'" ); 
					$rsTabla->FieldByUpdate( "NOMBRES" , "'$nombres_persona'" ); 
					$rsTabla->FieldByUpdate( "APPAT" , "'$paterno_persona'" ); 
					$rsTabla->FieldByUpdate( "APMAT" , "'$materno_persona'" ); 
					$rsTabla->FieldByUpdate( "EMAIL" , "'$email_persona'" ); 
					$rsTabla->FieldByUpdate( "USER_FUNCIONARIO" , "'$user_persona'" );	
					$rsTabla->FieldByUpdate( "PASS_FUNCIONARIO" , "'$password'" );
					
					$rsTabla->WhereByUpdate( "COD_FUNCIONARIO" , "$CodFunc" );
					$error = $rsTabla->execUpdate( "FUNCIONARIO" , 1);
					
					/*El registro fue modificado corecctamente*/
					if ($error == true ) {
						echo "<p class='headerTitulo'> La actualización de datos del usuario se ha realizado con éxito. </p>";
					} else {
						echo"<p>&nbsp;</p><p  class='main'> Revise sus datos y vuelva a intentar.</p> ";				
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
		www.gorecoquimbo.gob.cl: Servicio Administrativo Gobierno Regional de Coquimbo, Departamento de Informatica &copy; 2005 
	</div>
</div>
</body>

</html>
<?php // FIN LoginCorrecto True
} else{
  // No se encuentra logeado el usuario
  header("Location: index.php");
} ?>

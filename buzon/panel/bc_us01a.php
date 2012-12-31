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
	
	$TiUs = $_POST["TiUs"];

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
             <?php echo "<input name=\"TiUs\" type=\"hidden\" value=\"$TiUs\"/>";?> 
            <input type="submit" value="Agregar"class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
          </form>
        </div>
        <br />
        <div id="agregaADM"> 
          <?php 
				$rut_persona				= $_POST["rut_persona"];
				$nombres_persona			= $_POST["nombres_persona"];
				$paterno_persona			= $_POST["paterno_persona"];	  
				$materno_persona			= $_POST["materno_persona"];	  
				$email_persona				= $_POST["email_persona"]; 
				$user_persona				= $_POST["user_persona"]; 
				$password_persona			= $_POST["password_persona"];
				$confirmarpassword_persona	= $_POST["confirmarpassword_persona"];?>
          <TABLE WIDTH="100%" BORDER="0" CELLPADDING="0" CELLSPACING="0" BORDERCOLOR="#F1F1F1" MM_NOCONVERT="TRUE">
            <TR> 
              <TD align="center"> <FORM ACTION="bc_us01a1.php" METHOD="post" NAME="formulario" onSubmit="return vldformUsuario();">
					             <?php echo "<input name=\"TiUs\" type=\"hidden\" value=\"$TiUs\"/>";?> 
                  <TABLE WIDTH="90%" BORDER="1" CELLPADDING="0" cellspacing="0" bordercolor="#EEEEEE">
                    <TR class="cabecera_titulo"> 
                      <TD colspan="2">Datos Personles Funcionario</TD>
                    </TR>
                    <TR class="gris"> 
                      <TD>&nbsp;Rut</TD>
                      <TD width="70%"><input name="rut_persona" type="text" id="rut"  tabindex="1" value="<?php echo $rut_persona;?>" size="20" maxlength="12"> 
                        <span class="formAsterisco">ej. 15271321-k (*) </span></TD>
                    </TR>
                    <TR> 
                      <TD WIDTH="30%">&nbsp;Nombres</TD>
                      <TD><input name="nombres_persona"   type="text"   tabindex="2" value="<?php echo $nombres_persona;?>" title="Primer y segundo nombre" size="50" maxlength="25"> 
                        <span class="formAsterisco">(*)</span></TD>
                    </TR>
                    <TR class="gris"> 
                      <TD WIDTH="30%">&nbsp;Apellido Paterno</TD>
                      <TD > <INPUT NAME="paterno_persona"   TYPE="text"   TABINDEX="3" value="<?php echo $paterno_persona;?>" TITLE="Apellido paterno" size="50" MAXLENGTH="15"> 
                        <span class="formAsterisco">(*)</span></TD>
                    </TR>
                    <TR> 
                      <TD WIDTH="30%">&nbsp;Apellido Materno</TD>
                      <TD><input name="materno_persona"   type="text"   tabindex="4" value="<?php echo $materno_persona;?>" title="Apellido materno" size="50" maxlength="15"> 
                        <span class="formAsterisco">(*)</span></TD>
                    </TR>
                    <TR> 
                      <TD WIDTH="30%"  >&nbsp;Email</TD>
                      <TD > <input name="email_persona"   type="text" id="email"   tabindex="5" value="<?php echo $email_persona;?>" size="50" maxlength="100"> 
                        <span class="formAsterisco">(*)</span></TD>
                    </TR>
                    <TR class="gris"> 
                      <TD >&nbsp;</TD>
                      <TD>&nbsp;</TD>
                    </TR>
                    <TR class="cabecera_titulo"> 
                      <TD colspan="2"> &nbsp;Cuenta de usuario</TD>
                    </TR>
                    <TR> 
                      <TD  >&nbsp;Nombre de usuario</TD>
                      <TD ><input name="user_persona"  type="text"  tabindex="6" value="<?php echo $user_persona;?>" size="30" maxlength="25"> 
                        <span class="formAsterisco">(*)</span></TD>
                    </TR>
                    <TR class="gris"> 
                      <TD  >&nbsp;Contrase&ntilde;a</TD>
                      <TD> <input name="password_persona" type="password" tabindex="7" value="<?php echo $password_persona;?>" size="30" maxlength="25"> 
                        <span class="formAsterisco">(*)</span></TD>
                    </TR>
                    <TR> 
                      <TD  >&nbsp;Confirmar contrase&ntilde;a</TD>
                      <TD><input name="confirmarpassword_persona" type="password" tabindex="8" onBlur="" value="<?php echo $confirmarpassword_persona;?>"  size="30" maxlength="25"> 
                        <span class="formAsterisco">(*)</span></TD>
                    </TR>
                  </TABLE>
                  <div align="left"></div>
                  <br>
                  <span class="formAsterisco">(*) Datos obligatorios</span><br>
                  <input type="submit" name="enviar" title="Agregar datos del Funcionario" value=" Agregar " tabindex="9">
                  &nbsp; 
                  <input type="RESET"  name="limpiar" title="Restablecer formulario" value=" Limpiar "  tabindex="10">
                </FORM></TD>
            </TR>
          </TABLE></TD>
          </TR> </TABLE> </div>
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

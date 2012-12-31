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
        <h1>Actualizar Tema</h1>
        <div style="border-bottom:1px dashed #CDD5A3;" align="right"> 
          <form id="formlist" name="f_agrega" method="post" action="bc_tm01a.php">
            <input type="submit" value="Agregar"class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
          </form>
        </div>
        <br />
        <div id="agregaADM"> 
          <?php
				$nombre_tema   	= $_POST["nombre_tema"];
				$email_regist   = $_POST["rowSelector"];
				$email_nuevos	= $_POST["resp_email"];

				$contador_error = 0;
				if($nombre_tema == '') { $errores[$contador_error++] = "Tema no debe ser vacío."; }

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
					
				} else {
				/*echo "Cuanto elimino de los que ya estaban: ".count($email_regist);
				echo "<br />Cuantos agrego: ".count($email_nuevos);*/
				
					$rsTabla =new Recordset($SERVER, $DB, $USER, $PASSWORD);

					$rsTabla->FieldByUpdate( "TEMA" , "'$nombre_tema'" ); 
					$rsTabla->WhereByUpdate( "COD_TEMA" , "$CodTema" );
					$error = $rsTabla->execUpdate( "TEMAS" , 1);
					
					
					if ($error == true ) {
						if(count($email_regist) > 0 ) { 
							//elimino los emails que estaban registrados y han sido seleccionados
								foreach($email_regist as $email){
									$rsQrespE =new Recordset($SERVER, $DB, $USER, $PASSWORD);
									$error=$rsQrespE->Open( "DELETE FROM QRESPONDE WHERE COD_QRESP='".$email."'");
								}
						}
						if(count($email_nuevos) > 0 ) {
								foreach($email_nuevos as $nuevos){
									$rsAsoc =new Recordset($SERVER, $DB, $USER, $PASSWORD);
									$rsAsoc->FieldByInsert( "COD_FUNCIONARIO" , "'$nuevos'" ); 
									$rsAsoc->FieldByInsert( "COD_TEMA" , "'$CodTema'" ); 
									$error = $rsAsoc->execInsert( "QRESPONDE" , 1);
									if ($error == false ) {
											echo " Occurió un problema interno y no se ha podido almacenar la información.";
									}
								}
						}
						echo "<p class='headerTitulo'> La actualización de datos del Tema se ha realizado con éxito. </p>";
					} else {
						echo"<p>&nbsp;</p><p  class='main'> Revise sus datos y vuelva a intentar.</p> ";				
					} // ENDIF ERROR
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

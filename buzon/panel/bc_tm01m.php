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
			/* Leemos ID Tema que viene desde bc_tm01.php  */ 
		  	$CodTema = $_POST["id"];
			/* Verificamos contenido en CodTema  */
			if(isset($CodTema)) {
				$rsTabla = new Recordset($SERVER , $DB , $USER , $PASSWORD);
				$query = "SELECT TEMA 
							FROM TEMAS 
							WHERE COD_TEMA = '" . $CodTema . "';";
			
				$rsTabla->Open($query);
				if($rsTabla->RecordCount()>0)
				{
					$rsTabla->moveNext();
					$nombre_tema	= $rsTabla->fieldByName("TEMA");
				} ?>
          <TABLE WIDTH="100%" BORDER="0" CELLPADDING="0" CELLSPACING="0" BORDERCOLOR="#F1F1F1" MM_NOCONVERT="TRUE">
            <TR> 
              <TD align="center"> <FORM ACTION="bc_tm01m1.php" METHOD="post" NAME="formulario" onSubmit="return vldformTema();">
                  <?php echo "<input name=\"CodTema\" type=\"hidden\" value=\"".$CodTema."\"/>";?> 
                  <TABLE WIDTH="90%" BORDER="1" CELLPADDING="0" cellspacing="0" bordercolor="#EEEEEE">
                    <TR class="cabecera_titulo"><TD colspan="2">Detalle de Tema</TD></TR>
                    <TR class="gris">
						<TD>&nbsp;Tema</TD>
						<TD width="70%"><input name="nombre_tema" type="text" tabindex="1" value="<?php echo $nombre_tema;?>" size="50" maxlength="128"> 
                        <span class="formAsterisco">(*) </span></TD>
                    </TR>
                  </TABLE>
				  <BR />
					<?php	/*	Seleccionamos los emails de los funcionarios que pueden contestar
								de acuerdo al tema.	*/
					$rsQresp = new Recordset($SERVER , $DB , $USER , $PASSWORD);
					$qQresp = "SELECT COD_QRESP, concat(NOMBRES, ' ', APPAT, ' ', APMAT) as funcionario 
							FROM QRESPONDE AS Q, FUNCIONARIO AS F 
							WHERE Q.COD_FUNCIONARIO = F.COD_FUNCIONARIO AND 
							COD_TEMA = '".$CodTema."';";
			
					$rsQresp->Open($qQresp);	
					if($rsQresp->Recordcount() > 0 ) {?>
                  <TABLE WIDTH="90%" BORDER="1" CELLPADDING="0" cellspacing="0" bordercolor="#EEEEEE">
                    <TR class="cabecera_titulo"><TD>Eliminar</TD><TD >Responsables Registrados a Responder para Este Tema</TD></TR>
					<?php while($rsQresp->moveNext()) { 
					// ?>

					<TR >
						<TD><?php echo "<input type='checkbox' name='rowSelector[]' value='".$rsQresp->FieldByNumber(0)."'>" ;?></TD>
						<TD><?php echo $rsQresp->fieldByName("funcionario");?></TD>
					</TR>
					<?php } ?>
					</TABLE><?php } ?>
					<BR />
<BR />
                  <TABLE WIDTH="90%" BORDER="1" CELLPADDING="0" cellspacing="0" bordercolor="#EEEEEE">
                    <TR class="cabecera_titulo"> 
                      <TD >Selecci&oacute;n de Funcionario Responsables para Responder 
                        Emails</TD>
                    </TR>
                    <TR> 
                      <TD> <select multiple name="resp_email[]" class="formlist" tabindex="3">
                          <?php
							//function llenarCombo( $query , $nombreCombo , $style = "" , $seleccion = "",$url="" )
							//$rsTabla->llenarCombo("SELECT COD_FUNCIONARIO,concat(NOMBRES,' ',APPAT,' ',APMAT) FROM FUNCIONARIO ORDER BY APPAT ASC","responsables", "formlist",$cod_funcionario,"index.php","6","principal");			   						
	
							$rsTabla = new Recordset($SERVER , $DB , $USER , $PASSWORD);
							$rsTabla->Open("SELECT  p.COD_FUNCIONARIO, concat(NOMBRES,' ',APPAT,' ',APMAT)
											FROM FUNCIONARIO p 
											LEFT  JOIN QRESPONDE d 
											ON ( p.COD_FUNCIONARIO = d.COD_FUNCIONARIO AND 
											d.COD_TEMA = '".$CodTema."')  
											WHERE d.COD_FUNCIONARIO IS  NULL ");
							//SELECT COD_FUNCIONARIO,concat(NOMBRES,' ',APPAT,' ',APMAT) FROM FUNCIONARIO ORDER BY APPAT ASC");
							for ($i = 0 ; $i < $rsTabla->RecordCount() ; $i++)
							{
								$rsTabla->moveNext();
								echo"<option value='".$rsTabla->FieldByNumber(0)."'>";
								echo  $rsTabla->FieldByNumber(1) ;
								echo"</option>"; 
							}?>
                        </select> <span class="formAsterisco">(*)</span></TD>
                    </TR>
                    <TR class="gris"> 
                      <TD>Utilice la tecla Control (Ctrl) para seleccionar m&aacute;s 
                        de uno.</TD>
                  </TABLE>
					<div align="left"></div>
					<BR />
					<span class="formAsterisco">(*) Datos obligatorios</span><br>
						<input type="submit" name="enviar" title="Actualizar datos del Tema" value=" Actualizar " tabindex="9">
						&nbsp; 
						<input type="RESET"  name="limpiar" title="Restablecer formulario" value=" Limpiar "  tabindex="10">
				</FORM>
			</TD>
            </TR>
          </TD>
          </TR> </TABLE> 
          <?php   } //ENDIF CODFUNC ?>
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

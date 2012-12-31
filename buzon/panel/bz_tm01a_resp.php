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
          <?php $nombre_tema	= $_POST["TEMA"]; ?>
          <TABLE WIDTH="100%" BORDER="0" CELLPADDING="0" CELLSPACING="0" BORDERCOLOR="#F1F1F1" MM_NOCONVERT="TRUE">
            <TR> 
              <TD align="center"> <FORM ACTION="bz_tm01a1.php" METHOD="post" NAME="formulario" onSubmit="return vldformTema();">
                  <TABLE WIDTH="90%" BORDER="1" CELLPADDING="0" cellspacing="0" bordercolor="#EEEEEE">
                    <TR class="cabecera_titulo"> 
                      <TD colspan="2">Formulario de Ingreso de Temas</TD>
                    </TR>
                    <TR> 
                      <TD WIDTH="30%">&nbsp;Tema</TD>
                      <TD><input name="nombre_tema"   type="text"   tabindex="1" value="<?php echo $nombre_tema;?>" title=" Nueva Temática a incluir" size="50" maxlength="128"> 
                        <span class="formAsterisco">(*)</span></TD>
                    </TR>
                  </TABLE>
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
							$rsTabla->Open("SELECT COD_FUNCIONARIO,concat(NOMBRES,' ',APPAT,' ',APMAT) FROM FUNCIONARIO ORDER BY APPAT ASC");
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
                  <br>
                  <span class="formAsterisco">(*) Datos obligatorios</span><br>
                  <input type="submit" name="enviar" title="Agregar Nuevo Tema" value=" Agregar " tabindex="9">
                  &nbsp; 
                  <input type="RESET"  name="limpiar" title="Restablecer formulario" value=" Limpiar "  tabindex="10">
                </FORM></TD>
            </TR>
          </TABLE>
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

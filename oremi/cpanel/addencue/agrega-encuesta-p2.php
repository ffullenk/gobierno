<?php
	@include("../config/config.php");
	@include("../../lib/gr-lib.php");
	@include("../utiles/utiles.php");

	global $SERVER, $DB, $USER, $PASSWORD;
	@include("../../lib/global.php");
	@include("../../lib/recordset.php");
/*  umask(0);*/
  $legal_require_php = "r3v15ta";
  global $global_qk;
  $global_qk=0;
  require('../detect.php');

if($loginCorrecto ) { 
  sSuperior(); 
  sRuta("TA"); ?>
<Script language="JavaScript" src="../js/valida.js" type="text/javascript"></Script>
<Script language="JavaScript" src="../js/funciones.js" type="text/javascript"></Script>
              <tr>
                <td>
					<Table border="0" cellpadding="0" cellspacing="0" width="98%">
					  <Tr>
					    <Td class="texto-contenido">
				<form action="grabar-encuesta.php" method="post" name="formulario" id="formlist">
				<input type="hidden" name="titulo_encuesta" value="<?php echo $titulo_encuesta;?>">
				<input type="hidden" name="nro_preguntas" value="<?php echo $nro_preguntas;?>">
				<input type="hidden" name="desde" value="<?php echo $desde;?>">
				<input type="hidden" name="hasta" value="<?php echo $hasta;?>">
				<TABLE WIDTH="90%" BORDER="0" CELLPADDING="1" cellspacing="2" bordercolor="#EEEEEE" align="center">
				<TR class="titulo-tabla">
					<Th > &nbsp;<strong>Formulario Ingreso Detalle de Encuesta [Paso 2 de 2]</strong></Th></TR>
				<TR class="texto-tablas"><TD>&nbsp;Preguntas</TD></Tr>
				<?php
				for($nroP=1; $nroP <= $nro_preguntas; $nroP++) { ?>
					<Tr><TD class="texto-contenido" >
								<input name="preg<?php echo $nroP;?>" type="text" size="50" maxlength="250"> 
								<span class="formAsterisco">(*)</span></TD></Tr>
					<TR><TD class="texto-contenido">&nbsp;</TD></TR>
				<?php
				} ?>
				
				</TABLE>
				<div align="center">
					<span  class="formAsterisco">(*) Datos obligatorios</span><br><Br />
					<input type="submit" name="enviar" title="Grabar Datos para Encuesta" value=" Guardar " class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
					&nbsp; 
					<input type="reset"  name="limpiar" title="Restablecer formulario" value=" Limpiar " class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
				</div>
				</FORM>
						</Td>
					  </Tr>
					 </Table>
				</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
<?php
  sSesionActual($global_qk); 
  sModulos($global_qk);
  sPie();
} else {
//No se ha logeado.
	errorConexionGRPanel();
}?>
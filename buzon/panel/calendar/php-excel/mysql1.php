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
	@include("rfunciones.php");
	@include("../lib/grbz-sesion.php");
	@include("../lib/global.php");
	@include("../lib/recordset.php");
?>
<html>
<head>
<title>Panel de Respuestas - Buz&oacute;n Ciudadano :: Gobierno Regional de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/rpanel.css" rel="stylesheet" type="text/css">
<script language="javaScript" src="../js/calendar1.js"></script>
<script language="javaScript" src="../js/fecha.js"></script>
<style media="screen" type="text/css">
.resultados {
font:11px normal "Trebuchet MS", Arial, Verdana; color:#003366; background-color:#D5EABF; }
.resultadosV {
font:14px bold "Trebuchet MS", Arial, Verdana; color:#000; background-color:#E7F3DA; text-align:center;}
</style>
</head>

<body style="margin:0px 0px;padding:0px;">
<table width="722" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="1">&nbsp;</td>
    <td width="720">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
		  	<?php
				CabeceraRPagina();
				LineaComando();
			?>
		  </td>
        </tr>
        <tr>
           <td height="25"><table width="720" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="160" valign="top">
					    <!-- Menu Principal -->
						<?php MenuRPagina(TipoFuncionario($global_qk)); ?>
						<!-- Menu Principal -->
					  </td>
                      <td width="560" valign="top">
					    <!-- Seccion Central -->
					  	<table width="98%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="textoRuta"><?php Ruta("G");?></td>
                          </tr>
						  <tr><td height="15"></td></tr>
                          <tr>
                            <td>
							<!-- Parte  Central de la Pagina-->
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
									<div id="maincol" >
										<h1>Cuantas Preguntas se Respondieron en a lo menos m&aacute;s de cuatro d&iacute;as</h1>
									    <div align="right">
											<!-- no hay agregar -->
										</div>
									</div><!-- FIN MAINCOL -->
									<div id="paginacion">
										<div style="border-bottom:1px dashed #555E77;" align="right">&nbsp;</div>
										<!-- INICIO: Paginacion -->
										<table width="550" border="0" align="center">
										  <form method="post" id="formulario" name="formulario">
										  <tr><td colspan="2" style="font:14px bold 'Trebuchet MS', Arial, Verdana; color:#000033;">Seleccione el Rango de Fechas</td></tr>
										  <tr><td colspan="2" align="center">
										  		<table style="border:1px solid #996600; margin:0;padding:5px;color:#003366; background:#99CC66; font:12px bold Verdana, Arial, Helvetica, sans-serif;">
										  <tr><td>Entre el : </td>
										      <td><input type=text name="desde" class=lic size="12" maxlength="10" onChange="return ValidaFecha2(this.value);">&nbsp;
				<a href="javascript:cal1.popup();"><img src="../imagenes/cal.gif" width="16" height="16" border="0" alt="Fecha"></a>&nbsp;<font size="-3">formato (dd-mm-aaaa)</font>
<script language="JavaScript">
<!-- // 
	var cal1 = new calendar1(document.forms['formulario'].elements['desde']);
	cal1.year_scroll = true;
	cal1.time_comp = false;
//-->
</script>
</td></tr>
										  <tr><td>Hasta el : </td><td><input type=text name="hasta" class=lic size="12" maxlength="10" onChange="return ValidaFecha2(this.value);">&nbsp;
				<a href="javascript:cal2.popup();"><img src="../imagenes/cal.gif" width="16" height="16" border="0" alt="Fecha"></a>&nbsp;<font size="-3">formato (dd-mm-aaaa)</font>
<script language="JavaScript">
<!-- // 
	var cal2 = new calendar1(document.forms['formulario'].elements['hasta']);
	cal2.year_scroll = true;
	cal2.time_comp = false;
//-->
</script>
</td></tr>
												
												</table>
										  </td></tr>
										  <tr><td colspan="2" height="5"></td></tr>
										  <tr><td colspan="2" align="center"><input type="submit" name="indicador" value="Ver Estad&iacute;sticas"></td></tr>
										  <tr><td colspan="2" height="15"></td></tr>

</form>										
<?php
if(isset($indicador) && ( !empty($desde) || !empty($hasta) ) ) {
  // >>>>>  <<<<<
  $desde = $_POST["desde"];
  $hasta = $_POST["hasta"];
  $fechaD_ = split("-", $desde );
  $fechaD = $fechaD_[2] . "-" . $fechaD_[1] . "-" . $fechaD_[0];
  $fechaH_ = split("-", $hasta );
  $fechaH = $fechaH_[2] . "-" . $fechaH_[1] . "-" . $fechaH_[0];


$conEmp = mysql_connect("localhost","grbc_coqbo","g0r3citzen");
mysql_select_db("grbuzon", $conEmp);
$queEmp = "SELECT BITACORA_C.COD_BITC AS CODIGO_CONSULTA, TIPO.TIPO,TEMAS.TEMA,PERSONA.NOMBRES AS Nombre_Usuario, PERSONA.PATERNO AS App_Usuario, PERSONA.EMAIL AS Email_Usuario, BITACORA_C.FECHA as Fecha_Consulta, FUNCIONARIO.NOMBRES AS Nombre_Funcionario, FUNCIONARIO.APPAT AS App_Funcionario, BITACORA_R.FECHA AS Fecha_Respuesta
FROM BITACORA_C, BITACORA_R, FUNCIONARIO, PERSONA,TEMAS, TIPO
WHERE BITACORA_C.COD_BITC = BITACORA_R.COD_BITC
AND BITACORA_R.COD_FUNCIONARIO = FUNCIONARIO.COD_FUNCIONARIO
AND BITACORA_C.COD_PERS = PERSONA.COD_PERS
AND BITACORA_C.COD_TIPO = TIPO.COD_TIPO
AND BITACORA_C.COD_TEMA =TEMAS.COD_TEMA
AND DATE( C.FECHA ) BETWEEN '$fechaD' AND '$fechaH'";
$resEmp = mysql_query($queEmp, $conEmp) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);
// Creamos el array con los datos
while($datatmp = mysql_fetch_assoc($resEmp)) { 
    $data[] = $datatmp; 
}
// Generamos el Excel  
createExcel("excel-mysql.xls", $data);
exit; ?>
  
  
  
 



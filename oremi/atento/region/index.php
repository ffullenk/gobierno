<?php
session_start();
 
 $userBackEnd = $_SESSION['userBackEnd'];
 $passBackEnd = $_SESSION['passBackEnd'];
 
 $ejerBackEnd = $_SESSION['ejerBackEnd'];
 $tipoCargoBackEnd = $_SESSION['tipoCargoBackEnd'];
 $tipoCoberturaBackEnd = $_SESSION['tipoCoberturaBackEnd'];
 
 include("../cpanel/incluir/seteaConf.php");
 include("../cpanel/incluir/seteaBD.php");
 include("../cpanel/incluir/encripta.php");
 $link = conectar();

 include("../cpanel/incluir/funciones.php");

 if(estaActivo($userBackEnd, $passBackEnd)) {
    $idEncargado = idUsuario($userBackEnd,$passBackEnd);
    // Busca en Tabla ZONAEJERCICIO 
	$qZona = "SELECT IDREGION,IDPROVINCIA,IDCOMUNA,IDENCARGADO ".
	         " FROM tb_encargados ".
			 " WHERE ".
			 " IDENCARGADO='".$idEncargado."'";
	$rZona = mysql_query($qZona);
	if(mysql_num_rows($rZona) > 0 )
    {
       $ptrZ = mysql_fetch_array($rZona);
	   $zona_ID = $ejerBackEnd;
	   $zona_Region = $ptrZ['IDREGION'];
	   $zona_Provincia = $ptrZ['IDPROVINCIA'];
	   $zona_Comuna = $ptrZ['IDCOMUNA'];
   
    }      
 
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <title>::. ONEMI COQUIMBO .::</title>
   <meta http-equiv="Content-Type" content="text/html"/>
   <META HTTP-EQUIV=Refresh CONTENT="120; URL="index.php" />
   <!-- 
   <meta http-equiv="Pragma" content="no-cache"/>
   <meta http-equiv="Cache-Control" content="no-cache"/>
   -->
   <link href="../hojas/estilo.css" rel="stylesheet" type="text/css" />
   <script language="JavaScript"> 
function mueveReloj(){
    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()

    str_segundo = new String (segundo)
    if (str_segundo.length == 1)
       segundo = "0" + segundo

    str_minuto = new String (minuto)
    if (str_minuto.length == 1)
       minuto = "0" + minuto

    str_hora = new String (hora)
    if (str_hora.length == 1)
       hora = "0" + hora

    horaImprimible = hora + " : " + minuto
// + " : " + segundo
    document.form_reloj.reloj.value = horaImprimible

    setTimeout("mueveReloj()",1000)
} 

function nuevoAjax()
 {
     var xmlhttp=false;
     try
     {
         xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
     }
     catch(e)
     {
         try
         {
             xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
         }
         catch(E) { xmlhttp=false; }
     }
     if (!xmlhttp && typeof XMLHttpRequest!="undefined") { xmlhttp=new XMLHttpRequest(); }
  
     return xmlhttp;
 }
  
 function cargar(capa,doc,idsz){
 var div = document.getElementById(capa);
    
     var ajax=nuevoAjax();
         ajax.open("GET", doc+".php?id="+idsz, true);
         ajax.onreadystatechange=function()
         {
             if (ajax.readyState==1){
                 div.innerHTML="CARGANDO...";                           
             }
             if (ajax.readyState==4){
                 div.innerHTML=ajax.responseText;           
             }
         }
         ajax.send(null);
  
 }
</script> 
</head>
<body onload="mueveReloj()">

<table width="960" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto;border: 1px solid #1D5785;">
   <tr valign="middle" align="center">
      <td style="background-color:#003867;" height="75" width="100"><img src="../imagenes/logo_web.png" border="0" width="58" height="60" /></td>
	  <td align="center" style="background-color:#003867; color: white;">
	    <span style="font-size: 9pt;">DIRECCI&Oacute;N REGIONAL ONEMI REGI&Oacute;N DE COQUIMBO</span><br />
	    <span style="font-size: 16pt; font-weight: bold;font-family: 'century gothic', verdana;"><?php echo nombreEjercicio($ejerBackEnd); ?>	</span>  
	  </td>
   </tr> 
   
   <tr><td colspan="2" height="15"></td></tr>
   
   <tr valign="top">
      <td align="right" colspan="2">
	  <a href="index.php" title="Cerrar Sesion">Inicio</a> &nbsp; <a href="#" onclick="cargar('body','ejercicio_valida','<?php echo $ejerBackEnd;?>');">Actualizar Datos Ejercicio</a> &nbsp; <a href="exporta.php" title="Exportar a Excel"> Exportar a Excel</a> &nbsp; <a href="../cerrarsesion.php" title="Cerrar Sesion">Cerrar Sesion</a> &nbsp;
	  </td>
   </tr>

   <tr><td colspan="2" height="25"></td></tr>
   
 <tr valign="top">
      <td colspan="2" align="center" style="background-color: #ffffff;">
	  <table width="850" border="0" cellpadding="0" cellspacing="0">
	  <tr>
	    <td align="left">
	        <table border="0" cellspacing="0" cellpadding="0" id="Encargado">
		       <tr>
			      <td>Usuario</td><td>: &nbsp;</td><td style="color:yellow;font-weight:bold;"><?php echo NombreEncargado($idEncargado);?></td>
			   </tr>
			   <tr>
			      <td>Cargo</td><td>: &nbsp;</td><td style="color:yellow;font-weight:bold;"><?php echo tipoCargo($tipoCargoBackEnd);?></td>
			   </tr>
			   <tr>
			      <td>Provincia</td><td>: &nbsp;</td><td style="color:yellow;font-weight:bold;"><?php echo NombreProvincia($zona_Provincia);?></td>
			   </tr>
			   <tr>
			      <td>Comuna</td><td>: &nbsp;</td><td style="color:yellow;font-weight:bold;"><?php echo NombreComuna($zona_Comuna);?></td>
			   </tr>
		    </table>
	    </td>
	  
	    <td align="right">
		   <?php
	       $qEjercicio = "SELECT HORAINICIO, HORATERMINO FROM tb_ejercicios AS E WHERE E.IDEJERCICIO='".$ejerBackEnd."'";
	       $rEjercicio = mysql_query($qEjercicio);
	  
	       if(mysql_num_rows($rEjercicio) > 0 ) 
	       {
				$ptrE =  mysql_fetch_array($rEjercicio);
				$horainicio = $ptrE['HORAINICIO'];
				$horatermino = $ptrE['HORATERMINO'];
		
				$qConteoEjer = "SELECT CONTEO_CIVILES, CONTEO_ESCOLARES, FECHAHORA FROM tb_conteoejercicio WHERE IDEJERCICIO='".$ejerBackEnd."'";
				$rConteoEjer = mysql_query($qConteoEjer);
				if(mysql_num_rows($rConteoEjer) > 0 )
				{
					$ptrCE = mysql_fetch_array($rConteoEjer);
					$conteo_ejercicio = $ptrCE['CONTEO_CIVILES']+$ptrCE['CONTEO_ESCOLARES'];
					$fechaultimavalidacion = split("-",$ptrCE['FECHAHORA']);
					$horaultimavalidacion = split(":",$fechaultimavalidacion[2]);
					$fecha_hora = split(" ", $horaultimavalidacion[0]);
				}
			} ?>
	   
			<table border="0" cellspacing="0" cellpadding="0" >
		    <tr align="center" >
			   <td style="padding:3px; font-weight: bold; border-left:1px solid #000; border-top:1px solid #000;border-right:1px solid #000;">HORA INICIO</td>
			   <td style="padding:3px; font-weight: bold; border-top: 1px solid #000; border-right:1px solid #000;">HORA T&Eacute;RMINO</td>
			   <td style="padding:3px; font-weight: bold; border-top: 1px solid #000; border-right:1px solid #000;">HORA ACTUAL</td>
			</tr>
			<tr align="center" >
			   <td  style="padding:3px; font-weight: bold; border-left:1px solid #000; border-right:1px solid #000; color: navy; font-size:13px;"><?php echo $horainicio;?></td>
			   <td  style="padding:3px; font-weight: bold; border-right:1px solid #000;color:red; font-size:13px;"><?php echo $horatermino;?></td>
			   <td  style="padding:3px; font-weight: bold; border-right:1px solid #000;">
			   <form name="form_reloj">
                  <input type="text" name="reloj" size="8" style="background-color: #ffffff; color: black; font-family : Verdana, Arial, Helvetica; font-size : 10pt; text-align : center;" onfocus="window.document.form_reloj.reloj.blur()"> 
               </form> 
			   </td>
			</tr>
			<tr>
			   <td colspan="3" >
			      <table border="0" cellspacing="2" cellpadding="2" style="background-color:#000000; color:white;font-color:#ffffff;">
				     <tr>
					    <td align="center" width="110" style="font-weight:bold;">TOTAL EVACUADOS REGI&Oacute;N</td>
						<td align="center" style="font-size:15pt; font-weight:bold;color:yellow;font-family: Tahoma,'Times New Roman'"><?php if($conteo_ejercicio==0) { echo "_____";} else { echo $conteo_ejercicio;} ?></td>
						<td align="center"><span style="font-size:0.8em;">HORA VALIDACI&Oacute;N</span><br /><span style="font-weight:bold;"><?php if(empty($horaultimavalidacion)) { echo "XX:XX"; } else { echo $fecha_hora[1] .":".$horaultimavalidacion[1];} ?></span></td>
					 </tr>
				  </table>
			   </td>
			</tr>   
		 </table>
		 
		 
	  </td>
   </tr>
 </table>
</td>
</tr>		 
		 


<tr><td colspan="2" height="15"></td></tr>
<tr><td colspan="2" align="center">
<?php
		 // Chequea si existe actualizacion disponible para el ejercicio.
		 $qChequea = "SELECT CZ.IDCONTEOZONA ".
                     "   FROM tb_conteozona AS CZ, tb_zonaejercicio AS Z ".
                     "      WHERE ".
                     "          VALIDAZONA='N' AND ".
                     "          Z.IDZONAEJERCICIO=CZ.IDZONAEJERCICIO AND ".
                     "          Z.IDEJERCICIO='".$ejerBackEnd."'";

		 $rChequea = mysql_query($qChequea);
		 
		 if(mysql_num_rows($rChequea) > 0 )
		 {
			echo "<H4 style='text-decoration: blink;'>
			<a href='#' onclick=\"cargar('body','valida','".$ejerBackEnd."');\" style=\"color:red;font-weight:bold;\">NUEVA VALIDACI&Oacute;N DISPONIBLE !!!</a>
			</H4>";
		 }
		 
		 ?>
</td></tr>
 
<tr><td colspan="2" height="15"></td></tr>
      
   <tr>
      <td colspan="2" align="center">
	     <table border="0" cellpadding="0" cellspacing="0" >
            <tr valign="top">
               <th width="350" style="background-color: #F2F2F2;" align="center">ZONAS</th>
	           <td></td>
            </tr>
   
            <tr valign="top">
               <td style=" border: 1px solid #F2F2F2;"> 
				<?php
				// Seleccionamos las Zonas (Comunas) asociadas a este EJERCICIO
				$qZonas = "SELECT IDZONAEJERCICIO, NOMBREZONA FROM tb_zonaejercicio WHERE IDEJERCICIO='".$ejerBackEnd."' AND ESTADOZONA=\"A\"";
				$rZonas = mysql_query($qZonas);
	  
				if(mysql_num_rows($rZonas) > 0 ) {
					while($ptrZ = mysql_fetch_array($rZonas))
					{
						echo "<hr />
						<h4 style='margin:0;padding:0;'>".$ptrZ['NOMBREZONA']." &nbsp; 
							<a href='#' onclick=\"cargar('body','detalle','".$ptrZ['IDZONAEJERCICIO']."');\">
								<img src='../imagenes/ver.png' border='0' width='15' height='15' />
							</a>
						</h4> 
			
						<table border='0' width='250' cellspacing='2' cellpadding='0' style='margin:0 auto;background-color: navy; text-align:center;color: white;border:1px solid #C0C0C0;'>
							<tr><td style='border:1px solid #C0C0C0;'>Nro.Evacuados</td><td style='border:1px solid #C0C0C0;'>Hora &Uacute;ltimo Reporte</td></tr>
							<tr>
								<td style='color: yellow; font-weight: bold; font-size: 14px; font-family: Tahoma, Arial;'>";
									// Busca Conteo Zona Ultimo
									$sNroEvZ = "SELECT CONTEO_CIVILES, CONTEO_ESCOLARES, DATE_FORMAT(FECHAHORA,'%d-%m-%Y %H:%i:%s') as FECHA FROM tb_conteozona WHERE IDZONAEJERCICIO='".$ptrZ['IDZONAEJERCICIO']."' ORDER BY FECHAHORA ASC";
									// AND VALIDAZONA=\"N\" 
					
									$rNroEvZ = mysql_query($sNroEvZ);
									if(mysql_num_rows($rNroEvZ) > 0 ) {
										while($ptrNEZ = mysql_fetch_array($rNroEvZ))
										{
											$conteozona_conteo = $conteozona_conteo + ($ptrNEZ['CONTEO_CIVILES'] + $ptrNEZ['CONTEO_ESCOLARES']);
											$conteozona_fecha = $ptrNEZ['FECHA'];
										}						  
									}
									echo $conteozona_conteo ."
								</td>
								<td style='color: white; font-weight: normal; font-size: 15px;'>";
									// Busca Hora Conteo Zona Ultimo
									echo $conteozona_fecha."
								</td></tr>
							</table>
							<br />";
							$conteozona_conteo = 0;
							$conteozona_fecha = " ";
			  
			  
		
		
		}
	  
	  }
?>
				</td>
			<td width="410" align="center" valign="top">
	  <div id="body"></div>
	  </td>
	  
   </tr>
   </table>
   </td>
   </tr>
   <tr><td colspan="2" height="25"></td></tr>
</table>
</body>
</html>
<?php 
 
 }?>
 
 
 
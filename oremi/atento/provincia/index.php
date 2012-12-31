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

    horaImprimible = hora + " : " + minuto + " : " + segundo

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
	  <a href="index.php" title="Cerrar Sesion">Inicio</a> &nbsp; <a href="../cerrarsesion.php" title="Cerrar Sesion">Cerrar Sesion</a> &nbsp;
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
	    <?php
		 $qEjercicio = "SELECT HORAINICIO, HORATERMINO FROM tb_ejercicios AS E WHERE E.IDEJERCICIO='".$ejerBackEnd."'";
	       $rEjercicio = mysql_query($qEjercicio);
	  
	       if(mysql_num_rows($rEjercicio) > 0 ) 
	       {
				$ptrE =  mysql_fetch_array($rEjercicio);
				$horainicio = $ptrE['HORAINICIO'];
				$horatermino = $ptrE['HORATERMINO'];
			}
		?>
	    <td align="right">
	     <table border="0" cellspacing="0" cellpadding="0" id="Hora">
		    <tr align="center" >
			   <td style="padding:3px; font-weight: bold; border:1px solid #fff;">HORA INICIO <br /><?php echo $horainicio;?></td>
			   <td style="padding:3px; font-weight: bold; border:1px solid #fff;">HORA TERMINO <br /><?php echo $horatermino;?></td>
			</tr>
			<tr align="center" >
			   <td colspan="2" style="padding:3px; font-weight: bold; border:1px solid #fff;">HORA ACTUAL <br />
			   <form name="form_reloj">
                  <input type="text" name="reloj" size="10" style="background-color : Black; color : White; font-family : Verdana, Arial, Helvetica; font-size : 8pt; text-align : center;" onfocus="window.document.form_reloj.reloj.blur()"> 
               </form> 
			   </td></tr>
		 </table>
	    </td>
	  </tr>
	  </table>
	  </td>
   </tr>
   
   <tr><td colspan="2" height="15"></td></tr>
   <tr><td colspan="2" align="center">
		 
		 <?php
		 // Chequea si existe actualizacion disponible desde subzonas para esta provincia.
		 $qChequea = "SELECT CSZ.IDSUBZONAEJERCICIO ".
						" FROM tb_subzonaejercicio AS SZ, tb_conteosubzona AS CSZ, tb_zonaejercicio AS Z  ".
						" WHERE ".
							" VALIDASUBZONA=\"N\" AND ".
							" Z.IDZONAEJERCICIO=SZ.IDZONAEJERCICIO AND ".
							" SZ.IDSUBZONAEJERCICIO=CSZ.IDSUBZONAEJERCICIO AND ".
							" Z.IDEJERCICIO='".$ejerBackEnd."' AND Z.IDPROVINCIA='".$zona_Provincia."'
					";
		 $rChequea = mysql_query($qChequea);
		 
		 if(mysql_num_rows($rChequea) > 0 )
		 {
			echo "<H4 style='text-decoration: blink; '>
			<a href='#' onclick=\"cargar('body','valida','".$zona_Provincia."');\" style=\"color: red; font-size:16px;\">VALIDACI&Oacute;N DISPONIBLE</a>
			</H4>";
		 }
		 
		 ?>
	  </td>
   </tr>
   
    <tr><td colspan="2" height="15"></td></tr>
	
    <tr  valign="top">
      <td colspan="2" align="center" valign="top">
	     <table width="800" nborder="0" cellpadding="0" cellspacing="0" >
            <tr valign="top">
               <th width="350" style="background-color: #F2F2F2;" align="center">ZONAS</th>
	           <td></td>
            </tr>
   
            <tr valign="top">
               <td style=" border: 1px solid #F2F2F2;">
	            <?php
	            // Seleccionamos las Zonas (Comunas) a las cuales pertenece el DIRECTOR PROVINCIAL
	            $qZonas = "SELECT IDZONAEJERCICIO, NOMBREZONA FROM tb_zonaejercicio WHERE IDEJERCICIO='".$ejerBackEnd."' AND IDPROVINCIA='".$zona_Provincia."' AND ESTADOZONA=\"A\"";
	            $rZonas = mysql_query($qZonas);
	  
	            if(mysql_num_rows($rZonas) > 0 ) {
		           while($ptrZ = mysql_fetch_array($rZonas))
		           {
			          echo "<hr />
			                <h4 style='margin:0;padding:0;'>".$ptrZ['NOMBREZONA']."</h4> 
			
			                <table border='0' width='250' cellspacing='2' cellpadding='0' style='margin:0 auto;background-color: navy; text-align:center;color: white;border:1px solid #C0C0C0;'>
			                   <tr><td style='border:1px solid #C0C0C0;'>Nro.Evacuados</td><td style='border:1px solid #C0C0C0;'>Hora &Uacute;ltimo Reporte</td></tr>
			                   <tr>
				                  <td style='color: yellow; font-weight: bold; font-size: 12px;'>";
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
			                      <td style='color: white; font-weight: bold; font-size: 12px;'>";
					                 // Busca Hora Conteo Zona Ultimo
					                 echo $conteozona_fecha ."
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
 
 }
 
 
?>
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
	$qZona = "SELECT IDZONAEJERCICIO,IDREGION,IDPROVINCIA,IDCOMUNA,NOMBREZONA,IDEJERCICIO,IDENCARGADO ".
	         " FROM tb_zonaejercicio ".
			 " WHERE ".
			 " IDENCARGADO='".$idEncargado."' AND ". 
			 " IDEJERCICIO='".$ejerBackEnd."'";
	$rZona = mysql_query($qZona);
	if(mysql_num_rows($rZona) > 0 )
    {
       $ptrZ = mysql_fetch_array($rZona);
	   $zona_ID = $ptrZ['IDZONAEJERCICIO'];
	   $zona_Region = $ptrZ['IDREGION'];
	   $zona_Provincia = $ptrZ['IDPROVINCIA'];
	   $zona_Comuna = $ptrZ['IDCOMUNA'];
	   $zona_Nombre = $ptrZ['NOMBREZONA'];   
    }      
 
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <title>::. ONEMI COQUIMBO .::</title>
   <meta http-equiv="Content-Type" content="text/html"/>
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
      
   <tr>
      <td colspan="2" align="center">
	     <table border="0" cellpadding="0" cellspacing="0" >
            <tr valign="top">
               <th width="350" style="background-color: #F2F2F2;" align="center">SUBZONAS</th>
	           <td></td>
            </tr>
   
            <tr>
               <td style=" border: 1px solid #F2F2F2;">
	  <?php
	    $qSubzonas = "SELECT IDSUBZONAEJERCICIO, IDZONAEJERCICIO, NOMBRESUBZONA FROM tb_subzonaejercicio WHERE IDZONAEJERCICIO='".$zona_ID."' AND ESTADOSUBZONA=\"A\"";
	    $rSubzonas = mysql_query($qSubzonas);
		
		if(mysql_num_rows($rSubzonas) > 0 ) {
		   while($ptrSZ = mysql_fetch_array($rSubzonas))
		   {
		      echo "<hr />";
			  echo "
			     <h4 style='margin:0;padding:0;color:black;'> ". $ptrSZ['NOMBRESUBZONA'] ."&nbsp; 
				     <a href='#' onclick=\"cargar('body','agrega','".$ptrSZ['IDSUBZONAEJERCICIO']."');\">
					    <img src='../imagenes/mas.gif' border='0' width='14' height='15' />
					 </a>
				 </h4> 
			  <table border='0' width='250' cellspacing='2' cellpadding='0' style='margin:0 auto;background-color: navy; text-align:center;color: white;border:1px solid #C0C0C0;'>
			     <tr><td >Nro.Evacuados</td><td>Hora &Uacute;ltimo Reporte</td></tr>
			     <tr>
				    <td style='color: yellow; font-weight: bold; font-size: 12px;'>";
				    // Busca Conteo SubZona Ultimo
					$sNroEvSZ = "SELECT CONTEO_CIVILES, CONTEO_ESCOLARES, DATE_FORMAT(FECHAHORA,'%d-%m-%Y %H:%i:%s') as FECHA FROM tb_conteosubzona WHERE IDSUBZONAEJERCICIO='".$ptrSZ['IDSUBZONAEJERCICIO']."' ORDER BY FECHAHORA DESC";
					//AND VALIDASUBZONA='S' 
					$rNroEvSZ = mysql_query($sNroEvSZ);
					$conteosubzona_conteo = 0;
			  $conteosubzona_fecha = " ";
					if(mysql_num_rows($rNroEvSZ) > 0 ) {
					   $ptrNESZ = mysql_fetch_array($rNroEvSZ);
					   $conteosubzona_conteo = $ptrNESZ['CONTEO_CIVILES'] + $ptrNESZ['CONTEO_ESCOLARES'];
					   $conteosubzona_fecha = $ptrNESZ['FECHA'];					
					}
					echo $conteosubzona_conteo;
					
			  echo "</td>
			        <td style='color: white; font-weight: bold; font-size: 12px;'>";
					// Busca Hora Conteo SubZona Ultimo
					echo $conteosubzona_fecha . "
			        </td></tr>
			  </table>			  
			  <br />";
			   
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
<?
//include("conexion_comunicaciones.php");
include ("../../../funciones/fechas.php");
include("../../../funciones/setup.php");
include ("../../../funciones/bitacora.php");
include("../../../funciones/conexion_gore_banco.php");


global $usernameadmin,$tipo,$op,$list,$ingreso,$id,$frm_buscar,$ac_buscar,$id_m;

while (list ($key, $val) = each ($_REQUEST))
 {
  $$key = $val;
 } 
session_start(); 
if (isset($_SESSION['usernameadmin']))
{
	
}
else
{
    echo "Usuario No Autentificado!";
	exit;
}

if (($tipo=="") or ($tipo=="Nueva"))
{
   $tipo="Nueva";
   $fecha=date("Y-m-d"); 
       
}
if($id<>'')
{
$sql0="SELECT * FROM proyectos where id='".$id."'";
$result0=mysql_query($sql0);
$rows=mysql_fetch_array($result0);

$maps = $rows['cod_maps'];
}
if($se_filtro==0 || $se_filtro==""){
$_pagi_sql="select * from proyectos ORDER BY id desc";
$result=mysql_query($_pagi_sql);
$registros=mysql_num_rows($result);
$_pagi_cuantos = 20; include("../../../funciones/paginator.inc.php");

}

if($ac_buscar==1)
{

$cadena = strtolower($frm_buscar);

switch ($se_filtro)
{
case 1:
$_pagi_sql= "select * from proyectos where  codigo_bip LIKE '%" . $cadena . "%'  order by codigo_bip desc";
$result2=mysql_query($_pagi_sql);
$registros=mysql_num_rows($result2);
$_pagi_cuantos = 20;

include("../../../funciones/paginator.inc.php");

	
acciones('1',' en Banco de Proyectos',$id_m,$idusername,$id_sub); 
break;
case 2:
$cadena2= limpiar_acentos($cadena);
$_pagi_sql= "select * from proyectos where  nombre LIKE '%" . $cadena2 . "%'  order by codigo_bip desc";
$result2=mysql_query($_pagi_sql);
$registros=mysql_num_rows($result2);
$_pagi_cuantos = 20;
 include("../../../funciones/paginator.inc.php");

	
acciones('1',' en Banco de Proyectos',$id_m,$idusername,$id_sub); 

break;
case 3:
$cadena2= limpiar_acentos($cadena);
$_pagi_sql= "select a1.id,a1.codigo_bip,a1.nombre,a1.fecha_inicio,a1.id_Provincia, a1.id_etapa, a2.id_provincia, a2.nom_provincia from proyectos a1, provincia a2 where a1.id_Provincia=a2.id_provincia AND a2.nom_provincia LIKE '%" . $cadena2 . "%'  order by codigo_bip desc";
$result2=mysql_query($_pagi_sql);
$registros=mysql_num_rows($result2);
$_pagi_cuantos = 20;
 include("../../../funciones/paginator.inc.php");

	
acciones('1',' en Banco de Proyectos',$id_m,$idusername,$id_sub); 
break;
case 4:
$cadena2= limpiar_acentos($cadena);
$_pagi_sql= "select a1.id,a1.codigo_bip,a1.nombre,a1.fecha_inicio,a1.id_comuna, a1.id_etapa, a2.id_comuna, a2.nom_comuna from proyectos a1, comuna a2 where a1.id_comuna=a2.id_comuna AND a2.nom_comuna LIKE '%" . $cadena2 . "%'  order by codigo_bip desc";
$result2=mysql_query($_pagi_sql);
$registros=mysql_num_rows($result2);
$_pagi_cuantos = 20; 
include("../../../funciones/paginator.inc.php");

	
acciones('1',' en Banco de Proyectos',$id_m,$idusername,$id_sub); 
break;
}
}
$tablas=array("etapa",
			  "tipo",
			  "comuna",
			  "Sector"); 

$selsql="select * from etapa where estado=1 ORDER BY `nom_etapa`";
$selresult=mysql_query($selsql);
$selsql1="select * from financiamiento where estado=1 ORDER BY `nom_financiamiento";
$selresult1=mysql_query($selsql1);
$selsql2="select * from sector where estado=1 ORDER BY `nom_sector";
$selresult2=mysql_query($selsql2);
$selsql3="select * from tipo where estado=1 ORDER BY `nom_tipo";
$selresult3=mysql_query($selsql3);
$selsql4="select * from unidad_tecnica where estado=1 ORDER BY `nom_unidad";
$selresult4=mysql_query($selsql4);
$selsql5="select * from comuna  ORDER BY `nom_comuna";
$selresult5=mysql_query($selsql5);
$selsql6="select * from financiamiento where estado=1 ORDER BY nom_financiamiento";
$selresult6=mysql_query($selsql6);


if($ingreso==1)
{
$cabecera_ex=array("Código Identificatorio",
					"etapa",
					"nombre iniciativa",
					"tipo",
					"provincia",
					"comuna",
					"sector",
					"Provisión (Fuente de Financiamiento)",					
					"fecha inicio",
					"costo total",
					"Costo FNDR",
					"Descripción de la Iniciativa",
					);
					
$tamano = $_FILES["file_excel"]['size'];
$tipo = $_FILES["file_excel"]['type'];
$archivo = $_FILES["file_excel"]['name'];
$nombre_archivo=limpiar_acentos(strtolower(str_replace(" ","_",$archivo)));
move_uploaded_file($HTTP_POST_FILES['file_excel']['tmp_name'], "../../../archivos/".$nombre_archivo);
$mode='0666';
$direccion="../../../archivos/".$nombre_archivo;
 chmod ($direccion, octdec($mode));
 require_once 'funciones/reader.php';
 $data = new Spreadsheet_Excel_Reader();
 $data->setOutputEncoding('CP1251');
 $data->setUTFEncoder('mb');
 $data->read('../../../archivos/'.$nombre_archivo);
 
 error_reporting(E_ALL ^ E_NOTICE);
 set_time_limit(0);

 if(limpiar_acentos(strtolower($data->sheets[0]['cells'][1][1]))==limpiar_acentos(strtolower($cabecera_ex[0])) || 
 	limpiar_acentos(strtolower($data->sheets[0]['cells'][1][2]))==limpiar_acentos(strtolower($cabecera_ex[1])) ||
	limpiar_acentos(strtolower($data->sheets[0]['cells'][1][3]))==limpiar_acentos(strtolower($cabecera_ex[2])) ||
	limpiar_acentos(strtolower($data->sheets[0]['cells'][1][4]))==limpiar_acentos(strtolower($cabecera_ex[3])) ||
	limpiar_acentos(strtolower($data->sheets[0]['cells'][1][5]))==limpiar_acentos(strtolower($cabecera_ex[4])) ||
	limpiar_acentos(strtolower($data->sheets[0]['cells'][1][6]))==limpiar_acentos(strtolower($cabecera_ex[5])) ||
	limpiar_acentos(strtolower($data->sheets[0]['cells'][1][7]))==limpiar_acentos(strtolower($cabecera_ex[6])) ||
	limpiar_acentos(strtolower($data->sheets[0]['cells'][1][8]))==limpiar_acentos(strtolower($cabecera_ex[7])) ||	
 	limpiar_acentos(strtolower($data->sheets[0]['cells'][1][9]))==limpiar_acentos(strtolower($cabecera_ex[8])) ||
	limpiar_acentos(strtolower($data->sheets[0]['cells'][1][10]))==limpiar_acentos(strtolower($cabecera_ex[9])) ||
	limpiar_acentos(strtolower($data->sheets[0]['cells'][1][11]))==limpiar_acentos(strtolower($cabecera_ex[10])) ||
	limpiar_acentos(strtolower($data->sheets[0]['cells'][1][12]))==limpiar_acentos(strtolower($cabecera_ex[11])))
	{

 for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
 for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
 $valor = $data->sheets[0]['cells'][$i][$j];
 $excel[$i][$j] = $valor;
 }
 }
 for($i = 1; $i <= count($excel); $i++)
 {
	 $repetido=0;
	 $indice=1;
 	for($j = 1; $j <= count($excel); $j++)
	{
	 if($excel[$i][1]==$excel[$j][1])
		{
		 $repetido++;
		 if($repetido>1)
		 {
		 $excel[$j-1][13]=$indice;
		 $indice++;
		 $excel[$j][13]=$indice;
 		 }
		}
	}
 } 

$k=0;
$i=1;
$F=2;


 for($f=0;$f<=count($excel);$f++)
 {
 if(limpiar_acentos(strtolower($cabecera_ex[0]))!=limpiar_acentos(strtolower($excel[$f][1])) && ($excel[$f][1]!=""))
  {
  $sqlA="SELECT * from proyectos where codigo_bip='".$excel[$f][1]."' AND nombre='".limpiar_acentos(strtolower($excel[$f][3]))."'";
	
  $result=mysql_query($sqlA);
  $num=mysql_num_rows($result);
  $row1=mysql_fetch_array($result);
  if($num>0) 
  {
  $informe[$k][0]=$row1['id']; 
  $informe[$k][1]=$row1['codigo_bip'];
  $informe[$k][2]=$row1['nombre'];
  $informe[$k][3]=fecha_formato_espanol_gore($row1['fecha_inicio']);
  $k++;
  }
  else
  {
 
    $sql ="SELECT MAX(id) as maximo from proyectos";
	$result = mysql_query($sql);
	while($rows=mysql_fetch_array($result))
	{
	$id = $rows["maximo"] + 1;
	}
	
  $subindice= $excel[$f][13];
  $sqlE1="SELECT * FROM etapa Where nom_etapa='".limpiar_acentos(strtolower($excel[$f][2]))."'";
  $rE1=mysql_query($sqlE1);
  $rowsE1=mysql_fetch_array($rE1);
  
  $sqlTi="SELECT * FROM tipo WHERE nom_tipo='".limpiar_acentos(strtolower($excel[$f][4]))."'";
  $rTi=mysql_query($sqlTi);
  $rowsTi=mysql_fetch_array($rTi);
  
  $sqlCo="SELECT * FROM comuna WHERE nom_comuna='".limpiar_acentos(strtolower($excel[$f][6]))."'";
  $rCo=mysql_query($sqlCo);
  $rowsCo=mysql_fetch_array($rCo);

  $sqlSe="SELECT * FROM Sector WHERE nom_sector='".limpiar_acentos(strtolower($excel[$f][7]))."'";
  $rSe=mysql_query($sqlSe);
  $rowsSe=mysql_fetch_array($rSe);
  
  $sqlfin="SELECT * FROM financiamiento WHERE `nom_financiamiento`='".limpiar_acentos(strtolower($excel[$f][8]))."'";
  $rfin=mysql_query($sqlfin);
  $rowsfin=mysql_fetch_array($rfin);
 
  $sql="INSERT INTO `proyectos` (`id`,`codigo_bip`, `id_etapa`,`subindice`, `nombre`, `id_tipo`, `id_Provincia`, `id_comuna`, `id_Sector`,`id_provision`, `fecha_inicio`, `costo_total`, `costo_fndr`, `descripcion`)";

  $sql.="VALUES ('".$id."','".$excel[$f][1]."', '".$rowsE1['id_etapa']."','".$subindice."','".limpiar_acentos(strtolower($excel[$f][3]))."','".$rowsTi['id_tipo']."', '".$rowsCo['id_provincia']."', '".$rowsCo['id_comuna']."', '".$rowsSe['id_sector']."','".$rowsfin['id_financiamiento']."', '".fecha_formato_base($excel[$f][9])."', '".$excel[$f][10]."', '".$excel[$f][11]."', '".$excel[$f][12]."')";
 
$exec=mysql_query($sql);
 
 acciones('0',' Archivo Excel en Banco de Proyectos',$id_m,$idusername,$id_sub); 
    	}
	}
  }
}
else
{ 
?>
<script type="text/javascript" language="javascript">
alert("Error de Archivo, Seleccione el archivo excel con el formato correcto");
</script> <? 
} 
}  
include("../../../funciones/restricciones.php");	
modulos($id_m,$idusername,$id_sub);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Aplicacion Segura</title>
<link href="CSS/estilo.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../../../_mod_prensa/formato/jscripts/tiny_mce/tiny_mce.js"></script>
	
    <link rel="stylesheet" type="text/css" href="CSS/lightbox.css" media="screen" />
	
	<script src="http://code.jquery.com/jquery-latest.pack.js" type="text/javascript"></script>
	
	<script src="js/jquery.lightbox.js" type="text/javascript"></script>

<script src="../../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

<script src="js/funciones_proyecto.js" type="text/javascript"></script>

<script type="text/javascript" src="scripts/firebug.js"></script> 
 <!-- jQuery --> 
<script type="text/javascript" src="scripts/jquery.min.js"></script> 
<!-- required plugins --> 
<script type="text/javascript" src="scripts/date.js"></script> 
<!--[if IE]><script type="text/javascript" src="scripts/jquery.bgiframe.min.js"></script><![endif]--> 
<!-- jquery.datePicker.js --> 
<script type="text/javascript" src="scripts/jquery.datePicker.js"></script> 
<!-- datePicker required styles --> 
<link rel="stylesheet" type="text/css" media="screen" href="styles/datePicker.css"> 
<!-- page specific styles --> 
<link rel="stylesheet" type="text/css" media="screen" href="styles/calendario.css"> 
<!-- page specific scripts --> 
<script type="text/javascript" charset="utf-8"> 

 $(function()
 {
	$('.date-pick').datePicker({startDate:'01/01/2000'});
	$(".lightbox").lightbox();
 });

</script> 

<script language="javascript" type="text/javascript">
var num1 = <? echo $id_m; ?>;
var num2 = <? echo $id_sub; ?>;


function suma(suma1,suma2){
 numero1 = document.getElementById(suma1).value;
 numero2 = document.getElementById(suma2).value;
 if (numero1=="") { numero1= 0 }
  if (numero2=="") { numero2= 0 }
  
 var total =  parseInt(numero1) + parseInt(numero2);
 document.getElementById('b_total').innerHTML = total; 
 
 
}

function validarnumeros(numeros) { 
valor_numero= parseInt(document.getElementById(numeros).value);
if (!isNaN(valor_numero)) return true
else {
alert("Debe Ingresar solo valores numericos.");
document.getElementById(numeros).value = "";

return false
}
}
</script>
</head>

<body>

<table width="753" border="2" cellpadding="0" cellspacing="10" bordercolor="#FFFFFF" bgcolor="#CCCCCC">
  <tr>
    <td bgcolor="#FFFFFF">
	<form action="" method="post" enctype="multipart/form-data" name="form1">
	<table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div align="center"><font color="#990000"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">MODULO 
              ADMINISTRATIVO DE CONTENIDO</font></strong></font></div></td>
          </tr>
          <tr>
            <td><? include("../../include_superior_sesion.php");?></td>
          </tr>
        </table>
        <table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10" /></td>
                <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10" /></td>
              </tr>
              <tr>
                <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                <td valign="top" class="stylos">
				<div align="center">
<table width="100%" cellspacing="5" cellpadding="0">
  <tr>
    <th class="titulos_noticias" scope="col">ADMINISTRACI&Oacute;N INFORMACI&Oacute;N BANCO DE PROYECTOS </th>
  </tr>
  <tr>
    <td><div align="center"></div>
      <table width="60%" align="center" cellpadding="0" cellspacing="5" bgcolor="#EFEFEF">
        <tr>
          <th width="20%" bgcolor="#FFFFFF" class="textos_noticias" scope="col"><a href="frm_proyectos.php?op=1&amp;id_m=<? echo $id_m; ?>&amp;id_sub=<? echo $id_sub; ?>" class="textos_general">Cargar Archivo<BR />
            Excel </a></th>
          <th width="20%" bgcolor="#FFFFFF" scope="col"><span class="textos_noticias"><a href="frm_proyectos.php?op=2&amp;id_m=<? echo $id_m; ?>&amp;id_sub=<? echo $id_sub; ?>" class="textos_general">Ingresar<br />
            Proyectos</a> </span></th>
		  <th width="20%" bgcolor="#FFFFFF" class="textos_noticias" scope="col"><a href="frm_proyectos.php?op=3&amp;id_m=<? echo $id_m; ?>&amp;id_sub=<? echo $id_sub; ?>&amp;list=1" class="textos_general">Buscar<br />
		    Proyectos </a></th>
        </tr>
      </table>
      <hr /></td>
  </tr>
  <? if($op==1){ ?>
  <tr>
    <td><div align="center"><table width="80%" align="center" cellpadding="0" cellspacing="5" bordercolor="#EFEFEF" bgcolor="#EFEFEF">
      <tr>
        <th colspan="2" class="textos_noticias" scope="col">Cargar Excel de un Archivo Web Predeterminado </th>
      </tr>
      <tr>
        <td width="35%" class="textos_noticias"><div align="right">Archivo:</div></td>
        <td><input name="file_excel" type="file" id="file_excel" size="25" /></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
            <? if($ing==1){ ?><input type="button" name="Submit" value="Agregar" onClick="javascript: comprueba_extension(this.form, 'file_excel');" />
			<? } ?>
            <input type="button" name="Submit2" value="Volver" onClick="javascript:volver(this.form,num1,num2);" />
            <input name="ingreso" type="hidden" id="ingreso" />
        </div></td>
      </tr>
	 <? if ($k>0){ ?>	 
	  <tr><td colspan="2"><div align="center" class="titulos_noticias">Proyectos ya ingresados : 
	  <? 
	  $filas=count($informe); 
	  for ($fl=0;$fl<=$filas;$fl++)
	  {
	  	if($informe[$fl][0]!="")
		{ 
		$sumar=$sumar+1;
		}
	  }
	  echo $sumar;
	  ?></div></td></tr>
	  <tr>
	    <td colspan="2"><div align="center">
	      <input name="Input" type="button" value="Ver Proyectos " onClick="enviarArreglo(this.form)" />
	      <input name="informe_a" type="hidden" id="informe_a" value="
<?
$ft = count($informe);
$ct = (count($informe, COUNT_RECURSIVE) - count($informe)) / count($informe);
for ($f = 0; $f < $ft; $f++)
{
    $columna = $informe[$f][0]."+".$informe[$f][1]."+".$informe[$f][2]."+".$informe[$f][3]."+".$informe[$f][4];
	$info[]=$columna;
}
$infoC= implode('|',$info);
echo $infoC; ?> " />
		
	    </div></td>
	  </tr>
	  <? } ?>
    </table>
	   
	    </div>	  </td>
  </tr>
  <? } 
  if ($op==2){?>
  <tr>
  <td><div align="center">
    <table width="95%" align="center" cellpadding="0" cellspacing="5" bordercolor="#EFEFEF" bgcolor="#EFEFEF">
      <tr>
        <th colspan="2" class="textos_noticias" scope="col">Ficha Proyecto </th>
      </tr>
      <tr>
        <td width="35%" class="textos_noticias"><div align="right">Fecha Inicio : </div></td>
        <td><div align="left">
            <input name="fecha_i" type="text" id="fecha_i" value="<? if($tipo=='Nueva'){ echo fecha_formato_espanol_gore($fecha); }else { echo fecha_formato_espanol_gore($rows['fecha_inicio']); }?>"  class="date-pick" />
        </div></td>
      </tr>
      <tr>
        <td width="35%" class="textos_noticias"><div align="right">Codigo Bip : </div></td>
        <td><div align="left">
            <input name="codigobip" type="text" id="codigobip" value="<? echo $rows['codigo_bip']; ?>" />
        </div></td>
      </tr>
      <tr>
        <td width="35%" class="textos_noticias"><div align="right">Nombre : </div></td>
        <td><div align="left">
            <input name="nom" type="text" id="nom" value="<? echo ucwords(strtolower($rows['nombre'])); ?>" size="70" />
        </div></td>
      </tr>
      <tr>
        <td width="35%" class="textos_noticias"><div align="right">Tipo : </div></td>
        <td><div align="left">
            <select name="s_tipo" id="s_tipo">
              <option value="0">.:: Seleccione ::.</option>
              <? while($row3=mysql_fetch_array($selresult3)) { ?>
              <option value="<? echo $row3['id_tipo'] ;?>"<? if($row3['id_tipo']==$rows['id_tipo']){ ?> selected<? } ?>><? echo ucwords(strtolower($row3['nom_tipo'])); ?></option>
              <? } ?>
            </select>
        </div></td>
      </tr>
      <tr style=" display:none;">
        <td width="35%" class="textos_noticias"><div align="right">Provincia : </div></td>
        <td><div align="left">
            <select name="s_pro" id="s_pro">
              <option value="0">.:: Seleccione ::.</option>
            </select>
        </div></td>
      </tr>
      <tr>
        <td width="35%" class="textos_noticias"><div align="right">Comuna : </div></td>
        <td><div align="left">
            <select name="s_com" id="s_com">
              <option value="0">.:: Seleccione ::.</option>
              <? while($row5=mysql_fetch_array($selresult5)) { ?>
              <option value="<? echo $row5['id_comuna'] ;?>"<? if($row5['id_comuna']==$rows['id_comuna']){ ?> selected<? } ?>><? echo ucwords(strtolower($row5['nom_comuna'])); ?></option>
              <? } ?>
            </select>
        </div></td>
      </tr>
      <tr>
        <td width="35%" class="textos_noticias"><div align="right">Etapa : </div></td>
        <td><div align="left">
            <select name="s_etapa" id="s_etapa">
              <option value="0">.:: Seleccione ::.</option>
              <? while($row1=mysql_fetch_array($selresult)) { ?>
              <option value="<? echo $row1['id_etapa'] ;?>"<? if($row1['id_etapa']==$rows['id_etapa']){ ?> selected<? } ?>><? echo ucwords(strtolower($row1['nom_etapa'])); ?></option>
              <? } ?>
            </select>
        </div></td>
      </tr>
      <tr>
        <td width="35%" class="textos_noticias"><div align="right">Sector : </div></td>
        <td><div align="left">
            <select name="s_sector" id="s_sector">
              <option value="0">.:: Seleccione ::.</option>
              <? while($row2=mysql_fetch_array($selresult2)) { ?>
              <option value="<? echo $row2['id_sector'] ;?>" <? if($row2['id_sector']==$rows['id_Sector']){ ?> selected<? } ?>><? echo ucwords(strtolower($row2['nom_sector'])); ?></option>
              <? } ?>
            </select>
        </div></td>
      </tr>
      <tr style="display:none;">
        <td width="35%" class="textos_noticias"><div align="right">Unidad T&eacute;cnica : </div></td>
        <td><div align="left">
            <select name="s_tecnica" id="s_tecnica">
              <option value="0">.:: Seleccione ::.</option>
              <? while($row4=mysql_fetch_array($selresult4)) { ?>
              <option value="<? echo $row4['id_unidad'] ;?>"<? if($row4['id_unidad']==$rows['id_unidad']){ ?> selected<? } ?>><? echo ucwords(strtolower($row4['nom_unidad'])); ?></option>
              <? } ?>
            </select>
        </div></td>
      </tr>
      <tr>
        <td class="textos_noticias"><div align="right">Financiamiento : </div></td>
          <td><div align="left">
            <select name="s_provicion" id="s_tecnica">
              <option value="0">.:: Seleccione ::.</option>
              <? while($row6=mysql_fetch_array($selresult6)) { ?>
              <option value="<? echo $row6['id_financiamiento'] ;?>"<? if($row6['id_financiamiento']==$rows['id_provision']){ ?> selected<? } ?>><? echo ucwords(strtolower($row6['nom_financiamiento'])); ?></option>
              <? } ?>
            </select>
        </div></td>
      </tr>
      <tr>
        <td width="35%" class="textos_noticias"><div align="right">Costo Total : </div></td>
        <td><div align="left">
            <input name="costoT" type="text" id="costoT" value="<? echo $rows['costo_total']; ?>" />
        </div></td>
      </tr>
      <tr>
        <td width="35%" class="textos_noticias"><div align="right">Costo FNDR : </div></td>
        <td><div align="left">
            <input name="costoFNDR" type="text" id="costoFNDR" value="<? echo $rows['costo_fndr']; ?>" />
        </div></td>
      </tr>
	  <tr>
	  <td width="35%" class="textos_noticias"><div align="right">Beneficiarios Hombres :</div></td>
	  <td><div align="left">
	    <input name="b_hombres" type="text" id="b_hombres" value="<? echo $rows['b_hombres']; ?>" size="15" onchange="validarnumeros('b_hombres');suma('b_hombres','b_mujeres')"  />	  
	    </div></td>
	  </tr>
	   <tr>
	  <td width="35%" class="textos_noticias"><div align="right">Beneficiarios Mujeres : </div></td>
	  <td><div align="left">
	    <input name="b_mujeres" type="text" id="b_mujeres" value="<? echo $rows['b_mujeres']; ?>" size="15" onchange="validarnumeros('b_mujeres');suma('b_hombres','b_mujeres')"  />	  
	    </div></td>
	  </tr>
	  	   <tr>
	  <td width="35%" class="textos_noticias"><div align="right">Beneficiarios Total : </div></td>
	  <td><b><div id="b_total" class="textos_noticias" align="left">
	  <? 
	  if($tipo=="Editar"){
	  ?>
	  <script> suma('b_hombres','b_mujeres')</script> 
	  <? 
	   }?> </div></b></td>
	  </tr>
      <tr>
        <td width="35%" class="textos_noticias"><div align="right">Descripci&oacute;n : </div></td>
        <td><div align="left">
            <textarea name="descripcion" cols="60" rows="6" id="descripcion"><? echo ucwords(strtolower($rows['descripcion'])); ?></textarea>
        </div></td>
      </tr>
 		<tr>
        <td width="35%" class="textos_noticias"><div align="right">Codigo Enlace Google Maps : </div></td>
        <td><div align="left">
          <label>
          <textarea name="g_maps" cols="58" rows="7" id="g_maps"><? echo $maps; ?></textarea>
          </label>
        </div></td>
      </tr>
	  <tr>
	  <td colspan="2">
	  <div align="center">
	  <br/>
	  <?  echo $maps ?>
	  </div>
	  </td>
	  </tr>
      <tr>
        <td colspan="2">
		<?
		 if ($id<>'')
		 {
		?>
		<br/><table border="0" align="center" cellpadding="0" cellspacing="5">
            <tr>
              <td bgcolor="#FFFFFF" class="Estilo3">&nbsp;</td>
              <td bgcolor="#FFFFFF" class="Estilo3"><a href="javascript:bloque('imagenes','Mostrar')">Agregar Fotografias</a></td>
              <td bgcolor="#FFFFFF" class="Estilo3">|</td>
              <td bgcolor="#FFFFFF" class="Estilo3">&nbsp;</td>
              <td bgcolor="#FFFFFF" class="Estilo3"><a href="javascript:bloque('doc','Mostrar')">Agregar Documentos </a></td>
              <td bgcolor="#FFFFFF" class="Estilo3">|</td>
              <td bgcolor="#FFFFFF" class="Estilo3">&nbsp;</td>
              <td bgcolor="#FFFFFF" class="Estilo3"><a href="javascript:bloque('video','Mostrar')">Agregar Video </a></td>
            </tr>
        </table>
		<? } ?>

        <br />
						<DIV id=doc style="DISPLAY: none; Z-INDEX: 1">							
                                        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody>
                                          <tr>
                                            <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10"></td>
                                            <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                                            <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10"></td>
                                          </tr>
                                          <tr>
                                            <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                                            <td width="100%" valign="top" bgcolor="#FFFFFF" class="stylos"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                                              <tr>
                                                <td colspan="3"><strong class="Estilo1">. : : Agregar Documento </strong></td>
                                                </tr>
                                              <tr>
                                                <td><span class="Estilo2"><font color="#000000" face="Arial, Helvetica, sans-serif">Adjuntar Dcto : </font></span></td>
                                                <td><span class="field Estilo2"><font face="Arial, Helvetica, sans-serif">
                                                  <input name="frm_dcto" type="text" disabled="false" class="Parrafos" id="frm_dcto" size="30" maxlength="100">
                                                </font></span></td>
                                                <td><span class="field Estilo2"><font face="Arial, Helvetica, sans-serif">
                                                  <input name="file_dcto" type="file" class="Parrafos" id="file_dcto" value="...Adjuntar Dcto" >
                                                </font></span></td>
                                              </tr>
                                              <tr>
                                                <td><span class="Estilo2"><font color="#000000" face="Arial, Helvetica, sans-serif">Descripcion Dcto : </font></span></td>
                                                <td colspan="2"><span class="field Estilo2"><font face="Arial, Helvetica, sans-serif">
                                                  <input name='frm_descripcion_dcto' type=text id="frm_descripcion_dcto" size="70">
                                                </font></span></td>
                                                </tr>
                                              <tr>
                                                <td colspan="3"><table border="0" align="center" cellpadding="0" cellspacing="5" bgcolor="#CCCCCC">
                                                  <tr>
                                                    <td><? if(($ing==1) ||($editar==1)){ ?><input type="button" name="Submit52" value="Agregar Documento" OnClick="javascript:adjuntar_dcto(this.form,num1,num2)"><? } ?></td>
                                                  </tr>
                                                </table></td>
                                                </tr>

                                            </table></td>
                                            <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                                          </tr>
                                          <tr>
                                            <td height="10" width="10"><img src="imagenes/g3.gif" width="10" height="10"></td>
                                            <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                                            <td height="10" width="10"><img src="imagenes/g4.gif" width="10" height="10"></td>
                                          </tr>
                                      </table>
									</div>
									<DIV id=video style="DISPLAY: none; Z-INDEX: 1">							                                      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody>
                                          <tr>
                                            <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10"></td>
                                            <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                                            <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10"></td>
                                          </tr>
                                          <tr>
                                            <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                                            <td width="100%" valign="top" bgcolor="#FFFFFF" class="stylos"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                                              <tr>
                                                <td colspan="3"><strong class="Estilo1">. : : Agregar Video </strong></td>
                                                </tr>
                                              <tr>
                                                <td><span class="Estilo2"><font color="#000000" face="Arial, Helvetica, sans-serif">Adjuntar Video : </font></span></td>
                                                <td><span class="field Estilo2"><font face="Arial, Helvetica, sans-serif">
                                                  <input name="frm_video" type="text" disabled="false" class="Parrafos" id="frm_video" size="30" maxlength="100">
                                                </font></span></td>
                                                <td><span class="field Estilo2"><font face="Arial, Helvetica, sans-serif">
                                                  <input name="file_video" type="file" class="Parrafos" id="file_video" value="...Adjuntar Video" >
                                                </font></span></td>
                                              </tr>
                                              <tr>
                                                <td><span class="Estilo2"><font color="#000000" face="Arial, Helvetica, sans-serif">Descripcion Video : </font></span></td>
                                                <td colspan="2"><span class="field Estilo2"><font face="Arial, Helvetica, sans-serif">
                                                  <input name='frm_descripcion_video' type=text id="frm_descripcion_video" size="70">
                                                </font></span></td>
                                                </tr>
                                              <tr>
                                                <td colspan="3"><table border="0" align="center" cellpadding="0" cellspacing="5" bgcolor="#CCCCCC">
                                                  <tr>
                                                    <td><? if(($ing==1) or ($editar==1)){ ?><input type="button" name="Submit52" value="Agregar Video" OnClick="javascript:adjuntar_video(this.form,num1,num2)"><? } ?>

													</td>
                                                  </tr>
                                                </table></td>
                                                </tr>

                                            </table></td>
                                            <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                                          </tr>
                                          <tr>
                                            <td height="10" width="10"><img src="imagenes/g3.gif" width="10" height="10"></td>
                                            <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                                            <td height="10" width="10"><img src="imagenes/g4.gif" width="10" height="10"></td>
                                          </tr>
                                      </table>
									</div>
									<DIV id=imagenes style="DISPLAY: none; Z-INDEX: 1">
									   <?
									      if ($id_gal<>"") 
										  { 
											   $qry_galeria="select * from galeria_fotografica where id_galeria=".$id_gal;
											   $result_galeria=mysql_query($qry_galeria); 
											   $row_galeria=mysql_fetch_array($result_galeria);
										  }
										?>
                                        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody>
                                          <tr>
                                            <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10"></td>
                                            <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                                            <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10"></td>
                                          </tr>
                                          <tr>
                                            <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                                            <td width="100%" valign="top" bgcolor="#FFFFFF" class="stylos"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
                                                <tr>
                                                  <td colspan="3" class="Estilo1 done"><strong>. : : Agregar Fotograf&iacute;as</strong></td>
                                                </tr>
                                                <tr>
                                                  <td class="done"><span class="Estilo2"><font color="#000000" face="Arial, Helvetica, sans-serif">Fotograf&igrave;a 
                                                    : </font></span></td>
                                                  <td class="done"><span class="field Estilo2"><font face="Arial, Helvetica, sans-serif">
                                                    <input name="frm_foto1" type="text" disabled="false" class="Parrafos" id="frm_foto1" value= "<? echo ($row_galeria['nombre_archivo']); ?>" size="30" maxlength="100">
                                                  </font></span></td>
                                                  <td class="done"><span class="field Estilo2"><font face="Arial, Helvetica, sans-serif">
                                                    <input name="file_foto1" type="file" class="Parrafos" value="...Ingresar Foto" >
                                                  </font></span></td>
                                                </tr>
                                                <tr>
                                                  <td class="done"><span class="Estilo2"><font color="#000000" face="Arial, Helvetica, sans-serif">Descripci&oacute;n : </font></span></td>
                                                  <td colspan="2" class="done"><span class="field Estilo2"><font face="Arial, Helvetica, sans-serif">
                                                    <input name="frm_piefoto1" type="text" class="Parrafos" id="frm_piefoto1" value= "<? echo $row_galeria['descripcion']; ?>" size="70" maxlength="255">
                                                  </font></span></td>
                                                </tr>
                                                <tr>
                                                  <td colspan="3" class="done"><table border="0" align="center" cellpadding="0" cellspacing="5">
                                                    <tr>
                                                      <td class="Estilo1"><label>
                                                        <input name="foto_principal" type="checkbox" id="foto_principal" value="1" <? if ($row_galeria['foto_principal']==1){ ?> checked="checked" <? } ?>>
														</label></td>
                                                      <td class="Estilo1">Foto Principal </td>
													 
                                                    </tr>
                                                  </table></td>
                                                </tr>
                                                <tr>
                                                  <td colspan="3" class="done"><table border="0" align="center" cellpadding="0" cellspacing="5" bgcolor="#CCCCCC">
                                                    <tr>
                                                      <td><label>
													  <?
													     if ($editar_imagen=='')
														 {
													  ?>
													  <? if(($ing==1) ||($editar==1)){ ?><input type="button" name="Submit5" value="Agregar Imagen" onClick="javascript:adjuntar_fotografia(this.form,num1,num2)"><? } ?>
													  <? }else {?>
													  <? if($editar==1){ ?><input type="button" name="Submit6" value="Aceptar Cambios"  onClick="javascript:enviar_imagen(this.form,num1,num2)"><? } ?>
													  <? } ?>
													  <input name="id_imagen" type="hidden" id="id_imagen" value="<? echo $id_gal; ?>">
													  <input name="editar_imagen" type="hidden" id="editar_imagen" value="<? echo $editar_imagen; ?>">
                                                      </label></td>
                                                      <td><input type="button" name="Submit42" value="Cancelar" onClick="javascript:cancelar_imagen(this.form)"></td>
                                                    </tr>
                                                  </table></td>
                                                </tr>
                                            </table></td>
                                            <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                                          </tr>
                                          <tr>
                                            <td height="10" width="10"><img src="imagenes/g3.gif" width="10" height="10"></td>
                                            <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                                            <td height="10" width="10"><img src="imagenes/g4.gif" width="10" height="10"></td>
                                          </tr>
                                     </table>
									</div>
        <?
									if ($row['imagen']<>"")
							        { ?>
        <table border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><div align="center"><img src="../noticias/fotos/<? echo $row['imagen']; ?>" width="133" height="103" /><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000066"><? if($editar==1){ ?><a href="gr_noticias.php?eliminar_foto1=1&amp;id_not=<? echo $row['id']; ?>&amp;id_m=<? echo $id_m;  ?>&amp;id_sub=<? echo $id_sub; ?>"><br />
              Eliminar</a><? } ?></font></strong></font></div></td>
          </tr>
        </table>
        <? }
									
									if ($id<>'')
									{
									   $col=1;
									   $qry_galeria="select * from galeria_fotografica where id_proyecto=".$id."  order by foto_principal desc";
									   $result_galeria=mysql_query($qry_galeria); 
									   $registros_galeria=mysql_num_rows($result_galeria);
									?>
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="20" valign="middle" class="Estilo5 Estilo7 Estilo8"><table border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td bgcolor="#FFFFFF" class="Estilo9">&nbsp;&middot;&nbsp;IMAGENES DEL PROYECTO </td>
                  <td><img src="imagenes/borde_esquina.jpg" width="21" height="19" /></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tbody>
                  <tr>
                    <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10" /></td>
                    <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                    <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10" /></td>
                  </tr>
                  <tr>
                    <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                    <td width="100%" valign="top" bgcolor="#FFFFFF" class="stylos">
					<div id="gallery">
					
					<table align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <?	
									  while ($row_galeria=mysql_fetch_array($result_galeria))
									  { 
										 if($col==7)
										 {
										 ?>
                        </tr>
                        <tr>
                          <?  
										    $col=1;
										 }
											  ?>
                          <td><table border="1" cellpadding="0" cellspacing="2" bordercolor="#DBDBDB">
                              <tr>
                                <td><div align="center"><a href="../../../imagenes/proyectos/pro_<? echo $id;?>/<? echo $row_galeria['nom_archivo']; ?>" title="<? echo $row_galeria['descripcion']; ?>" rel="lightbox[roadtrip]" class="lightbox"><img src="../../../imagenes/proyectos/pro_<? echo $id;?>/<? echo $row_galeria['nom_archivo']; ?>" width="80" height="60" border="0" /></a> </div></td>
                              </tr>
                              <tr>
                                <td><div align="center">
                                    <table border="0" align="center" cellpadding="0" cellspacing="2">
                                      <tr>
                                        <td><div align="center"><a href="gr_fotografias.php?eliminar_foto1=1&amp;id_pro=<? echo $id; ?>&amp;id_gal=<? echo $row_galeria['id_galeria']; ?>&amp;id_m=<? echo $id_m;  ?>&amp;id_sub=<? echo $id_sub; ?>"><? if($editar==1){ ?><img src="imagenes/boton_cancel.gif" alt="Eliminar Foto" width="16" height="16" border="0" /><? } ?></a></div></td>
                                        <td><div align="center"><a href="gr_fotografias.php?id_gal=<? echo $row_galeria['id_galeria']; ?>&amp;id_pro=<? echo $id;?>&amp;editar_imagen=1&amp;op=2&amp;id_m=<? echo $id_m;  ?>&amp;id_sub=<? echo $id_sub; ?>"><img src="imagenes/boton_ok.gif" alt="Actualizar Comentario" width="16" height="16" border="0" /></a></div></td>
                                        <td><div align="center">
                                            <? if ($row_galeria['foto_principal']==1){?>
                                            <img src="imagenes/boton_principal.gif" alt="Foto Principal" width="16" height="15" />
                                            <? } ?>
                                        </div></td>
                                      </tr>
                                    </table>
                                </div></td>
                              </tr>
                          </table></td>
                          <?  		$col++;
										
											 }
									?>
                        </tr>
                    </table>
					</div>
					</td>
                    <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                  </tr>
                  <tr>
                    <td height="10" width="10"><img src="imagenes/g3.gif" width="10" height="10" /></td>
                    <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                    <td height="10" width="10"><img src="imagenes/g4.gif" width="10" height="10" /></td>
                  </tr>
                </tbody>
            </table></td>
          </tr>
        </table>
        <br />
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="20" valign="middle" class="Estilo5 Estilo7 Estilo8"><table border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td bgcolor="#FFFFFF" class="Estilo9">&nbsp;&middot;&nbsp;DOCUMENTOS ASOCIADOS AL PROYECTO </td>
                  <td><img src="imagenes/borde_esquina.jpg" width="21" height="19" /></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tbody>
                  <tr>
                    <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10" /></td>
                    <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                    <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10" /></td>
                  </tr>
                  <tr>
                    <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                    <td width="100%" valign="top" bgcolor="#FFFFFF" class="stylos"><div align="left">
                        <table width="100%" border="0" cellspacing="3" cellpadding="0">
                          <tr>
                            <td bgcolor="#D8D8D8" class="Estilo3"><div align="center">Id Dcto.</div></td>
                            <td bgcolor="#D8D8D8" class="Estilo3"><div align="center">Descripci&oacute;n Dcto.</div></td>
                            <td bgcolor="#D8D8D8" class="Estilo3"><div align="center">Nombre Dcto. </div></td>
                            <td bgcolor="#D8D8D8" class="Estilo3"><div align="center">Accion</div></td>
                          </tr>
                          <?
							$qry_dcto="select * from documentos_proyecto where id_proyecto=".$id."";
							$result_dcto=mysql_query($qry_dcto); 
							while ($row_dcto=mysql_fetch_array($result_dcto))
							{  ?>
                          <tr>
                            <td class="Estilo3"><? echo $row_dcto['id_documento']; ?></td>
                            <td class="Estilo3"><? echo $row_dcto['descripcion']; ?></td>
                            <td class="Estilo3"><? echo $row_dcto['nom_archivo']; ?></td>
                            <td class="Estilo3"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                                <tr>
                                  <td><div align="center"><a href="gr_dcto_not.php?id_doc=<? echo $row_dcto['id_documento'];?>&amp;eliminar=1&amp;nom_archivo=<? echo $row_dcto['nom_archivo'];?>&amp;id_pro=<? echo $id;?>&amp;id_m=<? echo $id_m;  ?>&amp;id_sub=<? echo $id_sub; ?>"><? if($editar==1){ ?><img src="imagenes/btn_eliminar.jpg" alt="Eliminar Dcto." width="19" height="20" border="0" /><? } ?></a></div></td>
                                  <td><div align="center"><a href="../../../documentos/proyectos/pro_<? echo $id; ?>/<? echo $row_dcto['nom_archivo']; ?>" target="_blank"><img src="imagenes/btn_ver.jpg" alt="Ver Dcto." width="19" height="19" border="0" /></a></div></td>
                                </tr>
                            </table></td>
                          </tr>
                          <?
																  } 
																  ?>
                        </table>
                    </div></td>
                    <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                  </tr>
                  <tr>
                    <td height="10" width="10"><img src="imagenes/g3.gif" width="10" height="10" /></td>
                    <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                    <td height="10" width="10"><img src="imagenes/g4.gif" width="10" height="10" /></td>
                  </tr>
                </tbody>
            </table></td>
          </tr>
        </table>
        <?
									}
						
									if($id<>"")
									{
									 $ruta=$rows['id']."_pro_video";
									 $qry_video="select * from galeria_video where id_proyecto=".$id;
									 $result_video=mysql_query($qry_video); 
									 while ($row_video=mysql_fetch_array($result_video))
									 {
									?>
        <table border="0" align="center" cellpadding="0" cellspacing="5">
          <tr>
            <td><iframe src="../../../archivos/videos/<? echo $ruta; ?>/reproductor_video.php?video=<? echo $row_video['nom_archivo'];?>" frameborder="0" width="328" height="220" scrolling="No"></iframe></td>
            <td class="Estilo3"><a href="gr_video_not.php?eliminar_video=1&amp;id_pro=<? echo $id; ?>&amp;id_gal=<? echo $row_video['id_video'];?>&amp;id_m=<? echo $id_m;  ?>&amp;id_sub=<? echo $id_sub; ?>"><? if($editar==1){ ?><img src="imagenes/boton_cancel.gif" alt="Eliminar Foto" width="16" height="16" border="0" /><? } ?></a></td>
          </tr>
        </table>
        <?
									}
									}
									?>
        <br /></td>
      </tr>
	  <tr>
        <td height="38" colspan="2" bordercolor="#FFFFFF" bgcolor="#FFFFFF"><table width="80%" align="center" cellpadding="0" cellspacing="5" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
            <tr>
              <th height="35" scope="col"> <? if($tipo=='Nueva') { 
			  		if($ing==1){
			  ?>
                  <input name="Submit3" type="button" id="Submit3" value="Nuevo" onClick="enviando(this.form);" />                  <?  } else { 
				  
				  echo '</th><tr><td align="center"><span class="titulos_noticias">NO TIENE LOS PERMISOS PARA INGRESAR PROYECTOS</span> </td></tr><th>';
				  }
				  ?>
				  <input type="button" name="Submit32" value="Volver" onClick="javascript:volver(this.form,num1,num2);" />
				  
				  
				   <input name="nuevo_ingresar" type="hidden" id="nuevo_ingresar"/>
                  <? } else {  ?>
                  <? if($editar==1){ ?><input type="button" name="Submit33" value="Aceptar Cambios" onClick="update(this.form);" />
				  <? } 
				  if($elimina==1){  ?>
                  <input name="Submit3" type="button" id="Submit3" value="Eliminar" onClick="eliminar(this.form)" />
				  <? } ?>
                  <input type="button" name="Submit35" value="Volver" onClick="javascript:volver(this.form,num1,num2);" />
                 
                  <input name="ac_cambios" type="hidden" id="ac_cambios" />
                  <input name="id_pro" type="hidden" id="id_pro" value="<? echo $id;?>" />
                  <input name="ac_ingreso" type="hidden" id="ac_ingreso" />
                  <input name="Eliminar" type="hidden" id="Eliminar" /></th>
              <? } 
			  ?>
            </tr>
        </table>
         </td>
      </tr>
    </table>
  </div>  </td>
  </tr>
 

</table>


</div>
                </td>
                <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
              </tr>
              <tr>
                <td height="10" width="10"><img src="imagenes/g3.gif" width="10" height="10" /></td>
                <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" border="0" /></td>
                <td height="10" width="10"><img src="imagenes/g4.gif" width="10" height="10" /></td>
              </tr>
            </tbody>
        </table>
			<input name="id_m2" type="hidden" id="id_m2" value="<? echo $id_m; ?>" />
            <input name="id_sub" type="hidden" id="id_sub" value="<? echo $id_sub; ?>" />
			
		</td>
      </tr>
    </table>
	</form>
      <table width="780" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td></td>
        </tr>
        <tr>
          <td>
<? }
   if($op==3){?>
<form name="form2" method="post" action="">
		    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tbody>
                <tr>
                  <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10" /></td>
                  <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                  <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10" /></td>
                </tr>
                <tr>
                  <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                  <td valign="top" bgcolor="#FFFFFF" class="stylos"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <th scope="col">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                                <th scope="col">
								<br />
								<div align="center">
    <table width="100%" border="0" cellspacing="5" bgcolor="#EFEFEF">
      <tr>
        <th colspan="4" class="textos_noticias" scope="col">Buscar Proyectos </th>
        </tr>
      <tr>
        <td width="62" class="textos_noticias"><div align="right">Buscar : </div></td>
        <td width="430"><input name="frm_buscar" type="text" id="frm_buscar" value="<? echo $frm_buscar; ?>" size="65"  /></td>
        <td width="58" class="textos_noticias"><div align="right">Filtro : </div></td>
        <td width="165"><label>
          <select name="se_filtro" id="se_filtro">
            <option value="0"<? if($se_filtro==0){ ?> selected<? } ?>>.:: Seleccione ::.</option>
            <option value="1" <? if($se_filtro==1){ ?> selected<? } ?>>Codigo Bip</option>
            <option value="2" <? if($se_filtro==2){ ?> selected<? } ?>>Nombre</option>
            <option value="3" <? if($se_filtro==3){ ?> selected<? } ?>>Provincia</option>
            <option value="4" <? if($se_filtro==4){ ?> selected<? } ?>>Comuna</option>
          </select>
        </label></td>
      </tr>
      <tr>
        <td height="50" colspan="4"><div align="center">
          <table width="75%" border="0" cellspacing="5" bgcolor="#FFFFFF">
            <tr>
              <th scope="col"><label>
                <input type="button" name="Submit4" value="Buscar" onClick="javascript:buscar(this.form,num1,num2)" />
                <input type="button" name="Submit352" value="Volver" onClick="javascript:volver(this.form,num1,num2);" />
                <input name="ac_buscar" type="hidden" id="ac_buscar" />
                <input name="id_m" type="hidden" id="id_m" value="<? echo $id_m; ?>" />
              </label></th>
            </tr>
          </table>
        </div></td>
        </tr>
    </table>
  </div>
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <? if($list==1){ ?> 
								    <tr>
                                      <td><div align="center" class="titulos_eje_economico">Proyectos ya Ingresados: <? echo $registros; ?></div></td>
                                    </tr>
                                    <tr>
                                      <th scope="col"><table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#D6D6D6">
                                          <tr>
                                            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
                                                <tr>
                                                  <td bgcolor="#EFEFEF" class="titulos_general"><div align="center">Codigo Bip </div></td>
                                                  <td bgcolor="#EFEFEF" class="titulos_general"><div align="center">Nombre</div></td>
                                                  <td bgcolor="#EFEFEF" class="titulos_general"><div align="center">Fecha Inicio </div></td>
                                                  <td width="70" bgcolor="#EFEFEF" class="titulos_general"><div align="center">Etapa</div></td>
                                                  <td bgcolor="#EFEFEF" class="titulos_general"><div align="center">Acci&oacute;n</div></td>
                                                </tr>
                                                
<?
while($rows=mysql_fetch_array($_pagi_result)){				
?>
                                                <tr>
                                                  <td class="titulos_general"><div align="center"><? echo $rows['codigo_bip']; ?></div></td>
                                                  <td class="titulos_general"><div align="left"><? echo ucwords($rows['nombre']); ?> </div></td>
                                                  <td width="100" class="titulos_general"><div align="center"><? echo fecha_formato_espanol($rows['fecha_inicio']);?> </div></td>
                                                  
                                                  <td class="titulos_general"><div align="center">
                                                      <? 
													  $etapaQL="SELECT * FROM etapa WHERE id_etapa='".$rows['id_etapa']."'";
													  $resultQL=mysql_query($etapaQL);
													  $rowsEta=mysql_fetch_array($resultQL);
													  echo $rowsEta['nom_etapa']; ?>
                                                    
                                                    </div></td>
                                                  <td><div align="center"><a href="frm_proyectos.php?id=<? echo $rows['id']; ?>&amp;tipo=Editar&amp;op=2&amp;id_m=<? echo $id_m; ?>&amp;id_sub=<? echo $id_sub; ?>"><img src="../../../imagenes/icono_editar.jpg" alt="editar" width="21" height="20" border="0" /></a></div></td>
                                                </tr>
                                                <? } ?>
												<tr><td colspan="5"><div align="center" class="textos_noticias">Pagina&nbsp;<? echo $_pagi_navegacion; ?></div></td></tr>
                                            </table></td>
                                          </tr>
                                      </table></th>
                                    </tr>
                                </table>
								</th>
                              </tr>
							  <? } ?>
                            </table>
                        </th>
                      </tr>
                  </table></td>
                  <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                </tr>
                <tr>
                  <td height="10" width="10"><img src="imagenes/g3.gif" width="10" height="10" /></td>
                  <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                  <td height="10" width="10"><img src="imagenes/g4.gif" width="10" height="10" /></td>
                </tr>
              </tbody>
          </table>
</form>
	  <? } ?>	  
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">www.gorecoquimbo.cl</font></div></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>

</body>
</html>

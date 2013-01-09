<?

include ("../../../funciones/fechas.php");

global $usernameadmin,$Submit1,$informe_a;

while (list ($key, $val) = each ($_REQUEST))
 {
  $$key = $val;
 } 

set_time_limit(0);
$inform = explode('|',$informe_a);

$inf=count($inform);

$k=0;
//echo "<table width='100%'><tr><td>Id Proyecto</td><td>Codigo BIP</td><td>Nombre</td><td>Fecha Inicio</td><td>Etapa</td><td>Accion</td></tr><tr>";

?>
<html>
<link href="CSS/estilo.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../funciones/calendario.js"></script>
<style type="text/css">
<!--
.Estilo1 {
	color: #666666;
	font-size: 12px;
	font-style: normal;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo3 {color: #FF0000}
.Estilo4 {color: #00CC00}
body {
	background-image: url(imagenes/fondo.jpg);
}
.Estilo2 {font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
<script language="javascript" type="text/javascript">
function activar(forma)
{	
    forma.action="gr_activar_senal.php";
	forma.submit();
}
</script>
</head>

<body>
<table border="2" cellpadding="0" cellspacing="10" bordercolor="#FFFFFF" bgcolor="#CCCCCC">
  <tr>
    <td bgcolor="#FFFFFF"><table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
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
        </td>
      </tr>
    </table>
      <table width="780" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td>&nbsp;</td>
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
                  <td valign="top" bgcolor="#FFFFFF" class="stylos"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <th scope="col"><form id="form1" name="form1" method="post" action="">
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
          <th scope="col"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
           
            <tr>
              <th scope="col"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><div align="center" class="titulos_eje_economico">Proyectos ya Ingresados: <? echo $inf;
 ?></div></td>
                </tr>
                <tr>
                  <th scope="col"><table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#D6D6D6">
                    <tr>
                      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
                        <tr>
						
                          <td bgcolor="#EFEFEF" class="titulos_general"><div align="center">Codigo Bip </div></td>
                          <td bgcolor="#EFEFEF" class="titulos_general"><div align="center">Nombre</div></td>
                          <td bgcolor="#EFEFEF" class="titulos_general"><div align="center">Fecha Inicio </div></td>
						  <td></td>
                          <td bgcolor="#EFEFEF" class="titulos_general"><div align="center">Acci&oacute;n</div></td>
                        </tr>
                        <?
for ($c=0;$c<$inf; $c++)
{
echo "<tr>";

$cadena=$inform[$c]; 
$maximo= strlen ($cadena); 
$ide2= "+"; 
$total2= stripos($cadena,$ide2); /*
echo "Largo de la cadena: $maximo"; 
echo "<br>"; 
echo "Lo que sobra al inicio: $total"; 
echo "<br>"; */
$total3= ($maximo-$total2); 
$final2= substr ($cadena,-$total3,$maximo);
$final= substr ($cadena,0,-$total3); 
/*echo "Esto es lo que queremos: $final"; 
echo"<br>"; 
echo $inform[$c]."<br>";*/
$cambio=str_replace("+","</td><td class='titulos_general'>",$final2);
echo $cambio;

echo "<td align='center'><a href='frm_proyectos.php?op=2&list=1&id=$final&tipo=Editar'>Modificar Datos</a></td></tr>";
}
 ?>
                        
                      </table></td>
                    </tr>
                  </table></th>
                </tr>
              </table></th>
            </tr>
           
          </table></th>
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
                        </form></th>
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

<? 
	include ("../funciones/conexion_gore_banco.php");
	include ("../funciones/fechas.php");
	
	global $usernameadmin,$idtipo;

 while (list ($key, $val) = each ($_REQUEST))
 {
  $$key = $val;
 } 
 
session_start(); 
	
	$sql_mant = "select  * from mantenedores";
	$result_sqlMan=mysql_query($sql_mant);
			
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0">
<table width="175" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td><div align="center"><img src="../imagenes/logo.jpg" width="164" height="158"></div>
    <hr></td>
  </tr>
  <tr>
    <td><table border="0" align="center" cellpadding="0" cellspacing="5">
        <tr>
          <td><a href="administrador.php" target="mainFrame"><font color="#333333" size="2" face="Arial, Helvetica, sans-serif"><strong>Modulo 
            de Mantenci&oacute;n</strong></font></a></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="2" cellpadding="0">
	  <?
	    $sql="SELECT * FROM sistema WHERE estado_sistema=1";
		$result=mysql_query($sql);
	
		$cont=0;
		while($row_sistema=mysql_fetch_array($result)){

		$sql_per_sis="Select * from permiso where id_sistema='".$row_sistema['id_sistema']."' and id_usuario='".$_SESSION['idusername']."' and id_subsistema=0";
		$result_per_sis=mysql_query($sql_per_sis);
		$row_per_sis=mysql_fetch_array($result_per_sis);

		if($row_per_sis['visualizar']==1){  ?>
        <tr> 
          <td width="14"><img src="../imagenes/vineta_verde_chica.jpg" width="14" height="12"></td>
          <td>
	
		  <a href="<? echo $row_sistema['url_sistema']; ?>?id_m=<? echo $row_sistema['id_sistema'] ?>" target="mainFrame">
		  <font color="#666666" size="2" face="Arial, Helvetica, sans-serif"> 
            Admin. <? echo $row_sistema['nombre_sistema']; ?></font></a></td>
        </tr>
		<?
			$sql_sub="Select * from subsistemas where estado_subsistema=1 and id_sistema='".$row_sistema['id_sistema']."' ORDER BY nombre_subsistema ASC";

		//  $sql_sub="SELECT * FROM permiso where id_sistema='".$row_sistema['id_sistema'] ."' and id_usuario='".$_SESSION['idusername']."'";	
		  $ejecucion=mysql_query($sql_sub);
		  $subsistemas =mysql_num_rows($ejecucion);
		 if($subsistemas>0){
		 ?>
		 <div id="lista<? echo $row_sistema['id_sistema']; ?>">
		<tr>
		<td></td><? while($row_sub=mysql_fetch_array($ejecucion)){
		  $SQL_sub="SELECT * FROM subsistemas where id_subsistema='".$row_sub['id_subsistema']."'";
		  $ejecuta=mysql_query($SQL_sub);
		  $row_sub2=mysql_fetch_array($ejecuta);
		 ?>
		 <tr>
		<td width="7"> <img src="../imagenes/vineta_verde_chica.jpg" width="7" height="6"></td><td><a href="<? echo $row_sub2['url_subsistema']; ?>?id_m=<? echo $row_sub2['id_sistema'] ?>&id_sub=<? echo $row_sub2['id_subsistema']; ?>" target="mainFrame"><font color="#666666" size="1" face="Arial, Helvetica, sans-serif">Admin. <? echo $row_sub2['nombre_subsistema']; ?></font></a></td></tr>		  <? } ?>
		
		</tr>
		</div>
		<?
		}
		$cont++;  
		}
		}
		if($cont==0){?>
		
		<tr>
		<td colspan="2" class="titulos_noticias_destacados">
		  <div align="center" class="titulos_noticias">No Tiene Permiso a los Modulos</div></td>
		</tr>
		<? } ?>
        <tr> 
          <td colspan="2"><hr color="#990000"></td>
        </tr>
        <tr> 
          <td><img src="../imagenes/ico_clave_login.png" width="18" height="18"></td>
          <td><a href="cambio_clave.php" target="mainFrame"><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">Cambio 
            de Password</font></a></td>
        </tr>
        <tr>
          <td><div align="center"><img src="../imagenes/btn_cerrar.png" width="15" height="15"></div></td>
          <td><a href="index.php" target="_parent"><font color="#990000" size="2" face="Arial, Helvetica, sans-serif">Salir 
            (Cerrar Sesi&oacute;n)</font></a></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>

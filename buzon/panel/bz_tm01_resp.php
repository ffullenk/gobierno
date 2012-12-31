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
	/*se incluyen los archivos*/
	@include("../lib/grbz-sesion.php");
	@include("../lib/bc_lib.php");

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
        <div id="listatabla"> 
          <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr> 
              <td colspan="3" height="10"></td>
            </tr>
            <tr> 
              <td colspan="3" height="5"></td>
            </tr>
            <?
					  /* Limito la busqueda */
					     $TAMANO_PAGINA = 25;
					  /* examino la p�gina a mostrar y el inicio del registro a mostrar */
					     $pagina = $_GET["pagina"];
					     if (!$pagina) {
					         $inicio = 0;
					         $pagina=1;
					     } else {
					         $inicio = ($pagina - 1) * $TAMANO_PAGINA;
					     }
						$ssql = "SELECT COD_TEMA, TEMA FROM TEMAS ORDER BY TEMA DESC";
						$rs = mysql_query($ssql);
						$num_total_registros = mysql_num_rows($rs);
						if( $num_total_registros > 0 ) {
							/* calculo el total de p�ginas */
							$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
							/* pongo el n�mero de registros total, el tama�o de p�gina y la p�gina que se muestraA */
							$maxpags = 15;
							$minimo = $maxpags ? max(1, $pagina-ceil($maxpags/2)): 1;
							$maximo = $maxpags ? min($total_paginas, $pagina+floor($maxpags/2)): $total_paginas;
							/* construyo la sentencia SQL */
							$ssql.= " LIMIT ". $inicio . "," . $TAMANO_PAGINA;
							$rs = mysql_query($ssql); ?>
            <tr> 
              <td colspan="3" height="15" style="border-bottom:1px solid #000; font-family:arial, verdana; font-size:10px;"></td>
            </tr>
            <tr> 
              <td colspan="3" height="5"></td>
            </tr>
            <?php
				while ($fila=mysql_fetch_object($rs)) { ?>
            <tr> 
              <td><strong><em><?php echo $fila->TEMA;?></em></strong></td>
              <td><form id="formlist" method="post" action="bz_tm01m.php">
                  <input type="hidden" name="id" value="<?php echo $fila->COD_TEMA;?>">
                  <input type="submit" value="Modificar"class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
                </form></td>
              <td><form id="formlist" method="post" action="bz_tm01e.php">
                  <input type="hidden" name="id" value="<?php echo $fila->COD_TEMA;?>">
                  <input type="submit" value="Eliminar"class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
                </form></td>
            </tr>
            <tr> 
              <td height="5" colspan="3"></td>
            </tr>
            <tr> 
              <td colspan="3"><div style="border-bottom:1px dotted #eaeaea;">&nbsp;</div></td>
            </tr>
            <tr> 
              <td height="10" colspan="3"></td>
            </tr>
            <? } ?>
            <tr> 
              <td colspan="3" height="10"></td>
            </tr>
            <tr> 
              <td colspan="3" height="1" style="border-bottom:1px solid #000;">&nbsp;</td>
            </tr>
            <tr> 
              <td colspan="3" height="4"></td>
            </tr>
            <tr> 
              <td colspan="3" style="font-family:verdana; font-size:10px; color:#000;"> 
                <?php
						/* cerramos el conjunto de resultados y la conexi�n con la base de datos */
						mysql_free_result($rs);
						//mysql_close();
						if ($total_paginas > 1) { echo "<strong>P&aacute;gina </strong>&nbsp;"; }
							/* muestro los distintos �ndices de las p�ginas, si es que hay varias p�ginas */
						if($pagina > 1)
						{
							echo "<a href='".$_SERVER["PHP_SELF"]."?c=".$c."&pagina=".($pagina-1)."'>";
							echo "<font face='verdana' size='-2'>&laquo;&laquo; anterior</font>";
							echo "</a>&nbsp;";
						}
						if ($total_paginas > 1)
						{
							for ($i=$minimo; $i<$pagina; $i++){
								echo "<a href='".$_SERVER["PHP_SELF"]."?c=".$c."&pagina=".$i."'> $i</a>&nbsp;";
							}
							echo "[". $pagina. "]&nbsp;";
							for ($i=$pagina+1; $i<=$maximo; $i++){
								echo "<a href='".$_SERVER["PHP_SELF"]."?c=".$c."&pagina=".$i."'>$i</a>&nbsp;";
							}
						}
						if($pagina<$total_paginas)
						{
							echo "&nbsp;<a href='".$_SERVER["PHP_SELF"]."?c=".$c."&pagina=" .($pagina+1). "'>";
							echo "<font face='verdana' size='-2'>siguiente &raquo;&raquo;</font></a>";
						}
					} else{ echo " No se encuentran registros para visualizar. ";} ?>
              </td>
            </tr>
          </table>
          <!-- Fin de Paginacion -->
        </div>
        <div style="border-bottom:1px dashed #CDD5A3;">&nbsp;</div>
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

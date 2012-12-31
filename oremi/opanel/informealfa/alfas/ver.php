<?php
/*  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");*/
  
	@include("../../../lib/config.php");
	@include("../../../lib/oremi.php");
    @include("../../utiles/utiles.php");

	global $SERVER, $DB, $USER, $PASSWORD;
	@include("../../../lib/global.php");
	@include("../../../lib/recordset.php");

	/*  umask(0);*/
	$require_php = "ra28xbEblRnj";
	global $global_qk, $global_cg;
	$global_qk=0;
	$global_cg=0;

	require("../../detect.php");

if($loginCorrecto ) { 
    @include("utiles/utiles.php");
    cabOremi();
	izqOremi();
	modOremi("V");
?>
    <div >
       <div >
	   <?php
	   	//$id = $_POST["id"];
		
		$rsEvento = new Recordset($SERVER, $DB, $USER, $PASSWORD);
		$sqlEvento = "SELECT EVENTOALFA_ID, TITULOEVENTO FROM EVENTOALFA WHERE EVENTOALFA_ID = \"$id\" ";
		$rsEvento->Open($sqlEvento);
		$nroEvento = $rsEvento->RecordCount();
		if( $nroEvento > 0 ) {
				$rsEvento->moveNext();
				$tituloEvento = $rsEvento->FieldByNumber(1);
		
echo "		<div id=\"mconregistro\">
<p align=\"center\"><span style=\"font-size:14pt; font-family:Georgia,Verdana;line-height:18pt;\">Consolidados Regionales para el Evento<br />

					<a href=\"index.php\">". $tituloEvento . "</a></span></p>
					
			  <div id=\"tablaRegistros\">
			  <table border=\"0\" cellpadding=\"3\" cellspacing=\"1\" >";
				/* Limito la busqueda */
				$TAMANO_PAGINA = _nroFilas_;
				/* examino la página a mostrar y el inicio del registro a mostrar */
				$pg = $_GET["pg"];

				if (!$pg) { $inicio = 0; $pg=1; } else { $inicio = ($pg - 1) * $TAMANO_PAGINA; }

				$rsAlfas = new Recordset($SERVER, $DB, $USER, $PASSWORD);
				$sqlAlfas = "SELECT INFORMEALFA_ID, EVENTOALFA_ID, TITULOINFORME, FECHA, HORA 
								FROM INFORMEALFA 
								WHERE EVENTOALFA_ID=\"$id\" ";

				$rsAlfas->Open($sqlAlfas);
				$num_total_registros = $rsAlfas->RecordCount();
				if( $num_total_registros > 0 ) {
					/* calculo el total de páginas */
					$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
					/* pongo el número de registros total, el tamaño de página y la página que se muestraA */
					$maxpags = 10;
					$minimo = $maxpags ? max(1, $pg-ceil($maxpags/2)): 1;
					$maximo = $maxpags ? min($total_paginas, $pg+floor($maxpags/2)): $total_paginas;
					/* construyo la sentencia SQL */
					$sqlAlfas.= " LIMIT ". $inicio . "," . $TAMANO_PAGINA .";";
					$rsAlfas->Open($sqlAlfas);
					echo "<tr><th class=\"tituloTabla\">Informe</th><th class=\"tituloTabla\">Ocurrencia</th><td></td></tr>";
					$colorbg = "#F5F5F5";
					$i=0;
					while($rsAlfas->moveNext() ) { 
					
						if($i%2==0) { echo "<tr bgcolor=\"#F5F5F5\" valign=\"middle\">";} else {echo "<tr bgcolor=\"#ffffff\" valign=\"middle\">";}
						$i++;?>
						
<td class="texto-contenido"><?php echo $rsAlfas->FieldByNumber(2);?></td>

<td class="texto-contenido"><?php echo fechaNuestra($rsAlfas->FieldByNumber(3)) ." ".$rsAlfas->FieldByNumber(4);?></td>

<form action="../ver/muestra.php" method="post" name="edita" id="edita" target="_blank">
<td align="center">
<input type="hidden" name="id" value="<?php echo $id;?>" />
<input type="hidden" name="alfa" value="<?php echo $rsAlfas->FieldByNumber(0);?>" />
<input type="submit" class="edita" value=" Ver " />
</td>
</form>


						</tr>
<?php				} ?>
					<tr> 
						<td style="font-family:verdana; font-size:10px; color:#000;" colspan="3"> 
						<?php
						if ($total_paginas > 1) { echo "<strong>P&aacute;gina </strong>&nbsp;"; }
						/* muestro los distintos índices de las páginas, si es que hay varias páginas */
						if($pg > 1) {
							echo "<a href='".$_SERVER["PHP_SELF"]."?pg=".($pg-1)."&id=".$id."'>";
							echo "<font face='verdana' size='-2'>&laquo;&laquo; anterior</font>";
							echo "</a>&nbsp;";
						}

						if ($total_paginas > 1) {
							for ($i=$minimo; $i<$pg; $i++){
								echo "<a href='".$_SERVER["PHP_SELF"]."?pg=".$i."&id=".$id."'> $i</a>&nbsp;";
							}
							echo "[". $pg. "]&nbsp;";
							for ($i=$pg+1; $i<=$maximo; $i++){
								echo "<a href='".$_SERVER["PHP_SELF"]."?pg=".$i."&id=".$id."'>$i</a>&nbsp;";

							}
						}

						if($pg<$total_paginas) {
							echo "&nbsp;<a href='".$_SERVER["PHP_SELF"]."?pg=" .($pg+1). "&id=".$id."'>
							<font face=\"verdana\" size=\"-2\">siguiente &raquo;&raquo;</font></a>";
						}
echo "		        </td>
					</tr>";
 			} else{ echo "<tr><td class=\"texto-contenido\" colspan=\"3\"> No se encuentran registros para visualizar</td></tr> ";} 
echo "
				</table>
			</div>
		</div>";



		} else { echo " No tenemos Eventos en Proceso. <br /> "; }

	   ?>
       </div>
    </div>
  </div>
<?php
	pieOremi();

} else { header("Location: ../../logout.php"); }
?>
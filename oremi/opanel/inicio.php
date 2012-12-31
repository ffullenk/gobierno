<?php
/*  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");*/
  
	@include("../lib/config.php");
	@include("../lib/oremi.php");

	global $SERVER, $DB, $USER, $PASSWORD;
	@include("../lib/global.php");
	@include("../lib/recordset.php");

	/*  umask(0);*/
	$require_php = "ra28xbEblRnj";
	global $global_qk, $global_cg;
	$global_qk=0;
	$global_cg=0;

	require("detect.php");

if($loginCorrecto ) { 
    @include("utiles/utiles.php");
    cabOremi();
	izqOremi();
	modOremi("I");
?>
    <div >
       <div >
	   <?php
	    if($global_cg!=5) {
	    $ssql = verificaCargo($global_cg);
		$rsEventos = new Recordset($SERVER, $DB, $USER, $PASSWORD);
		$rsEventos->Open($ssql);
  
		$nroEventos = $rsEventos->RecordCount();
		if($nroEventos>0) {
$t = time();
$sesAlfa = md5(uniqid("$global_qk:$t"));
		 
			// Mostramos en una lista Los eventos.
echo "		<div id=\"mconregistro\">
				<p style=\"background-color:#F0E9E1; padding:5px; border:1px solid #fff;font-family:Arial,Verdana; font-size:10pt;\">Usted visualiza en estos momentos, los Eventos que se encuentran en proceso y que han sido creado por Usted.
				
				Desde aqu&iacute;, podr&aacute; visualizarlos <em>opci&oacute;n VER</em>, o bien proceder a ". $_aEventoBoton[$global_cg].".</p>
				
			<div id=\"tablaRegistros\">
			  <table border=\"0\" cellspacing=\"1\" cellpadding=\"2\" >";
				/* Limito la busqueda */
				$TAMANO_PAGINA = _nroFilas_;
				/* examino la página a mostrar y el inicio del registro a mostrar */
				$pg = $_GET["pg"];

				if (!$pg) { $inicio = 0; $pg=1; } else { $inicio = ($pg - 1) * $TAMANO_PAGINA; }

				// TPALERTA con switch case

				$rsEventos->Open($ssql);
				$num_total_registros = $rsEventos->RecordCount();
				if( $num_total_registros > 0 ) {
					/* calculo el total de páginas */
					$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
					/* pongo el número de registros total, el tamaño de página y la página que se muestraA */
					$maxpags = 10;
					$minimo = $maxpags ? max(1, $pg-ceil($maxpags/2)): 1;
					$maximo = $maxpags ? min($total_paginas, $pg+floor($maxpags/2)): $total_paginas;
					/* construyo la sentencia SQL */
					$ssql.= " LIMIT ". $inicio . "," . $TAMANO_PAGINA .";";
					$rsEventos->Open($ssql);
					echo "<tr><td class=\"tituloTabla\">Evento</td><td class=\"tituloTabla\">".$_aEventoColumna[$global_cg]."</td><td class=\"tituloTabla\">Ocurrencia</td><td colspan=\"2\">&nbsp;</tr>";
					$colorbg = "#F5F5F5";
					$i=0;
$esteAnyo = Date("Y");
					while($rsEventos->moveNext() ) { 
					
						if($i%2==0) { echo "<tr bgcolor=\"#F5F5F5\" valign=\"middle\">";} else {echo "<tr bgcolor=\"#ffffff\" valign=\"middle\">";}
						$i++;?>
						
							<td class="texto-contenido"><?php echo $rsEventos->FieldByNumber(2);?></td>
							<td class="texto-contenido" align="center"><?php echo $rsEventos->FieldByNumber(1);?></td>
							<td class="texto-contenido"><?php echo fechaNuestra($rsEventos->FieldByNumber(3)) . " ".$rsEventos->FieldByNumber(4);?></td>
<form action="<?php echo $_aEventoPathVe[$global_cg];?>index.php" method="post" name="edita" id="edita">
<td align="center">
<input type="hidden" name="id" value="<?php echo $rsEventos->FieldByNumber(0);?>" />
<input type="submit" class="edita" value=" Ver " />
</td>
</form>

<form action="<?php echo $_aEventoPathCrea[$global_cg];?>index.php" method="post" name="crea" id="crea">
<td align="center">
<input type="hidden" name="id" value="<?php echo $rsEventos->FieldByNumber(0);?>" />
<input type="hidden" name="sesAlfa" value="<?php echo $sesAlfa;?>" />
<input type="submit" class="crea" value=" <?php echo $_aEventoBoton[$global_cg];?> " />

</td></form>
						</tr>
<?php				} ?>
					<tr> 
						<td style="font-family:verdana; font-size:10px; color:#000;" colspan="5"> 
						<?php
						if ($total_paginas > 1) { echo "<strong>P&aacute;gina </strong>&nbsp;"; }
						/* muestro los distintos índices de las páginas, si es que hay varias páginas */
						if($pg > 1) {
							echo "<a href='".$_SERVER["PHP_SELF"]."?pg=".($pg-1)."&alerta=".$alerta."'>";
							echo "<font face='verdana' size='-2'>&laquo;&laquo; anterior</font>";
							echo "</a>&nbsp;";
						}

						if ($total_paginas > 1) {
							for ($i=$minimo; $i<$pg; $i++){
								echo "<a href='".$_SERVER["PHP_SELF"]."?pg=".$i."&alerta=".$alerta."'> $i</a>&nbsp;";
							}
							echo "[". $pg. "]&nbsp;";
							for ($i=$pg+1; $i<=$maximo; $i++){
								echo "<a href='".$_SERVER["PHP_SELF"]."?pg=".$i."&alerta=".$alerta."'>$i</a>&nbsp;";

							}
						}

						if($pg<$total_paginas) {
							echo "&nbsp;<a href='".$_SERVER["PHP_SELF"]."?pg=" .($pg+1). "&alerta=".$alerta."'>
							<font face=\"verdana\" size=\"-2\">siguiente &raquo;&raquo;</font></a>";
						}
echo "		        </td>
					</tr>";
 			} else{ echo "<tr><td class=\"texto-contenido\" colspan=\"5\"> No se encuentran registros para visualizar</td></tr> ";} 
echo "
				</table>
			</div>
		</div>";



		} else { echo " No tenemos Eventos en Proceso. <br /> "; }
} else {header("Location:informa/index.php");}
	   ?>
       </div>
    </div>
  </div>
<?php
	pieOremi();

} else { header("Location: logout.php"); }
?>

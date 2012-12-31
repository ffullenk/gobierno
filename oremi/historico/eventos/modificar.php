<?php
  session_start();
 
 $userBackEnd = $_SESSION['userBackEnd'];
 $passBackEnd = $_SESSION['passBackEnd'];
 
 include("../incluir/seteaConf.php");
 include("../incluir/seteaBD.php");
 include("../incluir/encripta.php");
 $link = conectar();
 include("../incluir/seteaScr.php");
 include("../incluir/funciones.php");

 if(estaActivo($userBackEnd, $passBackEnd)) {
   oremiCab();
   oremiMenu(esUsuario($userBackEnd, $passBackEnd), 2);
   oremiColDer( esUsuario($userBackEnd, $passBackEnd), 2 );

   $fechaActual = date("d-m-Y");
   ?>
	<div id="colTwo">
		<div class="bg2">
			<h2><em>Eventos</em>: Modificar Evento</h2>
			<p></p>
		    <h3>Formulario Modificar Evento</h3>
		    <div class="bg1">
			    <p align="right">&nbsp;</p>
				<script language="javaScript" type="text/javascript" src="../javas/jsforms.js"></script>
				<Script language="JavaScript" src="../javas/fecha.js" type="text/javascript"></Script>
			    <Script language="JavaScript" src="../javas/calendar1.js" type="text/javascript"></Script>
				<form action="form_modificar_evento.php" method="post" name="evento" id="evento" onSubmit="chequea_form_modificar_evento_paso1(); return false">
				<table border="0" cellspacing="2" cellpadding="3" width="90%" align="center" id="listaTabla">
                   <tr><th colspan="2" style="font-size:1.8em;">Modificar Evento Paso 1</th></tr>
			       <tr><td colspan="2" height="25"></td></tr>
				   <tr><td colspan="2" style="border-bottom:1px solid #555;font-size:1.3em;">Ubicaci&oacute;n del Evento</td></tr>
				   <tr><td colspan="2">
				           <table border="0" cellspacing="1" cellpadding="2" align="center" style="border:1px solid #C3D9FF;">
						     <tr>
							    <th>Comuna</th>
								<td>
								   <?php
								       $qComunas = "SELECT COM_ID, COMUNA FROM COMUNA WHERE PROV_ID BETWEEN 10 AND 12";
                                       $rsComunas = mysql_query($qComunas);
							           if(mysql_num_rows($rsComunas) > 0 )
							           {
							              echo "<select name=\"comuna\" id=\"comuna\" size=\"1\"  >
							                       <option value=\"-\">Seleccione Comuna...</option>";
							                       while($pCom = mysql_fetch_array($rsComunas))
							                       {
							                          echo "<option value=\"".$pCom['COM_ID']."\">".htmlentities($pCom['COMUNA'])."</option>";
								                   }
							              echo "</select>";
							           }
								   ?>
								</td>
							 </tr>                             
						   </table>
				       </td>
				   </tr>
				   <tr><td colspan="2" height="5"></td></tr>
				   <tr><td colspan="2" style="border-bottom:1px solid #555;font-size:1.3em;">Tipo de Evento</td></tr>
                   <tr><td colspan="2">
                           <table border="0" cellspacing="1" cellpadding="2" align="center" style="border:1px solid #C3D9FF;">
                             <tr>
                                <th>Comuna</th>
                                <td>
				                <?php
						            $qTipoEvento = "SELECT tpevento_id, tpevento FROM orm_tipoevento WHERE estado=\"A\"";
                                    $rsTipoEvento = mysql_query($qTipoEvento);
							        if(mysql_num_rows($rsTipoEvento) > 0 )
							        {
							           echo "<select name=\"tipoevento\" id=\"tipoevento\" size=\"1\" >
							                    <option value=\"-\">Seleccione Tipo de Evento...</option>";
							                    while($pTE = mysql_fetch_array($rsTipoEvento))
							                    {
							                        echo "<option value=\"".$pTE['tpevento_id']."\">".$pTE['tpevento']."</option>";
								                }
							           echo "</select>";
							        }
						        ?>
					            </td>
                             </tr>   
                           </table>
                        </td>     
			       </tr>
				   <tr><td colspan="2" height="5"></td></tr>
				   
				   
				   <tr><td colspan="2" style="border-bottom:1px solid #555;font-size:1.3em;">Ocurrencia del Evento</td></tr>
				   <tr><td colspan="2" >
				           <table border="0" cellspacing="1" cellpadding="2" align="center" style="border:1px solid #C3D9FF;">
							  <tr>
							     <th>Fecha Desde:</th>
								 <td>
<input type="text" name="fecha" size="10" maxlength="10" value="<?=$fechaActual;?>" onchange="return ValidaFecha2(this.value);">&nbsp;
<a href="javascript:cal1.popup();"><img src="../images/cal.gif" width="16" height="16" border="0" alt="Fecha Ocurrencia"></a>
<script language="JavaScript">
<!-- // 
var cal1 = new calendar1(document.forms['evento'].elements['fecha']);
cal1.year_scroll = true;
cal1.time_comp = false;
//-->
</script>
								 </td>
							  </tr>
<tr>
                                 <th>Fecha Hasta:</th>
                                 <td>
<input type="text" name="fechahasta" size="10" maxlength="10" value="<?=$fechaActual;?>" onchange="return ValidaFecha2(this.value);">&nbsp;
<a href="javascript:cal2.popup();"><img src="../images/cal.gif" width="16" height="16" border="0" alt="Fecha Ocurrencia"></a>
<script language="JavaScript">
<!-- // 
var cal2 = new calendar1(document.forms['evento'].elements['fechahasta']);
cal2.year_scroll = true;
cal2.time_comp = false;
//-->
</script>
                                 </td>
                              </tr>                              
						   </table>
				   </td></tr>
				   <tr><td colspan="2" height="5"></td></tr>
				   
		            <tr><td colspan="2" align="center"><input type="submit" class="inputsubmit" value="Buscar Ocurrencias" name="bcrea"></td></tr>
                    <tr><td colspan="2" height="5"></td></tr>
				</table>
				</form>
		    </div>
		</div>

<?php
oremiPie();
} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";}
?>
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
?>
	<div id="colTwo">
		<div class="bg2">
			<h2><em>Eventos</em>: Modificar Evento</h2>
			<p></p> <!-- Agregar Evento. -->
		    <h3>Formulario Modificar Evento</h3>
		    <div class="bg1">
			    <p align="right">&nbsp;</p>
				<script language="javaScript" type="text/javascript" src="../javas/jsforms.js"></script>
				<script src="../javas/selectusers.js"></script>
				<script src="../javas/agregalineas.js"></script>
				<Script language="JavaScript" src="../javas/fecha.js" type="text/javascript"></Script>
			    <Script language="JavaScript" src="../javas/calendar1.js" type="text/javascript"></Script>
				<form action="form_actualizar_evento.php" method="post" name="evento" id="evento" onSubmit="chequea_form_modificar_evento_paso3(); return false">
				<table border="0" cellspacing="2" cellpadding="3" width="90%" align="center" id="listaTabla">
                   <tr><th colspan="2" style="font-size:1.8em;">Formulario Modificar Evento Paso 3</th></tr>
			       <tr><td colspan="2" height="25"></td></tr>
				   
                   <?php
                       $id = $_GET['id'];
                       $sqlEditaEvento = "SELECT tpevento_id, COM_ID, fechaevento, horaevento, evento_obs, dnper_afe, dnper_dam, dnper_her, dnper_mue, dnper_alb, dnviv_may, dnviv_men, dnviv_des
                                               FROM orm_historico
                                               WHERE evento_id=\"$id\"";
                       $qryEditaEvento = mysql_query($sqlEditaEvento);
                       
                       if(mysql_num_rows($qryEditaEvento)>0) { 
                           $pEvento = mysql_fetch_array($qryEditaEvento); 
                           $evento_observaciones = str_replace("<br />", "\n", $pEvento['evento_obs']); ?>
                   
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
							                  echo "<select name=\"comuna\" id=\"comuna\" size=\"1\" onchange=\"showLocalidadesMod(this.value,".$id.")\"  >
							                       <option value=\"-\">Seleccione Comuna...</option>";
							                       while($pCom = mysql_fetch_array($rsComunas))
							                       {
                                                      if($pEvento['COM_ID']==$pCom['COM_ID']) {
                                                         echo "<option value=\"".$pCom['COM_ID']."\" selected>".htmlentities($pCom['COMUNA'])."</option>";    
                                                      } else {
                                                         echo "<option value=\"".$pCom['COM_ID']."\">".htmlentities($pCom['COMUNA'])."</option>"; 
                                                      }							                          
								                   }
							              echo "   </select>";
							              }  ?>
								        </td>
							         </tr>
							         <tr><td colspan="2" >
				                             <table border="0" cellspacing="1" cellpadding="2" align="center" style="border:1px solid #C3D9FF;">
						                        <tr><th class="subtabla">Localidades Afectadas</th></tr>
							                    <tr><td><div id="txtLoc"><b>Caracteristicas del Evento de Acuerdo a la Seleccion.</b></div></td>
                                                </tr>
						                     </table>
				                     </td></tr>
				                     <tr><td colspan="2" height="25"></td></tr>
						          </table>
				              </td>
				          </tr>
				          <tr><td colspan="2" height="25"></td></tr>
				   
				          <tr><td colspan="2" style="border-bottom:1px solid #555;font-size:1.3em;">Tipo de Evento</td></tr>
				          <tr><th align="right">Evento:</th>
			                  <td>
					             <?php
						         $qTipoEvento = "SELECT tpevento_id, tpevento FROM orm_tipoevento WHERE estado=\"A\"";
                                 $rsTipoEvento = mysql_query($qTipoEvento);
							     if(mysql_num_rows($rsTipoEvento) > 0 )
							     {
							         echo "<select name=\"tipoevento\" id=\"tipoevento\" size=\"1\"  onchange=\"showUserMod(this.value,".$id.")\"  >
							            <option value=\"-\">Seleccione Tipo de Evento...</option>";
							         while($pTE = mysql_fetch_array($rsTipoEvento))
							         {
                                         if($pEvento['tpevento_id']==$pTE['tpevento_id']) {
                                           echo "<option value=\"".$pTE['tpevento_id']."\" selected>".$pTE['tpevento']."</option>";  
                                         } else {
                                           echo "<option value=\"".$pTE['tpevento_id']."\">".$pTE['tpevento']."</option>";  
                                         }
                                         
							            
								     }
							         echo "</select>";
							     } ?>
					          </td>
			              </tr>
				          <tr><td colspan="2" height="5"></td></tr>
				          <tr><td colspan="2" >
				                 <table border="0" cellspacing="1" cellpadding="2" align="center" style="border:1px solid #C3D9FF;">
						            <tr><th class="subtabla">Caracter&iacute;sticas del Evento</th></tr>
							        <tr><td><div id="txtHint"><b>Caracteristicas del Evento de Acuerdo a la Seleccion.</b></div></td></tr>
						         </table>
				         </td></tr>
				   <tr><td colspan="2" height="25"></td></tr>
				   
				   <tr><td colspan="2" style="border-bottom:1px solid #555;font-size:1.3em;">Ocurrencia del Evento</td></tr>
				   <tr><td colspan="2" >
				           <table border="0" cellspacing="1" cellpadding="2" align="center" style="border:1px solid #C3D9FF;">
							  <tr>
							     <th>Fecha:</th>
								 <td>
<input type="text" name="fecha" size="10" maxlength="10" value="<?=convertir_fecha($pEvento['fechaevento'])?>" onchange="return ValidaFecha2(this.value);">&nbsp;
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
							     <th>Hora:</th>
								 <td>
								    <select name="hora" size="1">
									<?php
									   for($nhor=0;$nhor<=24;$nhor++)
									   {
									      echo "<option value=\"".$nhor."\">".$nhor."</option>";
									   }
									?>
									</select>
									&nbsp;:&nbsp;
									<select name="minutos" size="1">
									<?php
									   for($nmin=0;$nmin<=59;$nmin++)
									   {
									      echo "<option value=\"".$nmin."\">".$nmin."</option>";
									   }
									?>
									</select>
								 </td>
							  </tr>
						   </table>
				   </td></tr>
				   <tr><td colspan="2" height="25"></td></tr>
				   
				   
				   <tr><td colspan="2" style="border-bottom:1px solid #555;font-size:1.3em;">Da&ntilde;os Persona</td></tr>
				   <tr><td colspan="2" >
				           <table border="0" cellspacing="0" cellpadding="0" align="center" style="border:1px solid #C3D9FF;">
						      <tr align="center">
							     <th class="subtabla">Afectadas</th>
								 <th class="subtabla">Albergadas</th>
								 <th class="subtabla">Heridas</th>
								 <th class="subtabla">Damnificadas</th>
								 <th class="subtabla">Muertas</th>
							  </tr>
							  <tr>
							     <td><input type="text" class="inputform" name="danos_afectadas" id="danos_afectadas" size="10"></td>
								 <td><input type="text" class="inputform" name="danos_albergadas" id="danos_albergadas" size="10"></td>
								 <td><input type="text" class="inputform" name="danos_heridas" id="danos_heridas" size="10"></td>
								 <td><input type="text" class="inputform" name="danos_damnificadas" id="danos_damnificadas" size="10"></td>
								 <td><input type="text" class="inputform" name="danos_muertas" id="danos_muertas" size="10"></td>
							  </tr>
						   </table>
					   </td>
					</tr>
				   
				   <tr><td colspan="2" height="25"></td></tr>
				   <tr><td colspan="2" style="border-bottom:1px solid #555;font-size:1.3em;">Da&ntilde;os Vivienda</td></tr>
				   <tr><td colspan="2" >
				           <table border="0" cellspacing="0" cellpadding="0" align="center" style="border:1px solid #C3D9FF;">
						      <tr align="center">
							     <th class="subtabla">Da&ntilde;o Mayor</th>
								 <th class="subtabla">Da&ntilde;o Menor</th>
								 <th class="subtabla">Destruidas</th>
							  </tr>
							  <tr>
							     <td><input type="text" class="inputform" name="danos_mayor" id="danos_mayor" size="10"></td>
								 <td><input type="text" class="inputform" name="danos_menor" id="danos_menor" size="10"></td>
								 <td><input type="text" class="inputform" name="danos_destruidas" id="danos_destruidas" size="10"></td>
							  </tr>
						   </table>
					   </td>
					</tr>
				   
				   <tr><td colspan="2" height="25"></td></tr>
				   <tr><td colspan="2" style="border-bottom:1px solid #555;font-size:1.3em;">Da&ntilde;o Infraestructura P&uacute;blica</td></tr>
				   <tr><td colspan="2" >
				           <table border="0" cellspacing="0" cellpadding="0" align="center" style="border:1px solid #C3D9FF;">
						      <tr align="center">
							      <td>
								     <a href="javascript:addFormLine('myDiv', 'myLine');">Agregar Linea +</a> <br><br>
									 <div id="myDiv"></div>
									 <div id="myLine" class="hide" title="Infraestructura(150),Nombre(100),DanoMayor(70),DanoMenor(70),Destruidas(70)">
									    <div>
										   <?php
										      $qInfraPub = "SELECT tpinfra_id, tpinfra FROM orm_infra WHERE estado=\"A\"";
                                              $rsInfraPub = mysql_query($qInfraPub);
							                  if(mysql_num_rows($rsInfraPub) > 0 )
							                  {
							                     echo "<select name=\"infrapub[]\" id=\"infrapub\" size=\"1\" style=\"width:150px;\">
							                              <option value=\"-\">Seleccione Infraestructura...</option>";
							                              while($pIP = mysql_fetch_array($rsInfraPub))
							                              {
							                                 echo "<option value=\"".$pIP['tpinfra_id']."\">".$pIP['tpinfra']."</option>";
								                          }
							                     echo "</select>";
							                  }
										      ?>
										</div>
										<div><input type="text" value="" name="infrapub_nombre[]" maxlength="50" style="width: 100px"></div>
										<div><input type="text" value="" name="infrapub_dmay[]" maxlength="50" style="width: 70px"></div>
										<div><input type="text" value="" name="infrapub_dmen[]" maxlength="50" style="width: 70px"></div>
										<div><input type="text" value="" name="infrapub_dest[]" maxlength="50" style="width: 70px"></div>
									 </div>
							      </td>
							  </tr>
						   </table>
					   </td>
					</tr>

					<tr><td colspan="2" height="25"></td></tr>
				   <tr><td colspan="2" style="border-bottom:1px solid #555;font-size:1.3em;">Da&ntilde;o Vialidad</td></tr>
				   <tr><td colspan="2" >
				           <table border="0" cellspacing="0" cellpadding="0" align="center" style="border:1px solid #C3D9FF;">
						      <tr align="center">
							      <td>
								     <a href="javascript:addFormLine('myVialidad', 'myVialidadLine');">Agregar Linea +</a> <br><br>
									 <div id="myVialidad"></div>
									 <div id="myVialidadLine" class="hide" title="Obra(150),Ruta(100),KM/Coordenada(100)">
									    <div>
										   <?php
										      $qVial = "SELECT vialidad_id, vialidad FROM orm_vialidad WHERE estado=\"A\"";
                                              $rsVial = mysql_query($qVial);
							                  if(mysql_num_rows($rsVial) > 0 )
							                  {
							                     echo "<select name=\"vialidad[]\" id=\"infrapub\" size=\"1\" style=\"width:150px;\">
							                              <option value=\"-\">Seleccione Obra...</option>";
							                              while($pVI = mysql_fetch_array($rsVial))
							                              {
							                                 echo "<option value=\"".$pVI['vialidad_id']."\">".$pVI['vialidad']."</option>";
								                          }
							                     echo "</select>";
							                  }
										      ?>
										</div>
										<div><input type="text" value="" name="vialidad_ruta[]" maxlength="50" style="width: 100px"></div>
										<div><input type="text" value="" name="vialidad_km[]" maxlength="50" style="width: 100px"></div>
										
									 </div>									 
							      </td>
							  </tr>
						   </table>
					   </td>
					</tr>
                   
				   <tr><td colspan="2" height="25"></td></tr>
				   <tr><td colspan="2" style="border-bottom:1px solid #555;font-size:1.3em;">Da&ntilde;o Otra Infraestructura</td></tr>
				   <tr><td colspan="2" >
				           <table border="0" cellspacing="0" cellpadding="0" align="center" style="border:1px solid #C3D9FF;">
						      <tr align="center">
							      <td>
								     <a href="javascript:addFormLine('myOtra', 'myOtraLine');">Agregar Linea +</a> <br><br>
									 <div id="myOtra"></div>
									 <div id="myOtraLine" class="hide" title="Infraestructura(150),Ruta(100),KM/Coordenada(100)">
									    <div>
										   <?php
										      $qOtra = "SELECT otrainfra_id, otrainfra FROM orm_otrainfra WHERE estado=\"A\"";
                                              $rsOtra = mysql_query($qOtra);
							                  if(mysql_num_rows($rsOtra) > 0 )
							                  {
							                     echo "<select name=\"otrainfra[]\" id=\"infrapub\" size=\"1\" style=\"width:150px;\" >
							                              <option value=\"-\">Seleccione Infraestructura...</option>";
							                              while($pOT = mysql_fetch_array($rsOtra))
							                              {
							                                 echo "<option value=\"".$pOT['otrainfra_id']."\">".$pOT['otrainfra']."</option>";
								                          }
							                     echo "</select>";
							                  }
										      ?>
										</div>
										<div><input type="text" value="" name="otrainfra_ruta[]" maxlength="50" style="width: 100px"></div>
										<div><input type="text" value="" name="otrainfra_km[]" maxlength="50" style="width: 100px"></div>
										
									 </div>									 
							      </td>
							  </tr>
						   </table>
					   </td>
					</tr>
					<tr><td colspan="2" height="25"></td></tr>
				    <tr><td colspan="2" style="border-bottom:1px solid #555;font-size:1.3em;">Observaciones</td></tr>
					<tr><td colspan="2">
					        <textarea name="evento_observaciones" id="evento_observaciones" rows="7" cols="60"><?=$evento_observaciones?></textarea>
					    </td>
					</tr>
					
					<tr><td colspan="2" height="25"></td></tr>
		            <tr><td colspan="2" align="center"><input type="submit" class="inputsubmit" value="Actualizar Evento" name="bmodifica"></td></tr>
<?php          } ?>                    
                
				</table>
				</form>
		    </div>
		</div>

<?php
oremiPie();
} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";}
?>
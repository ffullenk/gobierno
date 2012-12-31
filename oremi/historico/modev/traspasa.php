<?php
 include("../incluir/seteaConf.php");
 include("../incluir/seteaBD.php");
 include("../incluir/encripta.php");
 $enlazaBD = conectar();
 include("../incluir/seteaScr.php");
 include("../incluir/funciones.php");
 
 $a_tipoevento_todos = array("1","2","3","6","18","24");
 
 /* Generamos la consulta: Recorremos la Tabla de Los Eventos Traspasados a la tabla temporal */
 $qVeEv = "SELECT * FROM PASO_A_HISTORICO";
 $rVeEv = mysql_query($qVeEv);
       
 if(mysql_num_rows($rVeEv) > 0 ) {
           echo "<h1>Se Seleccionaron Todos los Eventos</h1>";
           while($pVeEv = mysql_fetch_array($rVeEv)) {
               /* Traspasamos el registro hacia tabla de historicos*/
               $eve_observaciones = $pVeEv['TITULOINFORME'] . "<br> ". $pVeEv['RESUMEN'] ."<br> ". $pVeEv['OBSERVACIONES'];
               
               $qInserta = "INSERT INTO orm_historico(tpevento_id,COM_ID,dnper_afe,dnper_dam,dnper_her,dnper_mue,dnper_alb,dnviv_may,dnviv_men,dnviv_des,fechaevento,horaevento,evento_obs) 
                                              VALUES('".$pVeEv['tpevento_id']."','".$pVeEv['COM_ID']."','".$pVeEv['PERSONAS_AFECTADAS']."','".$pVeEv['PERSONAS_DAMNIFICADAS']."','".$pVeEv['PERSONAS_HERIDAS']."','".$pVeEv['PERSONAS_MUERTAS']."','".$pVeEv['PERSONAS_ALBERGADAS']."','".$pVeEv['VIVIENDAS_DANO_MENOR']."','".$pVeEv['VIVIENDAS_DANO_MAYOR']."','".$pVeEv['VIVIENDAS_DESTRUIDA']."','".$pVeEv['FECHA']."','".$pVeEv['HORA']."','".$eve_observaciones."')";
               
               /*echo $qInserta ."<br>";*/
               $rInserta = mysql_query($qInserta);
               
               if($rInserta) {
                   
                   /* Debemos recuperar el ID del registro ingresado para luego ocupar este ID al momento de generar las Localidades involucradas en este evento */
                   $registroIngresado = mysql_insert_id();
                   echo "
                   <hr>
                   <h2>Ultimo registro ingresado: ".$registroIngresado . "</h2>"; 
                   if(in_array($pVeEv['tpevento_id'],$a_tipoevento_todos)) {
                      /* Chequea el dato en el Array
                       *  Si existe coincidencia, se deben contemplar todas las localidades para este evento 
                       * 
                      */
                      echo "<p>El Evento debe ser para todas las localidades de la comuna: ".$pVeEv['COM_ID']." </p>";
                      
                      $qLocalidades = "SELECT ID_LOC FROM oremi_localidad WHERE COM_ID=\"".$pVeEv['COM_ID']."\"";
                      $rLocalidades = mysql_query($qLocalidades);
                      if(mysql_num_rows($rLocalidades)>0) {
                        while ($pLocalidades = mysql_fetch_array($rLocalidades))
                        {
                           $idLocalidad =  $pLocalidades['ID_LOC'];
                           echo "<strong>LOCALIDAD: ". $idLocalidad . "</strong><br>";
                           
                           /* Insertamos la localidad en tabla de historico de localidades */
                           $qInsLoc = "INSERT INTO hist_localidades(evento_id,ID_LOC) VALUES('".$registroIngresado."','".$pLocalidades['ID_LOC']."')";
                           $rInsLoc = mysql_query($qInsLoc);
                                
                           if($rInsLoc) {
                              echo "<p>Registro Anadido ID_EVENTO".$registroIngresado." LOCALIDAD". $pLocalidades['ID_LOC'] ." COMUNA". $pVeEv['COM_ID']."</p>";
                           } else {
                              echo "<p>Registro NO Anadido ID_EVENTO".$registroIngresado." LOCALIDAD". $pLocalidades['ID_LOC'] ." COMUNA". $pVeEv['COM_ID']."</p>";
                           }
                        }
                        
                        
                      }
                   } else {
                     /* Solo agregamos a la columna actual dentro de las localidades 
                     *  
                     * 
                     */   
                     
                     /* localizamos el ID_LOC para esta comuna */
                     echo "<p>El Evento debe ser para  la comuna: ".$pVeEv['COM_ID']." </p><br>";
                     
                     $qLocalidades = "SELECT ID_LOC FROM oremi_localidad WHERE COM_ID=\"".$pVeEv['COM_ID']."\"";
                     $rLocalidades = mysql_query($qLocalidades);
                     if(mysql_num_rows($rLocalidades)>0) {
                        $pLocalidades = mysql_fetch_array($rLocalidades);
                        $idLocalidad =  $pLocalidades['ID_LOC'];
                        
                        echo "<strong>LOCALIDAD: ". $idLocalidad . "</strong><br>";    
                        
                       /* Insertamos la localidad en tabla de historico de localidades */
                       $qInsLoc = "INSERT INTO hist_localidades(evento_id,ID_LOC) VALUES('".$registroIngresado."','".$idLocalidad."')";
                       $rInsLoc = mysql_query($qInsLoc);
                        if($rInsLoc) {
                                  echo "<p>Registro Anadido EVENTO".$registroIngresado." LOCALIDAD". $idLocalidad ." COMUNA " .$pVeEv['COM_ID']."</p>";
                        } else {
                                  echo "<p>Registro NO Anadido EVENTO".$registroIngresado." LOCALIDAD". $idLocalidad ." COMUNA " .$pVeEv['COM_ID']."</p>";
                        }
                     }  
                   
                   }
                   
               } else { echo "<p>No se pudo insertar el registro en paso_ormhist<p>"; }
               echo "<p>&nbsp;</p>";
           }
 }         
            ?>
 
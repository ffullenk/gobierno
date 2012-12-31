<?php
session_start();
 
 $userBackEnd = $_SESSION['userBackEnd'];
 $passBackEnd = $_SESSION['passBackEnd'];
 $tipoUsrBackEnd = $_SESSION['tipoUsrBackEnd'];
 
 include("../incluir/seteaConf.php");
 include("../incluir/seteaBD.php");
 include("../incluir/encripta.php");
 $link = conectar();

 include("../incluir/seteaScr.php");
 include("../incluir/funciones.php");

 if(estaActivo($userBackEnd, $passBackEnd)) {
   jicaOrm_cabecera();
   jicaOrm_SinMenuAdmin();

   // Obtenemod el ID del Escenario
   $idE = $HTTP_GET_VARS["idE"];

   ?>
   <!-- Presentacion Inicial -->
   <td colspan="2" align="center">
         <table border="0" cellspacing="0" cellpadding="0">
            
            <tr><td>Identificacione Usuario: <?php echo muestraUsuario($userBackEnd);?></td></tr>
        
<?php
        $qChkEscenarios = "SELECT tpevento, LUGAR, DESCRIBEESCENARIO, OCURRENCIA ".
                          "FROM orm_escenario AS E, orm_tipoevento AS T, orm_lugar AS L ".
                          "WHERE                                
                               E.tpevento_id=T.tpevento_id AND 
                               E.ID_LUGAR=L.ID_LUGAR AND 
                               E.ID_ESCENARIO=\"$idE\" AND 
                               ESTADOESCENARIO=\"A\" ";

        $rChkEscenarios = mysql_query($qChkEscenarios );

        if(mysql_num_rows($rChkEscenarios) > 0 )
        {
           echo "<tr><td>
                        <div style=\"margin:15px; padding:15px 10px; border:1px solid #eaeaea;\">";

                        $ptrEsce = mysql_fetch_array($rChkEscenarios);
     
                        echo "
                            <h2>Escenario: ".$ptrEsce['DESCRIBEESCENARIO']."</h2>
                            <h3>Lugar: ".$ptrEsce['LUGAR']."</h3>
                            <h3>Tipo de Evento: ".$ptrEsce['tpevento']."</h3>
                            <h3>Ocurrencia: ".convertir_fecha($ptrEsce['OCURRENCIA'])."</h3>
                            </div>
                </td></tr>
                ";
        }

        // Chequea los Puntos Criticos que se han ingresado para este Escenario
        $qChkPtos = "SELECT ID_ACCPTOCRITICO, X.ID_PTOCRITICO, PTOCRITICO, OCURRENCIAPTOCRITICO, HORA, SINTETIZA FROM orm_acciones_ptoscriticos AS X, orm_ptoscriticos AS P WHERE X.ID_PTOCRITICO=P.ID_PTOCRITICO AND ID_ESCENARIO=\"$idE\" ";
        $rChkPtos = mysql_query($qChkPtos);



        if(mysql_num_rows($rChkPtos) > 0 ) {
           echo "<tr><td><h1>Sintetizar En Escenario</h1></td></tr>";

        while($ptrChkPtos=mysql_fetch_array($rChkPtos)) {
              echo "
              
              <tr><td>
              <ul>
                 <li>".convertir_fecha($ptrChkPtos['OCURRENCIAPTOCRITICO'])." / "
                      .$ptrChkPtos['HORA']."  - ".$ptrChkPtos['PTOCRITICO']."
                      <a href=\"sintptos.php?idp=".$ptrChkPtos['ID_ACCPTOCRITICO']."&idE=".$idE."\">Sintetizar</a> &nbsp;";

                      if(empty($ptrChkPtos['SINTETIZA'])) { echo "(A&uacute;n sin Sintetizar)"; } else { echo "(Ya Sintetizado)"; }


$qChkSer = "SELECT S.ID_SERVREL, SERVICIO, OCURRENCIASERVREL, HORA, ID_ACCSERVREL, SINTETIZA FROM orm_serviciosrelacionados AS S, orm_acciones_servrel as R WHERE S.ID_PTOCRITICO=\"".$ptrChkPtos['ID_PTOCRITICO']."\" AND S.ID_SERVREL=R.ID_SERVREL ";

                 $rChkSer = mysql_query($qChkSer);
                 
                 if(mysql_num_rows($rChkSer) > 0 ) {
                    echo "<ul>";
                    while($ptrChkSer=mysql_fetch_array($rChkSer)) {
                       echo "<li>". convertir_fecha($ptrChkSer['OCURRENCIASERVREL']) ." / "
                       .$ptrChkSer['HORA']."  - ".$ptrChkSer['SERVICIO']."
                       <a href=\"sintacc.php?ids=".$ptrChkSer['ID_ACCSERVREL']."&idE=".$idE."\">Sintetizar</a> &nbsp;";

                       if(empty($ptrChkSer['SINTETIZA'])) { echo "(A&uacute;n sin Sintetizar)"; } else { echo "(Ya Sintetizado)"; }
                       echo "</li>";
                    }
                    echo "</ul>";
                 }                 
                 
                 echo "</li>";
                 
           }
           echo "</ul>
           </td></tr>";


           
        }

?>
       </table>
   </td>
   <!-- Presentacion Inicial -->
   <?php
   jicaOrm_Pie();

 } else { 
   echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";
 }
?>
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
   $ids = $HTTP_GET_VARS["ids"];
   ?>
   <!-- Presentacion Inicial -->
   <td colspan="2" align="center">
         <table border="0" cellspacing="0" cellpadding="0" style="maring:0 auto;" >
            
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
        $qChkServ = "SELECT S.ID_SERVREL, SERVICIO, OCURRENCIASERVREL, HORA, ID_ACCSERVREL, SINTETIZA, PTOCRITICO, DESCRIBEENTIEMPO ".
                    "FROM orm_serviciosrelacionados AS S, orm_acciones_servrel as R, orm_ptoscriticos AS P ".
                    "WHERE ".
                    "S.ID_PTOCRITICO=P.ID_PTOCRITICO AND ".
                    "S.ID_SERVREL=R.ID_SERVREL AND ".
                    "ID_ACCSERVREL=\"$ids\" ";

        $rChkServ = mysql_query($qChkServ);



        if(mysql_num_rows($rChkServ) > 0 ) {

        $ptrChkServ=mysql_fetch_array($rChkServ);
        echo "
           <tr><td><h1>Sintetizar En Escenario</h1></td></tr>
           <tr><td align=\"center\">
                  <h2>Punto Cr&iacute;tico ".$ptrChkServ['PTOCRITICO']."</h2>
                  <form action=\"sintacc_graba.php\" method=\"post\">
                    <input type=\"hidden\" name=\"idE\" id=\"idE\" value=\"$idE\">
                    <input type=\"hidden\" name=\"ids\" id=\"ids\" value=\"$ids\">
                    <h3>Ingreso de Servicio: ".$ptrChkServ['SERVICIO']."</h3>
                    <p>Ingresado por Responsable:</p>
                    <textarea name=\"servicio\" rows=\"5\" cols=\"45\">".$ptrChkServ['DESCRIBEENTIEMPO']."</textarea>
                    <p>Sintetizar</p>
                    <textarea name=\"sintetiza\" rows=\"5\" cols=\"45\">".$ptrChkServ['SINTETIZA']."</textarea>
                    <p><input type=\"submit\" name=\"graba\" id=\"graba\" value=\"Grabar\"></p>
                  </form>";
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
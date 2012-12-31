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
   $idp = $HTTP_GET_VARS["idp"];
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
        $qChkPtos = "SELECT ID_ACCPTOCRITICO, X.ID_PTOCRITICO, PTOCRITICO, OCURRENCIAPTOCRITICO, HORA, SINTETIZA, DESCRIBEENTIEMPO FROM orm_acciones_ptoscriticos AS X, orm_ptoscriticos AS P WHERE X.ID_PTOCRITICO=P.ID_PTOCRITICO AND X.ID_PTOCRITICO=\"$idp\" AND ID_ESCENARIO=\"$idE\" ";
        $rChkPtos = mysql_query($qChkPtos);



        if(mysql_num_rows($rChkPtos) > 0 ) {

        $ptrChkPtos=mysql_fetch_array($rChkPtos);
        echo "
           <tr><td><h1>Sintetizar En Escenario</h1></td></tr>
           <tr><td>
                  <h2>Ingreso de Punto Cr&iacute;tico</h2>
                  <form action=\"sintptos_graba.php\" method=\"post\">
                    <input type=\"hidden\" name=\"idE\" id=\"idE\" value=\"$idE\">
                    <input type=\"hidden\" name=\"idp\" id=\"idp\" value=\"$idp\">
                    <h3>".$ptrChkPtos['PTOCRITICO']."</h3>
                    <p>Ingresado por Responsable:</p>
                    <textarea name=\"ptocrtitico\" rows=\"5\" cols=\"45\">".$ptrChkPtos['DESCRIBEENTIEMPO']."</textarea>
                    <p>Sintetizar</p>
                    <textarea name=\"sintetiza\" rows=\"5\" cols=\"45\">".$ptrChkPtos['SINTETIZA']."</textarea>
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
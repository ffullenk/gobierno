<?php
  $SERVER    = "192.168.33.20";
    $USER      = "protcivil";
    $DB           = "oremi";
    $PASSWORD  = "g0r30r3m1m011ac0";
function conectar() {
 $link=mysql_connect("192.168.33.20","protcivil","g0r30r3m1m011ac0");
 mysql_select_db("oremi",$link);
 return $link;
}

function desconectar($link) {
  mysql_close($link);
}    
    /*
    Consulta SQL
    
    SELECT I.INFORMEALFA_ID, COM_ID, T.tpevento_id, T.tpevento, TITULOINFORME, RESUMEN, FECHA, HORA, OBSERVACIONES, PERSONAS_AFECTADAS, PERSONAS_DAMNIFICADAS, PERSONAS_HERIDAS, PERSONAS_MUERTAS, PERSONAS_DESAPARECIDAS, PERSONAS_ALBERGADAS, VIVIENDAS_DANO_MENOR, VIVIENDAS_DANO_MAYOR, VIVIENDAS_DESTRUIDA
FROM INFORMEALFA AS I, orm_tipoevento AS T, ALFADANOS AS D, ENCARGADOS AS F
WHERE I.TPEVENTO_ID = T.codigo
AND I.ENCARGADO_ID = F.ENCARGADO_ID
AND I.INFORMEALFA_ID = D.INFORMEALFA_ID
AND CONSOLIDAPROV_ID >0
ORDER BY INFORMEALFA_ID

    */
    $link = conectar();
    
    $qSQL= "SELECT I.INFORMEALFA_ID, COM_ID, T.tpevento_id, T.tpevento, TITULOINFORME, RESUMEN, FECHA, HORA, OBSERVACIONES, PERSONAS_AFECTADAS, PERSONAS_DAMNIFICADAS, PERSONAS_HERIDAS, PERSONAS_MUERTAS, PERSONAS_DESAPARECIDAS, PERSONAS_ALBERGADAS, VIVIENDAS_DANO_MENOR, VIVIENDAS_DANO_MAYOR, VIVIENDAS_DESTRUIDA
FROM INFORMEALFA AS I, orm_tipoevento AS T, ALFADANOS AS D, ENCARGADOS AS F
WHERE I.TPEVENTO_ID = T.codigo
AND I.ENCARGADO_ID = F.ENCARGADO_ID
AND I.INFORMEALFA_ID = D.INFORMEALFA_ID
AND CONSOLIDAPROV_ID >0
ORDER BY INFORMEALFA_ID";
    $rSQL = mysql_query($qSQL);
    if(mysql_num_rows($rSQL)>0) {
        echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"2\">
                 <tr><th>Procesando...</th></tr>
                 ";
                 $i=0;
        while($pInf=mysql_fetch_array($rSQL)) {
            // Insertamos en Tabla PASO_A_HISTORICO los valores
            $paso1 =$pInf['INFORMEALFA_ID'];
            $paso2 =$pInf['COM_ID'];
            $paso3 =$pInf['tpevento_id'];
            $paso4 =$pInf['tpevento'];
            $paso5 =htmlentities($pInf['TITULOINFORME']);
            $paso6 =htmlentities($pInf['RESUMEN']);
            $paso7 =$pInf['FECHA'];
            $paso8 =$pInf['HORA'];
            $paso9 =htmlentities($pInf['OBSERVACIONES']);
            $paso10 =$pInf['PERSONAS_AFECTADAS'];
            $paso11 =$pInf['PERSONAS_DAMNIFICADAS'];
            $paso12 =$pInf['PERSONAS_HERIDAS'];
            $paso13 =$pInf['PERSONAS_MUERTAS'];
            $paso14 =$pInf['PERSONAS_DESAPARECIDAS'];
            $paso15 =$pInf['PERSONAS_ALBERGADAS'];
            $paso16 =$pInf['VIVIENDAS_DANO_MENOR'];
            $paso17 =$pInf['VIVIENDAS_DANO_MAYOR'];
            $paso18 =$pInf['VIVIENDAS_DESTRUIDA'];
            
            
            echo "<tr><td>".$pInf['INFORMEALFA_ID']."</td>
            <td>".$pInf['COM_ID']."</td>
            <td>".$pInf['tpevento_id']."</td>
            <td>".$pInf['tpevento']."</td>
            <td>".htmlentities($pInf['TITULOINFORME'])."</td>
            <td>".htmlentities($pInf['RESUMEN'])."</td>
            <td>".$pInf['FECHA']."</td>
            <td>".$pInf['HORA']."</td>
            <td>".htmlentities($pInf['OBSERVACIONES'])."</td>
            <td>".$pInf['PERSONAS_AFECTADAS']."</td>
            <td>".$pInf['PERSONAS_DAMNIFICADAS']."</td>
            <td>".$pInf['PERSONAS_HERIDAS']."</td>
            <td>".$pInf['PERSONAS_MUERTAS']."</td>
            <td>".$pInf['PERSONAS_DESAPARECIDAS']."</td>
            <td>".$pInf['PERSONAS_ALBERGADAS']."</td>
            <td>".$pInf['VIVIENDAS_DANO_MENOR']."</td>
            <td>".$pInf['VIVIENDAS_DANO_MAYOR']."</td>
            <td>".$pInf['VIVIENDAS_DESTRUIDA']."            
            </tr>";
            $insertaSQL = "INSERT INTO PASO_A_HISTORICO(P_ID,COM_ID,tpevento_id,tpevento,TITULOINFORME,RESUMEN,FECHA,HORA,OBSERVACIONES,PERSONAS_AFECTADAS,PERSONAS_DAMNIFICADAS,PERSONAS_HERIDAS,PERSONAS_MUERTAS,PERSONAS_DESAPARECIDAS,PERSONAS_ALBERGADAS,VIVIENDAS_DANO_MAYOR,VIVIENDAS_DANO_MENOR,VIVIENDAS_DESTRUIDA)
                           VALUES('".$paso1."','".$paso2."','".$paso3."','".$paso4."','".$paso5."','".$paso6."','".$paso7."','".$paso8."','".$paso9."','".$paso10."','".$paso11."','".$paso12."','".$paso13."','".$paso14."','".$paso15."','".$paso16."','".$paso17."','".$paso18."')";
             $ejecutaInsert = mysql_query($insertaSQL);
             if($ejecutaInsert) {
                echo "<tr>
                         <td>".$i++."</td>
                      </tr>";
             } else { echo "<tr><td>".mysql_error()."</td></tr>"; }
        }
    }
?>

<?
      //Conectar a Base de Datos
        include("conecta/oremi.inc");
        $link = Conexion();
echo <<< HTML
<html>
<head>
<title>Oficina Regional de Emergencia, Regi&oacute;n de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/oremi.css" type="text/css">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
HTML;
//echo "Viene del Consolidado: $cCons <BR>";
//echo "El Valor de NCOM es: $ncom <BR> El Valor de COMXX es: ";
$valor = "com".$ncom;
//echo $$valor. " --- $com03 <BR>";
//echo "<HR>";


// Inicializacion de matriz Consolidado Daños
$rADPersAfec[1] = 0;
$rADPersDamn[1] = 0;
$rADPersHeri[1] = 0; 
$rADPersMuer[1] = 0;
$rADPersDesa[1] = 0;
$rADPersAlbe[1] = 0;
$rADViviDMen[1] = 0;
$rADViviDMay[1] = 0;
$rADViviNEva[1] = 0;
$rADServBasi[1] = 0;
$rADMontDano[1] = 0;


// Inicializacion de matriz Consolidado Decisiones
$rADecAccion[1] = "";
$rADecTiempo[1] = "";




for($i=1; $i <= $ncom; $i++) {
     if($i < 10) { $v= "0".$i; } else { $v = $i;}
     $vComuna = "com".$v;

     echo "Informacion en Tabla InformeAlfa del ID Actual:". $$vComuna ." Correspondiente a la Comuna ". $vComuna ."<BR>";
     echo "<HR>";

//   ID. emergencia ID. InfAlfa ID. Evento ID. EstadoAlfa ID. Consolidado Prov. 
//   InformeAlfa: idestadoalfa -> 0 = Cuando se crea Informe
//                                1 = Cuando se despacha
//                                2 = Cuando se fue consolidado

     $con_IAlf = mysql_query("SELECT idemergencia, idalfa, idevento, idestadoalfa, idinfconsprov FROM InformeAlfa WHERE idemergencia = '". $$vComuna ."' ") or Die(mysql_error());

        echo "<table border=0 cellspacing=1 cellpadding=2 bgcolor=#f3f7f7>";
        echo "<tr bgcolor=#eaeaea><td colspan=5 bgcolor=#f3f7f7>Informe Alfa Nro. ". $$vComuna ."</td></tr>";
        echo "<tr bgcolor=#eaeaea><td>ID. emergencia</td>
                       <td>ID. InfAlfa</td>
                       <td>ID. Evento</td>
                       <td>ID. EstadoAlfa</td>
                       <td>ID. Consolidado Prov.</td>
                   </tr>";

        while($rIAlf = mysql_fetch_object($con_IAlf)) {
             
             echo "<tr bgcolor=#eaeaea><td>$rIAlf->idemergencia</td>
                       <td>$rIAlf->idalfa</td>
                       <td>$rIAlf->idevento</td>
                       <td>$rIAlf->idestadoalfa</td>
                       <td>$rIAlf->idinfconsprov</td>
                   </tr>";
        }
        mysql_free_result($con_IAlf);
        echo "</table>";
        echo "<BR>";

        $con_Danos = mysql_query("SELECT * FROM AlfaDanos WHERE idemergencia = '". $$vComuna ."' ") or die(mysql_error());
        echo "<table border=0 cellspacing=1 cellpadding=2 bgcolor=#f3f7f7>";
        echo "<tr bgcolor=#eaeaea><td colspan=13 bgcolor=#f3f7f7>Informe Alfa Daños Nro. ". $$vComuna ."</td></tr>";
        echo "<tr bgcolor=#eaeaea><td>ID. emergencia</td>
                       <td>Personas Afectadas</td>
                       <td>Personas Damnificadas</td>
                       <td>Personas Heridas</td>
                       <td>Personas Muertas</td>
                       <td>Personas Desaparecidas</td>
                       <td>Personas Albergadas</td>
                       <td>Viviendas con Daño Menor</td>
                       <td>Viviendas con Daño Mayor</td>
                       <td>Viviendas Destruidas Irrecuperables</td>
                       <td>Viviendas No Evaluadas</td>
                       <td>Servicios Básicos</td>
                       <td>Monto Estimado en Daños</td>

                   </tr>";

              $rADComuna[$i] = $vComuna;
        while($rAD = mysql_fetch_object($con_Danos)) {
              $rADPersAfec[$i] = $rADPersAfec[$i] + $rAD->pers_afectadas;
              $rADPersDamn[$i] = $rADPersDamn[$i] + $rAD->pers_afectadas;
              $rADPersHeri[$i] = $rADPersHeri[$i] + $rAD->pers_afectadas;
              $rADPersMuer[$i] = $rADPersMuer[$i] + $rAD->pers_afectadas;
              $rADPersDesa[$i] = $rADPersDesa[$i] + $rAD->pers_afectadas;
              $rADPersAlbe[$i] = $rADPersAlbe[$i] + $rAD->pers_afectadas;
              $rADViviDMen[$i] = $rADViviDMen[$i] + $rAD->pers_afectadas;
              $rADViviDMay[$i] = $rADViviDMay[$i] + $rAD->pers_afectadas;
              $rADViviNEva[$i] = $rADViviNEva[$i] + $rAD->pers_afectadas;
              $rADServBasi[$i] = $rADServBasi[$i] + $rAD->pers_afectadas;
              $rADMontDano[$i] = $rADMontDano[$i] + $rAD->pers_afectadas;

             echo "<tr bgcolor=#eaeaea><td>$rAD->idemergencia</td>
                       <td>$rAD->pers_afectadas</td>
                       <td>$rAD->pers_damnifica</td>
                       <td>$rAD->pers_heridas</td>
                       <td>$rAD->pers_muertas</td>
                      <td>$rAD->pers_desaparec</td>
                       <td>$rAD->pers_albergada</td>
                       <td>$rAD->viv_danomenor</td>
                       <td>$rAD->viv_danomayor</td>
                      <td>$rAD->viv_destruirre</td>
                       <td>$rAD->viv_noevaluada</td>
                       <td>$rAD->serviciobasico</td>
                       <td>$rAD->montodanos</td>

                   </tr>";
        }
        mysql_free_result($con_Danos);
        echo "</table>";
        echo "<BR>";
       

        $con_Dec = mysql_query("SELECT * FROM AlfaDecisiones WHERE idemergencia = '". $$vComuna ."' ") or die(mysql_error());
        echo "<table border=0 cellspacing=1 cellpadding=2 bgcolor=#F3F7F7>";
        echo "<tr bgcolor=#eaeaea><td colspan=3 bgcolor=#f3f7f7>Informe Alfa Decisiones Nro. ". $$vComuna ."</td></tr>";
        echo "<tr bgcolor=#eaeaea><td>ID. emergencia</td>
                       <td>Accion</td>
                       <td>Tmpo. Reestablecimiento</td>
              </tr>";

       while($rADec = mysql_fetch_object($con_Dec)) {

             $rADecAccion[$i] = $rADec->accion. "<BR>";
             $rADecTiempo[$i] = $rADec->tiemporestablece."<BR>";

             echo "<tr bgcolor=#eaeaea><td>$rADec->idemergencia</td>
                       <td>$rADec->accion</td>
                       <td>$rADec->tiemporestablece</td>
                   </tr>";
       }
       mysql_free_result($con_Dec);
       echo "</table>";
       echo "<BR>";


        $con_Nec = mysql_query("SELECT * FROM AlfaNecesidades WHERE idemergencia = '". $$vComuna ."' ") or die(mysql_error());
        echo "<table border=0 cellspacing=1 cellpadding=2 bgcolor=#F3F7F7>";
        echo "<tr bgcolor=#eaeaea><td colspan=4 bgcolor=#f3f7f7>Informe Alfa Necesidades Nro. ". $$vComuna ."</td></tr>";
        echo "<tr bgcolor=#eaeaea><td>ID. emergencia</td>
                       <td>Cantidad</td>
                       <td>Tipo</td>
                       <td>Motivo</td>
              </tr>";

       while($rANec = mysql_fetch_object($con_Nec)) {
             echo "<tr bgcolor=#eaeaea><td>$rANec->idemergencia</td>
                       <td>$rANec->cantidad</td>
                       <td>$rANec->tipo</td>
                       <td>$rANec->motivo</td>
                   </tr>";
       }
       mysql_free_result($con_Nec);
       echo "</table>";
       echo "<BR>";


        $con_Rec = mysql_query("SELECT * FROM AlfaRecursos WHERE idemergencia = '". $$vComuna ."' ") or die(mysql_error());
        echo "<table border=0 cellspacing=1 cellpadding=2 bgcolor=#F3F7F7>";
        echo "<tr bgcolor=#eaeaea><td colspan=5 bgcolor=#f3f7f7>Informe Alfa Recursos Nro. ". $$vComuna ."</td></tr>";
        echo "<tr bgcolor=#eaeaea><td>ID. emergencia</td>
                       <td>Tipo Rec.</td>
                       <td>Desc. Recuso</td>
                       <td>Cantidad</td>
                       <td>Gasto Estimado</td>
              </tr>";

       while($rARec = mysql_fetch_object($con_Rec)) {
             echo "<tr bgcolor=#eaeaea><td>$rARec->idemergencia</td>
                       <td>$rARec->idtiporecurso</td>
                       <td>$rARec->descrirecurso</td>
                       <td>$rARec->cantidadrecur</td>
                       <td>$rARec->gastoestimado</td>
                   </tr>";
       }
       mysql_free_result($con_Rec);
       echo "</table>";
       echo "<BR>";

        echo "<BR><BR>";

//     }
}   
for($x=1; $x < $i; $x++) {
echo "<HR color=#eaeaea>";
echo "En la Comuna: $rADComuna[$x] <BR>";
echo "Pers.Afectadas    : $rADPersAfec[$x] <BR>";
echo "Pers.Damnificadas : $rADPersDamn[$x] <BR>";
echo "Pers.Heridas      : $rADPersHeri[$x] <BR>";
echo "Pers.Muertas      : $rADPersMuer[$x] <BR>";
echo "Pers.Desaparecidas: $rADPersDesa[$x] <BR>";
echo "Pres.Albergadas   : $rADPersAlbe[$x] <BR><BR>";
echo "Viv. con Daño Menor: $rADViviDMen[$x] <BR>";
echo "Viv. con Daño Mayor: $rADViviDMay[$x] <BR>";
echo "Viv. no  Evaluadas : $rADViviNEva[$x] <BR>";
echo "Servicios Basicos  : $rADServBasi[$x] <BR>";
echo "Monto de los Daños :$rADMontDano[$x] <BR><BR>";
echo "Accion: $rADecAccion[$x] <BR>";
echo "Tiempo Reestablecimiento: $rADecTiempo[$x] <BR><p><br>";

}

mysql_close(); 
 ?>


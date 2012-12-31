<div id="noticias">

<div class="categoria"><a href="http://www.gorecoquimbo.gob.cl/principal.php">P&aacute;gina Principal</a>&nbsp;&gt; Agendas</div>
<h1> agenda </h1>
<hr />
<br />
		  
		  <?php
 function fsalida($cad2){
	$tres=substr($cad2, 0, 4);
	$dos=substr($cad2, 5, 2);
	$uno=substr($cad2, 8, 2);
	$cad = ($uno."/".$dos."/".$tres);
	return $cad;
} 
function nombre_mes($m) 
{ 
	$mes =  array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"); 
	$m--; 
	return $mes[$m]; 
} 

function nombre_diasemana($d) 
{ 
	$d--;
	$dias =  array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado", "Domingo"); 
	return $dias[$d]; 
}


$datevalue=strftime("%Y-%m-%d", $f);
$mes=strftime("%m", $f);
$anho=strftime("%Y", $f);
$dia=strftime("%d", $f);
$ano=strftime("%Y", $f);
$fecha_sql=$anho."-".$mes."-".$dia;

$sw=0;

if($mes<1) 
   $mes+=12; 
else 
if($mes>12)
   $mes-=12; 

  $fecha = getdate(); 
  
  $dia_letras=date("w", $f);
  if ($dia_letras==0){ $dia_letras=7;}
  $mes_actual = $fecha["mon"]; 
  $anho_actual = $fecha["year"]; 

if($mes_actual == $mes && $anho_actual == $anho)
     $dia_actual = $fecha["mday"]; 
else 
     $dia_actual = 0; 

$tmstp_dia_uno = mktime(0,0,0, $mes, 1, $anho); 
$fecha = getdate($tmstp_dia_uno); 
$comenzar = $fecha["wday"]+1; 

$vec_dias = array(31,28,31,30,31,30,31,31,30,31,30,31); 
$dias_mes = $vec_dias[$mes-1]; 
if($mes == 2 && $anho%4 ==0) 
   $dias_mes = 29; 

$celda = 1; 
$dia_mes = 1; 
echo "<table id=agenda border=0 width=100% cellpadding=0 cellspacing=0 >\n";
echo "<tr align=center ><td cellpadding=0 align=center >";
echo "<table id=agenda border=0 width=100% cellpadding=0 cellspacing=0 >\n"; 
echo "<tr align=center ><td cellpadding=0 bgcolor=#E4E4E4 colspan=7 align=center >\n"; 
echo "<a href=gore_agendas_detalle.php?m=$mes&a=".($anho-1)."></a>"; 
if(empty($anho)) 
echo "0"; 
echo $anho; 
echo "<a href=gore_agendas_detalle.php?m=$mes&a=".($anho+1)."></a><br>"; 

$anho_prox = $anho; 
$anho_ant = $anho; 
                     
echo "<a href=".BASE_URI."agenda/".mktime(0,0,0,$mes-1,$dia_mes,$anho_ant)."><< </a>"; 
echo "<b>" .nombre_mes($mes). "</b>";                               
echo "<a href=".BASE_URI."agenda/".mktime(0,0,0,$mes+1,$dia_mes,$anho_prox)."> >></a>"; 
echo "</td></tr>\n"; 
echo "<tr align=center ><td>Domingo<td>Lunes<td>Martes<td>Miercoles<td>Jueves<td>Viernes<td>Sábado</tr>\n";

for($semana = 1; $semana<=6&&$dia_mes<=$dias_mes; $semana++) 
{ 
echo "<tr>\n"; 
  for($dia_semana = 1;$dia_semana<=7;$dia_semana++) 
  { 
   echo "<td bgcolor=#E4E4E4 align=center >"; 
   if(($celda == $comenzar||$dia_mes>1) && $dia_mes<=$dias_mes) 
   { 
    if($dia_mes == $dia_actual) echo "<b>"; 

     if ($mes >= $mes_actual)
	 {
         echo "<a href=gore_agendas_detalle.php?f=".mktime(0,0,0,$mes,$dia_mes,$anho)."><font face=verdana size=-2>";   
	     $sw=1;
	 }
	 //********************* Ver meses anteriores ***********************	
	 else
	 {
  	     echo "<a href=gore_agendas_detalle.php?f=".mktime(0,0,0,$mes,$dia_mes,$anho)."><font face=verdana size=-2>";   
	 }
    if ((date('d') == $dia_mes) and ( $mes == $mes_actual))
	{ 
           echo "<font><b>".$dia_mes."</b></font>"; 
    }
	else
	{ //********************* permite bloquear los meses anteriores *****************
	    //if ($sw==0)
	       echo "<font>".$dia_mes."</font>";
		/*else
		   echo $dia_mes; */
    } 
   echo "</a></font>"; 
   if($dia_mes == $dia_actual) echo "</b>"; 
   $dia_mes++; 
   } 
   else echo "&nbsp;"; 
   echo "</td>\n"; 
   $celda++; 
  } 
  echo "</tr>\n"; 
} 
echo "</table>"; 
echo "</td></tr>";
echo "</table>";
?>


<?php foreach($titulares as $row_titular_agenda):?>

		<?php 

			if($row_titular_agenda['titular1']<>''){

				echo $row_titular_agenda['titular1'];
			}

			if($row_titular_agenda['titular2']<>''){

				echo $row_titular_agenda['titular2'];
			}


			if($row_titular_agenda['titular3']<>''){

				echo $row_titular_agenda['titular3'];
			}


			 if($row_titular_agenda['nombre_archivo']<>''){

			 	?>
			 	<a href="<?php echo base_url(); ?>documentos/titulares/tit_<? echo $row_titular_agenda['id_titulares'];?>/<? echo $row_titular_agenda['nombre_archivo']; ?>" target="_blank">
			 		Nombre archivo	
			 	</a>
			 	<?php
			 }

								 	
		?>
<?php endforeach;?>

<?php if(!empty($titulares)):?>

<?php foreach($titulares as $row_actividades):?>  
                  <h3>titulares</h3>
              
                  <h3>ACTIVIDADES </h3>
                  <div id="actividad-agenda">
                    <div id="tipo-acuerdo">T&Iacute;TULO : <strong>Titulo de la actividad </strong></div>
                    <div id="fecha-acuerdo">HORARIO : <strong>Horario : <? echo $row_actividades['BegRs'];?> Hrs - <? echo $row_actividades['EndRs'];?> Hrs </strong></div>
                    <div id="descripcion-acuerdo">LUGAR : <strong><? echo $row_actividades['lugar'];?> </strong> </div>
                    <div id="descripcion-acuerdo"><? echo $row_actividades['DescRs_web'];?> </div>
                    <div id="fix" style="clear:both"></div>
                  </div>
                  <div id="fix" style="clear:both"></div>
<?php endforeach;?>


<?php endif;?>




</div>


#!/usr/bin/php
<?php

	@include("grbz-sesion.php");
	@include("bc_lib.php");
	@include("bc_correo.php");
	@include("global.php");
	@include("recordset.php");
	@include("rfunciones.php");

	$FechaActual	= date("Y-m-d H:i:s");
	$rsSql =new Recordset($SERVER, $DB, $USER, $PASSWORD);
	$query = "SELECT MENSAJE, FECHA, TIPO, TEMA, B.COD_TEMA, TMP_BITC, concat(NOMBRES, ' ', PATERNO, ' ', MATERNO) as funcionario, EMAIL  
				FROM BITACORA_C AS B, TIPO AS T, TEMAS AS M, PERSONA AS P   
				WHERE B.COD_TIPO=T.COD_TIPO AND 
				B.COD_PERS=P.COD_PERS AND 
				B.COD_TEMA=M.COD_TEMA AND 
				RESPUESTA = 'N'";
				//NOW() AS ahora, DATE_ADD(FECHA, INTERVAL 48 HOUR) AS ENMAS   
	$rsSql->Open($query);
	while( $rsSql->moveNext() ) {
	
		echo "
		<div style=\"border-bottom:1px dashed #555E77;\" align=\"right\">&nbsp;</div>".
		$rsSql->FieldByNumber(0) . "<br /><br />Fecha Actual Sistema &nbsp;".
		convertir_fecha($rsSql->FieldByNumber(1)). "<br /><br />
		
		Tiempo (Nro de dias Habiles en dias de trabajo) entre Hoy y la fecha del Registro Actual en Registro: <strong>" . date_difference($rsSql->FieldByNumber(1), $FechaActual) .
		
		"</strong><br />
		Han Pasado mas de 48 Horas ? ";
		if(date_difference($rsSql->FieldByNumber(1), $FechaActual) > 2 ) { echo "SI, ";} else {echo "NO, ";}
		echo " han pasado mas de 48 Horas <br />
	
		<div style=\"border-bottom:1px dashed #555E77;\" align=\"right\">&nbsp;</div>
		<br />";
	
		
		// Si han Pasado Mas de 48 Horas, reenviar el email a los responsables del tema en responderlo
	/*	if(date_difference($rsSql->FieldByNumber(1), $FechaActual ) > 2 )  { */
			/*echo " El mensaje <br />" .
					$rsSql->FieldByNumber(0) .
				"<br /> Respecto del Tipo de Consulta :" . $rsSql->FieldByNumber(2) . "<br />
				Asignado al Tema : " .$rsSql->FieldByNumber(3)." <br />
				Será reenviado a los responsables de este tema.";
			*/
			//
			
		/* Debemos Reenviar el mensaje a los responsables*/		
/*		$rsTemas = new Recordset($SERVER , $DB , $USER , $PASSWORD);
		$query = "SELECT COD_TEMA, F.COD_FUNCIONARIO, EMAIL 
				FROM FUNCIONARIO AS F, QRESPONDE AS Q 
				WHERE Q.COD_FUNCIONARIO = F.COD_FUNCIONARIO AND 
					COD_TEMA = '" . $rsSql->FieldByNumber(4) . "';";
		$rsTemas->Open($query);
		$email_responsable = array();
		while($rsTemas->moveNext())
		{ */
			/* Existe un email ingresado para este user. */
/*			$email_responsable[]	= $rsTemas->fieldByName("EMAIL");
		} 
			$Enlace_A_Responder = "http://www.gorecoquimbo.cl/buzon/rpanel/index.php?CodTran=" . $rsSql->FieldByNumber(5);
			$mail = new correo();
			$emailEmisor="webmaster@gorecoquimbo.cl";
			$asunto = "Buzón Ciudadano :: [Email sin Responder: Pasaron 48 Horas]";
			$mail->setEmisor("Buzón Ciudadano :: GORE-COQUIMBO",$emailEmisor);
			$Mensaje_A_Responsables = "

El Email que usted recibe, es un reenvío puesto que han pasado 48 horas y no se ha dado respuesta al email enviado por el usuario: " . $rsSql->FieldByNumber(6) .", email " . $rsSql->FieldByNumber(7) . "
			
			
cuya consulta es:
			

". $rsSql->FieldByNumber(0) ."



------------------------------------------------------------------------------------------------------
Para responder este email, acceda a
			
". $Enlace_A_Responder ."
						
Le recordamos que existe un plazo de 48 horas para responder al usuario.
			
Gracias por su tiempo y disposición,
			
Administrador
Buzón Ciudadano :: Gobierno Regional de Coquimbo
";

			for($i=0; $i<count($email_responsable);$i++) {
				$mail->putCorreo($email_responsable[$i], $asunto, $Mensaje_A_Responsables);
			 }	
			$mail->sendCorreo();
			
			//
		}
		
		
		//convertir_fecha4($rsSql->FieldByNumber(0)
		//$FechaActual
*/	}

    /**
	 * Calculates the number of work days between 2 given times
	 *
	 * @see get_holidays()
	 *
	 * @param date $start_date First date
	 * @param date $end_date Second date
	 * @param bool $workdays_only Whether to count only work days (eg. Mon-Fri)
	 * @param bool $skip_holidays Whether to use the get_holidays() function to skip holiday days as well
	 * @return int $workday_counter Number of workdays between the 2 dates
	 */
function date_difference($start_date, $end_date, $workdays_only = true, $skip_holidays = true){
    $start_date = strtotime($start_date);
    $end_date = strtotime($end_date);
    $seconds_in_a_day = 86400;
    $sunday_val = "0";
    $saturday_val = "6";
    $workday_counter = 0;
    $holiday_array = array();

    $ptr_year = intval(date("Y", $start_date));
    $holiday_array[$ptr_year] = get_holidays(date("Y", $start_date));

    for($day_val = $start_date; $day_val <= $end_date; $day_val+=$seconds_in_a_day){
        $pointer_day = date("w", $day_val);
        if($workdays_only == true){
            if(($pointer_day != $sunday_val) AND ($pointer_day != $saturday_val)){
                if($skip_holidays == true){
                    if(intval(date("Y", $day_val))!=$ptr_year){
                        $ptr_year = intval(date("Y", $day_val));
                        $holiday_array[$ptr_year] = get_holidays(date("Y", $day_val));
                    }
                    if(!in_array($day_val, $holiday_array[date("Y", $day_val)])){
                        $workday_counter++;
                    }
                }else{
                    $workday_counter++;
                }
            }
        }else{
            if($skip_holidays == true){
                if(intval(date("Y", $day_val))!=$ptr_year){
                    $ptr_year = intval(date("Y", $day_val));
                    $holiday_array[$ptr_year] = get_holidays(date("Y", $day_val));
                }
                if(!in_array($day_val, $holiday_array[date("Y", $day_val)])){
                    $workday_counter++;
                }
            }else{
                $workday_counter++;
            }
        }
    }
    return $workday_counter;
}

    /**
	 * Takes a date in yyyy-mm-dd format and returns a PHP timestamp
	 *
	 * @param string $MySqlDate
	 * @return unknown
	 */
function get_timestamp($MySqlDate){

    $date_array = explode("-",$MySqlDate); // split the array

    $var_year = $date_array[0];
    $var_month = $date_array[1];
    $var_day = $date_array[2];

    $var_timestamp = mktime(0,0,0,$var_month,$var_day,$var_year);
    return($var_timestamp); // return it to the user
}

    /**
	 * Returns the date of the $ord $day of the $month.
	 * For example ordinal_day(3, 'Sun', 5, 2001) returns the
     * date of the 3rd Sunday of May (ie. Mother's Day).
     *
     * @author  heymeadows@yahoo.com
	 *
	 * @param int $ord
	 * @param string $day (must be 3 char abbrev, per date("D);)
	 * @param int $month
	 * @param int $year
	 * @return unknown
	 */
function ordinal_day($ord, $day, $month, $year) {

    $firstOfMonth = get_timestamp("$year-$month-01");
    $lastOfMonth  = $firstOfMonth + date("t", $firstOfMonth) * 86400;
    $dayOccurs = 0;

    for ($i = $firstOfMonth; $i < $lastOfMonth ; $i += 86400){
        if (date("D", $i) == $day){
            $dayOccurs++;
            if ($dayOccurs == $ord){
                $ordDay = $i;
            }
        }
    }
    return $ordDay;
}

function memorial_day($inc_year){
    for($date_stepper = intval(date("t", strtotime("$inc_year-05-01"))); $date_stepper >= 1; $date_stepper--){
        if(date("l", strtotime("$inc_year-05-$date_stepper"))=="Monday"){
            return strtotime("$inc_year-05-$date_stepper");
            break;
        }
    }
}


    /**
	 * Looks through a lists of defined holidays and tells you which
	 * one is coming up next.
	 *
	 * @author heymeadows@yahoo.com
	 *
	 * @param int $inc_year The year we are looking for holidays in
	 * @return array
	 */
function get_holidays($inc_year){
    //$year = date("Y");
    $year = $inc_year;

    $holidays[] = new Holiday("Anyo Nuevo", get_timestamp("$year-1-1"));
    $holidays[] = new Holiday("Viernes Santo", get_timestamp("$year-4-14"));
    $holidays[] = new Holiday("Sabado Santo", get_timestamp("$year-4-15"));	
    //$holidays[] = new Holiday("St. Patrick's Day", get_timestamp("$year-3-17"));
    // TODO: $holidays[] = new Holiday("Good Friday", easter_date($year));
    // TODO: $holidays[] = new Holiday("Easter Monday", easter_date($year));
    $holidays[] = new Holiday("Combate Naval de Iquique", get_timestamp("$year-5-21"));
    $holidays[] = new Holiday("Junio", get_timestamp("$year-6-12"));
    //$holidays[] = new Holiday("Memorial Day", memorial_day($year));
    //$holidays[] = new Holiday("Mother's Day", ordinal_day(2, 'Sun', 5, $year));
    //$holidays[] = new Holiday("Father's Day", ordinal_day(3, 'Sun', 6, $year));
    //$holidays[] = new Holiday("Independence Day", get_timestamp("$year-7-4"));
    //$holidays[] = new Holiday("Labor Day", ordinal_day(1, 'Mon', 9, $year));
    $holidays[] = new Holiday("San Pedro San Pablo", get_timestamp("$year-6-26"));
    $holidays[] = new Holiday("Asunsion de la Virgen", get_timestamp("$year-8-15"));
    $holidays[] = new Holiday("Independencia de Chile", get_timestamp("$year-9-18"));
    $holidays[] = new Holiday("Dia del Ejercito", get_timestamp("$year-9-19"));
    $holidays[] = new Holiday("Dia de la Raza", get_timestamp("$year-10-9"));
    $holidays[] = new Holiday("Dia de los Muertos", get_timestamp("$year-11-1"));
    $holidays[] = new Holiday("Dia de la Virgen", get_timestamp("$year-12-8"));
    $holidays[] = new Holiday("Christmas", get_timestamp("$year-12-25"));

    $numHolidays = count($holidays) - 1;
    $out_array = array();

    for ($i = 0; $i < $numHolidays; $i++){
        $out_array[] = $holidays[$i]->date;
    }
    unset($holidays);
    return $out_array;
}

class Holiday{
    //var $name;
    //var $date;
    var $name;
    var $date;

    // Contructor to define the details of each holiday as it is created.
    function holiday($name, $date){
        $this->name   = $name;   // Official name of holiday
        $this->date   = $date;   // UNIX timestamp of date
    }
}

?>

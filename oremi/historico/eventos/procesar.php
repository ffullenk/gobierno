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

    $code = md5(uniqid());
	$fechaHoy = date('Y-m-d');
	$hora = getdate(time());
	$horaHoy = $hora["hours"] . ":" . $hora["minutes"];
	
	$tipoevento = $_POST['tipoevento'];
	$comuna = $_POST['comuna'];
    $fecha = $_POST['fecha'];
	$fecha_ = convertir_fecha($fecha);
	$horaevento = $_POST['hora'] . ":" . $_POST['minutos'];
	
	$danos_afectadas = $_POST['danos_afectadas'];
	$danos_albergadas = $_POST['danos_albergadas'];
	$danos_heridas = $_POST['danos_heridas'];
	$danos_damnificadas = $_POST['danos_damnificadas'];
	$danos_muertas = $_POST['danos_muertas'];
	
	$danos_mayor = $_POST['danos_mayor'];
	$danos_menor = $_POST['danos_menor'];
	$danos_destruidas = $_POST['danos_destruidas'];
	
	$evento_observaciones=nl2br(htmlentities($_POST['evento_observaciones']));
	
	$button1 = $_POST['button1'];
	$chbx = $_POST['chbx'];
	$nrolocalidades = count($chbx);
	$ixNroCampos = $_POST['ixNroCampos'];
	
	// Grabamos info
	$iRegistro = "INSERT INTO ".
	             "orm_historico(tpevento_id,COM_ID,dnper_afe,dnper_dam,dnper_her,dnper_mue,dnper_alb,dnviv_may,dnviv_men,dnviv_des,fechaevento,horaevento,fechaingreso,horaingreso,evento_obs,gnrcode) ".
				 "VALUES('".$tipoevento."','".$comuna."','".$danos_afectadas."','".$danos_damnificadas."','".$danos_heridas."','".$danos_muertas."','".$danos_albergadas."',".
				 "'".$danos_mayor."','".$danos_menor."','".$danos_destruidas."','".$fecha_."','".$horaevento."','".$fechaHoy."','".$horaHoy."','".$evento_observaciones."','".$code."')";
	$rsRegistro = mysql_query($iRegistro);
	
	if($rsRegistro)
    {
	   // Se grabo correctamente el registro correspondiente al Evento Historico
	   /*
	            Obtenemos el CODE para rescatar el ID con tal de almacenar los restantes valores.	   
	       */
       $sGetID = "select evento_id from orm_historico where gnrcode='$code' ";
       $rGetID = mysql_query($sGetID);
       $fGetID = mysql_fetch_row($rGetID);
       $id = $fGetID[0];
	   
	   // Tenemos el ID de este Evento
	   
	   // Registramos valores especiales para este tipo de evento en particular
       $posID = $_POST['posID'];
	   $dato = $_POST['dato'];
	   $n = count($posID);
	   $i=0;
       while($i < $n )
	   {
	      // Insertamos el registro correspondiente
		  $qDatosEvento = "INSERT INTO hist_datosevento(evento_id,tpevento_id,dt_id,valor) VALUES('".$id."','".$tipoevento."','".$posID[$i]."','".$dato[$i]."')";
          $rDatosEvento = mysql_query($qDatosEvento);
          //echo "<li>{$posID[$i]} : {$dato[$i]} </li> \r\n";
	      $i++;
	   }

       // Registramos las localidades
	   /* Verificamos si acaso estan marcadas todas las localidades.
	             Si estan marcadas TODAS, no grabamos en la tabla
		  Si ALGUNAS estan marcadas, grabamos en la tabla.
	        */
       
	   /*  if($nrolocalidades<$ixNroCampos)
	   {  */
	      // No se marcaron Todas
		  //echo "valor de boton localidades: ". $button1 . "<br> nro localidades marcadas: ". $nrolocalidades . " de un total de: ".$ixNroCampos;
	      $i=0;
          while($i < $nrolocalidades )
          {
            // Insertamos las localidades
			$qLocalidades = "INSERT INTO hist_localidades(evento_id,ID_LOC) VALUES('".$id."','".$chbx[$i]."')";
			$rLocalidades = mysql_query($qLocalidades);
	        //echo "<li>{} </li> \r\n";
	        $i++;
          }  
	   /* }   */
	   
	   // Registramos Infraestructura Publica
       $infrapub = $_POST['infrapub'];
	   $infrapub_nombre = $_POST['infrapub_nombre'];
	   $infrapub_dmay = $_POST['infrapub_dmay'];
	   $infrapub_dmen = $_POST['infrapub_dmen'];
	   $infrapub_dest = $_POST['infrapub_dest'];
	   
       $n_infrapub = count($infrapub)-1;
	   //echo "numero de infrapub: " . $n_infrapub . "<br>";
       $i_infrapub = 0;
       while($i_infrapub < $n_infrapub )
	   {
	      $qInfraPub = "INSERT INTO hist_infrapub(evento_id,tpinfra_id,nombre,danomayor,danomenor,destruidas) ".
		               "VALUES('".$id."','".$infrapub[$i_infrapub]."','".$infrapub_nombre[$i_infrapub]."','".$infrapub_dmay[$i_infrapub]."','".$infrapub_dmen[$i_infrapub]."','".$infrapub_dest[$i_infrapub]."')";
		  $rInfraPub = mysql_query($qInfraPub);
	      //echo "<li>{$infrapub[$i_infrapub]} : {$infrapub_dmay[$i_infrapub]} : {$infrapub_dmen[$i_infrapub]} : {$infrapub_dest[$i_infrapub]}</li> \r\n";
	      $i_infrapub++;
	   }
	   
	   //Registramos Vialidad
       $vialidad = $_POST['vialidad'];
       $vialidad_ruta = $_POST['vialidad_ruta'];
       $vialidad_km = $_POST['vialidad_km'];
       $n_vialidad = count($vialidad)-1;
       $i_vialidad = 0;
       while($i_vialidad < $n_vialidad )
	   {
	      // Insertamos Registros
		  $qVialidad = "INSERT INTO hist_vialidad(evento_id,vialidad_id,ruta,kmcoordenada) VALUES('".$id."','".$vialidad[$i_vialidad]."','".$vialidad_ruta[$i_vialidad]."','".$vialidad_km[$i_vialidad]."')";
		  $rVialidad = mysql_query($qVialidad);
	      //echo "<li>{$vialidad[$i_vialidad]} : {$vialidad_ruta[$i_vialidad]} : {$vialidad_km[$i_vialidad]} </li> \r\n";
	      $i_vialidad++;
	   }
	   
	   //Registramos Otra InfraEstructura
       $otrainfra = $_POST['otrainfra'];
       $otrainfra_ruta = $_POST['otrainfra_ruta'];
       $otrainfra_km = $_POST['otrainfra_km'];
       $n_otrainfra = count($otrainfra)-1;
       $i_otrainfra = 0;
       while($i_otrainfra < $n_otrainfra )
       {
	      //Insertamos Registros
		  $qOtraInfra = "INSERT INTO hist_otrainfra(evento_id,otrainfra_id,ruta,kmcoordenada) VALUES('".$id."','".$otrainfra[$i_otrainfra]."','".$otrainfra_ruta[$i_otrainfra]."','".$otrainfra_km[$i_otrainfra]."')";
		  $rOtraInfra = mysql_query($qOtraInfra);
          //echo "<li>{$otrainfra[$i_otrainfra]} : {$otrainfra_ruta[$i_otrainfra]} : {$otrainfra_km[$i_otrainfra]} </li> \r\n";
          $i_otrainfra++;
       }
	   
       echo "<script>alert('Ha Sido Creado el Evento Historico de Manera Satisfactoria.'); document.location.href='ingresar.php';</script>\n";
    }
	else
    {
	   echo "<script>alert('Error... Ocurrio un Problema Interno y el Evento Historico no Pudo Ser Creada.'); document.location.href='ingresar.php';</script>\n";
    }
 } else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";}
?>
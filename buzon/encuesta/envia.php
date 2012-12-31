<?php
	@include("../lib/grbz-sesion.php");
	@include("../lib/bc_lib.php");
	@include("../lib/bc_correo.php");
	@include("../lib/global.php");
	@include("../lib/recordset.php");

	$FechaActual=date("Y-m-d H:i:s");
	
	$rsSql =new Recordset($SERVER, $DB, $USER, $PASSWORD);
	$query = "SELECT COD_PERS, NOMBRES, PATERNO, MATERNO, EMAIL FROM PERSONA";
	
	$rsSql->Open($query);
	if($rsSql->RecordCount()>0) {
	 echo "se envio";
	while( $rsSql->moveNext() ) {
/*Agregamos los usuarios que en el gun momento han consultado al buzon cuidadano.*/
$email_persona[] = $rsSql->fieldByName("EMAIL");
$IdPersona = $rsSql->FieldByNumber(0);
$EmailPersona = $rsSql->fieldByName("EMAIL");
$nombre_persona[] = $rsSql->fieldByName("NOMBRES") . " " . $rsSql->fieldByName("PATERNO") . " " . $rsSql->fieldByName("MATERNO");
$NombrePersona = $rsSql->fieldByName("NOMBRES") . " " . $rsSql->fieldByName("PATERNO") . " " . $rsSql->fieldByName("MATERNO");
	
		
$Enlace_Encuesta = "http://www.gorecoquimbo.cl/buzon/encuesta/index.php?id=".$IdPersona;
		
	$mail = new correo();
	$emailEmisor="webmaster@gorecoquimbo.cl";
	$asunto = "Buzon Ciudadano :: [Encuesta de Satisfaccion]";
	$mail->setEmisor("Buzon Ciudadano :: GORE-COQUIMBO",$emailEmisor);
	$Mensaje_A_Responsables = "

Estimado(a) 

".$NombrePersona."

El Gobierno Regional de Coquimbo, desea conocer su percepcion como usuario del Buzon Ciudadano, disponible a traves de su pagina web www.gorecoquimbo.cl, esto con el proposito que responda a los intereses informativos de sus consultores, por lo que agradeceremos que nos ayude respondiendo a esta encuesta.

En los casos de valorar un aspecto tenga presente que la escala es de 1 a 6, considerando 6 lo mas satisfactorio y 1 lo menos.

Segun nuestro sistema, usted ha realizado consulta a nuestro Buzon Ciudadano con el email ". $EmailPersona."


Para responder la encuesta, por favor acceda a
			
". $Enlace_Encuesta ."

Una vez que acceda a esta pagina, debera digitar el email con el cual figura en nuestro sistema dado a conocer en el parrafo anterior.
			
Gracias por su tiempo y disposicion. Esta encuesta se encontrara disponible hasta el dia 15 de diciembre de 2006. Lamentamos el email anterior, por un error involuntariose emitio un email que no era el oficial. 
			
Administrador
Buzon Ciudadano :: Gobierno Regional de Coquimbo
";


$mail->putCorreo($EmailPersona, "".$asunto."", $Mensaje_A_Responsables);
$mail->sendCorreo();
}

} else { echo "no se envio";}
?>
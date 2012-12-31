<?php
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

  umask(0);
  include('../bd/conecta.php');
  $link = Conexion();
  $legal_require_php = "bzrrevalidate";
  global $global_qk;
  $global_qk=0;
  global $ticket;
  $ticket = $_GET["tket"];


require('detect.php');
  global $c;

if($loginCorrecto ) {  
	/*se incluyen los archivos*/
	@include("../lib/grbz-sesion.php");
	@include("../lib/bc_lib.php");
	@include("../lib/global.php");
	@include("../lib/recordset.php");
  
	if(isset($ticket)) { 
		/* Accedió desde email hasta este punto
			Se debe tomar en consideracion lo siguiente:
				De acuerdo al Ticket y comprobando que el usuario sea responsable del tema,
				redirijirlo hasta el ticket en cuestion para responder el email.
				
			Si creamos una funcion que nos permita una vez elegido el mensaje a reponder pasar 
			los parametros
		*/
		
		$rsTicket = new Recordset($SERVER , $DB , $USER , $PASSWORD);
		$query = "SELECT COD_BITC, concat( NOMBRES, \" \", PATERNO, \" \", MATERNO ) , EMAIL, TIPO, TEMA, MENSAJE, FECHA  
					FROM PERSONA AS P, BITACORA_C AS BC, TIPO AS T, TEMAS AS M 
					WHERE BC.COD_PERS = P.COD_PERS AND 
							BC.COD_TIPO = T.COD_TIPO AND 
							BC.COD_TEMA = M.COD_TEMA AND 
							TMP_BITC = '". $ticket ."';";

		$rsTicket->Open($query);
		while($rsTicket->moveNext())
		{ ?>


<table width="550" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#cdcdcd">
  <tr> 
    <td width="21%" bgcolor="#ffffff">Tipo Consulta</td>
    <td width="21%" bgcolor="#E1F0D2"><?php echo $rsTicket->FieldByNumber(3);?></td>
    <td width="2%">&nbsp;</td>
    <td width="18%" bgcolor="#ffffff">Tema:</td>
    <td width="38%" bgcolor="#E1F0D2"><?php echo $rsTicket->FieldByNumber(4);?></td>
  </tr>
  <tr> 
    <td colspan="2" bgcolor="#CCCCCC">Quien Consulta</td>
    <td>&nbsp;</td>
    <td colspan="2" bgcolor="#CCCCCC">Mensaje</td>
  </tr>
  <tr> 
    <td colspan="2" bgcolor="#E1F0D2"><?php echo $rsTicket->FieldByNumber(1);?></td>
    <td>&nbsp;</td>
    <td colspan="2" bgcolor="#E1F0D2"><?php echo $rsTicket->FieldByNumber(5);?></td>
  </tr>
  <tr> 
    <td bgcolor="#CCCCCC">Fecha</td>
    <td><?php echo $rsTicket->FieldByNumber(6);?></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>

<?php	}
				
	}
} 
?>
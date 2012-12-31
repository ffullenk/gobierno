<?php  

session_start();
 
 $userBackEnd = $_SESSION['userBackEnd'];
 $passBackEnd = $_SESSION['passBackEnd'];
 
 $ejerBackEnd = $_SESSION['ejerBackEnd'];
 $tipoCargoBackEnd = $_SESSION['tipoCargoBackEnd'];
 $tipoCoberturaBackEnd = $_SESSION['tipoCoberturaBackEnd'];
 
 include("../cpanel/incluir/seteaConf.php");
 include("../cpanel/incluir/seteaBD.php");
 include("../cpanel/incluir/encripta.php");
 $link = conectar();

 include("../cpanel/incluir/funciones.php");
 
    // Recibimos las variables del formulario
	              $id = $_POST['id'];
	     $evacua_hora = $_POST['evacua_hora'];
	  $evacua_civiles = $_POST['evacua_civiles'];
	$evacua_escolares = $_POST['evacua_escolares'];
	
	$evacua_fecha = date("Y-m-d H:i");
	
	$Fecha=explode("-",$evacua_fecha); 
    $Hora=explode(":",$evacua_fecha); 
    $FechaFinal = date('Y-m-d H:i:s',time()); 
    $validaSubZona = "N";
//$FechaFinal=date("Y-m-d H:i",mktime($Hora[0],$Hora[1],$Fecha[0],$Fecha[1],$Fecha[2])); 

    // Chequeamos si existe anotacion para esta subzona
	$qCSZ = "SELECT IDSUBZONAEJERCICIO FROM tb_conteosubzona WHERE IDSUBZONAEJERCICIO='".$id."'";
	$rCSZ = mysql_query($qCSZ);
	
	if(mysql_num_rows($rCSZ) > 0 )
	{
		// Encontro un registro para esta subzona, actualiza
		$upReg = "UPDATE tb_conteosubzona SET CONTEO_CIVILES='".$evacua_civiles."', CONTEO_ESCOLARES='".$evacua_escolares."', FECHAHORA='".$FechaFinal."', VALIDASUBZONA='".$validaSubZona."' WHERE  IDSUBZONAEJERCICIO='".$id."' ";
		$uquery = mysql_query($upReg);
		if($uquery) 
			  {
			     echo "<script>alert('Ha Sido Agregado el Conteo de SubZona de Manera Satisfactoria.'); document.location.href='index.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... Ocurrio un Problema Interno y el Conteo de SubZona  no Pudo Ser Creada.'); document.location.href='index.php';</script>\n";
			  }	
	} else {
		// No existe registro para esta subzona, inserta
		$InsertaReg = "INSERT INTO tb_conteosubzona(IDSUBZONAEJERCICIO,CONTEO_CIVILES,CONTEO_ESCOLARES,FECHAHORA,VALIDASUBZONA) VALUES('".$id."','".$evacua_civiles."','".$evacua_escolares."','".$FechaFinal."','".$validaSubZona."');";
		$query = mysql_query($InsertaReg);
			  
			  if($query) 
			  {
			     echo "<script>alert('Ha Sido Agregado el Conteo de SubZona de Manera Satisfactoria.'); document.location.href='index.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... Ocurrio un Problema Interno y el Conteo de SubZona  no Pudo Ser Creada.'); document.location.href='index.php';</script>\n";
			  }	
	} 
 ?>
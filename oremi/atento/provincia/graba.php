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
	$zona_Provincia = $_POST['zona_Provincia'];
		
	$evacua_fecha = date("Y-m-d H:i");
	
	$Fecha=explode("-",$evacua_fecha); 
    $Hora=explode(":",$evacua_fecha); 
    $FechaFinal = date('Y-m-d H:i:s',time()); 
    
	// Consolidamos la Info de la Provincia de Acuerdo a los datos disponibles de las zonas.
	$qSubZonas = "SELECT CSZ.IDSUBZONAEJERCICIO AS ID, CONTEO_CIVILES, CONTEO_ESCOLARES, CSZ.FECHAHORA, SZ.IDZONAEJERCICIO, IDCONTEOSUBZONA  ".
                 " FROM tb_subzonaejercicio AS SZ, tb_conteosubzona AS CSZ, tb_zonaejercicio AS Z ".
                 " WHERE ".
                 //" VALIDASUBZONA='N' AND ".
                 " Z.IDZONAEJERCICIO=SZ.IDZONAEJERCICIO AND ".
                 " SZ.IDSUBZONAEJERCICIO=CSZ.IDSUBZONAEJERCICIO AND ".
                 " Z.IDEJERCICIO='".$ejerBackEnd."' AND Z.IDPROVINCIA='".$zona_Provincia."' ".
                 " ORDER BY Z.IDZONAEJERCICIO";

				 $rSubZonas = mysql_query($qSubZonas);
	
	if(mysql_num_rows($rSubZonas) > 0 )
	{
		$validaZona = "N";
		$ptrSZ=mysql_fetch_array($rSubZonas);
		
		while($ptrSZ)
		{
			$conteociviles = 0;
			$conteoescolares = 0;
			
			$idZona = $ptrSZ['IDZONAEJERCICIO'];
			
			while($idZona==$ptrSZ['IDZONAEJERCICIO'])
			{
				$conteociviles = $conteociviles + $ptrSZ['CONTEO_CIVILES'];
				$conteoescolares = $conteoescolares + $ptrSZ['CONTEO_ESCOLARES'];
				
				
				// Actualiza punto
				$upConteoSZ = "UPDATE tb_conteosubzona SET VALIDASUBZONA=\"S\" WHERE IDCONTEOSUBZONA='".$ptrSZ['IDCONTEOSUBZONA']."'";
				mysql_query($upConteoSZ);
				
				$ptrSZ=mysql_fetch_array($rSubZonas);

			}
		    
			
			// Acumulado zona
			//
			// Chequear si para esta zona ya existe alguna anotacion:
			// SI existe, reemplazar los datos
			// NO existe, agregar dato
			$qBuscaZona = "SELECT IDCONTEOZONA FROM tb_conteozona WHERE IDZONAEJERCICIO='".$idZona."'";
			$rBuscaZona = mysql_query($qBuscaZona);
			
			if(mysql_num_rows($rBuscaZona) > 0 )
			{
				// Existe Zona
				
				$upZona = "UPDATE tb_conteozona SET CONTEO_CIVILES='".$conteociviles."', CONTEO_ESCOLARES='".$conteoescolares."', FECHAHORA='".$FechaFinal."', VALIDAZONA='".$validaZona."' WHERE IDZONAEJERCICIO='".$idZona."'";
				$upquery = mysql_query($upZona);
				if($upquery) 
			  {
			     echo "<script>alert('ACTUALIZA de Manera Satisfactoria.'); document.location.href='index.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... ACTUALIZA Ocurrio un Problema Interno y el Conteo no Pudo Ser Validado Provincialmente la Informacion.'); document.location.href='index.php';</script>\n";
			  }	
			} else
			{
				// NO Existe Zona
				$insertaReg = "INSERT INTO tb_conteozona(IDZONAEJERCICIO,CONTEO_CIVILES,CONTEO_ESCOLARES,FECHAHORA,VALIDAZONA) VALUES('".$idZona."','".$conteociviles."','".$conteoescolares."','".$FechaFinal."','".$validaZona."');";
			    $query = mysql_query($insertaReg);
				if($query) 
			  {
			     echo "<script>alert('Ha Sido Validado Provincialmente la Informacion de Manera Satisfactoria.'); document.location.href='index.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... Ocurrio un Problema Interno y el Conteo  no Pudo Ser Validado Provincialmente la Informacion.'); document.location.href='index.php';</script>\n";
			  }	
			}
		}
	}
 ?>
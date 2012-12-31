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
	$idEjercicio = $_POST['idEjercicio'];
		
	$evacua_fecha = date("Y-m-d H:i");
	
	$Fecha=explode("-",$evacua_fecha); 
    $Hora=explode(":",$evacua_fecha); 
    $FechaFinal = date('Y-m-d H:i:s',time()); 
    
	// Consolidamos la Info Disponible para el EJERCICIO actual.
	$qZonas = "SELECT CZ.IDCONTEOZONA, NOMBREZONA, CONTEO_CIVILES, CONTEO_ESCOLARES, FECHAHORA  ".
                   "   FROM tb_conteozona AS CZ, tb_zonaejercicio AS Z ".
                   "      WHERE ".
                   //"         VALIDAZONA='N' AND ".
                   "         Z.IDZONAEJERCICIO=CZ.IDZONAEJERCICIO AND ".
                   "         Z.IDEJERCICIO='".$ejerBackEnd."'";

	$rZonas = mysql_query($qZonas);
	
	if(mysql_num_rows($rZonas) > 0 )
	{
		$validaZona = "N";
				
		$conteociviles = 0;
		$conteoescolares = 0;
			
		while($ptrSZ=mysql_fetch_array($rZonas))
		{
			$conteociviles = $conteociviles + $ptrSZ['CONTEO_CIVILES'];
			$conteoescolares = $conteoescolares + $ptrSZ['CONTEO_ESCOLARES'];

			// Actualiza punto
			$upConteoZ = "UPDATE tb_conteozona SET VALIDAZONA=\"S\" WHERE IDCONTEOZONA='".$ptrSZ['IDCONTEOZONA']."'";
			mysql_query($upConteoZ);

		}

			
		// Acumulado zona
		//
		// Chequear si para esta zona ya existe alguna anotacion:
		// SI existe, reemplazar los datos
		// NO existe, agregar dato
		$qBuscaEjer = "SELECT IDCONTEOEJERCICIO FROM tb_conteoejercicio WHERE IDEJERCICIO='".$ejerBackEnd."'";
		$rBuscaEjer = mysql_query($qBuscaEjer);
			
		if(mysql_num_rows($rBuscaEjer) > 0 )
		{
		    // Existe Ejercicio
			$upEjer = "UPDATE tb_conteoejercicio SET CONTEO_CIVILES='".$conteociviles."', CONTEO_ESCOLARES='".$conteoescolares."', FECHAHORA='".$FechaFinal."', VALIDACONTEO='".$validaZona."' WHERE IDEJERCICIO='".$ejerBackEnd."'";
			$upquery = mysql_query($upEjer);
			if($upquery) 
			{
			    echo "<script>alert('VALIDA de Manera Satisfactoria.'); document.location.href='index.php';</script>\n";
			}
			else
			{
			    echo "<script>alert('Error... Ocurrio un Problema Interno y el Conteo no Pudo Ser Validado.'); document.location.href='index.php';</script>\n";
			}	
		} else
		{
			// NO Existe Ejercicio
			$insertaReg = "INSERT INTO tb_conteoejercicio(IDEJERCICIO,CONTEO_CIVILES,CONTEO_ESCOLARES,FECHAHORA,VALIDACONTEO) VALUES('".$ejerBackEnd."','".$conteociviles."','".$conteoescolares."','".$FechaFinal."','".$validaZona."');";
		    $query = mysql_query($insertaReg);
			if($query) 
			{
			    echo "<script>alert('Los Valores han Sido Validados de Manera Satisfactoria.'); document.location.href='index.php';</script>\n";
			}
			else
			{
			    echo "<script>alert('Error... Ocurrio un Problema Interno y el Conteo  no Pudo Ser Validado.'); document.location.href='index.php';</script>\n";
			}	
		}
	}
 ?>
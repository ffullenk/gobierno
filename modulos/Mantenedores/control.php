<? 	include ("../funciones/conexion_comunicaciones.php");
	include ("../funciones/fechas.php");
global $x_tipo,$usuario, $contrasena, $x_id, $x_usuario, $x_sistema, $criterio, $row, $cargo, $result3;
 while (list ($key, $val) = each ($_REQUEST))
 {
  $$key = $val;
 } 
 session_start();
 $x_id="nulo";
 	$fecha=date("d-m-Y");
	$hora=date("H:i:s");
	$vacio= " ";
		
        //se hace la consulta a la BD del usuario
		$pass = md5($contrasena);
        $criterio ="Select * from usuario ";
		$criterio.="Where (usuario='".$usuario."') AND (clave_usuario='".$pass."')";
		$result3 = mysql_query($criterio);
		while($row=mysql_fetch_array($result3))
		{
					$x_usuario=$row['nombre_completo']; 
				 	$x_clave=$row['clave_usuario'];
					$x_id  = $row['id_usuario'];
		}
	
		if ($x_id=="nulo") 
            {
				header("Location: index.php?errorusuario=no");
			
			} else {
				
				
				
				session_register("usernameadmin");
				$usernameadmin = $x_usuario;
				session_register("idusername");
				$idusername = $x_id;
				$hor = $hora;
				$fech = fecha_formato_base($fecha);
				$sql_auditar="INSERT INTO auditar (fecha_ingreso, hora_ingreso,ultima_modificacion, id_usuario,id_sistema) values ('".$fech."','".$hor."','NULL', '".$x_id."','NULL')";
				$result = mysql_query($sql_auditar);
				
				
				Header("Location: administrador.php?hora_inicio=$hor&fecha_inicio=$fech");
			
			}
?>
<?php
include ("../funciones/conexion_bd.php");
include ("../funciones/fechas.php");
global $x_tipo,$usuario, $contrasena, $x_id, $x_usuario, $x_sistema, $criterio, $row, $cargo, $result3;
 while (list ($key, $val) = each ($_REQUEST))
 {
  $$key = $val;
 } 
 session_start();
 
 conecta_banco();
 
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
			
			} 
			else 
			{
				
				session_register("usernameadmin");
				$usernameadmin = $x_usuario;
				session_register("idusername");
				$idusername = $x_id;
				
				$sql_max = "SELECT fecha_ingreso from bitacora_ingreso_usuario where id_usuario='".$x_id."' order by fecha_ingreso desc";
			    $result_max = mysql_query($sql_max);
			    $row_max=mysql_fetch_array($result_max);
				$registros=mysql_num_rows($result_max);
				
				$fecha=date("Y-m-d");
				$hora=date("H:i:s");
				$horatiempo=$fecha." ".$hora;
				
				if ($registros<>0)
				{
   			           $ultimo_ingreso = $row_max["fecha_ingreso"];

				       session_register("fecha_ult");
				       $fecha_ult = $ultimo_ingreso;
				}
				else
				{
				      session_register("fecha_ult");
				      $fecha_ult = $horatiempo;
				}
				
				$sql_max = "SELECT MAX(id_bitacora_ingreso) as maximo from bitacora_ingreso_usuario";
				$result_max = mysql_query($sql_max);
				
				while($row_max=mysql_fetch_array($result_max)){ $id_b = $row_max["maximo"] + 1; }
				
				$SQL="INSERT INTO bitacora_ingreso_usuario (id_bitacora_ingreso, id_usuario, fecha_ingreso) VALUES ('".$id_b."', $idusername, '".$horatiempo."')";
				$executa=mysql_query($SQL);

				Header("Location: principal_contenidos.htm");
			
			}
?>
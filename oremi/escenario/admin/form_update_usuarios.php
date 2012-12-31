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

    $idU = $HTTP_POST_VARS['idU'];
    $nombre = $HTTP_POST_VARS['nombre'];
    $emailusuario = $HTTP_POST_VARS['emailusuario'];
    $rut = $HTTP_POST_VARS['rut'];
    $institucion = $HTTP_POST_VARS['institucion'];
    $clave = $HTTP_POST_VARS['clave'];
    $reclave = $HTTP_POST_VARS['reclave'];
    $tipo = $HTTP_POST_VARS['tipo'];
    $estado = $HTTP_POST_VARS['estado'];

    $chbx = $HTTP_POST_VARS['chbx'];
    $nroptos = count($chbx);
    $ixNroCampos = $HTTP_POST_VARS['ixNroCampos'];


    if($clave<>$reclave) { echo "<script>alert('Las Contraseñas No Coinciden'); document.location.href='iusuarios.php';</script>\n"; }

    $encpass = encrypt($clave,0);




   $sB = "UPDATE orm_usuarios SET nombre=\"$nombre\", clave=\"$encpass\", email=\"$emailusuario\",  rut=\"$rut\", tipo=\"$tipo\", estado=\"$estado\", estado=\"$estado\", ID_INSTITUCION=\"$institucion\" WHERE ormusr_id=\"$idU\" ";
   $rB = mysql_query($sB);
 
   if($rB) {
      // Modificamos Los puntos criticos para este usuario
      // Eliminamos lo actual
     $qElDer = "DELETE FROM orm_derechoa WHERE ormusr_id=\"$idU\" ";
     $rElDer = mysql_query($qElDer);

     $i=0;
     while($i < $nroptos )
     {
        // Insertamos los puntos
        $qPtos = "INSERT INTO orm_derechoa(ormusr_id,ID_PTOCRITICO) VALUES('".$idU."','".$chbx[$i]."')";
        $rPtos = mysql_query($qPtos);
        $i++;
     }  

     echo "<script>alert('El Registro ha sido actualizado de manera satisfactoria.'); document.location.href='iusuarios.php';</script>\n";

   }
   else
   {

      echo "<script>alert('Error... Ocurrio un problema interno y el registro no pudo ser Actualizado.'); document.location.href='iusuarios.php';</script>\n";

   }


 } else { 

   echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";

 }
?>

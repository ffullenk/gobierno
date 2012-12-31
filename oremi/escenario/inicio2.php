<?php
session_start();
 
 $userBackEnd = $_SESSION['userBackEnd'];
 $passBackEnd = $_SESSION['passBackEnd'];
 $tipoUsrBackEnd = $_SESSION['tipoUsrBackEnd'];
 
 include("incluir/seteaConf.php");
 include("incluir/seteaBD.php");
 include("incluir/encripta.php");
 $link = conectar();

 include("incluir/funciones.php");

 if(estaActivo($userBackEnd, $passBackEnd)) {
   // Usuario Confirmado
   // Muestra contenido de la pantalla

   // Construye Pantalla
   ?>
<?php echo "<?xml version=\"1.0\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <title>Escenario de la Prevenci&oacute;n de Desastres</title>
   <meta http-equiv="Content-Type" content="text/html"/>
</head>
<link href="estilos/admin_login.css" rel="stylesheet" type="text/css" />
<body>
   <table border="0" width="760" cellspacing="0" cellpadding="0" style="margin:0 auto;">
     <tr><td colspan="2" style="height:25px;background-color:#3f6699;"></td></tr>
     <tr>
        <td width="120"></td>
        <td width="640">
           <table border="0" width="100%" cellspacing="0" cellpadding="0">
             <tr><td align="right">
                    <table border="0" cellspacing="0" cellpadding="0" align=right" style="font-size:0.8em;">
                    <tr>
                       <td><a href="<?php echo _urlRaiz_;?>"></a>&nbsp;</td>
                       <td><a href="<?php echo _urlRaiz_;?>admin/index.php">Administraci&oacute;n</a>&nbsp;</td>
                       <td><a href="<?php echo _urlRaiz_;?>cierrasesion.php">Salir</a>&nbsp;</td>
                    </tr>
                   </table> 
                 </td>
             </tr>

             <tr>
                <td> <!-- Titulo Pagina -->
                     <h1>Escenario de la Prevenci&oacute;n de Desastres</h1>
                     <h2>Escenarios Activos</h2>

                     <!-- Chequear La Existencia de Escenarios Activos -->
                     <?php
                       $qChkEscenarios = "SELECT ID_ESCENARIO, tpevento, LUGAR, DESCRIBEESCENARIO, OCURRENCIA FROM orm_escenario AS E, orm_tipoevento AS T, orm_lugar AS L WHERE E.tpevento_id=T.tpevento_id AND E.ID_LUGAR=L.ID_LUGAR AND ESTADOESCENARIO=\"A\" ";

                       $rChkEscenarios = mysql_query($qChkEscenarios );

                       if(mysql_num_rows($rChkEscenarios) > 0 )
                       {
                         echo "<table border=\"\" cellspacing=\"\" cellpadding=\"0\">
                                 <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                 </tr>";
                         while($puntero = mysql_fetch_array($rChkEscenarios)) {
                            echo "<tr>
                                     <td></td>
                                     <td>". $puntero['DESCRIBEESCENARIO']."</td>
                                     <td>";
                                     // Si es cuenta Administrador, ve escenario
                                     if($tipoUsrBackEnd=="A") { echo "<a href=\""._urlRaiz_."ve/index.php\">Ver Escenario</a>"; } else {echo "Ver Escenario";}

                                     echo "</td>
                                     <td><a href=\""._urlRaiz_."acciones/index.php?idE=".$puntero['ID_ESCENARIO']."\">Agregar Acciones</a></td>
                                     <td><a href=\""._urlRaiz_."sintetiza/index.php?idE=".$puntero['ID_ESCENARIO']."\">Sintetizar Acciones</a></td>
                                  </tr>";
                         }
                         echo "</table>";

                       } else {
                         echo "<p>No Existen Escenarios Activos en estos momentos.</p>";
                       }
                    ?>
                </td>
            </tr>

           </table>
        </td>
     </tr>
   </table>
<?php
 } else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='index.php';</script>\n";}
?>
</body>
</html>



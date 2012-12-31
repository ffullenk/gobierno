<?

function Conexion(){

 if (!($link=mysql_connect("localhost","cqbogore","bellsouth")))      {

       echo "Imposible Conectar Con la Base de Datos en estos momentos... Intente nuevamente.";

       exit();

 }

 if (!mysql_select_db("oremi",$link))

 {

    echo "Error ... Seleccionando la Base de Datos.";

    exit();

 }
 return $link;
}
?>

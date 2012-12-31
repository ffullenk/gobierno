<?
function Conexion(){
        if (!($link=mysql_connect("localhost","root","espaciva")))      {
                echo "Imposible Conectar Con la Base de Datos en estos momentos... Intente nuevamente.";
                exit();
        }
        if (!mysql_select_db("gore",$link))
        {
                echo "Error ... Seleccionando la Base de Datos.";
                exit();
        }
        return $link;
}
?>

<?
function Conexion(){
        if (!($link=mysql_connect("localhost","guinsqla_ricardo","lionheart12345")))      {
                echo "Imposible Conectar Con la Base de Datos en estos momentos... Intente nuevamente.";
                exit();
        }
        if (!mysql_select_db("guinsqla_gore",$link))
        {
                echo "Error ... Seleccionando la Base de Datos.";
                exit();
        }
        return $link;
}
?>

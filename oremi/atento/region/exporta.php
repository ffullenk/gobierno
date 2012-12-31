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

  require_once("excel.php");
  require_once("excel-ext.php");
 
 // Recibimos el ID Zona
 $idZona = $_GET["id"];

$qxE = "SELECT CSZ.IDSUBZONAEJERCICIO AS ID, NOMBREZONA, NOMBRESUBZONA, CAST( REPLACE( (
( 100 * ( CONTEO_CIVILES + CONTEO_ESCOLARES ) ) / HABITANTES ) ,  ',',  '' ) AS DECIMAL( 7, 2 )
) AS TOTAL, SZ.IDZONAEJERCICIO ".
" FROM tb_subzonaejercicio AS SZ, tb_conteosubzona AS CSZ, tb_zonaejercicio AS Z ".
" WHERE VALIDASUBZONA =  'S' ".
" AND Z.IDZONAEJERCICIO = SZ.IDZONAEJERCICIO ".
" AND SZ.IDSUBZONAEJERCICIO = CSZ.IDSUBZONAEJERCICIO ".
" AND Z.IDEJERCICIO =  '".$ejerBackEnd."' ".
" ORDER BY Z.IDZONAEJERCICIO";
	   

/*
"SELECT CSZ.IDSUBZONAEJERCICIO AS ID, NOMBREZONA,NOMBRESUBZONA,CONTEO_CIVILES, CONTEO_ESCOLARES, CSZ.FECHAHORA, SZ.IDZONAEJERCICIO, IDCONTEOSUBZONA ".  
       " FROM tb_subzonaejercicio AS SZ, tb_conteosubzona AS CSZ, tb_zonaejercicio AS Z ".
       " WHERE ".
       " VALIDASUBZONA='S' AND ".
       " Z.IDZONAEJERCICIO=SZ.IDZONAEJERCICIO AND ".
       " SZ.IDSUBZONAEJERCICIO=CSZ.IDSUBZONAEJERCICIO AND ".
       " Z.IDEJERCICIO='".$ejerBackEnd."' ".
       " ORDER BY Z.IDZONAEJERCICIO";
*/

$resEmp = mysql_query($qxE) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);
// Creamos el array con los datos
while($datatmp = mysql_fetch_assoc($resEmp)) {
    $data[] = $datatmp;
}
// Generamos el Excel 
createExcel("excel-mysql.xls", $data);
//echo "<script>alert('Se Ha Exportado Satisfactoriamente a EXCEL.'); document.location.href='index.php';</script>\n";
 ?>

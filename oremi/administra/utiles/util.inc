<?
function VerRegiones() {
  global $IdRegion;
  global $NoRegion;
  $con_region = mysql_query("SELECT * FROM Region") or Die("Imposible Realizar Consulta a Tabla Region en estos momentos ... ha ocurrido un error inesperado .. !!! ");
  $xpos = 0;
  $IdRegion[$xpos] = "--";
  $NoRegion[$xpos] = " Seleccione una Región ";
  $xpos++;

  while ($row=mysql_fetch_object($con_region)) {
     $IdRegion[$xpos] = $row->idreg;
     $NoRegion[$xpos] = $row->region;
     $xpos++;
  }
  mysql_free_result($con_region);
  echo('<select name="region" size="1" tabindex="1" class="eninput">');
  for($ypos=0; $ypos < $xpos; $ypos++)
  {
    echo "<OPTION value='".$IdRegion[$ypos]."'>$NoRegion[$ypos]</OPTION>";
  }
  echo "</SELECT>";
}

function VerProvincias() {
  global $IdProvincia;
  global $NoProvincia;

  $con_provin = mysql_query("SELECT Provincia.idpro as idprov, provincia, Region.idreg as idregion, region FROM Provincia INNER JOIN Region ON Provincia.idreg = Region.idreg") Or Die("Imposible Realizar Consulta a Tabla Provincia en estos Momentos ... Ha ocurrido un error inesperado.. !!! ");


  $xpos = 0;
  $IdProvincia[$xpos] = "--";
  $NoProvincia[$xpos] = " Seleccione una Región/Provincia ";
  $xpos++;

  while ($row=mysql_fetch_object($con_provin)) {
     $IdProvincia[$xpos] = $row->idregion."/".$row->idprov;
     $NoProvincia[$xpos] = $row->region."/".$row->provincia;
     $xpos++;
  }
  mysql_free_result($con_provin);
  echo('<select name="regionprovincia" size="1" tabindex="1" class="eninput">');
  for($ypos=0; $ypos < $xpos; $ypos++)
  {
    echo "<OPTION value='".$IdProvincia[$ypos]."'>$NoProvincia[$ypos]</OPTION>";
  }
  echo "</SELECT>";
}
?>

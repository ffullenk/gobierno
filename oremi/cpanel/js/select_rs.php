<?php 

require("jsrsServer.php.inc");
jsrsDispatch( "cateList foroList" ); //comunaList

function cateList() {
  return serializeSql( "select CATEGORIA_ID, CATEGORIA from CATEGORIA order by CATEGORIA_ID" );
}

/*function provinciaList( $REGION_ID ){
  return serializeSql("select PROV_ID, PROVINCIA from PROVINCIA where REGION_ID=" . $REGION_ID . " order by PROV_ID");
}*/

function foroList( $CATEGORIA_ID ){
  return serializeSql("select FORO_ID, NOMBRE_FORO from FORO where CATEGORIA_ID=" . $CATEGORIA_ID . " order by FORO_ID");
}

function serializeSql( $sql ){
  $link = mysql_connect("localhost", "grbc_coqbo", "g0r3citzen");
  mysql_select_db ("servicios"); 
  $result = mysql_query ($sql);
  $s = '';
  while ($row = mysql_fetch_row($result)) {
   $s .= join( $row, '~') . "|";
  }
  
  mysql_close($link);
  return $s;
}
   
?> 

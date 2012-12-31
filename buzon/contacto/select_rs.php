<?php 

require("jsrsServer.php.inc");
jsrsDispatch( "regionList provinciaList comunaList" );

function regionList() {
  return serializeSql( "select REGION_ID, REGION from REGION order by REGION_ID" );
}

function provinciaList( $REGION_ID ){
  return serializeSql("select PROV_ID, PROVINCIA from PROVINCIA where REGION_ID=" . $REGION_ID . " order by PROV_ID");
}

function comunaList( $PROV_ID ){
  return serializeSql("select COM_ID, COMUNA from COMUNA where PROV_ID=" . $PROV_ID . " order by COM_ID");
}

function serializeSql( $sql ){
  $link = mysql_connect("localhost", "grbc_coqbo", "g0r3citzen");
  mysql_select_db ("grbuzon"); 
  $result = mysql_query ($sql);
  $s = '';
  while ($row = mysql_fetch_row($result)) {
   $s .= join( $row, '~') . "|";
  }
  
  mysql_close($link);
  return $s;
}
   
?> 

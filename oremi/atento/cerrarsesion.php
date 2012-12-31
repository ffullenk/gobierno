<?php 
session_start();
 
 $userBackEnd = $_SESSION["userBackEnd"];
 $passBackEnd = $_SESSION["passBackEnd"];
 
 $ejerBackEnd = $_SESSION["ejerBackEnd"];
 $tipoCargoBackEnd = $_SESSION["tipoCargoBackEnd"];
 $tipoCoberturaBackEnd = $_SESSION["tipoCoberturaBackEnd"];
 
include("cpanel/incluir/seteaConf.php");
session_unregister("userBackEnd"); 
session_unregister("passBackEnd"); 

session_unregister("ejerBackEnd"); 
session_unregister("tipoCargoBackEnd"); 
session_unregister("tipoCoberturaBackEnd"); 

header("Location:index.php");  
?>
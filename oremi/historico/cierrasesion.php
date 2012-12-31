<?php
session_start();
 
 $userBackEnd = $_SESSION["userBackEnd"];
 $passBackEnd = $_SESSION["passBackEnd"];
 
include("incluir/seteaConf.php");
session_unregister("userBackEnd"); 
session_unregister("passBackEnd"); 
header("Location:index.php");  
?>
<?
  //Conectar a Base de Datos
/*  include("conexion.php"); */
  $link = Conexion();

  // Constatar logeo previo
  include("admxsesion.php");

  if($loginCorrecto)
  {
echo <<< HTML
         <html>
         <head>
         <title>Untitled Document</title>
         <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
         </head>

         <frameset rows="120,*" frameborder="NO" border="0" framespacing="0" cols="*"> 
           <frame name="topFrame" scrolling="NO" noresize src="admxtop.php" >
           <frame name="mainFrame" src="admxpal.php">
         </frameset>
         <noframes><body bgcolor="#FFFFFF" text="#000000">

         </body></noframes>
         </html>
HTML;
  }
  else
  {
    //Sin Logeo Previo
    echo "Logeate primero puh ...";
  }

?>

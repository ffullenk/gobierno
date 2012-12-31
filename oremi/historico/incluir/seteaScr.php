<?php
function oremiCab() { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="Keywords" content="" />
<meta name="Description" content="" />
<link href="<?php echo _urlRaiz_;?>estilos/default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
	<h1>OREMi</h1>
	<h2>Oficina Regional de Proteccion Civil y Emergencias</h2>
<?php
}

function oremiMenu($tipo,$opcion) { ?>
	<ul>
	   <?php if($tipo=="A" || $tipo=="O" ) { ?>
		        <li><a href="<?php echo _urlRaiz_;?>inicio2.php" accesskey="1" title="" <?php if($opcion==1) { echo "class=\"actual\"";}?>>Inicio</a></li>
		        <li><a href="<?php echo _urlRaiz_;?>eventos/" accesskey="2" title="" <?php if($opcion==2) { echo "class=\"actual\"";}?>>Eventos</a></li>
		        <!-- <li><a href="<?php echo _urlRaiz_;?>consultas/" accesskey="3" title="" <?php if($opcion==3) { echo "class=\"actual\"";}?>>Consultas</a></li> -->
<?php        }
             if($tipo=="A") { ?>
		        <li><a href="<?php echo _urlRaiz_;?>mantenedor/" accesskey="4" title="" <?php if($opcion==4) { echo "class=\"actual\"";}?>>Mantenedor</a></li>
<?php        } ?>
		    <!-- <li><a href="#" accesskey="5" title="">Contact Me</a></li> -->
	
	</ul>
</div>
<div id="content">
<?php
}

function oremiColDer( $tipo,$menu ) { ?>
	<div id="colOne">
	          <h3>Sesion de Trabajo</h3>
			  <div class="bg1">
			  <?php
			     $qSesion = "SELECT ormusr_id, nombre, email FROM orm_usuarios WHERE rut='" . $_SESSION['userBackEnd'] ."' AND 
				clave = '".encrypt($_SESSION['passBackEnd'],0)."';";
                 $rSesion = mysql_query($qSesion);
                 if(mysql_num_rows($rSesion) > 0 )
				 {
                    $puntero = mysql_fetch_array($rSesion);
                    echo $puntero['nombre'] ."<br> ". $puntero['email'];
                 }
			  ?>
				<ul>
			        <li><a href="<?php echo _urlRaiz_;?>cierrasesion.php">Cerrar Sesi&oacute;n</a></li>
				</ul>
			  </div>
	    <?php

              if($menu=="1" || $menu=="0") { ?>
		         <h3>Eventos</h3>
		         <div class="bg1">
			        <ul>
				       <li class="first"><a href="<?php echo _urlRaiz_;?>eventos/ingresar.php">Ingresar Evento</a></li>
				       <li><a href="<?php echo _urlRaiz_;?>eventos/modificar.php">Modificar Evento</a></li>
				       <!-- <li><a href="#">Nunc ante elit nulla</a></li> -->
			        </ul>
		         </div>
		<?php }
		    /*  if($menu=="2" || $menu=="0") {   */ ?>
<!-- 		         <h3>Consultas</h3>
		         <div class="bg1">
			        <ul>
				       <li class="first"><a href="<?php echo _urlRaiz_;?>consultas/">Eventos por Region</a></li>
				       <li><a href="<?php echo _urlRaiz_;?>consultas/">Eventos por Provincia</a></li>
				       <li><a href="<?php echo _urlRaiz_;?>consultas/">Eventos por Comuna</a></li>
				       <li><a href="<?php echo _urlRaiz_;?>consultas/">Eventos por Localidad</a></li>
			        </ul>
		         </div>
-->
        <?php /*  }   */
		      if($tipo=="A") { ?>
		         <h3>Mantenedor</h3>
		         <div class="bg1">
			        <ul>
				       <li class="first"><a href="<?php echo _urlRaiz_;?>mantenedor/usuarios.php">Usuarios del Sistema</a></li>
				       <li><a href="<?php echo _urlRaiz_;?>mantenedor/tipoevento.php">Tipos de Eventos</a></li>
				       <li><a href="<?php echo _urlRaiz_;?>mantenedor/datosevento.php">Datos del Tipo de Evento</a></li>
				       <li><a href="<?php echo _urlRaiz_;?>mantenedor/tipounidad.php">Tipos de Unidad</a></li>
				       <li><a href="<?php echo _urlRaiz_;?>mantenedor/infrapub.php">Infraestructura P&uacute;blica</a></li>
				       <li><a href="<?php echo _urlRaiz_;?>mantenedor/vialidad.php">Obras de Arte Vial</a></li>
				       <li><a href="<?php echo _urlRaiz_;?>mantenedor/infraotra.php">Otra Infraestructura</a></li>
			        </ul>
		         </div>
        <?php } ?>
		
	</div>
<?php
}

function oremiPie() { ?>
</div>
<div id="footer">
	<p>OREMi Oficina Regional de Proteccion Civil y Emergencias region de Coquimbo</a>.</p>
</div>
</body>
</html>
<?php
}
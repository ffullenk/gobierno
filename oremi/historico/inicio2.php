<?php
session_start();
 
 $userBackEnd = $_SESSION['userBackEnd'];
 $passBackEnd = $_SESSION['passBackEnd'];
 
 include("incluir/seteaConf.php");
 include("incluir/seteaBD.php");
 include("incluir/encripta.php");
 $link = conectar();
 include("incluir/seteaScr.php");
 include("incluir/funciones.php");

 if(estaActivo($userBackEnd, $passBackEnd)) {
   
   oremiCab();
   oremiMenu(esUsuario($userBackEnd, $passBackEnd), 1);
   oremiColDer( esUsuario($userBackEnd, $passBackEnd), 0 );
?>
	<div id="colTwo">
		<div class="bg2">
			<h2><em>OREMi</em> Oficina Region de Coquimbo</h2>
			<p><img src="images/logochile.jpg" alt="" width="121" height="95" class="image" /></p>
			<p><strong>OREMi Coquimbo</strong> es dirigida por <a href="mailto:mperez@gorecoquimbo.cl">Mario Perez Rojas</a>. 
			Esta pagina ha sido creada con el fin de construir una base de datos de Eventos acontecidos en la region de coquimbo con tal de contar con una base historica de eventos para su posterior analisis de acuerdo a los parametros ingresados. En esta oportunidad se contara con informacion georeferenciada en cuanto a las localidades presentes en la region de coquimbo.</p>
		</div>


<!--
<h3>Dignissim volutpat</h3>
		<div class="bg1">
			<p>Sed tempus turpis vel quam molestie pulvinar. Suspendisse venenatis dolor semper ipsum. Quisque tempus erat ac mi. Aliquam semper, est nec hendrerit dignissim, ligula turpis sagittis purus, <a href="#">ut viverra velit eros at augue</a>. Pellentesque mi nisi, porta eget, pharetra ac, sollicitudin sit amet, nisi. In sapien ligula, sollicitudin facilisis, sodales eget, tempus in, mauris. Cras risus sem, adipiscing non, convallis ac, consectetuer eu, dolor. In quam. Curabitur tempus aliquam nulla. Etiam eros.</p>
		</div>
		<h3>Blandit sed consequat</h3>
		<div class="bg1">
			<p>Sollicitudin sit amet, nisi. In sapien ligula, sollicitudin facilisis, sodales eget, tempus in, mauris. Cras risus sem, adipiscing non, convallis ac, consectetuer eu, dolor. In quam. Curabitur tempus aliquam nulla. Etiam eros.</p>
			<ul>
				<li><a href="#"> Sed tempus turpis vel quam molestie pulvinar</a></li>
				<li><a href="#"> Suspendisse venenatis dolor semper ipsum quisque tempus</a></li>
				<li><a href="#"> Ac mi aliquam semper est nec hendrerit dignissim</a></li>
			</ul>
		</div>
-->
<?php
oremiPie();
} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='index.php';</script>\n";}
?>

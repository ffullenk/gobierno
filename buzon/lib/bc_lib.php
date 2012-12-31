<?php
function direccionar($url)
{
global $global_qk;
	echo "<html>\n<head>\n<title>Validar Usuario</title>" . 
		 "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1; url='".$url."'\">" .
		 "\n</head>\n<body></body></html>";
	die();
}

function menu($tipo,$global_qk)
{
global $global_qk; 
echo "
	<div>
		<form action='bc_logout.php' method='post'>
			<input type='hidden' name='global_qk' value='" . $global_qk . "'>
			<input type='submit' name='checkout' class='bglogout' value=' Cerrar Sesi&oacute;n'>
		</form>
	</div>";
	
if($tipo == 1) {
	echo "
	<div id='ModAdm'>
		<h3>M&oacute;dulo Administrador</h3>
		<ul>
		<li><a href='bz_us01.php'>Usuario Administrador</a></li>
		<li><a href='bz_us02.php'>Usuario Responde Emails</a></li>
		<li><a href='bz_us03.php'>Usuario Consulta Emails</a></li>
		<li><a href='bz_tm01.php'>Temas</a></li>
		<li><a href='bz_tc01.php'>Tipo Consultas</a></li>		
		<li><a href='rplantilla.php'>Plantilla</a></li>		
		</ul>
	</div>
	";
}

if(( $tipo == 1) || ($tipo == 2) || ($tipo == 3) ) {
	echo "
	<div id='ModCon'>
		<h3>M&oacute;dulo Consultas</h3>
		<ul>
		<li>Consulta por Ciudadano</li>
		<li>Consulta por Temas</li>
		<li>Todas las Consultas por Ciudadano</li>
		</ul>
	</div>
	";
}

}

function Cabecera() {
echo "Buzon Ciudadano :: Gobierno Regional de Coquimbo";
}

function PiePagina() {
echo "www.gorecoquimbo.gob.cl";
}
?>

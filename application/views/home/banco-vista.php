
<?php foreach($proyectos as $p):?>

	<?php $nombre= ucwords($p['nombre']); ?> 

	<?php $descripcion= $p['descripcion']; ?>

	<?php $presupuesto = "$".number_format($p['costo_total'],0,',','.'); ?>

	<?php $fecha=fecha_formato_espanol($p['fecha_inicio']);?>

	<?php $codigo=$p['codigo_bip'];?>

	<?php $hombres= $p['b_hombres'];?>

	<?php $mujeres =$p['b_mujeres']; ?>

<?php endforeach; ?>


<div id="noticias">



  <div id="categoria"> 
  	<a href="<?php echo BASE_URI?>">Pagina Principal</a>&nbsp;&gt;&nbsp;
  	<a href="<?php echo BASE_URI?>banco-de-proyectos">Banco Proyecto</a>&nbsp;&gt;&nbsp;Banco Vista 
  </div>
          <h1> <?php echo $nombre; ?> </h1>
          <hr />
		  <br />
		    <p><?php echo $descripcion; ?> </p>
		 
		    <h3>Antecendentes t&eacute;cnicos </h3>
		    <div id="antecedentes-tecnicos">
            <div id="numero-sesion">NOMBRE : <strong><?php echo $nombre; ?> </strong> </div>
			<div id="numero-acuerdo">PRESUPUESTO :  <strong><?php echo $presupuesto; ?></strong></div>
			<div id="tipo-acuerdo"> SECTOR :  <strong>
					<?php foreach($sector as $s):?>
					<?php echo ucwords($s['nom_sector']);?>
					<?php endforeach; ?>

			</strong></div>
			<div id="fecha-acuerdo">FINANCIAMIENTO : <strong>
					<?php foreach($financiamiento as $f):?>
					<?php echo $f['nom_financiamiento'];?>
					<?php endforeach; ?>

			</strong></div>
			<div id="descripcion-acuerdo">FECHA DE INICIO :<strong><?php echo $fecha; ?> </strong></div>
			<div id="descripcion-acuerdo">CODIGO BIP : <strong><?php echo $codigo; ?></strong></div>
			<div id="descripcion-acuerdo">ETAPA :   <strong>

					<?php foreach($etapa as $e):?>
					<?php echo ucwords($e['nom_etapa']);?>
					<?php endforeach;?>
			</strong></div>
			<div id="descripcion-acuerdo">BENEFICIARIOS :   Hombres:<strong> <?php echo $hombres?> | </strong>Mujeres:<strong> <?php echo $mujeres;?> | Total: <?php echo $hombres+$mujeres;?> </strong></div>
			</div>
			<div id="mas-info">
			  <p>Para mayor Informaci&oacute;n contactarse con Unidad T&eacute;cnica :<br />
			    <a href="mailto:unidadtecnica@gorecoquimbo.cl">unidadtecnica@gorecoquimbo.cl</a></p>
			</div>

			   <h3>Listado de Proyectos en la Comuna</h3>
			   
			   		<?php foreach($listado as $l):?>
 					<div id="busqueda-noticias">
                   		 <?php echo anchor('banco-vista/'.$l['id'], strtoupper($l['nombre'])); ?>        
   					</div>	
		        	<?php endforeach; ?>	

			 
<?php if(!empty($galeria)):?>
			
			<div id="icono-galeria">
		      <h4>GALER&Iacute;A DE IM&Aacute;GENES</h4>

		     
		    </div>
<p>

	<?php foreach($galeria as $g):?>
	<a href="<?php echo base_url(); ?>imagenes/proyectos/pro_<? echo $p['id'];?>/<? echo $g['nom_archivo']; ?>" style="text-decoration:none" class="fancybox" title="<? echo $g['descripcion']; ?>">

		<img src="<?php echo base_url(); ?>imagenes/proyectos/pro_<? echo $p['id'];?>/<? echo $g['nom_archivo']; ?>" width="80" height="60" border="0" />

	</a>
     <?php endforeach;?>     
 </p>

<?php else: ?>
	<div id="icono-galeria">
		      <h4>GALER&Iacute;A DE IM&Aacute;GENES</h4>

		     
		    </div>
<p>No hay imágenes </p>
<?php endif;?>

<div id="fix" style="clear:both"></div>
	

	<?php if(!empty($video)):?>
			<div id="ver-video">
			<?php foreach($videos as $v):?>


					<a class="video-interne"  href="http://pingouindesalpes.com/jquery/videos/player.swf?file=<?php echo base_url(); ?>archivos/videos/<?php echo $ruta;?>/<?php echo $v['nom_archivo'];?>&autostart=true">VER VIDEO </a>
			<?php endforeach;?>
			</div>
	<?php endif;?>

	
<h3><br />
  documentos: </h3>

<?php if(!empty($documentos)):?>

<div id="descarga-pdf">

	<?php foreach($documentos as $d):?>
	<a href="<?php echo base_url(); ?>documentos/proyectos/pro_<? echo $p['id'];?>/<? echo $d['nom_archivo']; ?>" target="_blank">
		<?php echo $d['nom_archivo']?> </a> 
	<?php endforeach; ?>	
</div>
<?php else: ?>
<p>No hay documentos </p>
<?php endif;?>

		   



		  <div id="fix" style="clear:both">
  </div>
		  
		  </div>

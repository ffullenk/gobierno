
<?php foreach($proyectos as $p):?>

	<?php $nombre= ucwords($p['nombre']); ?> 

	<?php $descripcion= $p['descripcion']; ?>

	<?php $presupuesto = "$".number_format($p['costo_total'],0,',','.'); ?>

	<?php $fecha=fecha_formato_espanol($p['fecha_inicio']);?>

	<?php $codigo=$p['codigo_bip'];?>

	<?php $hombres= $p['b_hombres'];?>

	<?php $mujeres =$p['b_mujeres']; ?>

<?php endforeach; ?>


<div id="main-index">
<?php if(isset($home)  && ($home)):?>
<div id="contenido-izquierda-index">
      <?php else: ?>
<div id="contenido-izquierda">
      <?php endif;?>


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
	<a href="<?php echo base_url(); ?>imagenes/proyectos/pro_<? echo $p['id'];?>/<? echo $g['nom_archivo']; ?>" class="fancybox" title="<? echo $g['descripcion']; ?>">

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

   <?php if(isset($home)  && ($home)):?>
<div id="contenido-derecha-index">
      <?php else: ?>
<div id="contenido-derecha">
      <?php endif;?>


<div id="banners">
      
    <div class="mosaic-block circle">
      <a  href="http://www.gorecoquimbo.gob.cl/pgobierno/erd/" class="mosaic-overlay">&nbsp;</a>
      <div class="mosaic-backdrop"><img alt="imagen 2020" src="<?php echo base_url(); ?>imagenes/sidebar/2020.jpg" width="200" height="50" ></div>
    </div>
    <div class="mosaic-block circle">
      <a  href="http://www.gorecoquimbo.gob.cl/pgobierno/redinnovacion/" class="mosaic-overlay">&nbsp;</a>
      <div class="mosaic-backdrop"><img  alt="imagen proyecto red" src="<?php echo base_url(); ?>imagenes/sidebar/proyecto-red.jpg" width="200" height="50" ></div>
    </div>
    <div class="mosaic-block circle">
      <a  href="<?php echo BASE_URI?>renueva" class="mosaic-overlay">&nbsp;</a>
      <div class="mosaic-backdrop"><img alt="imagen micro2012" src="<?php echo base_url(); ?>imagenes/sidebar/micro2012.jpg" width="200" height="50" ></div>
    </div>
    <div class="mosaic-block circle">
      <a  href="<?php echo BASE_URI?>fic" class="mosaic-overlay">&nbsp;</a>
      <div class="mosaic-backdrop"><img alt="imagen ficr" src="<?php echo base_url(); ?>imagenes/sidebar/ficr.jpg" width="200" height="50" ></div>
    </div>
    <div class="mosaic-block circle">
      <a  href="<?php echo BASE_URI?>fondos-editoriales" class="mosaic-overlay">&nbsp;</a>
      <div class="mosaic-backdrop"><img alt="imagen fondo editorial" src="<?php echo base_url(); ?>imagenes/sidebar/fondo-editorial.jpg" width="200" height="50"></div>
    </div>
    <div class="mosaic-block circle">
      <a  href="http://www.gorecoquimbo.gob.cl/pgobierno/snit2/" class="mosaic-overlay">&nbsp;</a>
      <div class="mosaic-backdrop"><img alt="imagen mapa snit" src="<?php echo base_url(); ?>imagenes/sidebar/mapas-snit.jpg" width="200" height="50"></div>
    </div>
    <div class="mosaic-block circle">
      <a  href="<?php echo BASE_URI?>feria" class="mosaic-overlay">&nbsp;</a>
      <div class="mosaic-backdrop"><img alt="imagen feria del libro" src="<?php echo base_url(); ?>imagenes/sidebar/feria-del-libro.jpg" width="200" height="50" ></div>
    </div>
<div class="mosaic-block2 circle">
      <a href="http://www.cdc.gob.cl/" class="mosaic-overlay">&nbsp;</a>
      <div class="mosaic-backdrop"><img alt="imagen defensora" src="<?php echo base_url(); ?>imagenes/sidebar/defensora-cuidadana.jpg" width="200" height="50" ></div>
    </div>
    <div class="mosaic-block2 circle">
      <a  href="http://www.familiapreparada.cl/" class="mosaic-overlay">&nbsp;</a>
      <div class="mosaic-backdrop"><img alt="imagen familia preparada" src="<?php echo base_url(); ?>imagenes/sidebar/familia-preparada.jpg" width="200" height="50" ></div>
    </div>
    <div class="mosaic-block2 circle">
      <a  href="http://www.gorecoquimbo.gob.cl/transparencia/index.html" class="mosaic-overlay">&nbsp;</a>
      <div class="mosaic-backdrop"><img alt="imagen gobierno transparente" src="<?php echo base_url(); ?>imagenes/sidebar/gobierno-transparente.jpg" width="200" height="50" ></div>
    </div>
    <div class="mosaic-block2 circle">
      <a  href="http://www.gorecoquimbo.gob.cl/transparencia/solicitud_informacion.html" class="mosaic-overlay">&nbsp;</a>
      <div class="mosaic-backdrop"><img alt="imagen ley de transparencia" src="<?php echo base_url(); ?>imagenes/sidebar/ley-de-transparencia.jpg" width="200" height="50" ></div>
    </div>
  </div>

  </div> 
  </div>  
